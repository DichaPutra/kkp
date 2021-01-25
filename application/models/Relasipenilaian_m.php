<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relasipenilaian_m extends CI_Model {

    function selectrelasi($bagian) {
        $query = $this->db->query("SELECT * FROM `relasipenilaian` WHERE bagianpenilai = '$bagian'");
        return $query->result();
    }

    function addRelasi($departemen, $bagiandinilai) {
        $this->db->query("INSERT INTO `relasipenilaian` (`id`, `bagianpenilai`, `bagiandinilai`) 
            VALUES (NULL, '$departemen', '$bagiandinilai');");
    }

    function deleteRelasi($id) {
        $this->db->query("DELETE FROM `relasipenilaian` WHERE `relasipenilaian`.`id` = '$id'");
    }

    function cekrelasi($bagianpenilai, $bagiandinilai) {
        //return true kalau data sudah ada, return false kalau belum ada
        $query = $this->db->query("SELECT COUNT(id)as jml FROM relasipenilaian WHERE bagianpenilai = '$bagianpenilai'  AND bagiandinilai = '$bagiandinilai' ;");
        $found = $query->result_array();
//        return $found[0]['jml'];
        if ($found[0]['jml'] == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function updateBulanPenilaian($bagianpenilai, $bagiandinilai) {
        $bulan = date('n');
        $query = $this->db->query("UPDATE `relasipenilaian` SET `bulanpenilaian` = '$bulan' 
            WHERE `relasipenilaian`.`bagianpenilai` = '$bagianpenilai'
                AND `relasipenilaian`.`bagiandinilai` = '$bagiandinilai';");
        
    }

}