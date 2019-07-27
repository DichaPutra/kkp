<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ADM_Dashboard_c extends CI_Controller {

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
//            echo "INI adlaah dashboard admin | $this->bagian | $this->namapic | $this->isadmin";
            // pesan
            $this->datakirim['pesan'] = $this->pesan;

            $this->load->view('ADM_Dashboard_v', $this->datakirim);
        }
    }

}

?>
