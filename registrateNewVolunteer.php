<form action="insertVolunteer.php" method="post">
    <div class="form-group">
        <label for="inputName">Имя:</label>
        <input type="text" class="form-control" id="inputName"  name="name" placeholder="Введите имя">
    </div>

    <div class="form-group">
        <label for="inputSurname">Фамилия:</label>
        <input type="text" class="form-control" id="inputSurname" name="surname" placeholder="Введите фамилию">
    </div>

    <div class="form-group">
        <label for="InputPassword">Password</label>
        <input type="password" class="form-control" id="InputPassword" name="pass" placeholder="Введите пароль">
    </div>


    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sex" id="sexFemale" value="F">
        <label class="form-check-label" for="sexFemale">Женский</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sex" id="sexMale" value="M">
        <label class="form-check-label" for="sexMale">Мужской</label>
    </div>

    <button type="submit" class="btn btn-primary">Добавить нового волонтёра</button>
</form>
