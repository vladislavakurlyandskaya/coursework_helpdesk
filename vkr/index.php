<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Служба технической поддержки пользователей</title>
    <div class="d-flex flex-row align-items-center p-3 border-bottom">
        <h3>HelpDesk</h3>
        <nav class="d-inline-flex ms-md-auto">
            <a class="me-4 py-2 text-dark text-decoration-none" href="index.php">Главная</a>
            <a class="me-4 py-2 text-dark text-decoration-none" href="contacts.php">Контакты</a>
        </nav>
        <a class="btn btn-outline-primary" href="/autorization.php">Войти</a>
    </div>
</head>

<body>
    <br><h2 class="display-5 mt-5 pt-4 text-center">Добро пожаловать в <span class="text-primary">HelpDesk</span><br></h2>
    <section class="mt-3 pt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2">
                    <img src="/img/1.png" class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0 aos-init aos-animate" alt="..." data-aos="fade-up" data-aos-delay="100">
                </div>
                <div class="col-12 col-lg-6 order-md-1">
                    <p class="lead text-center text-md-start mb-6 mb-lg-8">
                      Информационную систему по приему и сопровождению заявок, которая предназначена для совершенствования работы службы технической поддержки отдела ИТ.
                      Эффективное применение современных информационных технологий и систем позволяет значительно увеличить производительность труда, улучшить качество выполняемых работ за счет сокращения времени на обработку информации.
                      Задача поддержки — принимать обращения клиентов, у которых возникают проблемы, фиксировать их и решать.
                      Иногда для решения проблемы клиента достаточно ответа на вопрос, а в других случаях требуется передать заявку профильному специалисту, который разберется в проблеме, даст развернутое объяснение и вернет работоспособность решению.
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>