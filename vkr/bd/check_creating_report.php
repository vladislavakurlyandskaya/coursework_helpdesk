<?php
session_start();

$connect = mysqli_connect('localhost:8889', 'root', 'root', 'test');

$date_creation = $_SESSION['application']['date'];
$theme = $_SESSION['application']['theme'];
$description = $_SESSION['application']['description'];
$user = $_SESSION['application']['full_name'];
$priority = $_SESSION['application']['priority'];
$status = $_SESSION['application']['status'];

$last_name = $_SESSION['user']['last_name'];
$first_name = $_SESSION['user']['first_name'];
$patronomic = $_SESSION['user']['patronomic'];

$decision = $_POST['decision'];

mysqli_query ($connect, "UPDATE create_application SET status ='Закрыто' WHERE description = '$description' and full_name = '$user'");

mysqli_query ($connect, "INSERT INTO reports (date_creation, theme, description, user, priority, status, executor, decision, date_closing) VALUES('$date_creation', '$theme', '$description', '$user', '$priority', 'Закрыто', CONCAT_WS(' ', '$last_name','$first_name','$patronomic'), '$decision', NOW())");


$_SESSION['message'] = 'Отчет о выполнении заявки отправлен!';
header('Location: /creating_report.php');

$connect->close();
?>

