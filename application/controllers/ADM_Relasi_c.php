<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ADM_Relasi_c extends CI_Controller {

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
            $this->datakirim['account'] = $this->Account_m->getAllAccountRelasi();

            // pesan
            $this->datakirim['pesan'] = $this->pesan;

            $this->load->view('ADM_Relasi_v', $this->datakirim);
        }
    }

    public function viewrelasiakun($bagian) {
        //mengambil id departemen dari url
        $bagian = urldecode($bagian);

        //data tabel relasi
        $this->load->model('Relasipenilaian_m');
        $this->datakirim['relasi'] = $this->Relasipenilaian_m->selectrelasi($bagian);

        //mengambil data akun
        $this->load->model('Account_m');
        $this->datakirim['listaccount'] = $this->Account_m->getAllDept();


        $this->datakirim['bagianrelasi'] = $bagian;
        $this->datakirim['pesan'] = $this->pesan;

        $this->load->view('ADM_Relasi2_v', $this->datakirim);
    }

    public function addRelasi() {
        $departemen = $this->input->post('departemen');
        $bagiandinilai = $this->input->post('bagiandinilai');


        $this->load->model('Relasipenilaian_m');
//        var_dump($this->Relasipenilaian_m->cekrelasi($departemen, $bagiandinilai));
        if ($this->Relasipenilaian_m->cekrelasi($departemen, $bagiandinilai)) {
            //  'sudah ada';
            $this->pesan = "<div class=\"alert alert-danger\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Gagal!</strong> Relasi hubungan sudah ada di list</div>";
            $this->viewrelasiakun($departemen);
        } else {
            //  'belum ada';
            $this->Relasipenilaian_m->addRelasi($departemen, $bagiandinilai);

            $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Sukses!</strong> Relasi berhasil di tambahkan</div>";
            $this->viewrelasiakun($departemen);
        }
    }

    public function deleteRelasi($id, $departemen) {
//        echo $id;

        $this->load->model('Relasipenilaian_m');
        $this->Relasipenilaian_m->deleteRelasi($id);

        $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Sukses!</strong> Relasi berhasil di hapus</div>";
        $this->viewrelasiakun($departemen);
    }

}

?>
