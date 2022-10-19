<?php
    session_start();

    $connect = mysqli_connect('localhost:8889', 'root', 'root', 'test');

    $login = $_POST['login'];
    $pass = md5($_POST['pass']);

    $check_user = mysqli_query($connect, "SELECT * FROM user WHERE login='$login' AND pass='$pass'");
    if (mysqli_num_rows($check_user) == 1) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "first_name" => $user['first_name'],
            "last_name" => $user['last_name'],
            "patronomic" => $user['patronomic'],
            "department" => $user['department'],
            "post" => $user['post'],
            "avatar" => $user['avatar'],
            "login" => $user['login'],
            "usertype" => $user['usertype']
        ];
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: /autorization.php');
    }

    if ($_SESSION['user']['usertype'] == 1){
        header('Location: /admin.php');
    } elseif ($_SESSION['user']['usertype'] == 2){
        header('Location: /profile.php');
    } else {
        header('Location: /support.php');
    }
?>
