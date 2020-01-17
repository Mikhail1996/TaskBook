<? if(!is_null($this->muser->id_user)): ?> <!--Пользователь авторизован как администратор-->
    <button class="btn btn-primary btn-auth" id="logout_button">Выйти</button>
<? else: ?> <!--Пользователь не авторизован-->
    <button class="btn btn-primary btn-auth" id="auth_button">Авторизация</button>
<? endif; ?>
<h3>Сортировать по:</h3>
<form method="POST" action="">
    <select name="order" class="select form-control">
        <option value="1">Возрастанию</option>
        <option value="2">Убыванию</option>
    </select>
    <select name="value" class="select form-control">
        <option value="1">Автор</option>
        <option value="2">E-mail</option>
        <option value="3">Статус</option>
    </select>
    <input type="hidden" name="sorting" value="sorting">
    <input class="btn btn-primary" type="submit" value="Сортировать">
</form>
<div class="index_field">
    <?=$index_content?>
</div>
<div class="new_task">
    <h3>Создать новую задачу:</h3>
    <form name="newTaskForm" method="post" class="new-form" action="">
        <label for = "author">Имя автора:</label>
        <input type="text" class="form-control" name="author" id="author">
        <label for = "email">E-mail автора:</label>
        <input type="text" class="form-control" name="email" id="email">
        <label for = "text">Текст задачи:</label>
        <input type="text" class="form-control" name="text" id="text">
        <input type="hidden" name="addnewtask" value="sorting">
        <input type="submit" class="btn btn-primary" id="create_task" value="Создать">
    </form>
</div>