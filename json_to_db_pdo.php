<?php
    require_once 'connect.php';

    function json_to_DB($path)
    {
        
        $conn->close();
    }








    $config = [
        'host' => 'localhost', 
        'user' => 'root',
        'password' => '',
        'database' => 'newsletter'
    ];

    try 
    {
        $db = new PDO("mysql:host={$config['host']};dbname={$config['database']};charset=utf8", $config['user'], $config['password'], [
            PDO::ATTR_EMULATE_PREPARES => false, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $jsondata = file_get_contents($path);
        $data = json_decode($jsondata, true);
        $array_data = $data['clubs'];
            
        foreach ($array_data as $row) 
        {
            $sql = "INSERT INTO clubs (name, code, country) VALUES ('" . $row["name"] . "', '" . $row["code"] . "', '" . $row["country"] . "')";
            $conn->query($sql);	
        }
        
        $query = $db->prepare('INSERT INTO users VALUES (NULL, :email)');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
    } 
    catch (PDOException $error) 
    {
        $_SESSION["info"] = 1;
        header('Location: index.php');
        exit();  
    }
?>