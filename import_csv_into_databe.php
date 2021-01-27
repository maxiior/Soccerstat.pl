<?php
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $date = "";
            if (isset($column[0])) {
                $date = mysqli_real_escape_string($conn, $column[0]);
            }
            $teamFirstId = "";
            if (isset($column[1])) {
                $teamFirstId = mysqli_real_escape_string($conn, $column[1]);
            }
            $teamSecondId = "";
            if (isset($column[2])) {
                $teamSecondId = mysqli_real_escape_string($conn, $column[2]);
            }
            $teamFirstName = "";
            if (isset($column[3])) {
                $teamFirstName = mysqli_real_escape_string($conn, $column[3]);
            }
            $teamSecondName = "";
            if (isset($column[4])) {
                $teamSecondName = mysqli_real_escape_string($conn, $column[4]);
            }
            $score = "";
            if (isset($column[5])) {
                $score = mysqli_real_escape_string($conn, $column[5]);
            }
            $leagueId = "";
            if (isset($column[6])) {
                $leagueId = mysqli_real_escape_string($conn, $column[6]);
            }
            $leagueName = "";
            if (isset($column[7])) {
                $leagueName = mysqli_real_escape_string($conn, $column[7]);
            }
              $teamFirstShots = "";
            if (isset($column[8])) {
                $teamFirstShots = mysqli_real_escape_string($conn, $column[8]);
            }
            $teamSecondShots = "";
            if (isset($column[9])) {
                $teamSecondShots = mysqli_real_escape_string($conn, $column[9]);
            }
            $teamFirstPossesion = "";
            if (isset($column[10])) {
                $teamFirstPossesion = mysqli_real_escape_string($conn, $column[10]);
            }
            $teamSecondPossesion = "";
            if (isset($column[11])) {
                $teamSecondPossesion = mysqli_real_escape_string($conn, $column[11]);
            }
            $teamFirstPass = "";
            if (isset($column[12])) {
                $teamFirstPass = mysqli_real_escape_string($conn, $column[12]);
            }
            $teamSecondPass = "";
            if (isset($column[13])) {
                $teamSecondPass = mysqli_real_escape_string($conn, $column[13]);
            }
             $teamFirstFauls = "";
            if (isset($column[14])) {
                $teamFirstFauls = mysqli_real_escape_string($conn, $column[14]);
            }
            $teamSecondFauls = "";
            if (isset($column[15])) {
                $teamSecondPass = mysqli_real_escape_string($conn, $column[15]);
            }
            
            $sqlInsert = "INSERT into matches (date,teamFirstId,teamSecondId,teamFirstName,teamSecondName,score,leagueId,leagueName,teamFirstShots,teamSecondShots,teamFirstPossession,teamSecondPossesion,teamFirstPass,teamSecondPass,teamFirstFauls,teamSecondFauls)
                   values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $paramType = "siisssisiiiiiiii";
            $paramArray = array(
                $date,
                $teamFirstId,
                $teamSecondId,
                $teamFirstName,
                $teamSecondName,
                $score,
                $leagueId,
                $leagueName,
                $teamFirstShots,
                $teamSecondShots,
                $teamFirstPossession,
                $teamSecondPossesion,
                $teamFirstPass,
                $teamSecondPass,
                $teamFirstFauls,
                $teamSecondFauls
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>