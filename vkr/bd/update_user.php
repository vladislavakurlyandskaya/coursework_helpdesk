<?php
    session_start();
    $connect = mysqli_connect('localhost:8889', 'root', 'root', 'test');

    $id = $_SESSION['id'];
    $result = mysqli_query($connect, "SELECT * FROM user WHERE id='$id'");
    $user = mysqli_fetch_assoc($result);

    $pass = $user['pass']; //пароль из бд
    $pass_old = $_POST['pass_old'];
    $pass_new = $_POST['$pass_new'];
    $pass_confirm = $_POST['$pass_confirm'];

    if($pass == $pass_old){
        if ($pass_new == $pass_confirm) {
            mysqli_query($connect, "UPDATE user SET pass='$pass_new' WHERE id='$id'");
        } else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: /profile.php');
        }
    } else {
        $_SESSION['message'] = 'Старый пароль введен не верно';
        header('Location: /profile.php');
    }

?>