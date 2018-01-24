<?php require_once '../db/DB.php'?>
<?php require_once '../layout/header.php';?>
<?php
    $db = new DB;
?>
<h1 class="center">Редактировать Запись</h1>
<form class="frm" action=<?="/functions/update.php?id=" . $_GET['id']?> method="post">
    <div class="row">
        <div class="col-xs-6">
            <input type="text" class="form-control" placeholder="Введите имя" name="username">
            <br/>
            <input type="password" class="form-control" placeholder="Введите пароль" name="pass">
            <br/>
            <select class="form-control" name="option">
                <?foreach ($db->getRoleList() as $item): ?>
                    <option><?=$item?></option>
                <? endforeach; ?>
            </select>
            <br/>
            <input type="submit" class="btn btn-success" value="Обновить">
        </div>
    </div>
</form>
<?php require_once '../layout/footer.php';?>
