<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /autorization.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
<header>
    <title>Заявки</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <div class="d-flex flex-row align-items-center p-3 border-bottom">
        <h3>HelpDesk</h3>
        <nav class="d-inline-flex ms-md-auto">
            <a class="me-4 py-2 text-dark text-decoration-none" href="admin.php">Заявки</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="users.php">Пользователи</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="new_article.php">Создание новой статьи</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="bz.php">Статьи</a>
        </nav>
        <a class="btn" href="/logout.php">Выход</a>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>
        $.fn.editable.defaults.mode = 'popup';
        $(document).ready(function() {
            $('.people-editable').editable();
            $('.people-executor-editable').editable({
                value: '',
                source: [
                    {value: 'Иванов Петр Николаевич', text: 'Иванов Петр Николаевич'},
                    {value: 'Борисова Александра Николаевна', text: 'Борисова Александра Николаевна'},
                    {value: 'Васильев Павел Алексеевич', text: 'Васильев Павел Алексеевич'}
                ]
            });
            $('.people-priority-editable').editable({
                value: '',
                source: [
                    {value: 'Низкий', text: 'Низкий'},
                    {value: 'Средний', text: 'Средний'},
                    {value: 'Высокий', text: 'Высокий'}
                ]
            });
        });
    </script>
</header>

<body>
<form>
<div class="container">
    <h1 class="display-5 text-center">Заявки</h1><br>

    <?php
    $link = mysqli_connect('localhost:8889', 'root', 'root', 'test');
    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
        $sql = mysqli_query($link, "DELETE FROM create_application WHERE `id` = {$_GET['del_id']}");
    }

    if ($result = mysqli_query($link, 'SELECT * FROM create_application ORDER BY id')) {
        echo '<table class="table">' .
            '<thead>' .
            '<tr>' .
            '<th>Номер</th>' .
            '<th>Дата</th>' .
            '<th>Тема заявки</th>' .
            '<th>Описание</th>' .
            '<th>Сотрудник</th>' .
            '<th>Отдел</th>' .
            '<th>Приоритет</th>' .
            '<th>Статус</th>' .
            '<th>Исполнитель</th>' .
            '<th>Удалить</th>' .
            '</tr>' .
            '</thead>';

        while( $row = mysqli_fetch_assoc($result) ){
            echo '<tr>' .
                '<td>' . $row['id'] . '</td>' .
                '<td>' . $row['date'] . '</td>' .
                '<td>' . $row['theme'] . '</td>' .
                '<td>' . $row['description'] . '</td>' .
                '<td>' . $row['full_name'] . '</td>' .
                '<td>' . $row['department'] . '</td>' .
                '<td><a href="#" class="people-priority-editable" data-name="priority" data-type="select" data-pk="' . $row['id'] . '" data-url="ajax2.php" >' . $row['priority'] . '</a></td>' .
                '<td>' . $row['status'] . '</td>' .
                '<td><a href="#" class="people-executor-editable" data-name="executor" data-type="select" data-title="Исполнитель" data-pk="' . $row['id'] . '" data-url="ajax2.php" >' . $row['executor'] . '</a></td>' .
                "<td><a href='?del_id={$row['id']}'>Удалить</a></td>" .
                '</tr>';
        }

        echo '</table>';
        mysqli_free_result($result);
    }

    mysqli_close($link);
    ?>
</div>
</form>
</body>
</html>