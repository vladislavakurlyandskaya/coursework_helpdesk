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

<body data-new-gr-c-s-check-loaded="14.1062.0" data-gr-ext-installed="">

<div class="container contacts__container">
    <div class="row">
        <div class="col-md-4">
            <h2>Адрес</h2>
            <p>125196, Россия, Москва</p>
            <p>ул. 1-я Тверская-Ямская, д.21</p>
            <p><strong>Тел.:</strong> +7 968 332-09-67</p>
            <p><strong>Часы работы:</strong> 11:00-19:00</p>
        </div>
        <div class="col-md-8">
            <h2>Мы на связи</h2>
            <p>Оставьте свою заявку, и мы свяжемся с вами.</p>
            <div role="form" class="wpcf7" id="wpcf7-f52980-o1" lang="ru-RU" dir="ltr">
                <div class="screen-reader-response"></div>
                <form action="/contacts/#wpcf7-f52980-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                    <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="52980">
                        <input type="hidden" name="_wpcf7_version" value="4.9.1">
                        <input type="hidden" name="_wpcf7_locale" value="ru_RU">
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f52980-o1">
                        <input type="hidden" name="_wpcf7_container_post" value="0">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="wpcf7-form-control-wrap aname"><input type="text" name="aname" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required contact__form__input" aria-required="true" aria-invalid="false" placeholder="Ваше имя"></span><br>
                            <span class="wpcf7-form-control-wrap company"><input type="text" name="company" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required contact__form__input" aria-required="true" aria-invalid="false" placeholder="Название компании"></span><br>
                            <span class="wpcf7-form-control-wrap phone"><input type="text" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required contact__form__input" aria-required="true" aria-invalid="false" placeholder="Номер телефона"></span>
                        </div>
                        <div class="col-md-6">
                            <span class="wpcf7-form-control-wrap message"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required contact__form__textarea" aria-required="true" aria-invalid="false" placeholder="Опишите ваш запрос"></textarea></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>        <input type="submit" value="Отправить" class="wpcf7-form-control wpcf7-submit col-md-6 btn btn-primary contact__form__submit"><span class="ajax-loader"></span>
                            </p></div>
                    </div>
                    <div class="wpcf7-response-output wpcf7-display-none"></div></form></div>        </div>
    </div>
</div>

<!-- let's load map -->

<footer>
    <div class="container">
        <div class="row">
            <hr>

        </div>
        <div class="row footer__social">
            <ul class="footer__social__list">
                <li class="footer__social__list__item">
                    <a href="https://instagram.com/rfmodels_mm" title="RF Models Instagram" target="_blank">
                        <svg aria-hidden="true" focusable="false" role="presentation" class="social__icon" width="24" height="24" viewBox="0 0 512 512"><path d="M256 49.5c67.3 0 75.2.3 101.8 1.5 24.6 1.1 37.9 5.2 46.8 8.7 11.8 4.6 20.2 10 29 18.8s14.3 17.2 18.8 29c3.4 8.9 7.6 22.2 8.7 46.8 1.2 26.6 1.5 34.5 1.5 101.8s-.3 75.2-1.5 101.8c-1.1 24.6-5.2 37.9-8.7 46.8-4.6 11.8-10 20.2-18.8 29s-17.2 14.3-29 18.8c-8.9 3.4-22.2 7.6-46.8 8.7-26.6 1.2-34.5 1.5-101.8 1.5s-75.2-.3-101.8-1.5c-24.6-1.1-37.9-5.2-46.8-8.7-11.8-4.6-20.2-10-29-18.8s-14.3-17.2-18.8-29c-3.4-8.9-7.6-22.2-8.7-46.8-1.2-26.6-1.5-34.5-1.5-101.8s.3-75.2 1.5-101.8c1.1-24.6 5.2-37.9 8.7-46.8 4.6-11.8 10-20.2 18.8-29s17.2-14.3 29-18.8c8.9-3.4 22.2-7.6 46.8-8.7 26.6-1.3 34.5-1.5 101.8-1.5m0-45.4c-68.4 0-77 .3-103.9 1.5C125.3 6.8 107 11.1 91 17.3c-16.6 6.4-30.6 15.1-44.6 29.1-14 14-22.6 28.1-29.1 44.6-6.2 16-10.5 34.3-11.7 61.2C4.4 179 4.1 187.6 4.1 256s.3 77 1.5 103.9c1.2 26.8 5.5 45.1 11.7 61.2 6.4 16.6 15.1 30.6 29.1 44.6 14 14 28.1 22.6 44.6 29.1 16 6.2 34.3 10.5 61.2 11.7 26.9 1.2 35.4 1.5 103.9 1.5s77-.3 103.9-1.5c26.8-1.2 45.1-5.5 61.2-11.7 16.6-6.4 30.6-15.1 44.6-29.1 14-14 22.6-28.1 29.1-44.6 6.2-16 10.5-34.3 11.7-61.2 1.2-26.9 1.5-35.4 1.5-103.9s-.3-77-1.5-103.9c-1.2-26.8-5.5-45.1-11.7-61.2-6.4-16.6-15.1-30.6-29.1-44.6-14-14-28.1-22.6-44.6-29.1-16-6.2-34.3-10.5-61.2-11.7-27-1.1-35.6-1.4-104-1.4z"></path><path d="M256 126.6c-71.4 0-129.4 57.9-129.4 129.4s58 129.4 129.4 129.4 129.4-58 129.4-129.4-58-129.4-129.4-129.4zm0 213.4c-46.4 0-84-37.6-84-84s37.6-84 84-84 84 37.6 84 84-37.6 84-84 84z"></path><circle cx="390.5" cy="121.5" r="30.2"></circle></svg>
                        <span class="icon__fallback-text">Instagram</span>
                    </a>
                </li>
                <li class="footer__social__list__item">
                    <a href="https://vk.com/rfmodels_mm" title="RF Models Vkontake" target="_blank">
                        <svg aria-hidden="true" focusable="false" role="presentation" class=".social__icon" width="24" height="24" viewBox="0 0 24 24"><path class="st0" d="M13.162 18.994c.609 0 .858-.406.851-.915-.031-1.917.714-2.949 2.059-1.604 1.488 1.488 1.796 2.519 3.603 2.519h3.2c.808 0 1.126-.26 1.126-.668 0-.863-1.421-2.386-2.625-3.504-1.686-1.565-1.765-1.602-.313-3.486 1.801-2.339 4.157-5.336 2.073-5.336h-3.981c-.772 0-.828.435-1.103 1.083-.995 2.347-2.886 5.387-3.604 4.922-.751-.485-.407-2.406-.35-5.261.015-.754.011-1.271-1.141-1.539-.629-.145-1.241-.205-1.809-.205-2.273 0-3.841.953-2.95 1.119 1.571.293 1.42 3.692 1.054 5.16-.638 2.556-3.036-2.024-4.035-4.305-.241-.548-.315-.974-1.175-.974h-3.255c-.492 0-.787.16-.787.516 0 .602 2.96 6.72 5.786 9.77 2.756 2.975 5.48 2.708 7.376 2.708z"></path></svg>
                        <span class="icon__fallback-text">Vkontakte</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row copyright">
            © 2017, RF Models
        </div>
    </div>
</footer>


</body>
</html>


