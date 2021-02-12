<?php

    session_start();
    require_once "connect.php";

    if(empty($_POST['team1']) ||
    empty($_POST['team2']) ||
    empty($_POST['score1']) ||
    empty($_POST['score2']) ||
    empty($_POST['possession1']) ||
    empty($_POST['possession2']) ||
    empty($_POST['apasses1']) ||
    empty($_POST['apasses2']) ||
    empty($_POST['shoots1']) ||
    empty($_POST['shoots2']) ||
    empty($_POST['ashoots1']) ||
    empty($_POST['ashoots2']) ||
    empty($_POST['yellow1']) ||
    empty($_POST['yellow2']) ||
    empty($_POST['red1']) ||
    empty($_POST['red2']) ||
    empty($_POST['free1']) ||
    empty($_POST['free2']) ||
    empty($_POST['penalty1']) ||
    empty($_POST['penalty2']) ||
    empty($_POST['corner1']) ||
    empty($_POST['corner2']) ||
    empty($_POST['fauls1']) ||
    empty($_POST['fauls2']))
    {
        $_SESSION["info"] = -1;
        header('Location: index.php');
        exit();
    }

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

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
        $socre2 =htmlentities($_POST['score2'], ENT_QUOTES, "UTF-8");
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

        //w cudzyslowie insert sql
        if(@$connection->query(sprintf("")))
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