<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "volunteerDB";
$tableName = "volunteerTable";




$name = $_POST['name'];
$surname = $_POST['surname'];
$sex = $_POST['sex'];
$pass = $_POST['pass'];


try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8",$username,$password);
    if(empty($_POST['name'])) exit("Поле не заполнено");
    if(empty($_POST['surname'])) exit("Поле не заполнено");

    $query = "INSERT INTO ".$tableName."(name, surname, sex, pass) VALUES ('$name','$surname','$sex','$pass')";


    $result = $conn -> prepare($query);

    $result  ->execute(['name' => $_POST['name'], 'surname' => $_POST['surname'] , 'sex' => $_POST['sex'], 'pass' => $_POST['pass']]);


    // echo "Record with name ".$name." created";

     header("Location: index.php?record=created");

}
catch (PDOException $e){
 echo $query . $e ->getMessage();
}

// VALUES ($name,$surname,$pass,$sex)";