<!DOCTYPE html>
<html lang="ru">
<header>
    <title>Статьи со справочной информацией</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <div class="d-flex flex-row align-items-center p-3 border-bottom">
        <h3>HelpDesk</h3>
        <nav class="d-inline-flex ms-md-auto">
            <a class="me-4 py-2 text-dark text-decoration-none" href="support_new_application.php">Новые заявки</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="support.php">Все заявки</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="reports.php">Отчеты</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="bz.php">Статьи</a>
        </nav>
        <a class="btn" href="/logout.php">Выход</a>
    </div>
    <link rel="stylesheet" type="text/css" href="my.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $(".search_button").click(function() {
                // получаем то, что написал пользователь
                var searchString = $("#search_box").val();
                // формируем строку запроса
                var data = 'search='+ searchString;

                // если searchString не пустая
                if(searchString) {
                    // делаем ajax запрос
                    $.ajax({
                        type: "POST",
                        url: "do_search.php",
                        data: data,
                        beforeSend: function(html) { // запустится до вызова запроса
                            $("#results").html('');
                            $("#searchresults").show();
                            $(".word").html(searchString);
                        },
                        success: function(html){ // запустится после получения результатов
                            $("#results").show();
                            $("#results").append(html);
                        }
                    });
                }
                return false;
            });
        });
    </script>
</header>

<body>
<div class="container">
    <div class="container2">
        <center><h1>FAQ - ответы на часто задаваемые вопросы</h1></center>
        <center><p>На этой странице Вы найдете ответы на наиболее часто возникающие вопросы.</p></center>

        <div id="container">
            <div style="margin:20px auto; text-align: center;">
                <form method="post" action="do_search.php">
                    <input type="text" name="search" id="search_box" class='search_box'/>
                    <input type="submit" value="Поиск" class="search_button" /><br />
                </form>
            </div>
            <div>


                <ul id="results" class="update">
                </ul>
                <br><br><br><hr>

            </div>
        </div>
    </div>


    <?php
    $link = mysqli_connect('localhost:8889', 'root', 'root', 'test');
    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

    $res = mysqli_query($link,"SELECT * FROM `faq`");
    while($row = mysqli_fetch_assoc($res)){
        echo '<div>' .nl2br($row['question']). '</div>
            <div class="answer">' .nl2br($row['answer']). '</div><br>';
    }
    ?>

</div>
</body>
</html>






