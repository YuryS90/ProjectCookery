<?php
/** @var string $action */
?>

<div class="container">
    <form action="<?= $action ?>" method="post" class="authForm">

        <h1 class="form_title">Вход</h1>

        <div class="form_group">
            <input type="text" class="form_input" placeholder=" " name="login">
            <label class="form_label">Логин</label>
        </div>

        <div class="form_group">
            <input type="password" class="form_input" placeholder=" " name="password">
            <label class="form_label">Пароль</label>
        </div>

        <button type="submit" class="form_button">Войти</button>
        <?php
        if (!empty($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "<br><div class='alert alert-danger' role='alert'>$error</div>";
            }
            unset($_SESSION['errors']);
        }

        ?>

        <div class="linkBox">
            <a href="/">На главную ↩</a>
            <a href="?action=show&type=reg">Регистарция</a>
        </div>

    </form>
</div>