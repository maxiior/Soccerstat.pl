<?php

    session_start();
    require_once "connect.php";

    if(!isset($_POST['team1']) ||
    !isset($_POST['team2']) ||
    !isset($_POST['score1']) ||
    !isset($_POST['score2']) ||
    !isset($_POST['possession1']) ||
    !isset($_POST['possession2']) ||
    !isset($_POST['apasses1']) ||
    !isset($_POST['apasses2']) ||
    !isset($_POST['shoots1']) ||
    !isset($_POST['shoots2']) ||
    !isset($_POST['ashoots1']) ||
    !isset($_POST['ashoots2']) ||
    !isset($_POST['yellow1']) ||
    !isset($_POST['yellow2']) ||
    !isset($_POST['red1']) ||
    !isset($_POST['red2']) ||
    !isset($_POST['free1']) ||
    !isset($_POST['free2']) ||
    !isset($_POST['penalty1']) ||
    !isset($_POST['penalty2']) ||
    !isset($_POST['corner1']) ||
    !isset($_POST['corner2']) ||
    !isset($_POST['fauls1']) ||
    !isset($_POST['fauls2']))
    {
        $_SESSION["info"] = -1;
        header('Location: index.php');
        exit();
    }

    $connection = @new mysqli('localhost', 'root', '', 'pilka');

    if($connection->connect_errno!=0)
    {
        $_SESSION["info"] = 1;
        header('Location: index.php');
        exit();
    }
    else
    {
        $team1 = htmlentities($_POST['team1'], ENT_QUOTES, "UTF-8");
        $team2 =htmlentities($_POST['team2'], ENT_QUOTES, "UTF-8");
        $score1 =htmlentities($_POST['score1'], ENT_QUOTES, "UTF-8");
        $score2 =htmlentities($_POST['score2'], ENT_QUOTES, "UTF-8");
        $possession1 =htmlentities($_POST['possession1'], ENT_QUOTES, "UTF-8");
        $possession2 =htmlentities($_POST['possession2'], ENT_QUOTES, "UTF-8");
        $apasses1 =htmlentities($_POST['apasses1'], ENT_QUOTES, "UTF-8");
        $apasses2 =htmlentities($_POST['apasses2'], ENT_QUOTES, "UTF-8");
        $shoots1 =htmlentities($_POST['shoots1'], ENT_QUOTES, "UTF-8");
        $shoots2 =htmlentities($_POST['shoots2'], ENT_QUOTES, "UTF-8");
        $ashoots1 =htmlentities($_POST['ashoots1'], ENT_QUOTES, "UTF-8");
        $ashoots2 =htmlentities($_POST['ashoots2'], ENT_QUOTES, "UTF-8");
        $yellow1 =htmlentities($_POST['yellow1'], ENT_QUOTES, "UTF-8");
        $yellow2 =htmlentities($_POST['yellow2'], ENT_QUOTES, "UTF-8");
        $red1 =htmlentities($_POST['red1'], ENT_QUOTES, "UTF-8");
        $red2 =htmlentities($_POST['red2'], ENT_QUOTES, "UTF-8");
        $free1 =htmlentities($_POST['free1'], ENT_QUOTES, "UTF-8");
        $free2 =htmlentities($_POST['free2'], ENT_QUOTES, "UTF-8");
        $penalty1 =htmlentities($_POST['penalty1'], ENT_QUOTES, "UTF-8");
        $penalty2 =htmlentities($_POST['penalty2'], ENT_QUOTES, "UTF-8");
        $corner1 =htmlentities($_POST['corner1'], ENT_QUOTES, "UTF-8");
        $corner2 =htmlentities($_POST['corner2'], ENT_QUOTES, "UTF-8");
        $fauls1 =htmlentities($_POST['fauls1'], ENT_QUOTES, "UTF-8");
        $fauls2 =htmlentities($_POST['fauls2'], ENT_QUOTES, "UTF-8");
		

        $sq= "SELECT c.id FROM clubs as c WHERE c.name = '$team1'";
        $result = $connection->query($sq) or die($connection->error);
        $row = mysqli_fetch_array($result);
		
		
		$sq2= "SELECT c.id FROM clubs as c WHERE c.name = '$team2'";
        $result2 = $connection->query($sq2) or die($connection->error);
        $row2 = mysqli_fetch_array($result2);
		
		
        //dodawanie daty z domyslna wartoscia        
        $sql = "INSERT INTO games (club_id, club2_id, date, team1, team2, score1, score2, possession1, possession2, apasses1, apasses2,
        shoots1, shoots2, ashoots1, ashoots2, yellow1, yellow2, red1, red2, free1, free2, penalty1, penalty2,
        corner1, corner2, fauls1, fauls2)
        VALUES ($row[0],$row2[0], '2020-02-02', '$team1', '$team2', $score1,$score2,$possession1,$possession2,$apasses1,$apasses2,$shoots1,$shoots2,$ashoots1,$ashoots2,$yellow1,$yellow2,$red1,$red2,$free1,$free2,$penalty1,$penalty2,$corner1,$corner2,$fauls1,$fauls2)";

        if($connection->query($sql))
        {
            $_SESSION["info"] = 0;
            header('Location: index.php');
            exit();
        }
        else
        {
            $_SESSION["info"] = -1;
            header('Location: index.php');
            exit();
        }

    }

    $connection->close();

?>