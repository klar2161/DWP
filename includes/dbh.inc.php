<?php

$serverName = "localhost";
$dBUsername = "admin";
$dBPassword = "123456";
$dBName = "DeepbookDB";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}