<?php

$host = 'localhost';
$db = 'volunteerDB';
$username = 'root';
$password = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false];

$tableName = 'volunteerTable';

try {
    $conn = new PDO($dsn,$username,$password,$opt);


    $sql = "CREATE TABLE IF NOT EXISTS ".$tableName."(    
      ID INT (10) NOT NULL  AUTO_INCREMENT,
      SURNAME VARCHAR (30) NOT NULL,
      NAME VARCHAR (30) NOT NULL,
      PATRONYMIC VARCHAR (30) NOT NULL,
      DATE VARCHAR (10) NOT NULL,
      AGE INT (3) NOT NULL,
      PHONE VARCHAR (20) NOT NULL,
      EMAIL VARCHAR (30) NOT NULL,
      VK VARCHAR (30),
      INSTAGRAM VARCHAR (30),
      SEX VARCHAR (1) NOT NULL,
      PRIMARY KEY (ID))";



    $conn->exec($sql);
    echo("Table: '" . $db . "' created successfully\n");
    header('Location:index.php?createDB=success');
}
catch (PDOException $e){
    echo $sql .$e ->getMessage();
}
