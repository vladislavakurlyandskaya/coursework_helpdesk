<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /autorization.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
<header>
    <title>Отчеты</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <div class="d-flex flex-row align-items-center p-3 border-bottom">
        <h3>HelpDesk</h3>
        <nav class="d-inline-flex ms-md-auto">
            <a class="me-4 py-2 text-dark text-decoration-none" href="support_new_application.php">Новые заявки</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="support.php">Все заявки</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="reports.php">Отчеты</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="bz.php">Статьи</a>
        </nav>
        <a class="btn" href="/logout.php">Выход</a>
    </div>
</header>

<body>
<div class="container">
    <br><br><br>
    <h1 class="display-5 text-center">Все отчеты</h1><br>

    <?php
    $link = mysqli_connect('localhost:8889', 'root', 'root', 'test');

    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

    $last_name = $_SESSION['user']['last_name'];
    $first_name = $_SESSION['user']['first_name'];
    $patronomic = $_SESSION['user']['patronomic'];

    if ($result = mysqli_query($link, "SELECT * FROM reports WHERE executor = (CONCAT_WS(' ', '$last_name','$first_name','$patronomic'))")) {
        echo '<table class="table">' .
            '<thead>' .
            '<tr>' .
            '<th>Номер</th>' .
            '<th>Дата создания заявки</th>' .
            '<th>Тема заявки</th>' .
            '<th>Описание</th>' .
            '<th>Сотрудник</th>' .
            '<th>Приоритет</th>' .
            '<th>Статус</th>' .
            '<th>Исполнитель</th>' .
            '<th>Решение</th>' .
            '<th>Дата закрытия заявки</th>' .
            '</tr>' .
            '</thead>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>' .
                '<td>' . $row['id'] . '</td>' .
                '<td>' . $row['date_creation'] . '</td>' .
                '<td>' . $row['theme'] . '</td>' .
                '<td>' . $row['description'] . '</td>' .
                '<td>' . $row['user'] . '</td>' .
                '<td>' . $row['priority'] . '</td>' .
                '<td>' . $row['status'] . '</td>' .
                '<td>' . $row['executor'] . '</td>' .
                '<td>' . $row['decision'] . '</td>' .
                '<td>' . $row['date_closing'] . '</td>' .
                '</tr>';
        }

        echo '</table>';
        mysqli_free_result($result);
    }


    mysqli_close($link);
    ?>
</div>
</body>
</html>