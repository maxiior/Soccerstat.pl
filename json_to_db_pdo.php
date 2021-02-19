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

        if (isset($_POST['email'])) 
        {
	
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            
            if (empty($email)) {
                
                $_SESSION['given_email'] = $_POST['email'];
                header('Location: index.php');
                
            } else {
                
                require_once 'database.php';
                
                $query = $db->prepare('INSERT INTO users VALUES (NULL, :email)');
                $query->bindValue(':email', $email, PDO::PARAM_STR);
                $query->execute();
            }
        } 
        else 
        {
            header('Location: index.php');
            exit();
        }
        
    } 
    catch (PDOException $error) 
    {
        $_SESSION["info"] = 1;
        header('Location: index.php');
        exit();  
    }
?>