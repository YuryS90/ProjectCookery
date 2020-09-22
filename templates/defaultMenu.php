<?php
/** @var string $controllerType */
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="asd">
    <a class="navbar-brand">
        <img src="../public/images/dishes/chef.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Cookery
    </a>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item<?= $controllerType == '' ? ' active' : '' ?>">
                <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item<?= $controllerType == 'auth' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=loginform&type=auth">Войти</a>
            </li>

        </ul>

    </div>
</nav>
<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--        <a class="navbar-brand" href="#">Navbar</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"-->
<!--            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!---->
<!--    <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--        <ul class="navbar-nav mr-auto">-->
<!--            <li class="nav-item--><?//= $controllerType == '' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item--><?//= $controllerType == 'auth' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=loginform&type=auth">Авторизация</a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item--><?//= $controllerType == 'reg' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=show&type=reg">Регистрация</a>-->
<!--            </li>-->
<!---->
<!--            <span class="navbar-text">-->
<!--                    --><?//= !empty($_SESSION['user']) ? $_SESSION['user']['FIO'] . '(' . $_SESSION['user']['name'] . ')' : '' ?>
<!--                </span>-->
<!--    </div>-->
<!--</nav>-->