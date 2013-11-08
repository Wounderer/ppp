<?php
if (isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'savetimedata':
            $user_obj = new user();
            $point_obj = new point($user_obj->user_point);
            $point_obj->recreateTimeCells();
            die('test');
            header('location: ?page=pointadmin');
            break;
        case 'savepointdata':
            $db_obj = new ezSQL_mysql();
            $db_obj->query("UPDATE `points` SET `name`='".$_POST['name']."', `adress`='".$_POST['adress']."', `phone`='".$_POST['phone']."' WHERE `id`='".$_POST['id']."'");
            break;
    }

}

$user_obj = new user();
if (!$user_obj->isLoaded()) {
    return '';
}
$point_obj = new point($user_obj->user_point);

if (!$point_obj) {
    return '';
}

?>
<div class="row">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Информация о пункте</a></li>
        <li><a href="#worktime" data-toggle="tab">График работы</a></li>
        <li><a href="#messages" data-toggle="tab">Messages</a></li>
        <li><a href="#settings" data-toggle="tab">Settings</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <h3>Общая информация, отображаемая на сайте</h3>
            <table>
                <tr>
                    <td width="50%">
                        <form role="form" method="post" action="?page=pointadmin">

                            <div class="form-group">
                                <label for="name">Название пункта шиномонтажа:</label>
                                <input type="text" class="form-control" id="name" placeholder="<?=$point_obj->point_name?>" name="name" value="<?=$point_obj->point_name?>">
                            </div>

                            <div class="form-group">
                                <label for="adress">Адрес расположения:</label>
                                <input type="text" class="form-control" id="adress" placeholder="<?=$point_obj->point_adress?>" name="adress" value="<?=$point_obj->point_adress?>">
                            </div>

                            <div class="form-group">
                                <label for="adress">Контактный телефон:</label>
                                <input type="text" class="form-control" id="phone" placeholder="<?=$point_obj->point_phone?>" name="phone" value="<?=$point_obj->point_phone?>">
                            </div>
                            <input type="hidden" name="id" value="<?=$point_obj->point_id?>" />
                            <input type="hidden" name="action" value="savepointdata" />
                            <button type="submit" class="btn btn-default">Сохранить</button>
                        </form>

                    </td>
                    <td width="50%"></td>
                </tr>
            </table>
        </div>
        <div class="tab-pane" id="worktime">
            <h3>График работы</h3>
            <p>ВНИМАНИЕ! При изменении графика работы ВСЕ существующие записи аннулируются!</p>
            <form role="form" method="post" action="?page=pointadmin">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>День недели</th>
                    <th>Открытие</th>
                    <th>Закрытие</th>
                    <th>Размер окна клиента</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Понедельник</td>
                        <td><input type="text" class="form-control" id="1_start_time" placeholder="8:00" name="name" value="8:00"></td>
                        <td><input type="text" class="form-control" id="1_finish_time" placeholder="20:00" name="name" value="20:00"></td>
                        <td><input type="text" class="form-control" id="1_window_size" placeholder=45" name="name" value="45"></td>
                    </tr>
                    <tr>
                        <td>Вторник</td>
                        <td><input type="text" class="form-control" id="2_start_time" placeholder="8:00" name="name" value="8:00"></td>
                        <td><input type="text" class="form-control" id="2_finish_time" placeholder="20:00" name="name" value="20:00"></td>
                        <td><input type="text" class="form-control" id="2_window_size" placeholder=45" name="name" value="45"></td>
                    </tr>
                    <tr>
                        <td>Среда</td>
                        <td><input type="text" class="form-control" id="3_start_time" placeholder="8:00" name="name" value="8:00"></td>
                        <td><input type="text" class="form-control" id="3_finish_time" placeholder="20:00" name="name" value="20:00"></td>
                        <td><input type="text" class="form-control" id="3_window_size" placeholder=45" name="name" value="45"></td>
                    </tr>
                    <tr>
                        <td>Четверг</td>
                        <td><input type="text" class="form-control" id="4_start_time" placeholder="8:00" name="name" value="8:00"></td>
                        <td><input type="text" class="form-control" id="4_finish_time" placeholder="20:00" name="name" value="20:00"></td>
                        <td><input type="text" class="form-control" id="4_window_size" placeholder=45" name="name" value="45"></td>
                    </tr>
                    <tr>
                        <td>Пятница</td>
                        <td><input type="text" class="form-control" id="5_start_time" placeholder="8:00" name="name" value="8:00"></td>
                        <td><input type="text" class="form-control" id="5_finish_time" placeholder="20:00" name="name" value="20:00"></td>
                        <td><input type="text" class="form-control" id="5_window_size" placeholder=45" name="name" value="45"></td>
                    </tr>
                    <tr class="warning">
                        <td>Суббота</td>
                        <td><input type="text" class="form-control" id="6_start_time" placeholder="8:00" name="name" value="8:00"></td>
                        <td><input type="text" class="form-control" id="6_finish_time" placeholder="20:00" name="name" value="20:00"></td>
                        <td><input type="text" class="form-control" id="6_window_size" placeholder=45" name="name" value="45"></td>
                    </tr>
                    <tr class="warning">
                        <td>Воскресенье</td>
                        <td><input type="text" class="form-control" id="7_start_time" placeholder="8:00" name="name" value="8:00"></td>
                        <td><input type="text" class="form-control" id="7_finish_time" placeholder="20:00" name="name" value="20:00"></td>
                        <td><input type="text" class="form-control" id="7_window_size" placeholder=45" name="name" value="45"></td>
                    </tr>
                <tr>
                    <td colspan="4" align="right"><button type="submit" class="btn btn-default">Сохранить</button></td>
                </tr>
                </tbody>
                </table>
                <input type="hidden" name="action" value="savetimedata" />
</form>
        </div>
        <div class="tab-pane" id="messages">...3</div>
        <div class="tab-pane" id="settings">...4</div>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: kuznesov
 * Date: 11/4/13
 * Time: 9:47 AM
 */ 