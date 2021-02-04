<?php

function json_to_DB($path)
{
// Create connection
$conn = new mysqli('localhost', 'root', '', 'pilka');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$jsondata = file_get_contents($path);

$data = json_decode($jsondata, true);

$array_data = $data['clubs'];
/*$name=$data['club']['name'];
$code=$data['club']['code'];
$country=$data['club']['country'];

$sql = "INSERT INTO clubs(name,code,country)
    VALUES('$name', '$code', '$country')";
    if(!mysqli_query($conn,$sql))
    {
        die('Error : ' . mysqli_error($conn));
    }*/
	
foreach ($array_data as $row) {
    $sql = "INSERT INTO clubs (name, code, country) VALUES ('" . $row["name"] . "', '" . $row["code"] . "', '" . $row["country"] . "')";
$conn->query($sql);	}

$conn->close();
}

json_to_DB('D:\Pobrane\football.json-master\2020-21\en.1.clubs.json')
?>