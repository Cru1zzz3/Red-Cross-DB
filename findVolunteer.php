<!DOCTYPE html>
<html lang="ru">
    <head>
        <link rel="shortcut icon" href="redcross.ico" type="image/x-icon">
        <title> Поиск волонтёра</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <body>
    Поиск волонтёра:
        <form action="search.php" method="post">
            <div class="form-group">
                <label for="inputName">Имя:</label>
                <input type="text" class="form-control" id="inputName"  name="name" placeholder="Введите имя">
            </div>

            <div class="form-group">
                <label for="inputSurname">Фамилия:</label>
                <input type="text" class="form-control" id="inputSurname" name="surname" placeholder="Введите фамилию">
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="sexFemale" value="F">
                <label class="form-check-label" for="sexFemale">Женский</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="sexMale" value="M">
                <label class="form-check-label" for="sexMale">Мужской</label>
            </div>

            <button type="submit" class="btn btn-primary"> Найти </button>
        </form>
    </body>
</html>