<?php
/* 
class connectDB {

    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName ="DeepBookDB";

    protected function conn() {
        $dsn = 'mysql:host=' . $this->$host . ';dbname' . $this->$dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
*/

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "DeepbookDB";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

//connectToDB
/*
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
*/