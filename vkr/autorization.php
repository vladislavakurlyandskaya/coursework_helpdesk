<?php
    session_start();
?>

<!-- Форма авторизации -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Авторизация</title>
</head>

<body>
    <form action="bd/signin.php" method="POST">
        <h1>Авторизация</h1><br>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-10">
                <input type="text" name="login" placeholder="Введите свой логин">
            </div>

            <label class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" name="pass" placeholder="Введите пароль">
            </div>
        </div><br>

        <div class="text-center">
            <button class="btn btn-outline-dark" type="submit">Войти</button>
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


