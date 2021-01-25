<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ADM_Pengumpulan_c extends CI_Controller {

    /**
     *  FUNGSI CONTROLLER NilaiKKP
     * 1. index = menampilkan average nilai KKP per departemen dalam bulan sekarang
     * 2. detilNilai = menampilkan detil nilai dari hasil rata rata yang di tampilkan di index group berdasarkan departemen yang menilai
     * 3. .....
     * 
     * * */
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
            // pesan
            $this->datakirim['pesan'] = $this->pesan;


            //ambil bulan sekarang 
            if ($this->input->post('tahun') != NULL) {
                $this->load->model('Nilai_m');
                $monthNumber = $this->input->post('bulannumber');
                $month = $this->Nilai_m->bulankonversi($monthNumber);
                $year = $this->input->post('tahun');

                $this->datakirim['bulan'] = $month;
                $this->datakirim['noBulan'] = $monthNumber;
                $this->datakirim['tahun'] = $year;
//                echo "date ada input bulan = $month , year = $year";
            } else {
                $this->load->model('Nilai_m');
                if (date('n') == 1) {
                    $month = 'December';
                    $monthNumber = 12;
                    $year = date('Y') - 1;
                } else {
                    $monthNumber = date('n') - 1;
                    $month = $this->Nilai_m->bulankonversi($monthNumber);
                    $year = date('Y');
                }

                $this->datakirim['bulan'] = $month;
                $this->datakirim['noBulan'] = $monthNumber;
                $this->datakirim['tahun'] = $year;
//                echo 'date no input';
            }

            $this->load->model('Nilai_m');
            $this->datakirim['dept'] = $this->Nilai_m->getProgressPengumpulan($monthNumber, $year);
            //initiate all year yang ada di database
            $this->datakirim['tahunlistdb'] = $this->Nilai_m->tahunlistdb();

            $this->load->view('ADM_Pengumpulan_v', $this->datakirim);
        }
    }

    public function detilPengumpulan($departemen, $bulan, $tahun) {
        $this->datakirim['pesan'] = $this->pesan;

        $dept = urldecode($departemen);
//        echo "$dept | $bulan | $tahun";

        $this->load->model('Nilai_m');
        $this->datakirim['departemen'] = $dept;
        $this->datakirim['detailprogress'] = $this->Nilai_m->getDetilProgressPengumpulan($dept, $bulan, $tahun);
        $this->load->view('ADM_Pengumpulan2_v', $this->datakirim);
    }

}

?>
