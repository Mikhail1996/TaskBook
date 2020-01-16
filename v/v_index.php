<button id="auth_button">Авторизация</button>
<h3>Сортировать по:</h3>
<form method="POST" action="">
    <select name="order">
        <option value="1">Возрастанию</option>
        <option value="2">Убыванию</option>
    </select>
    <select name="value">
        <option value="1">Автор</option>
        <option value="2">E-mail</option>
        <option value="3">Статус</option>
    </select>
    <input type="hidden" name="sorting" value="sorting">
    <input type="submit" value="Сортировать">
</form>
<div class="index_field">
    <?=$index_content?>
</div>
<div class="new_task">
    <h3>Создать новую задачу:</h3>
    <form name="newTaskForm" method="post" action="">
        <label for = "author">Имя автора:</label>
        <input type="text" name="author" id="author">
        <label for = "email">E-mail автора:</label>
        <input type="text" name="email" id="email">
        <label for = "text">Текст задачи:</label>
        <input type="text" name="text" id="text">
        <input type="hidden" name="addnewtask" value="sorting">
        <input type="submit" id="create_task" value="Создать">
    </form>
</div>