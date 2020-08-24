    <nav class="navbar navbar-expand-lg navbar-light " id="asd">
        <!--    <a class="navbar-brand" href="#">Navbar</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item<?= $controllerType == '' ? ' active' : '' ?>">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>

<!--                <li class="nav-item--><?//= $controllerType == 'Phonebook' ? ' active' : '' ?><!--">-->
<!--                    <a class="nav-link" href="?action=show&type=Phonebook">Phonebook</a>-->
<!--                </li>-->
<!--                <li class="nav-item--><?//= $controllerType == 'guestbook' ? ' active' : '' ?><!--">-->
<!--                    <a class="nav-link" href="?action=show&type=guestbook">Гостевая книга</a> -->
<!--                </li>-->

                <li class="nav-item<?= $controllerType == 'dishes' ? ' active' : '' ?>">
                    <a class="nav-link" href="?action=show&type=dishes">Блюда</a>
                </li>

                <li class="nav-item<?= $controllerType == 'orders' ? ' active' : '' ?>">
                    <a class="nav-link" href="?action=show&type=orders">Заказы</a>
                </li>
                
                <li class="nav-item<?= $controllerType == 'group' ? ' active' : '' ?>">
                    <a class="nav-link" href="?action=show&type=group">Группы</a>
                </li>

                <li class="nav-item<?= $controllerType == 'users' ? ' active' : '' ?>">
                    <a class="nav-link" href="?action=show&type=users">Пользователи</a>
                </li>

                <li class="nav-item<?= $controllerType == 'auth' ? ' active' : '' ?>">
                    <a class="nav-link" href="?action=loginform&type=auth">Авторизация</a>
                </li>

                <li class="nav-item<?= $controllerType == 'auth' ? ' active' : '' ?>">
                    <a class="nav-link" href="?action=logout&type=auth">Выход</a>
                </li>

                <li class="nav-item<?= $controllerType == 'reg' ? ' active' : '' ?>">
                    <a class="nav-link" href="?action=show&type=reg">Регистрация</a>
                </li>



                <span class="navbar-text">
                    <?= !empty($_SESSION['user']) ? $_SESSION['user']['FIO'] . '(' . $_SESSION['user']['name'] . ')' : '' ?>
                </span>
        </div>
    </nav>