<?php
session_start();

$connect = mysqli_connect('localhost:8889', 'root', 'root', 'test');

$title= $_POST['title'];
$content = $_POST['content'];

mysqli_query ($connect, "INSERT INTO faq (question, answer) VALUES('$title', '$content')");

$_SESSION['message'] = 'Cтатья добавлена успешно!';
header('Location: /new_article.php');

$connect->close();
?>


