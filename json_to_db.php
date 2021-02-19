<?php
    require_once 'connect.php';

    function json_to_DB($path)
    {
        $conn = new mysqli($host, $db_user, $db_password, $db_name);
        if ($conn->connect_error) 
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
            $conn->query($sql);	
        }
        $conn->close();
    }
?>