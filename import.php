<?php

    require_once "import_csv_into_databe.php";
    require_once "json_to_db.php";
    require_once "connect.php";

    //session_start();

    //TODO

    if(isset($_POST['flexRadioDefault']))
    {
        $path = $_FILES['csvFile']['tmp_name'];
        json_to_DB($path);
    }
    else if(isset($_POST['flexRadioDefault']))
    {
        $path = $_FILES['csvFile']['tmp_name'];
        $size = $_FILES['csvFile']['size'];
        import_csv_into_databe($path, $size);
    }

?>