<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "volunteerDB";

try{
    $conn = new PDO("mysql:host=$servername;charset=UTF8",$username,$password);

    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS ".$dbname."  CHARACTER SET utf8 COLLATE utf8_general_ci";
    $conn -> exec($sql);
    echo "Database: '".$dbname."'' created successfully\n";

}

catch (PDOException $e){
    echo $sql .$e ->getMessage();
}

$conn = null;

include "createTable.php";
?>