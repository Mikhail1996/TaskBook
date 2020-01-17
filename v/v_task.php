<div class="task_block">
    <? if(!is_null($this->muser->id_user)): ?> <!--Пользователь авторизован как администратор-->
        <form method="post" action="">
            <h3>Автор: <?=$author?></h3>
            <p>E-mail: <?=$mail?></p>
            <label for = "text">Текст задачи:</label>
            <input type="text" class="form-control" name="text" id="text" value="<?=$text?>">
            <select class="select form-control" name="status">
                <option <? if($status==1): ?> selected <? endif; ?> value="1">Не просмотрено администратором</option>
                <option <? if($status==2): ?> selected <? endif; ?> value="2">Отредактировано администратором</option>
                <option <? if($status==3): ?> selected <? endif; ?> value="3">Выполнено</option>
            </select>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="modifytask" value="sorting">
            <input type="submit" class="submit btn btn-primary" value="Сохранить">
        </form>
    <? else: ?> <!--Пользователь не авторизован-->
        <h3>Автор: <?=$author?></h3>
        <p>E-mail: <?=$mail?></p>
        <p>Текст задачи: <?=$text?></p>
        <p>Статус: <?=$textstatus?></p>
    <? endif; ?>
</div>