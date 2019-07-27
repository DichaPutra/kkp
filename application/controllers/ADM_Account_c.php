<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ADM_Account_c extends CI_Controller {

    public $bagian;
    public $namapic;
    public $isadmin;
    public $pesan;

    public function __construct() {
        parent::__construct();
        //inisialisasi load object awal
        $this->load->library('session');
        $this->load->model('Account_m');

        $this->bagian = $this->session->userdata('bagian');
        $this->namapic = $this->session->userdata('namapic');
        $this->isadmin = $this->session->userdata('isadmin');

        //        pengiriman nama user
        $this->datakirim['bagian'] = $this->bagian;
        $this->datakirim['namapic'] = $this->namapic;
    }

    public function index() {
        if ($this->session->userdata('bagian') == NULL) {
            redirect(base_url());
        } else {
            $this->load->model('Account_m');
            $this->datakirim['account'] = $this->Account_m->getAllAccount();

            // pesan
            $this->datakirim['pesan'] = $this->pesan;

            $this->load->view('ADM_Account_v', $this->datakirim);
        }
    }

    public function addAccount() {
        $bagian = $this->input->post('bagian');
        $namapic = $this->input->post('namapic');
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');

        if ($this->Account_m->cekAccount($username)) {
            $this->pesan = "<div class=\"alert alert-danger\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Error!</strong> Username telah terdaftar / sama</div>";
            $this->index();
//            echo 'username telah terdaftar';
        } elseif ($this->Account_m->cekBagian($bagian)) {
            $this->pesan = "<div class=\"alert alert-danger\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Error!</strong> Nama bagian tersebut telah terdaftar / sama</div>";
            $this->index();
//            echo 'bagian telah terdaftar';
        } else {
            $this->Account_m->insertAccount($bagian, $namapic, $username, $pass);
            $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Sukses!</strong> Account berhasil didaftarkan</div>";
            $this->index();
        }
    }

    public function deleteAccount($bagian) {
        echo 'fungsi delete akun belum di buat';
    }

    public function editAccount() {
        $bagian = $this->input->post('bagian');
        $namapic = $this->input->post('namapic');
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $bagianbefore = $this->input->post('bagianbefore');
        $usernamebefore = $this->input->post('usernamebefore');

        if (($usernamebefore != $username && $this->Account_m->cekAccount($username) == TRUE) || ($bagianbefore != $bagian && $this->Account_m->cekBagian($bagian) == TRUE)) {
            $this->pesan = "<div class=\"alert alert-danger\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Error!</strong> Edit gagal, Username telah terdaftar / sama</div>";
            $this->index();
        } else {
            $this->Account_m->editAccount($bagian, $namapic, $username, $pass, $bagianbefore);
            $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Sukses!</strong> Account berhasil diedit</div>";
            $this->index();
        }
    }

}

?>
