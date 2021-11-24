<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "DeepbookDB";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
//connectToDB
function conn()
{
    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "DeepbookDB";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        return $conn;
    }
    

}