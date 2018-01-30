<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="shortcut icon" href="redcross.ico" type="image/x-icon">
<title> База данных волонтёров Красного Креста</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
Здравствуйте, %username%! <br>



<a href="registrateNewVolunteer.php"> Зарегистрировать нового волонтёра </a> <br>
<a href="findVolunteer.php"> Поиск </a> <br>
<a href="cards.php"> Карточки добровольцев </a> <br>
<a href="preferences.php"> Настройки </a> <br>


<a href="createDB.php"> Создать базу </a> <br>


<?php
/*

include 'createDB.php';
include 'insertVolunteer.php';
*/



// include 'authorize.php';
?>



<!-- Html content of page
        <div class="pageGrid">
            <div class="Hat">
                <div class="col-md-12" style="background-color:blue">
                    Hat
                </div>
            </div>

        <div class="Content">
            <div class="col-md-12" style="background-color:green">
                Content
            </div>
        </div>

        <div class="Footer">
                <div class="col-md-12" style="background-color:red">
                    Footer
                </div>
        </div>
        -->
</body>

</html>
