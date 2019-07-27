<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisioner_m extends CI_Model {

    function selectKuisioner($bagian) {
        $query = $this->db->query("SELECT * FROM `kuisioner` WHERE bagian = '$bagian'");
        return $query->result();
    }

    function addKuisioner($departemen, $kuisioner) {
        $this->db->query("INSERT INTO `kuisioner` (`idkuisioner`, `bagian`, `pertanyaan`) 
            VALUES (NULL, '$departemen', '$kuisioner');");
    }

    function deleteKuisioner($id, $bagian) {
        $this->db->query("DELETE FROM `kuisioner` WHERE 
            `idkuisioner` = '$id' AND bagian = '$bagian'");
    }



}

?>
