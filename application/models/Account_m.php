<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    function cekAccount($username) {
        // fungsi cekAkun return TRUE bila akun telah terdaftar
        $query = $this->db->query("SELECT * FROM account WHERE username = '$username'");
        if ($query->result_array() != NULL) {
            //bila sudah terdaftar return TRUE
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function cekBagian($bagian) {
        // fungsi cekAkun return TRUE bila akun telah terdaftar
        $query = $this->db->query("SELECT * FROM `account` WHERE bagian = '$bagian'");
        if ($query->result_array() != NULL) {
            //bila sudah terdaftar return TRUE
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function selectAccount($username) {
        //fungsi untuk pengambilan data Akun
        $query = $this->db->query("SELECT * FROM `account` WHERE username = '$username'");
        return $query->result_array();
    }

    function selectDivisi($id) {
        $query = $this->db->query("SELECT * FROM `divisi` WHERE account_id = '$id'");
        return $query->result_array();
    }

    function getPass($username) {
        // fungsi cekAkun return TRUE bila akun telah terdaftar
        $query = $this->db->query("SELECT * FROM `account` WHERE username = '$username'");
        $data = $query->result_array();
        return $data[0][2];
    }

    function changePass($bagian, $passbaru) {
        $this->db->query("UPDATE  `account` SET  `pass` =  '$passbaru' WHERE `bagian` = '$bagian'");
    }

    //============= function admin KPI ===================
    function getAllAccountRelasi() {
        $query = $this->db->query("SELECT bagian, username, namapic, (SELECT COUNT(bagianpenilai) FROM relasipenilaian WHERE bagianpenilai = a.bagian) AS jumlahRelasi
            FROM `account` a WHERE isadmin = '0'");
        $data = $query->result();
        return $data;
    }

    function getAllAccountKuisioner() {
        $query = $this->db->query("SELECT bagian, username, namapic, (SELECT COUNT(idkuisioner) FROM kuisioner WHERE bagian = a.bagian) AS jumlahRelasi
            FROM `account` a WHERE isadmin = '0'");
        $data = $query->result();
        return $data;
    }

    function getAllAccount() {
        $query = $this->db->query("SELECT * FROM `account` WHERE isadmin = '0'");
        $data = $query->result();
        return $data;
    }

    function getAllDept() {
        $query = $this->db->query("SELECT bagian FROM `account` WHERE isadmin = '0'");
        $data = $query->result();
        return $data;
    }

    function insertAccount($bagian, $namapic, $username, $pass) {
        $this->db->query("INSERT INTO `account` (`bagian`, `username`, `pass`, `namapic`, `isadmin`) 
            VALUES ('$bagian', '$username', '$pass', '$namapic', '0');");
    }

    function editAccount($bagian, $namapic, $username, $pass, $bagianbefore) {
        $this->db->query("
            UPDATE `account` SET 
            `bagian` = '$bagian', 
            `username` = '$username', 
            `pass` = '$pass', 
            `namapic` = '$namapic' 
            WHERE `account`.`bagian` = '$bagianbefore';
            ");
    }

}