<?php

header('Content-Type: text/plain; charset=utf-8');

//setlocale(LC_ALL,'ru_RU.UTF-8');



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
$serialPassport = $_POST['serialPassport'];
$numberPassport = $_POST['numberPassport'];
$datePassport = $_POST['datePassport'];
$codePassport = $_POST['codePassport'];
$placePassport = $_POST['placePassport'];
$adress = $_POST['adress'];





try{
    $pdo = new PDO($dsn,$username,$password,$opt);

  //  if(empty($_POST['name'])) exit("Поле не заполнено");
  //  if(empty($_POST['surname'])) exit("Поле не заполнено");

    $sql = "INSERT INTO volunteerTable (SURNAME, NAME, PATRONYMIC, DATE, AGE, PHONE, EMAIL, VK, INSTAGRAM, SEX,SERIALPASSPORT,NUMBERPASSPORT,DATEPASSPORT,CODEPASSPORT,PLACEPASSPORT,ADRESS,PHOTO) 
    VALUES (:surname,:name,:patronymic,:date,:age,:phone,:email,:vk,:instagram,:sex,:serialPassport,:numberPassport,:datePassport,:codePassport,:placePassport,:adress,:photo)";

    $stmt = $pdo -> prepare($sql);

    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

//echo basename($_FILES['userfile']['name']);

    if(!isset($_FILES['userfile']['error']) || is_array($_FILES['userfile']['error']))
    {
        throw new RuntimeException('Invalid parameters.');
    }

    switch ($_FILES['userfile']['error']){
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            $error =ERR_NO_FILE;
            throw new RuntimeException('No file sent. Загружаемый файл отсутствует');
        case UPLOAD_ERR_INI_SIZE:
            $error = 'ERR_INI_SIZE';
            throw new RuntimeException('Size of file too big. Превышен размер файла');
        case UPLOAD_ERR_FORM_SIZE:
            $error = 'FORM_SIZE';
            throw new RuntimeException('Exceeded filesize limit. Превышен размер загружаемого файла до 5 MB.');
        case UPLOAD_ERR_PARTIAL:
            $error = 'ERR_PARTIAL';
            throw new RuntimeException('File is parted download. Файл загружен лишь частично.');
        case UPLOAD_ERR_NO_TMP_DIR:
            $error = 'ERR_NO_TMP_DIR';
            throw new RuntimeException('No temporary direction. Нет временной директории.');
        case UPLOAD_ERR_CANT_WRITE:
            $error = 'ERR_CANT_WRITE';
            throw new RuntimeException('Cannot write file to disk. Не удалось записать файл на диск.');
        case UPLOAD_ERR_EXTENSION:
            $error = 'ERR_EXTENSION';
            throw new RuntimeException('Extension file error. Неверное расширение файла.');
            default:
                $error = 'ERR_UNKOWN_ERROR';
            throw new RuntimeException('Unknown errors');
    }

    if ($_FILES['userfile']['size'] > 2097152){
        throw new RuntimeException('Exceeded filesize limit. Слишком большой размер изображения.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
            $finfo -> file($_FILES['userfile']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif'
            ),
            true
        )){
        throw new RuntimeException('Invalid file format. Неверный формат файла.');
    }

    if (!move_uploaded_file($_FILES['userfile']['tmp_name'],
        sprintf('./uploads/%s.%s',$sha1Photo = sha1_file($_FILES['userfile']['tmp_name']),
            $ext
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file. Ошибка загрузки файла.');
    }

    echo 'File is uploaded successful.';


    $stmt -> execute(array('surname' => $surname,'name' => $name, 'patronymic' => $patronymic, 'date' => $date, 'age' => $age,
        'phone' => $phone, 'email' => $email, 'vk' => $vk, 'instagram' => $instagram, 'sex' => $sex,
        'serialPassport' => $serialPassport,'datePassport' => $datePassport,'numberPassport' => $numberPassport,'codePassport' => $codePassport,'placePassport' => $placePassport,'adress' => $adress,'photo' => $sha1Photo));









  header("Location: index.php?record=created");

}
catch (PDOException $e){
    echo  $sql . $e ->getMessage();
}
catch (RuntimeException $e){
 // echo  $e ->getMessage();
    header("Location: registrateNewVolunteer.php?error=".$error."");


}