<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ADM_Kuisioner_c extends CI_Controller {

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
//        echo 'admin Kuisioner controller';
        if ($this->session->userdata('bagian') == NULL) {
            redirect(base_url());
        } else {
            $this->load->model('Account_m');
            $this->datakirim['account'] = $this->Account_m->getAllAccountKuisioner();

            // pesan
            $this->datakirim['pesan'] = $this->pesan;

            $this->load->view('ADM_Kuisioner_v', $this->datakirim);
        }
    }

    public function viewKuisioner($bagian) {
        //mengambil id departemen dari url
        $bagian = urldecode($bagian);

        //data tabel relasi
        $this->load->model('Kuisioner_m');
        $this->datakirim['relasi'] = $this->Kuisioner_m->selectKuisioner($bagian);

        //mengambil data akun
        $this->load->model('Account_m');
        $this->datakirim['listaccount'] = $this->Account_m->getAllDept();


        $this->datakirim['bagianrelasi'] = $bagian;
        $this->datakirim['pesan'] = $this->pesan;

        $this->load->view('ADM_Kuisioner2_v', $this->datakirim);
    }

    public function addKuisioner() {
        $departemen = $this->input->post('departemen');
        $kuisioner = $this->input->post('kuisioner');
//        echo "$departemen | $kuisioner ---under construction---";

        //add Kuisioner
        $this->load->model('Kuisioner_m');
        $this->Kuisioner_m->addKuisioner($departemen, $kuisioner);


        $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Sukses!</strong> Kuisioner berhasil ditambahkan</div>";
        $this->viewKuisioner($departemen);
    }

    public function deleteKuisioner($id, $bagian) {
        $bagian = urldecode($bagian);
//        echo "id kuisioner = $id | bagian = $bagian";
        //delete Kuisioner
        $this->load->model('Kuisioner_m');
        $this->Kuisioner_m->deleteKuisioner($id, $bagian);

        $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Sukses!</strong> Kuisioner berhasil dihapus</div>";
        $this->viewKuisioner($bagian);
    }

}

?>
