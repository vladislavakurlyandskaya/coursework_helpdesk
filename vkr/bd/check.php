<?php
    session_start();

    $connect = mysqli_connect('localhost:8889', 'root', 'root', 'test');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $patronomic = $_POST['patronomic'];
    $department = $_POST['department'];
    $post = $_POST['post'];
    $usertype = $_POST['usertype'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $pass_confirm = $_POST['pass_confirm'];

    if ($pass == $pass_confirm){

        $path = 'avatars/' . time() . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], $path);

        // проверка на существование пользователя с таким же логином
        $result = mysqli_query($connect, "SELECT id FROM user WHERE login='$login'") or die( mysqli_error($connect));
        if ($result !== FALSE)
            $myrow = mysqli_fetch_array($result);
        else
            die(mysqli_error($connect));

        if (!empty($myrow['id'])) {
            $_SESSION['message'] = 'Введенный логин уже существует';
            header('Location: /register.php');
        }

        $pass = md5($pass);
        // если такого нет, то сохраняем данные
        mysqli_query ($connect, "INSERT INTO user (first_name, last_name, patronomic, department, post, usertype, avatar, login, pass) VALUES('$first_name', '$last_name', '$patronomic', '$department', '$post', '$usertype', '$path', '$login', '$pass')");
        header('Location: /users.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: /register.php');
    }
    $connect->close();
?>


