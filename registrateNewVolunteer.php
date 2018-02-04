<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="shortcut icon" href="redcross.ico" type="image/x-icon">
    <title> Регистрация волонтёра</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

    <form action="insertVolunteer.php" method="post" enctype="multipart/form-data">
        <div class="form-group">

            <div class="form-group">
                <label for="inputSurname">Фамилия:</label>
                <input type="text" class="form-control" id="inputSurname" name="surname" value="Ударцев" placeholder="Введите фамилию">
            </div>

            <label for="inputName">Имя:</label>
            <input type="text" class="form-control" id="inputName"  name="name" value="Станислав" placeholder="Введите имя" >


            <label for="inputPatronymic">Отчество:</label>
            <input type="text" class="form-control" id="inputPatronymic" value="Викторович"  name="patronymic" placeholder="Введите отчество">

            <div id="date">
            <p>
                <label for="inputDate">Дата Рождения в формате дд/мм/гггг:</label>
                <input type="text" id="inputDate" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" value="17/01/1999" class="datepicker" name="date"  maxlength="10" required/>
            </p>
            <p>
                <label for="inputAge">Возраст:</label>
                <input type="number" size="6" name="age" min="0" max="120"  value="18"required>
            </p>


            </div>


            <p>Телефон в формате +X(XXX)XXX-XX-XX:
                <input type="tel" name="phone" value="+7(921)593-80-54" pattern="[\+]\d{1}[\(]\d{3}[\)]\d{3}[\-]\d{2}[\-]\d{2}" >
            </p>

            <p>Электронная почта/Email:
                <input type="email" name="email" value="udartzev_sv@mail.ru" />
            </p>

            <div id="vkBlock">
                <label for="linkVK">Ссылка на Вконтакте:</label>
                    <p>vk.com/ <input type="text" class="form-control" id="linkVK" value="cru1zzz3" name="vk" placeholder="" ></p>
            </div>

            <div id="instagramBlock">
                <label for="linkInstagram">Ссылка на Инстаграм:</label>
                <p>instagram.com/<input type="text" class="form-control" id="linkInstagram" value="cru1zzz3" name="instagram" placeholder="" ></p>
            </div>

            <div id="passportData"> Паспортные данные:
                <p>
                <label for="serialPassport">Серия:</label>
                <input type="text" class="form-control" id="serialPassport" value="" name="serialPassport" placeholder="XXXX" pattern="\d{4}" maxlength="4">

                <label for="numberPassport">Номер:</label>
                <input type="text" class="form-control" id="numberPassport" value="" name="numberPassport" placeholder="XXXXXX" pattern="\d{6}" maxlength="6">

                    <label for="datePassport">Дата выдачи:</label>
                    <input type="text" class="form-control" id="datePassport" value="" name="datePassport" placeholder="00/00/0000" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" maxlength="10">
                </p>
            </div>




            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="sexFemale" value="F">
                <label class="form-check-label" for="sexFemale">Женский</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="sexMale" value="M">
                <label class="form-check-label" for="sexMale">Мужской</label>
            </div>
        </div>



        <div>

        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        Отправить этот файл (не более 2 MB): <input name="userfile" type="file" required />
            <br>
            <?php
                if(isset($_GET['error'])){
                    $error = $_GET['error'];
                      switch ($error){
                            case 'ERR_FORM_SIZE';

                                echo "Файл слишком большой! Попробуйте меньший размер файла";
                            case 'ERR_INI_SIZE';
                                echo "Файл слишком большой! Попробуйте меньший размер файла";
                        }
                }
            ?>
        </div>


        <button type="submit" class="btn btn-primary" value="Send File">Добавить нового волонтёра</button>
    </form>
</body>