<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<header>
    <meta charset="UTF-8">
    <title>Пользователи</title>
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
            $('.people-email-editable').editable({
                validate: function(value) {
                    if(!isEmail(value)) {
                        return 'Введите настоящий e-mail';
                    }
                }
            });
            $('.people-post-editable').editable({
                value: 'Администратор',
                source: [
                    {value: 'Администратор', text: 'Администратор'},
                    {value: 'Специалист службы поддержки', text: 'Специалист службы поддержки'},
                    {value: 'Клиент', text: 'Клиент'}
                ]
            });
        });

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
    </script>
</header>
<body><br><br>
<h1 class="display-5 text-center">Пользователи</h1><br><br>
<div class="container">
    <?php

    $link = mysqli_connect('localhost:8889', 'root', 'root', 'test');
    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
        $sql = mysqli_query($link, "DELETE FROM user WHERE `id` = {$_GET['del_id']}");
    }

    if ($result = mysqli_query($link, 'SELECT id, last_name, first_name, patronomic, post, usertype, login, pass FROM user ORDER BY id')) {
        echo '<table class="table">' .
            '<thead>' .
            '<tr>' .
            '<th>Номер</th>' .
            '<th>Фамилия</th>' .
            '<th>Имя</th>' .
            '<th>Отчество</th>' .
            '<th>Должность</th>' .
            '<th>Тип пользователя</th>' .
            '<th>Логин</th>' .
            '<th>Удалить</th>' .
            '</tr>' .
            '</thead>';

        while( $row = mysqli_fetch_assoc($result) ){
            echo '<tr>' .
                '<td>' . $row['id'] . '</td>' .
                '<td><a href="#" class="people-editable" data-name="last_name" data-type="text" data-title="Фамилия" data-pk="' . $row['id'] . '" data-url="ajax.php" >' . $row['last_name'] . '</a></td>' .
                '<td><a href="#" class="people-editable" data-name="first_name" data-type="text" data-title="Имя" data-pk="' . $row['id'] . '" data-url="ajax.php" >' . $row['first_name'] . '</a></td>' .
                '<td><a href="#" class="people-editable" data-name="patronomic" data-type="text" data-title="Отчество" data-pk="' . $row['id'] . '" data-url="ajax.php" >' . $row['patronomic'] . '</a></td>' .
                '<td><a href="#" class="people-post-editable" data-name="post" data-type="select" data-title="Должность" data-pk="' . $row['id'] . '" data-url="ajax.php" >' . $row['post'] . '</a></td>' .
                '<td><a href="#" class="people-editable" data-name="usertype" data-type="text" data-title="Тип пользователя" data-pk="' . $row['id'] . '" data-url="ajax.php" >' . $row['usertype'] . '</a></td>' .
                '<td><a href="#" class="people-email-editable" data-name="login" data-type="text" data-title="Логин" data-pk="' . $row['id'] . '" data-url="ajax.php" >' . $row['login'] . '</a></td>' .
                "<td><a href='?del_id={$row['id']}'>Удалить</a></td>" .
                '</tr>';
        }
        echo '</table>';
        mysqli_free_result($result);
    }
    ?>
    <br>
    <center><a class="btn btn-default" href="register.php">Добавить нового пользователя</a></center>


    <?php
    mysqli_close($link);
    ?>

</div>
</body>
</html>