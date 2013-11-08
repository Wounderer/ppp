<?php
class user {
    var $user_id = null;
    var $user_type = null;
    var $user_point = null;

    public function __construct() {
        if ($_SESSION['sid'] != '') {
            $db_obj = new ezSQL_mysql();
            $user_row = $db_obj->get_row("SELECT * FROM `users` WHERE `sid`='".$_SESSION['sid']."' AND `id`='".$_SESSION['user_id']."'");
            if (!$user_row) {
                return '';
            }
            $this->loadUser($user_row);
        }
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function login($usernameorphone, $password) {
        $db_obj = new ezSQL_mysql();
        $login = $usernameorphone;
        $user_row = $db_obj->get_row("SELECT * FROM `users` WHERE `name`='$login' OR `phone`='$login' AND password='".md5($password)."'");
        $db_obj->debug();
        if (!$user_row) {

            return false;
        }

        $this->loadUser($user_row);
        return true;
    }

    public function loadUser($user_row) {
        $db_obj = new ezSQL_mysql();

        $this->user_id = $user_row->id;
        $this->user_type = $user_row->type;
        $this->user_point = $user_row->point_id;
        $_SESSION['user_id'] = $this->user_id;
        $sid = md5($this->user_id.time());
        $_SESSION['sid'] = $sid;

        $db_obj->query("UPDATE `users` SET `sid`='".$sid."' WHERE `id`='".$this->user_id."' LIMIT 1");

    }

    public function registerUser($name, $phone, $password1, $password2) {
        $db_obj = new ezSQL_mysql();

        $message = 'Пользователь успешно создан';
        if ($password1 != $password2) {
            $message = 'Пароль и его подтверждение не совпадают!';
            return $message;
        }
        $user_row = $db_obj->get_row("SELECT * FROM `users` WHERE `name`='".$name."' OR `phone`='".$phone."' LIMIT 1");
        if ($user_row) {
            $message = 'Польователь с таким именем или номером телефона уже зарегистрирован';
            return $message;
        }

        $db_obj->query("INSERT INTO `users` (`name`, `phone`, `password`, `type`, `sid`) VALUES ('".$name."','".$phone."','".md5($password1)."','1','new')");
        return $message;
    }

    public function isAdmin() {
        return false;
    }

    public function isClient() {
        return false;
    }

    public function isSubClient() {
        return false;
    }

    public function isLoaded() {
        if (isset($_SESSION['sid'])) {
            $user_row = self::getUserRow($_SESSION['user_id']);
            if ($user_row->sid == $_SESSION['sid']) {
                return true;
            }
        }
        return false;
    }

    public function getUserRow($user_id) {
        $db_obj = new ezSQL_mysql();
        $user_row = $db_obj->get_row("SELECT * FROM `users` WHERE `id`='".$user_id."' LIMIT 1");
        return $user_row;
    }

    public function logout() {
        $db_obj = new ezSQL_mysql();
        $db_obj->query("UPDATE `users` SET `sid`='null' WHERE `id`='".$this->user_id."' LIMIT 1");
        $this->user_id = null;
        $this->user_type = null;
        unset($_SESSION['sid']);
        unset($_SESSION['user_id']);
    }


} 