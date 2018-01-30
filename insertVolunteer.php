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

$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$date = $_POST['date'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$vk = $_POST['vk'];
$instagram = $_POST['instagram'];
$sex = $_POST['sex'];

try{
    $pdo = new PDO($dsn,$username,$password,$opt);

  //  if(empty($_POST['name'])) exit("Поле не заполнено");
  //  if(empty($_POST['surname'])) exit("Поле не заполнено");



    $sql = "INSERT INTO volunteertable (SURNAME, NAME, PATRONYMIC, DATE, AGE, PHONE, EMAIL, VK, INSTAGRAM, SEX) 
    VALUES (:surname,:name,:patronymic,:date,:age,:phone,:email,:vk,:instagram,:sex)";

    $stmt = $pdo -> prepare($sql);


    $stmt -> execute(array('surname' => $surname,'name' => $name, 'patronymic' => $patronymic, 'date' => $date, 'age' => $age,
        'phone' => $phone, 'email' => $email, 'vk' => $vk, 'instagram' => $instagram, 'sex' => $sex));


    header("Location: index.php?record=created");

}
catch (PDOException $e){
 echo $sql. $e ->getMessage();
}
