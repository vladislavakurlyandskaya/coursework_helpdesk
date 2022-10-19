<?php
$dbh = mysqli_connect('localhost:8889', 'root', 'root', 'test');
//получаем данные через $_POST
if (isset($_POST['search'])) {
    // подключаемся к базе
    include('db.php');
    $db = new db();
    $word = mysqli_real_escape_string($dbh, $_POST['search']);
    // Строим запрос
    $sql = "SELECT question, answer FROM faq WHERE question LIKE '%" . $word . "%' ORDER BY question LIMIT 10";
    // Получаем результаты
    $row = $db->select_list($sql);
    if(count($row)) {
        $end_result = '';
        foreach($row as $r) {
            $result         = nl2br($r['question']);
            $bold           = '<span class="found">' . $word . '</span>';
            $result2        = nl2br($r['answer']);
            $end_result     .= '<li>' . str_ireplace($word, $bold, $result) . '</li>';
        }
        echo $end_result;
        echo $result2;
    } else {
        echo '<li>По вашему запросу ничего не найдено</li>';
    }
}
?>