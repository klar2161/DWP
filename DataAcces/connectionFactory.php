<?php

class connectionFactory{

    public function createConnection(){
        $serverName = "localhost";
        $dBUsername = "root";
        $dBPassword = "";
        $dBName = "DeepbookDB";

        $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
        return $conn;
    }
}