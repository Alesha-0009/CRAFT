<?php require_once '../layout/header.php';?>
<h1 class="center">Форма авторизации</h1>
<form class="frm" action="../functions/validation.php" method="post">
    <div class="row">
        <div class="col-xs-6">
            <input type="text" class="form-control" placeholder="Введите имя" name="username">
            <br/>
            <input type="password" class="form-control" placeholder="Введите пароль" name="pass">
            <br/>
            <input type="submit" class="btn btn-success">
        </div>
    </div>
</form>
<?php require_once '../layout/footer.php';?>
