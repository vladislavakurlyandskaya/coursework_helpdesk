<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /autorization.php');
    }
?>

<!DOCTYPE html>
<html lang="ru">
<header>
    <title>Личный кабинет пользователя</title>
    <?php include 'headers/header2.php';?>
</header>

<body><br>
    <div action="update_user.php" method="POST">
        <div class="card text-dark bg-white mx-auto mb-3" style="max-width: 31rem;">

            <h2 class="card-header display-5 pt-4 text-center">Личный кабинет</h2>
            <center><img src="<?= $_SESSION['user']['avatar'] ?>" width="350" alt=""></center>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">Пользователь: <span class="fw-bold"><?= $_SESSION['user']['last_name'] . ' ' . $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['patronomic']?></span></li>
                    <li class="list-group-item">Отдел: <span class="fw-bold"><?= $_SESSION['user']['department']?></span></li>
                    <li class="list-group-item">Должность: <span class="fw-bold"><?= $_SESSION['user']['post']?></span></li>
                    <li class="list-group-item">Email: <span class="fw-bold"><?= $_SESSION['user']['login'] ?></span></li>
                    <a class="list-group-item list-group-item-primary list-group-item-action" data-bs-toggle="modal" data-bs-target="#exampleModal">Изменение пароля</a>
                    <a class="list-group-item list-group-item-primary list-group-item-action" href="/update_password.php">Редактирование данных</a>
                </ul>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Изменение пароля</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>