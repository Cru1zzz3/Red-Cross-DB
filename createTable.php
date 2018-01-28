<?php



$tableName = 'volunteerTable';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS ".$tableName."(    
      ID INT (10) NOT NULL  AUTO_INCREMENT,
      NAME VARCHAR (30) NOT NULL,
      SURNAME VARCHAR (30) NOT NULL,
      SEX VARCHAR (1) NOT NULL,
      PASS VARCHAR (30) NOT NULL,
      PRIMARY KEY (ID))";



    $conn->exec($sql);
    echo("Table: '" . $dbname . "' created successfully\n");
    header('Location:index.php');
}
catch (PDOException $e){
    echo $sql .$e ->getMessage();
}
