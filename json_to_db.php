<?php   
    function json_to_DB($path, $host, $db_user, $db_password, $db_name)
    {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);

        if($connection->connect_errno!=0)
        {
            $_SESSION["info"] = 1;
            header('Location: index.php');
            exit();
        }

        $jsondata = file_get_contents($path);
        $data = json_decode($jsondata, true);
        $array_data = $data['clubs'];
            
        foreach ($array_data as $row) 
        {
            $sql = "INSERT INTO clubs (name, code, country) VALUES ('" . $row["name"] . "', '" . $row["code"] . "', '" . $row["country"] . "')";
            $connection->query($sql);	
        }
        $connection->close();
    }
?>