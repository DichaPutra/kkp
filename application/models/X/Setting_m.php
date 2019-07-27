<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    function getSettingStats($idSetting) {
        // fungsi cekAkun return TRUE bila akun telah terdaftar
        $query = $this->db->query("SELECT  `stats`FROM `settings` WHERE `id` = $idSetting");
        $data = $query->result_array();
        return $data[0]['stats'];
    }

    function turnON($idSetting) {
        $this->db->query("UPDATE  `settings` SET  `stats` =  'on' WHERE  `settings`.`id` =  '$idSetting' LIMIT 1");
    }

    function turnOFF($idSetting) {
        $this->db->query("UPDATE  `settings` SET  `stats` =  'off' WHERE  `settings`.`id` =  '$idSetting' LIMIT 1");
    }

}
