
<!--<div class="container">-->
<!--    <form action="?type=reg&action=add" method="post" id="loginform">-->
<!--        <input type="text" name="login" placeholder="login" id="login"><br>-->
<!--        <input type="text" name="password" placeholder="password"><br>-->
<!--        <input type="text" name="FIO" placeholder="FIO"><br>-->
<!--        <input type="email" name="email" placeholder="email"><br>-->
<!--        <input type="submit" value="ok">-->
<!--    </form>-->
<!--    <div id="response"></div>-->
<!--</div>-->

<div class="container">
    <form action="?type=reg&action=add" method="post" id="loginform" class="authForm">

        <h1 class="form_title">Регистрация</h1>

        <div class="form_group">
            <input type="text" name="login" id="login" class="form_input" placeholder=" " id="login">
            <label class="form_label">Логин</label>
        </div>

        <div class="form_group">
            <input type="password" name="password" class="form_input" placeholder=" ">
            <label class="form_label">Пароль</label>
        </div>

        <div class="form_group">
            <input type="text" name="FIO" class="form_input" placeholder=" ">
            <label class="form_label">ФИО</label>
        </div>

        <div class="form_group">
            <input type="email" name="email" class="form_input" placeholder=" ">
            <label class="form_label">Email</label>
        </div>

        <input type="submit" value="Отправить" class="form_button">

        <div id="response"></div>
        <div class="linkBox">
            <a href="?action=loginform&type=auth">Назад ↩</a>
        </div>
    </form>
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