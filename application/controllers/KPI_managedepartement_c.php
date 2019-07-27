<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KPI_managedepartement_c extends CI_Controller {

    public $nama;
    public $userid;
    public $pesan;

    public function __construct() {
        parent::__construct();
        //inisialisasi load object awal
        $this->load->library('session');
        $this->load->model('Account_m');

        $this->nama = $this->session->userdata('nama');
        $this->userid = $this->session->userdata('id');

        //        pengiriman nama user
        $this->datakirim['nama'] = $this->nama;
    }

    public function index() {
        if ($this->session->userdata('id') == NULL) {
            redirect(base_url());
        } else {
            $this->load->model('Account_m');
            $this->datakirim['account'] = $this->Account_m->getDepartmentAccount();
            $this->datakirim['divisi'] = $this->Account_m->getDivisi();

            // pesan
            $this->datakirim['pesan'] = $this->pesan;

            $this->load->view('KPI_managedepartement_v', $this->datakirim);
        }
    }

    public function editDepartemen() {
        $idDepartemen = $this->input->post('idDepartemen');
        $namaDepartemen = $this->input->post('namaDepartemen');
        $idAccount = $this->input->post('idAccount');
        $namaKadep = $this->input->post('namaKadep');
        $idDivisi = $this->input->post('idDivisi');


        $this->load->model('Account_m');
        $this->Account_m->editNamaAccount($namaKadep, $idAccount);
        $this->Account_m->editNamaDepartemen($namaDepartemen, $idDepartemen);
        $this->Account_m->editPosisiDivisi($idDivisi, $idDepartemen);



        //redirect + pesan success
        $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Success!</strong> Departemen berhasil di edit</div>";
        $this->index();

//        var_dump($idDivisi);
//        echo "$idDepartemen,$namaDepartemen | $idAccount,$namaKadep | ";
//        var_dump($namaKadep);
//        var_dump($namaDepartemen);
    }

    public function addDepartemen() {

        $namaDepartemen = $this->input->post('namaDepartemen');
        $namaKadep = $this->input->post('namaKadep');
        $idDivisi = $this->input->post('idDivisi');
        $userid = $this->input->post('userid');
        $password = $this->input->post('password');

        // insert account
        // insert departemen
        $this->load->model('Account_m');
        $this->Account_m->addAccount($namaDepartemen, $namaKadep, $idDivisi, $userid, $password);

//        redirect + pesan success
        $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Success!</strong> Departemen berhasil ditambahkan</div>";
        $this->index();


//        echo "$namaDepartemen | $namaKadep | $idDivisi | $userid | $password ";
    }

    public function deleteAccount($id, $deptid) {
//        echo "account id = $id | departemen id = $deptid";

        //delete score & improvement dulu
        $this->load->model('Account_m');
        $this->Account_m->deleteScoreImprovement($deptid);
        //delete departemen
        $this->Account_m->deleteDepartemen($deptid);
        //delete akun
        $this->Account_m->deleteAcc($id);

        //redirect + pesan success
        $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Success!</strong> Account berhasil di hapuskan</div>";
        $this->index();
    }

}