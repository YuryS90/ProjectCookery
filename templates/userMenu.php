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

            <li class="nav-item<?= $controllerType == 'dishesmanager' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=dishesmanager">Блюда</a>
            </li>

        </ul>

        <div class="navbar-nav">
            <div class="nav-item dropleft">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Мой профиль
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <span class="dropdown-item disabled">
                    <?= !empty($_SESSION['user']) ? $_SESSION['user']['FIO'] . "<br>" . '(' . $_SESSION['user']['name'] . ')' : '' ?>
                </span>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="?action=show&type=currentuserorders">Мои заказы</a>

                    <a class="dropdown-item" href="?action=logout&type=auth">Выход</a>

                </div>
            </div>
        </div>

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
<!---->
<!--            <li class="nav-item--><?//= $controllerType == '' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item--><?//= $controllerType == 'orders' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=show&type=currentuserorders">Мои заказы</a>-->
<!--                                   <a class="nav-link" href="?action=show&type=orders">Работа с заказами</a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item--><?//= $controllerType == 'auth' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=logout&type=auth">Выход</a>-->
<!--            </li>-->
<!---->
<!--            <span class="navbar-text">-->
<!--                    --><?//= !empty($_SESSION['user']) ? $_SESSION['user']['FIO'] . '(' . $_SESSION['user']['name'] . ')' : '' ?>
<!--                </span>-->
<!--    </div>-->
<!--</nav>-->