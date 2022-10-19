<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Регистрация пользователя</title>
</head>

<body>
    <form action="bd/check.php" method="POST">
        <h1>Регистрация</h1><br>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" name="first_name" required><br>
            </div>

            <label class="col-sm-2 col-form-label">Фамилия</label>
            <div class="col-sm-10">
                <input type="text" name="last_name" required><br>
            </div>

            <label class="col-sm-2 col-form-label">Отчество</label>
            <div class="col-sm-10">
                <input type="text" name="patronomic" required><br>
            </div>

            <label class="col-sm-2 col-form-label">Отдел</label>
            <div class="col-sm-10">
                <input type="text" name="department" required><br>
            </div>

            <label class="col-sm-2 col-form-label">Должность</label>
            <div class="col-sm-10">
                <input type="text" name="post" required><br>
            </div>

            <label class="col-sm-2 col-form-label">Тип пользователя</label>
            <div class="col-sm-10">
                <select name="usertype" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <label class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-10">
                <input type="email" name="login" placeholder="name@example.com" required><br>
            </div>

            <label class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" name="pass" placeholder="Введите пароль" required><br>
            </div>

            <label class="col-sm-2 col-form-label">Подтверждение пароля</label>
            <div class="col-sm-10">
                <input type="password" name="pass_confirm" placeholder="Подтвердите пароль" required><br>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-outline-dark" type="submit">Зарегестрировать</button>
        </div><br>

        <?php
            if (isset($_SESSION['message'])){
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>