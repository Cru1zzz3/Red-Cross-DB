<?php



$tableName = 'volunteerTable';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS $tableName(
      id INT (30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR (30) NOT NULL,
      surname VARCHAR (30) NOT NULL ,
      password VARCHAR (30) NOT NULL)";


    $conn->exec($sql);
    echo("Table: '" . $dbname . "' created successfully\n");
}
catch (PDOException $e){
    echo $sql .$e ->getMessage();
}
