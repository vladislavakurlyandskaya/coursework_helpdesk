<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<header>
    <meta charset="UTF-8">
    <title>Создание отчета</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <div class="d-flex flex-row align-items-center p-3 border-bottom">
        <h3>HelpDesk</h3>
        <nav class="d-inline-flex ms-md-auto">
            <a class="me-4 py-2 text-dark text-decoration-none" href="support_new_application.php">Новые заявки</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="support.php">Все заявки</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="reports.php">Отчеты</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="bz.php">Статьи</a>
        </nav>
        <a class="btn btn-outline-primary" href="/logout.php">Выход</a>
    </div>
</header>

<body>
<form action="bd/check_creating_report.php" method="POST" enctype="multipart/form-data">
    <h1 class="display-5 text-center">Создание отчета</h1><br><br>

    <div class="row g-2">
        <div class="form-group">
            <label>Дата создания заявки: <?php echo $_SESSION['application']['date']?></label>
        </div>

        <div class="form-group">
            <label>Тема: <?php echo $_SESSION['application']['theme']?></label>
        </div>

        <div class="form-group">
            <label>Описание: <?php echo $_SESSION['application']['description']?></label>
        </div>

        <div class="form-group">
            <label>Пользователь: <?php echo $_SESSION['application']['full_name']?></label>
        </div>

        <div class="form-group">
            <label>Приоритет: <?php echo $_SESSION['application']['priority']?></label>
        </div>

        <div class="form-group gy-3">
            <label>Описание варианта решения</label>
            <textarea class="form-control" rows="8" name="decision"></textarea>
        </div>

        <div class="form-group gy-3">
            <label>Прикрепить файл</label>
            <div class="col-sm-10">
                <input type="file" name="file"><br>
            </div>
        </div>

        <div class="text-center">
            <br><div class="btn-group">
                <button class="btn btn-success" type="submit">Отправить</button>
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