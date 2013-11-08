<?php

class Render {
    static function template($template_file_name, $params = array()) {
        ob_start();
        extract($params);
        include($_SERVER['DOCUMENT_ROOT'].'/views/'.$template_file_name);
        $out = ob_get_clean();
        return $out;
    }

    static function route($page) {
        switch ($page) {
            case 'pointadmin':
                //TODO Check user is client
                $row_html = self::template('pointadmin.php');
                break;
            case 'logout':
                $user_obj = new user();
                $user_obj->logout();
                header('location: index.php');
                break;
            case 'calendar':
                $day = date('d', time());
                $month = date('m', time());

                if (isset($_GET['day'])) {
                    $day = $_GET['day'];
                    $month = $_GET['month'];
                }
                $row_html = self::template('calendar.php', array('day'=>$day, 'month'=>$month));
                break;
            case 'user':
                $message = '';
                if (isset($_POST['auth_user'])) {
                    $user_obj = new user();
                    $is_loggined = $user_obj->login($_POST['name'], $_POST['password']);
                    if ($is_loggined) {
                        header('location: index.php');
                    }
                    $message = 'Не удалось выполнить вход в систему';
                }

                $row_html = self::template('user.php', array('message'=>$message));
                break;
            case 'register':
                $message = 'Все поля обязательны для заполнения!';

                if (isset($_POST['register_user'])) {
                    $user_obj = new user();
                    $message = $user_obj->registerUser($_POST['name'], $_POST['phone'],$_POST['password1'],$_POST['password2']);
                }
                $row_html = self::template('register.php', array('message'=>$message));
                break;
            case 'index':
            default:
                $row_html = self::template('home.php');
            break;
        }
        echo self::template('layout.php', array('row'=>$row_html));
    }
} 