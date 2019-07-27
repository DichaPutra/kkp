<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Improvement_m extends CI_Model {

    function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    // ===========  [DEPARTEMEN] ================================================================================
    // ========== [Controller Rencana Improvement] ==========================
    // select improvement untuk tahun depan
    function getImprovementDEP($depid) {
        $tahun = date('Y') + 1;
        $query = $this->db->query("SELECT * FROM `improvement` WHERE Departemen_id = $depid AND periode = '$tahun'");
        return $query->result();
    }

    // improvement yang sedang berjalan di tahun ini 
    function getImprovementKendalaDEP($depid) {
        $tahun = date('Y');
        $query = $this->db->query("SELECT * FROM `improvement` 
            WHERE Departemen_id = $depid AND periode = '$tahun' OR 
            Departemen_id = $depid AND persentaseCapaian != 100 AND periode < $tahun OR
            Departemen_id = $depid AND tahun_nilai_seratus = $tahun
                ");
        return $query->result();
    }

    function editImprovementDEP($idImprovement, $editanjudul, $editan) {
//        UPDATE  `pakerin_plannningimprovement`.`improvement` SET  `improvement` =  'Percobaan Improvement mekanik 1 edit' WHERE  `improvement`.`id` =1;
        $this->db->query("UPDATE `improvement` SET  `judul_improvement` = '$editanjudul', `improvement` = '$editan' WHERE  `improvement`.`id` = $idImprovement;");
    }

    function addImprovementDEP($jdl_improvement, $improvement, $idDepartement) {
        $tahun = date('Y') + 1;
        $this->db->query("INSERT INTO `improvement` (`id`, `Departemen_id`, `judul_improvement`, `improvement`, `persentaseCapaian`, `kendalaRealisasi`, `periode`, `waktuInput`) 
            VALUES (NULL, '$idDepartement', '$jdl_improvement', '$improvement', '0', NULL, '$tahun', NOW());");
    }

    function deleteImprovementDEP($idImprovement) {
        $this->db->query("DELETE FROM `improvement` WHERE `improvement`.`id` = $idImprovement");
    }

    // ========== [Controller Kendala Realisasi] ==========================

    function nullifiedKendala($idImprovement) {
        //        UPDATE  `pakerin_plannningimprovement`.`improvement` SET  `improvement` =  'Percobaan Improvement mekanik 1 edit' WHERE  `improvement`.`id` =1;
        $this->db->query("UPDATE `improvement` SET `kendalaRealisasi` = NULL WHERE  `improvement`.`id` = $idImprovement;");
    }

    function editKendala($idImprovement, $editanKendala) {
        $this->db->query("UPDATE `improvement` SET `kendalaRealisasi` = '$editanKendala' WHERE  `improvement`.`id` = $idImprovement;");
    }

    function addKendala($idImprovement, $kendala) {
        $this->db->query("UPDATE `improvement` SET `kendalaRealisasi` = '$kendala' WHERE  `improvement`.`id` = $idImprovement;");
    }

    // ===========  [DIVISI] ================================================================================
    // ========== [Controller Planning Score] ==========================
    function getImprovementDiv($depid) {
        $tahun = date('Y') + 1;
        $query = $this->db->query("SELECT * FROM `improvement` WHERE Departemen_id = $depid AND periode = '$tahun'");
        return $query->result();
    }

    function getRealizatioDiv($depid) {
        $tahun = date('Y');
        $query = $this->db->query("SELECT * FROM `improvement` 
            WHERE Departemen_id = $depid AND periode = '$tahun' OR 
            Departemen_id = $depid AND persentaseCapaian != 100 AND periode < $tahun OR
            Departemen_id = $depid AND tahun_nilai_seratus = $tahun
                ");
        return $query->result();
    }

    // ========= [Controller REALIZATION SCORE] ===============
    function getRealizationDiv($depid) {
        $tahun = date('Y');
        $query = $this->db->query("SELECT * FROM `improvement` 
            WHERE Departemen_id = $depid AND periode = '$tahun' OR 
            Departemen_id = $depid AND persentaseCapaian != 100 AND periode < $tahun OR
            Departemen_id = $depid AND tahun_nilai_seratus = $tahun");
        return $query->result();
    }

    // ========= [Controller MY DEPARTEMENT] ============

    function editProgress($idImprovement, $persentase) {
        $tahun = date('Y');
        if ($persentase == 100) {
            $query = $this->db->query("UPDATE `improvement` SET  `persentaseCapaian` =  '$persentase' , tahun_nilai_seratus = $tahun WHERE  `improvement`.`id` = $idImprovement;");
        } else {
            $query = $this->db->query("UPDATE `improvement` SET  `persentaseCapaian` =  '$persentase' WHERE  `improvement`.`id` = $idImprovement;");
        }
    }

    function getPersentase($idImprovement) {
        $query = $this->db->query("SELECT persentaseCapaian FROM `improvement` WHERE `id` = $idImprovement");
        return $query->result_array();
    }

    // ===========  [ADMIN KPI] ================================================================================

    function listTahun() {
        $query = $this->db->query("SELECT periode FROM `improvement` GROUP BY periode");
        return $query->result();
    }

    function getImprovementKPI($depid, $tahun) {
        $query = $this->db->query("SELECT * FROM `improvement` WHERE Departemen_id = $depid AND periode = '$tahun'");
        return $query->result();
    }

    function getRealizationKPI($depid, $tahun) {
        $query = $this->db->query("SELECT * FROM `improvement` WHERE Departemen_id = $depid AND periode = '$tahun' OR 
            Departemen_id = $depid AND persentaseCapaian != 100 AND periode < $tahun OR
            Departemen_id = $depid AND tahun_nilai_seratus = $tahun");
        return $query->result();
    }

}