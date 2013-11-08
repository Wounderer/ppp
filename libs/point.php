<?php

class point {

    var $point_id = null;
    var $point_name = null;
    var $point_adress = null;
    var $point_phone = null;

    public function __construct($id) {
        if ($id == null) { return false; }
        $point_row = $this->loadPoint($id);
        $this->point_id = $point_row->id;
        $this->point_name = $point_row->name;
        $this->point_adress = $point_row->adress;
        $this->point_phone = $point_row->phone;
    }

    public function loadPoint($id) {
        $db_obj = new ezSQL_mysql();
        $point_row = $db_obj->get_row("SELECT * FROM `points` WHERE `id`='".$id."' LIMIT 1");
        if ($point_row) {
            return $point_row;
        }
        return false;
    }

    public function removeAllTimeCells() {
        $db_obj = new ezSQL_mysql();
        $db_obj->query("DELETE FROM `time_cells` WHERE `point_id`='".$this->point_id."'");
    }

    public function recreateTimeCells() {
        global $_POST;
        die('test');
        $this->removaAllTimeCells();
        $this->createTimeCells($_POST);
    }

    public function createTimecell($data) {
        $days = array(1,2,3,4,5,6,7);
        $db_obj = new ezSQL_mysql();
        foreach ($days as $day) {
            $time_start = $data[$day.'_start_time'];
            $cell_time = $time_start;
            $time_finish = $data[$day.'_finish_time'];
            $time_window = $data[$day.'_window_size'];
            while ($time_finish >= $cell_time) {
             $cell_time = $cell_time + $time_window;
             $db_obj->query("INSERT INTO `time_cells` (`point_id`,`time_start`,`time_end`,`client_window`,`day`)
                VALUES ('".$this->point_id."','".$cell_time."','".($cell_time+$time_window)."','".$time_window."','".$day."')");
            }
        }
    }
} 