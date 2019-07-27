<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Planning_score_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    // ============================= [ fungsi D I V I S I ] ==============================.....................
    // 
    // == [ PLANNING SCORE ] =====================
    function editScore($score, $idScore) {
        $query = $this->db->query("UPDATE `planning_score` SET  `score` =  '$score' WHERE `id`=$idScore ;");
    }

    function insertScore($idDepartemen, $score, $comments) {
        $idDivisi = $this->session->userdata('idDivisi');
        $tahunPlanningScore = date('Y') + 1;

        $query = $this->db->query("INSERT INTO `planning_score` (`id`, `Departemen_id`, `Divisi_id`, `score`, `periode`, `waktuInput`, `komentar`) 
            VALUES (NULL, '$idDepartemen', '$idDivisi', '$score', '$tahunPlanningScore', NOW(), '$comments');");
    }

    function deleteScore($idScore) {
        $query = $this->db->query("DELETE FROM planning_score WHERE id = $idScore;");
    }

    //============================ [funcgsi admin KPI] =============================================
    // ========== [PLANNING SCORE] ===========================
    function kpiDetailPlanningScore($idDepartemen) {
        $tahun = date('Y') + 1;
        $query = $this->db->query("SELECT a.id , b.namaDivisi , c.nama , a.score, a.waktuinput  
                FROM planning_score a, divisi b, account c
                WHERE a.Divisi_id = b.id
                AND b.Account_id = c.id 
                AND a.Departemen_id = $idDepartemen
                AND periode = $tahun
                ");
        
        return $query->result();
    }

}