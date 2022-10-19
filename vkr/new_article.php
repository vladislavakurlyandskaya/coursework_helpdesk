<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /autorization.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
<header>
    <title>Добавление статьи</title>
    <?php include 'headers/header4.php';?>
</header>

<body>
<form action="bd/check_creation_article.php" method="POST" enctype="multipart/form-data">
    <h1 class="display-5 text-center">Добавление статьи</h1><br><br>

    <div class="row g-2">
        <div class="form-group">
            <label>Заголовок</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="form-group gy-3">
            <label>Содержимое статьи</label>
            <textarea class="form-control" rows="15" name="content"></textarea>
        </div>

        <div class="text-center">
            <div class="btn-group">
                <button class="btn btn-success" type="submit">Добавить статью</button>
            </div>
            <div class="btn-group">
                <button class="btn btn-default" type="reset">Очистить поля</button>
            </div>
        </div>

        <div class="text-center gy-8">
            <?php
            if (isset($_SESSION['message'])){
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </div><br>
</form>
</body>
</html>


