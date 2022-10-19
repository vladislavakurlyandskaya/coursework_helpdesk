<?php
session_start();

$connect = mysqli_connect('localhost:8889', 'root', 'root', 'test');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$patronomic = $_POST['patronomic'];
$theme = $_POST['theme'];
$priority = $_POST['priority'];
$description = $_POST['description'];

$path = 'files/' . time() . $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $path);


mysqli_query ($connect, "INSERT INTO create_application (date, theme, description, full_name, priority, status, file) VALUES(NOW(), '$theme', '$description', CONCAT_WS(' ', '$last_name','$first_name','$patronomic'), '$priority', 'Новая', '$path')");

$_SESSION['message'] = 'Заявка добавлена успешно!';
header('Location: /creating_application.php');

$connect->close();
?>


