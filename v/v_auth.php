<div class="auth_page">
    <h3>Войти</h3>
    <form method="post" action="">
       <div class="auth_form_input">
           <label for = "auth_login">Логин:</label>
           <input type="text" class="form-control" name="auth_login" id="auth_login">
       </div>
       <div class="auth_form_input">
           <label for = "auth_password">Пароль:</label>
           <input type="text" class="form-control" name="auth_password" id="auth_password">
       </div>
       <input type="hidden" name="login" value = "1">
       <input type="submit" class="btn btn-primary" value = "Войти"> 
    </form>
    <button onclick="location.href='../';" class="btn btn-primary">Вернуться на главную</button>
    <!--<h3>Или зарегистрироваться</h3>
    <form method="post" action="">
        <div class="auth_form_input">
            <label for = "reg_name">Имя:</label>
            <input type="text" name="reg_name" id="reg_name">
        </div>
        <div class="auth_form_input">
            <label for = "reg_login">E-mail:</label>
            <input type="text" name="reg_login" id="reg_login">
        </div>
        <div class="auth_form_input">
            <label for = "reg_password">Пароль:</label>
            <input type="text" name="reg_password" id="reg_password">
        </div>
        <input type="submit" value = "Регистрация">        
    </form>-->
</div>