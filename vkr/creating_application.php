<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /autorization.php');
    }
?>

<!DOCTYPE html>
<html lang="ru">
<header>
    <title>Создание заявки</title>
    <?php include 'headers/header2.php';?>
</header>

<body>
    <form action="bd/check_creation_application.php" method="POST" enctype="multipart/form-data">
        <h1 class="display-5 text-center">Создание заявки</h1>

        <div class="row g-2">
            <div class="form-group">
                <label>Фамилия</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $_SESSION['user']['last_name']?>" required>
            </div>

            <div class="form-group gy-2">
                <label>Имя</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $_SESSION['user']['first_name']?>" required>
            </div>

            <div class="form-group gy-2">
                <label>Отчество</label>
                <input type="text" class="form-control" name="patronomic" value="<?php echo $_SESSION['user']['patronomic']?>" required>
            </div>

            <div class="form-group gy-3">
                <label>Тема заявки</label>
                <select class="form-select" name="theme" required>
                    <option value="Запрос ролей для доступа к транзакции">Запрос ролей для доступа к транзакции</option>
                    <option value="Разблокировка пользователя">Разблокировка пользователя</option>
                    <option value="Прохождение курсов">Прохождение курсов</option>
                    <option value="Ошибка в транзакции">Ошибка в транзакции</option>
                    <option value="Ошибка системы">Ошибка системы</option>
                </select>
            </div>

            <label class="form-group gy-3">Приоритет</label>
            <div class="btn-group">
                <input type="radio" class="btn-check" name="priority" value="Низкий" id="btnradio1">
                <label class="btn btn-primary" for="btnradio1">Низкий</label>

                <input type="radio" class="btn-check" name="priority" value="Средний" id="btnradio2">
                <label class="btn btn-warning" for="btnradio2">Средний</label>

                <input type="radio" class="btn-check" name="priority" value="Высокий" id="btnradio3">
                <label class="btn btn-danger" for="btnradio3">Высокий</label>
            </div>


            <div class="form-group gy-3">
                <label>Прикрепите файл</label>
                <div class="col-sm-10">
                    <input type="file" name="file"><br>
                </div>
            </div>

            <div class="form-group gy-3">
                <label>Описание</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
            </div>

            <div class="text-center">
                <div class="btn-group">
                    <button class="btn btn-success" type="submit">Создать заявку</button>
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


