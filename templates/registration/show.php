<?php

?>
<!--<div class="container">-->
<!---->
<!--    <div class="main">-->
<!--        <div><a href="">Вернуться на главную страницу</a></div>-->
<!--        <h2 class="login">Регистрация</h2>-->
<!---->
<!--        <div class="form">-->
<!--            <form action="?type=reg&action=add" method="POST" id="loginform">-->
<!---->
<!--                <div class="form-group">-->
<!--                    <p>login</p>-->
<!--                    <input type="text" name="login" placeholder="введите ваш login"-->
<!--                           id="login">-->
<!--                </div>-->
<!---->
<!--                <div class="form-group">-->
<!--                    <p>Password</p>-->
<!--                    <input type="password" name="password" placeholder="введите ваш пароль" class="form-control"-->
<!--                           id="exampleInputPassword1">-->
<!--                </div>-->
<!---->
<!--                <div class="form-group">-->
<!--                    <p>Confirm password</p>-->
<!--                    <input type="password" name="confirm_password" placeholder="подтвердите пароль" class="form-control"-->
<!--                           id="exampleInputPassword1">-->
<!--                </div>-->
<!---->
<!--                <div class="form-group">-->
<!--                    <p>Email address</p>-->
<!--                    <input type="email" name="email" placeholder="введите email" class="form-control"-->
<!--                           id="exampleInputEmail1" aria-describedby="emailHelp">-->
<!--                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone-->
<!--                        else.</small>-->
<!--                </div>-->
<!---->
<!--                <div class="form-group">-->
<!--                    <p>FIO</p>-->
<!--                    <input type="text" name="FIO" placeholder="Ввведите FIO"-->
<!--                           class="form-control" id="exampleInputPassword1">-->
<!--                </div>-->
<!---->
<!--                <input type="submit" value="Отправить" name="reg" id="btn" class="btn btn-outline-dark">-->
<!--            </form>-->
<!--        </div>-->
<!--        <div id="response"></div>-->
<!--    </div>-->
<!---->
<!--</div>-->
<div class="container">
    <form action="?type=reg&action=add" method="post" id="loginform">
        <input type="text" name="login" placeholder="login" id="login"><br>
        <input type="text" name="password" placeholder="password"><br>
        <input type="text" name="FIO" placeholder="FIO"><br>
        <input type="email" name="email" placeholder="email"><br>
        <input type="submit" value="ok">
    </form>
    <div id="response"></div>
</div>

<script>
    document.getElementById('login').addEventListener("keyup", function () {
        // alert(this.value);

        // let loginForm = document.getElementById("loginform");

        let xhr = new XMLHttpRequest();

        xhr.open("post", "?type=reg&action=checklogin&login=" + this.value);

        xhr.send();

        xhr.onload = function () {
            if (xhr.status == 200) {
                // console.log(xhr.response)
                var obj = JSON.parse(xhr.response);
                document.getElementById('response').innerHTML = obj.response;
                let input = document.getElementById('login');
                if (obj.response == "Yes") {
                    input.classList.add("logAlert")
                } else {
                    input.classList.remove("logAlert")
                }
            } else {
                console.log(xhr.statusText)
            }
        };
    })
</script>