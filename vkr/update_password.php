<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /autorization.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
<header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Изменение пароля</title>
</header>

<body><br>
<form action="bd/update_user.php" method="POST">
    <div class="modal-body">
        <div class="container pt-3">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Старый пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="pass_old">
                </div>

                <label class="col-sm-2 col-form-label">Новый пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="pass_new">
                </div>

                <label class="col-sm-2 col-form-label">Повторите пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="pass_confirm">
                </div>
            </div><br>
            <input type="submit" class="btn btn-primary" name="change-password" id="change-password" value="Изменить пароль">
            <?php
            if (isset($_SESSION['message'])){
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
</form>
</body>
</html>
