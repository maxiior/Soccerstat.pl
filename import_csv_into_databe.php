<?php
    use Phppot\DataSource;
    require_once 'DataSource.php';

    function import_csv_into_databe($fileName, $size)
    {
        $db = new DataSource();
        $conn = $db->getConnection();

        if (isset($_POST["import"])) 
        {              
            if ($size > 0) {
                
                $file = fopen($fileName, "r");
                
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    $id = "";
                    if (isset($column[0])) {
                        $id = mysqli_real_escape_string($conn, $column[0]);
                    }
					$club_id = "";
                    if (isset($column[1])) {
                        $club_id = mysqli_real_escape_string($conn, $column[1]);
                    }
					$club2_id = "";
                    if (isset($column[2])) {
                        $club2_id = mysqli_real_escape_string($conn, $column[2]);
                    }
					$date = "";
                    if (isset($column[3])) {
                        $date = mysqli_real_escape_string($conn, $column[3]);
                    }
                    $team1 = "";
                    if (isset($column[4])) {
                        $team1 = mysqli_real_escape_string($conn, $column[4]);
                    }
                    $team2 = "";
                    if (isset($column[5])) {
                        $team2 = mysqli_real_escape_string($conn, $column[5]);
                    }
                    $score1 = "";
                    if (isset($column[6])) {
                        $score1 = mysqli_real_escape_string($conn, $column[6]);
                    }
                    $score2 = "";
                    if (isset($column[7])) {
                        $score2 = mysqli_real_escape_string($conn, $column[7]);
                    }
                    $possesion1 = "";
                    if (isset($column[8])) {
                        $possesion1 = mysqli_real_escape_string($conn, $column[8]);
                    }
                    $possesion2 = "";
                    if (isset($column[9])) {
                        $possesion2 = mysqli_real_escape_string($conn, $column[9]);
                    }
                    $apasses1 = "";
                    if (isset($column[10])) {
                        $apasses1 = mysqli_real_escape_string($conn, $column[10]);
                    }
                    $apasses2 = "";
                    if (isset($column[11])) {
                        $apasses2 = mysqli_real_escape_string($conn, $column[11]);
                    }
                    $shoots1 = "";
                    if (isset($column[12])) {
                        $shoots1 = mysqli_real_escape_string($conn, $column[12]);
                    }
                    $shoots2 = "";
                    if (isset($column[13])) {
                        $shoots2 = mysqli_real_escape_string($conn, $column[13]);
                    }
                    $ashoots1 = "";
                    if (isset($column[14])) {
                        $ashoots1 = mysqli_real_escape_string($conn, $column[14]);
                    }
                    $ashoots2 = "";
                    if (isset($column[15])) {
                        $ashoots2 = mysqli_real_escape_string($conn, $column[15]);
                    }
                    $yellow1 = "";
                    if (isset($column[16])) {
                        $yellow1 = mysqli_real_escape_string($conn, $column[16]);
                    }
                    $yellow2 = "";
                    if (isset($column[17])) {
                        $yellow2 = mysqli_real_escape_string($conn, $column[17]);
                    }
                    $red1 = "";
                    if (isset($column[18])) {
                        $red1 = mysqli_real_escape_string($conn, $column[18]);
                    }
					$red2 = "";
                    if (isset($column[19])) {
                        $red2 = mysqli_real_escape_string($conn, $column[19]);
                    }
                    $free1 = "";
                    if (isset($column[20])) {
                        $free1 = mysqli_real_escape_string($conn, $column[20]);
                    }
					$free2 = "";
                    if (isset($column[21])) {
                        $free2 = mysqli_real_escape_string($conn, $column[21]);
                    }
					$penalty1 = "";
                    if (isset($column[22])) {
                        $penalty1 = mysqli_real_escape_string($conn, $column[22]);
                    }
					$penalty2 = "";
                    if (isset($column[23])) {
                        $penalty2 = mysqli_real_escape_string($conn, $column[23]);
                    }
					$corner1 = "";
                    if (isset($column[24])) {
                        $corner1 = mysqli_real_escape_string($conn, $column[24]);
                    }
					$corner2 = "";
                    if (isset($column[25])) {
                        $corner2 = mysqli_real_escape_string($conn, $column[25]);
                    }
					$fauls1 = "";
                    if (isset($column[26])) {
                        $fauls1 = mysqli_real_escape_string($conn, $column[26]);
                    }
					$fauls2 = "";
                    if (isset($column[27])) {
                        $fauls2 = mysqli_real_escape_string($conn, $column[27]);
                    }
                    
                    $sqlInsert = "INSERT into games (id,club_id,club2_id,date,team1,team2,score1,score2,possesion1,possesion2,apasses1,apasses2,shoots1,shoots2,ashoots1,ashoots2,yellow1,yellow2,red1,red2,free1,free2,penalty1,penalty2,corner1,corner2,fauls1,fauls2)
                        values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $paramType = "iiisssiiiiiiiiiiiiiiiiiiiiii";
                    $paramArray = array(
						$id, 
						$club_id, 
						$club2_id, 
						$date,
                        $team1,
						$team2,
						$score1,
						$score2,
						$possesion1,
						$possesion2,
						$apasses1,
						$apasses2,
						$shoots1,
						$shoots2,
						$ashoots1,
						$ashoots2,
						$yellow1,
						$yellow2,
						$red1,
						$red2,
						$free1,
						$free2,
						$penalty1,
						$penalty2,
						$corner1,
						$corner2,
						$fauls1,
						$fauls2
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
    }
?>