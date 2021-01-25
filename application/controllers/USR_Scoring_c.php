<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class USR_Scoring_c extends CI_Controller {

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

        //pengiriman nama user
        $this->datakirim['bagian'] = $this->bagian;
        $this->datakirim['namapic'] = $this->namapic;
    }

    public function index() {
        /**
         * Fungsi untuk menampilkan halaman list departemen apa saja yang di nilai "SCORING KKP"
         * 
         * * */
        if ($this->session->userdata('bagian') == NULL) {
            redirect(base_url());
        } else {
            $bagian = $this->session->userdata('bagian');

            //data tabel relasi
            $this->load->model('Relasipenilaian_m');
            $this->datakirim['relasi'] = $this->Relasipenilaian_m->selectrelasi($bagian);

            $this->datakirim['departemen'] = $bagian;
            $this->datakirim['pesan'] = $this->pesan;
            $this->datakirim['bulanpenilaian'] = date('n');

            $this->load->view('USR_Scoring_v', $this->datakirim);
        }
    }

    public function inputNilai($bagiandinilai) {
        /**
         * Fungsi untuk melakukan input Nilai KKP , terdapat 2 kondisi.
         * 1. Apabila nilai belum di inputkan (berisi form untuk menginput nilai)
         * 2. Nilai telah di inputkan (menunjukkan bahwa nilai telah di input , dan menampilkan nilai yang sudah di input)
         * * */
        $bagiandinilai = urldecode($bagiandinilai);
        $bagian = $this->session->userdata('bagian');


        $this->load->model('Nilai_m');
        if (date('n') == 1) {
            $bulan = 12; //set date untuk pengecekan bulan yang sudah di isi khusus bulan januari
            $tahun = date('Y') - 1;
        } else {
            $bulan = date('n') - 1; //set date untuk pengecekan bulan yang sudah di isi
            $tahun = date('Y');
        }


        if ($this->Nilai_m->pengecekanInputNilai($bulan, $tahun, $bagiandinilai, $bagian) == true) {
            // Kondisi 2 , nilai telah di inputkan 
            $this->datakirim['nilai'] = $this->Nilai_m->selectNilai($bulan, $tahun, $bagiandinilai, $bagian);
            $this->datakirim['bagiandinilai'] = $bagiandinilai;
            $this->datakirim['pesan'] = $this->pesan;

            //load quisioner
            $this->load->model('Kuisioner_m');
            $this->datakirim['kuisioner'] = $this->Nilai_m->selectKuisioner($bulan, $tahun, $bagiandinilai, $bagian);
            $this->datakirim['kritiksaran'] = $this->Nilai_m->selectKritikSaran($bulan, $tahun, $bagiandinilai, $bagian);

            $this->load->view('USR_Scoring3_v', $this->datakirim);
        } else {
            // Kondisi 1, menampilkan form input nilai, nilai belum di inputkan
            $this->datakirim['bagiandinilai'] = $bagiandinilai;
            $this->datakirim['pesan'] = $this->pesan;

            //load quisioner
            $this->load->model('Kuisioner_m');
            $this->datakirim['kuisioner'] = $this->Kuisioner_m->selectKuisioner($bagiandinilai);

            $this->load->view('USR_Scoring2_v', $this->datakirim);
        }
    }

    public function inputNilaiProses() {
        /**
         * Fungsi inputNilaiProses berisikan fungsi logic untuk melakukan penyimpanan nilai kedalam database
         * * */
        //variabel
        $bagianpenilai = $this->input->post('bagianPenilai');
        $bagiandinilai = $this->input->post('bagianDinilai');
        $idKuisioner = $this->input->post('idKuisioner');
        $nilai = $this->input->post('nilai');
        $catatan = $this->input->post('catatan');
        $kritiksaran = $this->input->post('kritiksaran');

        // input ke database // ----------------------------------------------
        $this->load->model('Nilai_m');
        $this->load->model('Relasipenilaian_m');
        

        


        //pengecekan nilai dibawah 60
        $notValid = ""; //fungsi untuk store quisioner mana yang dibawah 60 dan tidak isi alasan 
        $countercek60 = 0;
        $qNo = 1;
        foreach ($idKuisioner as $id) {
            if ($nilai[$countercek60] == "n/a" || $nilai[$countercek60] == "N/A") {
                continue;
            } else if ($nilai[$countercek60] < 60 && $catatan[$countercek60] == null) {
                $notValid = $notValid . "$qNo,";
            }
            $qNo++;
            $countercek60++;
        }

        //input database dengan skip nilai yang n/a
        if ($notValid != "") {
            $this->pesan = "<div class=\"alert alert-error\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Error!</strong> Untuk quisioner no.$notValid dengan nilai dibawah 60, Wajib untuk mengisi alasan</div>";
            $this->inputNilai($bagiandinilai);
        } else {
            $counter = 0;
            foreach ($idKuisioner as $id) {
                if ($nilai[$counter] == "n/a" || $nilai[$counter] == "N/A") {
                    $counter++;
                    continue;
                }
                $this->Nilai_m->inputNilai($nilai[$counter], $bagianpenilai, $bagiandinilai, $id, $catatan[$counter]);
                $counter++;
            }
            if ($kritiksaran != NULL) {
                $this->Nilai_m->kritikSaran($bagianpenilai, $bagiandinilai, $kritiksaran);
            }
            
            //update bulanpenilaian
            $this->Relasipenilaian_m->updateBulanPenilaian($bagianpenilai, $bagiandinilai);

            $this->pesan = "<div class=\"alert alert-success\"> <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a><strong>Sukses!</strong> Nilai $bagiandinilai berhasil diinputkan</div>";
            $this->index();
        }
    }

}

?>
