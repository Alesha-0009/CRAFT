<?php require_once '../functions/debug.php';?>
<?php require_once '../layout/header.php';?>
<?php require_once '../db/DB.php';?>
<h1 class="center">Список пользователей</h1>
<?php
$db = new DB;
$list = $db->getUsersRoleName();
$ids = $db->getListUserId();
$ids2 = $db->getListUserId();
$role_name = getRoleName();
?>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя Пользователя</th>
            <th>Роль</th>
            <?if(count($list['user_id']) > 0):?>
                <th></th>
            <?endif;?>
        </tr>
        </thead>
        <tbody>
            <?if(count($list['user_id']) > 0):?>
                <tr>
                    <td><?=current($list['user_id'])?></td>
                    <td><?=current($list['user_name'])?></td>
                    <td><?=current($list['role_name'])?></td>
                    <td>
                        <!-- Проверка на то пол какоц ролью -->
                        <?if ($role_name === 'Администратор'):?>
                            <icon id=<?=current($ids)?> style="margin-left: 40px; cursor:pointer;" class="glyphicon glyphicon-trash"></icon>
                            <a href=<?="/functions/edit.php?id=" . current($ids2)?>>
                                <icon style="margin-left: 10px; cursor: pointer;" class="glyphicon glyphicon-pencil"></icon>
                            </a>
                        <?endif;?>
                        <?if ($role_name === 'Модератор'):?>
                            <a href=<?="/functions/edit.php?id=" . current($ids2)?>>
                                <icon style="margin-left: 10px; cursor: pointer;" class="glyphicon glyphicon-pencil"></icon>
                            </a>
                        <?endif;?>
                    </td>
                </tr>
                <?for ($i = 0; $i < count($list['user_id'])-1; $i++):?>
                    <tr>
                        <td><?=next($list['user_id'])?></td>
                        <td><?=next($list['user_name'])?></td>
                        <td><?=next($list['role_name'])?></td>
                        <td>
                            <!-- Проверка на то пол какоц ролью -->
                            <?if ($role_name === 'Администратор'):?>
                                <icon  id=<?=next($ids)?> style="margin-left: 40px; cursor:pointer;" class="glyphicon glyphicon-trash"></icon>
                                <a href=<?="/functions/edit.php?id=" . next($ids2)?>>
                                    <icon style="margin-left: 10px; cursor: pointer;" class="glyphicon glyphicon-pencil"></icon>
                                </a>
                            <?endif;?>
                            <?if ($role_name === 'Модератор'):?>
                                <a href=<?="/functions/edit.php?id=" . next($ids2)?>>
                                    <icon style="margin-left: 10px; cursor: pointer;" class="glyphicon glyphicon-pencil"></icon>
                                </a>
                            <?endif;?>
                        </td>
                    </tr>
                <?endfor;?>
            <?endif;?>
        </tbody>
    </table>
    <!-- Проверка на то пол какоц ролью -->
    <?if($role_name === 'Администратор'):?>
        <a href="/functions/add.php">
            <button style=" margin-top: 20px; margin-left: 506px;" type="button" class="btn btn-info">Добавить</button>
        </a>
    <?endif;?>
</div>

<script>
    $('.glyphicon-trash').on("click",function () {
        $.ajax({
            type: 'GET',
            url: '/functions/delete.php?id=' + this.id,
            success: function () {
                location.reload();
            }
        });
    });
</script>

<?php require_once '../layout/footer.php';?>
