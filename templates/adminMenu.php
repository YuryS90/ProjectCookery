<nav class="navbar navbar-expand-lg navbar-light " id="asd">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-tabs navbar-nav mr-auto">

            <li class="nav-item<?= $controllerType == '' ? ' active' : '' ?>">
                <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item<?= $controllerType == 'dishes' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=dishes">Блюда</a>
            </li>

            <li class="nav-item<?= $controllerType == 'orders' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=orders">Работа с заказами</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">Просмотр заказов</a>
                <div class="dropdown-menu">

                    <a class="dropdown-item" href="?action=show&type=currentuserorders">Мои заказы</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="?action=show&type=managerfilterorders">Заказы менеджеров</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="?action=show&type=userfilterorders">Заказы посетителей</a>
                </div>
            </li>

            <li class="nav-item<?= $controllerType == 'group' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=group">Группы</a>
            </li>

            <li class="nav-item<?= $controllerType == 'users' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=show&type=users">Пользователи</a>
            </li>

            <li class="nav-item<?= $controllerType == 'auth' ? ' active' : '' ?>">
                <a class="nav-link" href="?action=logout&type=auth">Выход</a>
            </li>


            <span class="navbar-text opacit">
      Navbar text with an inline elementdsssыыыыыыыы
    </span>
            <a class="navbar-brand"
               href="#"><?= !empty($_SESSION['user']) ? $_SESSION['user']['FIO'] . ' (' . $_SESSION['user']['name'] . ')' : '' ?></a>

        </ul>
    </div>
</nav>

<!--<nav class="navbar navbar-expand-lg navbar-light bg-light" id="asd">-->
<!---->
<!--    <a class="navbar-brand" href="#">Navbar w/ text</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"-->
<!--            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <div class="collapse navbar-collapse" id="navbarText">-->
<!--        <ul class="navbar-nav mr-auto">-->
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Features</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Pricing</a>-->
<!--            </li>-->
<!--        </ul>-->
<!---->
<!--        <span class="navbar-text">-->
<!--         --><? //= !empty($_SESSION['user']) ? $_SESSION['user']['FIO'] . '(' . $_SESSION['user']['name'] . ')' : '' ?>
<!--        </span>-->
<!---->
<!--    </div>-->
<!--</nav>-->

