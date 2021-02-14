<?php

    require_once "import_csv_into_databe.php";
    require_once "json_to_db.php";
    require_once "connect.php";

    session_start();

    if(isset($_POST['flexRadioDefault']) && $_POST['flexRadioDefault']=='json')
    {
        $path = $_FILES['csvFile']['tmp_name'];
        json_to_DB($path);
    }
    else
    {
        $path = $_FILES['csvFile']['tmp_name'];
        $size = $_FILES['csvFile']['size'];
        import_csv_into_databe($path, $size);
    }

    $_SESSION["info"] = 2;
    header('Location: index.php');
?>