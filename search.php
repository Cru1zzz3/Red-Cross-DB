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

$tableName = "volunteerTable";

$name = $_POST['name'];
$surname = $_POST['surname'];
$sex = $_POST['sex'];


try{
    $conn = new PDO($dsn,$user,$password,$opt);

    if(empty($_POST['name'])) ;
    if(empty($_POST['surname']));

    $query = "SELECT * FROM ".$tableName."";

    $result = $conn -> prepare($query);

    $result  ->execute(['name' => $_POST['name'], 'surname' => $_POST['surname'] , 'sex' => $_POST['sex'], 'pass' => $_POST['pass']]);


    // echo "Record with name ".$name." created";

    header("Location: index.php?record=created");

}
catch (PDOException $e){
    die('Подключение не удалось: ' . $e ->getMessage());
}
