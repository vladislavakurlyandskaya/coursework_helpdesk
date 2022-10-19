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
            <a class="me-4 py-2 text-dark text-decoration-none" href="profile.php">Личный кабинет</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="creating_application.php">Создание заявки</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="all_application.php">Все заявки</a>
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
        });
    </script>
</header>

<body>
<div class="container">
    <br><br><br>
    <h1 class="display-5 text-center">Все заявки</h1><br>

    <?php
    $link = mysqli_connect('localhost:8889', 'root', 'root', 'test');

    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
        $sql = mysqli_query($link, "DELETE FROM create_application WHERE `id` = {$_GET['del_id']}");
    }

    $last_name = $_SESSION['user']['last_name'];
    $first_name = $_SESSION['user']['first_name'];
    $patronomic = $_SESSION['user']['patronomic'];

    if ($result = mysqli_query($link, "SELECT * FROM create_application WHERE full_name = (CONCAT_WS(' ', '$last_name','$first_name','$patronomic'))")) {
        echo '<table class="table">' .
            '<thead>' .
            '<tr>' .
            '<th>Номер</th>' .
            '<th>Дата создания заявки</th>' .
            '<th>Тема заявки</th>' .
            '<th>Описание</th>' .
            '<th>Приоритет</th>' .
            '<th>Статус</th>' .
            '<th>Исполнитель</th>' .
            '<th></th>' .
            '<th></th>' .
            '</tr>' .
            '</thead>';

        while( $row = mysqli_fetch_assoc($result) ){
            echo '<tr>' .
                '<td>' . $row['id'] . '</td>' .
                '<td>' . $row['date'] . '</td>' .
                '<td>' . $row['theme'] . '</td>' .
                '<td>' . $row['description'] . '</td>' .
                '<td>' . $row['priority'] . '</td>' .
                '<td>' . $row['status'] . '</td>' .
                '<td>' . $row['executor'] . '</td>' .
                '<td>' . "<input type='image' src='image/info.png' width='30' href='?del_id={$row['id']}' />" . '</td>' .
                "<td><a href='?del_id={$row['id']}'>Удалить</a></td>" .
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