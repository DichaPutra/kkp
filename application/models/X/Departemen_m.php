<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    // ============================= [ fungsi D I V I S I ] ==============================.....................
    // 
    // == [ PLANNING SCORE ] =====================
    function getDepartemenBknDivisi($divisiID) {
        $tahunPlanningScore = date('Y') + 1;
        $query = $this->db->query("
            SELECT a.id, a.namaDepartemen, b.namaDivisi, b.color,
            (SELECT score FROM planning_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS score,
            (SELECT waktuInput FROM planning_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS inputTime,
            (SELECT komentar FROM planning_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS komentar,
            (SELECT id FROM planning_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS idScore
            
            FROM  `departemen` a, divisi b
            WHERE NOT a.Divisi_id = $divisiID
            AND a.Divisi_id = b.id        
            ");
        return $query->result();
    }

    function getDepartemenPlanningScore($divisiID) {
        $tahunPlanningScore = date('Y') + 1;
        $query = $this->db->query("
            SELECT a.id, a.namaDepartemen, b.namaDivisi, b.color,
            (SELECT score FROM planning_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS score,
            (SELECT waktuInput FROM planning_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS inputTime,
            (SELECT komentar FROM planning_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS komentar,
            (SELECT id FROM planning_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS idScore
            
            FROM  `departemen` a, divisi b
            WHERE a.Divisi_id = $divisiID
            AND a.Divisi_id = b.id        
            ");
        return $query->result();
    }

    function getDepartemenByID($idDepartemen) {
        $query = $this->db->query("
                SELECT  `namaDepartemen` FROM `departemen` WHERE `id` = $idDepartemen            
        ");
        $departemen = $query->result_array();
        return $departemen[0]['namaDepartemen'];
    }

    // == [ REALIZATION SCORE ] ===================
    function getDeptRealizationScore($divisiID) {
        $tahunPlanningScore = date('Y');
        $query = $this->db->query("
            SELECT a.id, a.namaDepartemen, b.namaDivisi, b.color,
            (SELECT score FROM realization_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS score,
            (SELECT waktuInput FROM realization_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS inputTime, 
            (SELECT id FROM realization_score WHERE Departemen_id = a.id AND Divisi_id = $divisiID AND periode = $tahunPlanningScore ) AS idScore,
            (SELECT AVG(persentaseCapaian) FROM improvement WHERE periode = $tahunPlanningScore AND Departemen_id = a.id OR 
            Departemen_id = a.id AND persentaseCapaian != 100 AND periode < $tahunPlanningScore OR
            Departemen_id = a.id AND tahun_nilai_seratus = $tahunPlanningScore) AS progress
            
            FROM  `departemen` a, divisi b
            WHERE a.Divisi_id = $divisiID
            AND a.Divisi_id = b.id        
            ");
        return $query->result();
    }

    // == [MY DEPARTEMENT] ================
    function getDepartemenBawahanDivisi($divisiID) {
        $tahunPlanningScore = date('Y');
        $query = $this->db->query("
            SELECT a.id , a.namaDepartemen, b.nama , 
            (SELECT AVG(persentaseCapaian) FROM improvement WHERE Departemen_id = a.id AND periode = '$tahunPlanningScore' OR 
            Departemen_id = a.id AND persentaseCapaian != 100 AND periode < $tahunPlanningScore OR
            Departemen_id = a.id AND tahun_nilai_seratus = $tahunPlanningScore) AS Progress
            FROM `departemen` a , account b
            WHERE `Divisi_id` = $divisiID 
            AND a.`Account_id` = b.id
            ");
        return $query->result();
    }

    // ============================= [ fungsi A D M I N   K P I ] ==============================.....................
    // 
    // == [ PLANNING SCORE ] =====================

    function kpiPlanningScore() {
        $tahunPlanningScore = date('Y') + 1;
        $query = $this->db->query("SELECT a.id, a.namaDepartemen, b.namaDivisi, b.color,
            (SELECT COUNT( id ) FROM planning_score WHERE Departemen_id = a.id AND periode=$tahunPlanningScore) AS countScore, 
            (SELECT COUNT( id )-1 FROM divisi) AS countDivisi,
            (SELECT AVG (score) FROM planning_score WHERE Departemen_id = a.id AND periode=$tahunPlanningScore) AS averageScore
            FROM  `departemen` a, divisi b
            WHERE a.Divisi_id = b.id");
        return $query->result();
    }

    function kpiRealizationScore() {
        $tahunPlanningScore = date('Y');
        $query = $this->db->query("SELECT a.id, a.namaDepartemen, b.namaDivisi, b.color,
            (SELECT COUNT( id ) FROM realization_score WHERE Departemen_id = a.id AND periode= $tahunPlanningScore) AS countScore, 
            (SELECT COUNT( id )-1 FROM divisi) AS countDivisi,
            (SELECT AVG (score) FROM realization_score WHERE Departemen_id = a.id AND periode= $tahunPlanningScore) AS averageScore
            FROM  `departemen` a, divisi b
            WHERE a.Divisi_id = b.id 
            ");
        return $query->result();
    }

    function kpiRealizationProgress($year) {
        $query = $this->db->query("
            SELECT a.id, a.namaDepartemen, b.namaDivisi, b.color, c.nama,
            (SELECT AVG(persentaseCapaian) FROM improvement WHERE periode = $year AND Departemen_id = a.id OR 
            Departemen_id = a.id AND persentaseCapaian != 100 AND periode < $year OR
            Departemen_id = a.id AND tahun_nilai_seratus = $year) AS progress
            FROM  `departemen` a, divisi b, account c
            WHERE a.Divisi_id = b.id   
            AND a.Account_id = c.id
            ");
        return $query->result();
    }

    function kpiImprovementPlanningProgress($year) {
        $query = $this->db->query("
            SELECT a.id, a.namaDepartemen, b.namaDivisi, b.color, c.nama,
            (SELECT COUNT(id) FROM improvement WHERE periode = $year AND Departemen_id = a.id) AS jmlhImprovement
            FROM  `departemen` a, divisi b, account c
            WHERE a.Divisi_id = b.id   
            AND a.Account_id = c.id
            ");
        return $query->result();
    }

}