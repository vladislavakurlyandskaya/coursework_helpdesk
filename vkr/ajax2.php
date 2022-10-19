<?php

if (isset($_POST['name'])) {
    $link = mysqli_connect('localhost:8889', 'root', 'root', 'test');
    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

    $column = $_POST['name'];
    $newValue = $_POST['value'];
    $id = $_POST['pk'];
    $sql = "UPDATE `create_application` SET $column = '$newValue' where id = $id";
    mysqli_query($link, $sql);
}