<?php
$user_obj = new user();
if ($user_obj->isLoaded() === false) {

}
?>
<div class="row" style="width:300px; margin:auto;">
    <blockquote><p><?=$message?></p></blockquote>
<h2>Авторизация</h2>
<form role="form" action="?page=user" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Ваш логин или номер телефона</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="84947352346" name="name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Введите Ваш пароль</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ваш секретный пароль" name="password">
    </div>
    <input type="hidden" name="auth_user" value="1" />
    <button type="submit" class="btn btn-default">Войти</button>
</form>
</div>