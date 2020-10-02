<?php
/** @var string $controllerType */
?>
<!--<nav class="navbar navbar-expand-lg navbar-light " id="asd">-->
<!--    <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--        <ul class="nav nav-tabs navbar-nav mr-auto">-->
<!---->
<!--            <li class="nav-item--><? //= $controllerType == '' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item--><? //= $controllerType == 'dishes' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=show&type=dishes">Блюда</a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item--><? //= $controllerType == 'orders' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=show&type=orders">Работа с заказами</a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"-->
<!--                   aria-expanded="false">Просмотр заказов</a>-->
<!--                <div class="dropdown-menu">-->
<!---->
<!--                    <a class="dropdown-item" href="?action=show&type=currentuserorders">Мои заказы</a>-->
<!--                    <div class="dropdown-divider"></div>-->
<!---->
<!--                    <a class="dropdown-item" href="?action=show&type=managerfilterorders">Заказы менеджеров</a>-->
<!--                    <div class="dropdown-divider"></div>-->
<!---->
<!--                    <a class="dropdown-item" href="?action=show&type=userfilterorders">Заказы посетителей</a>-->
<!--                </div>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item--><? //= $controllerType == 'group' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=show&type=group">Группы</a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item--><? //= $controllerType == 'users' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=show&type=users">Пользователи</a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item--><? //= $controllerType == 'auth' ? ' active' : '' ?><!--">-->
<!--                <a class="nav-link" href="?action=logout&type=auth">Выход</a>-->
<!--            </li>-->
<!---->
<!---->
<!--            <span class="navbar-text opacit">-->
<!--      Navbar text with an inline elementdsssыыыыыыыы-->
<!--    </span>-->
<!--            <a class="navbar-brand"-->
<!--               href="#">--><? //= !empty($_SESSION['user']) ? $_SESSION['user']['FIO'] . ' (' . $_SESSION['user']['name'] . ')' : '' ?><!--</a>-->
<!---->
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="asd">
        <a class="navbar-brand">
            <img src="../public/images/dishes/chef.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Cookery
        </a>

        <!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"-->
        <!--            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">-->
        <!--        <span class="navbar-toggler-icon"></span>-->
        <!--    </button>-->

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item<?= $controllerType == '' ? ' active' : '' ?>">
                    <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item<?= $controllerType == 'dishesuser' ? ' active' : '' ?>">
                    <a class="nav-link" href="?action=show&type=dishesuser">Блюда</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true"
                       aria-expanded="false">Управление блюдами и заказами</a>
                    <div class="dropdown-menu">

                        <a class="dropdown-item" href="?action=show&type=dishes">Работа с блюдами</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="?action=show&type=orders">Работа с заказами</a>
                        <div class="dropdown-divider"></div>

                        <h6 class="dropdown-header">Просмотр заказов</h6>
                        <a class="dropdown-item" href="?action=show&type=managerfilterorders">Менеджеров</a>

                        <a class="dropdown-item" href="?action=show&type=userfilterorders">Посетителей</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true"
                       aria-expanded="false">Управление пользователями</a>
                    <div class="dropdown-menu">

                        <a class="dropdown-item" href="?action=show&type=group">Группы</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="?action=show&type=users">Пользователи</a>

                    </div>
                </li>

            </ul>

            <!--        <span class="navbar-text">-->
            <!--         --><? //= !empty($_SESSION['user']) ? $_SESSION['user']['FIO'] . '(' . $_SESSION['user']['name'] . ')' : '' ?>
            <!--        </span>-->

            <!--        <ul class="navbar-nav">-->
            <!--            <li class="nav-item dropleft">-->
            <!--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"-->
            <!--                   aria-haspopup="true" aria-expanded="false">-->
            <!--                    Dropdown link-->
            <!--                </a>-->
            <!--                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
            <!--                    <a class="dropdown-item" href="#">Action</a>-->
            <!--                    <a class="dropdown-item" href="#">Another action</a>-->
            <!--                    <a class="dropdown-item" href="#">Something else here</a>-->
            <!--                </div>-->
            <!--            </li>-->
            <!--        </ul>-->

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
</header>

