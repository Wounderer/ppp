<div class="row" style="width:300px; margin:auto;">
    <blockquote><p><?=$message?></p></blockquote>
    <h2>Регистрация</h2>
    <form role="form" action="?page=register" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Ваше имя (логин для входа)</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите имя пользователя" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Номер мобильного телефона (формат: 89161234567)</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="89161234567" name="phone">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Придумайте пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" name="password1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">и повторите придуманный пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Повтор пароля" name="password2">
        </div>
        <input type="hidden" name="register_user" value="1" />
        <button type="submit" class="btn btn-default">Зарегистрироваться</button>
    </form>
</div>