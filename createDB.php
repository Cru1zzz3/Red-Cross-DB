<?php

$host = 'localhost';
$db = 'volunteerDB';
$username = 'root';
$password = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;charset=$charset";
$opt = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false];

try{

    $conn = new PDO($dsn,$username,$password,$opt);

    $sql = "CREATE DATABASE IF NOT EXISTS ".$db."  CHARACTER SET utf8 COLLATE utf8_general_ci";
    $conn -> exec($sql);
    echo "Database: '".$db."'' created successfully\n";

}

catch (PDOException $e){
    echo $sql .$e ->getMessage();
}

$conn = null;

include "createTable.php";
?>