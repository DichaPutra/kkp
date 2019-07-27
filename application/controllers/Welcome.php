<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Pada class controller ini digunakan untuk proses login, pegecekan
class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //inisialisasi load object awal
        $this->load->library('session');
        $this->load->model('Account_m');
    }

    public function index() {
        if ($this->session->userdata('id') == NULL) {
            $this->load->view('welcome_v');
        } else {
            //echo 'masih ada session , redirect ke dashboard';
            if ($this->session->userdata('isadmin') == '1') {
                // redirct Dashboard Admin
                echo 'dashboard admin';
            } elseif ($this->session->userdata('isadmin') == '0') {
                // redirect Dashboard Departemen
                redirect(base_url() . 'index.php/DEP_rencanaimprovement_c');
            } else {
                $this->load->view('welcome_v');
            }
        }
    }

    public function pengecekan() {
        // fungsi untuk pengecekan akun login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //echo "$username | $password";
        if (!$this->Account_m->cekAccount($username)) {
            //bila username telah terdfatar
            echo '<script>alert("username tidak terdaftar");</script>';
            $this->index();
        } else {
            // pendaftaran simpan
            $akun = $this->Account_m->selectAccount($username);

            //pengecekan password
            if ($password != $akun[0]['pass']) {
                echo '<script>alert("Password Salah");</script>';
                $this->index();
            } else {
                if ($akun[0]['isadmin'] == '1') {

                    //bagian username pass namapic isadmin
                    $bagian = $akun[0]['bagian'];
                    $namapic = $akun[0]['namapic'];

//                    echo "tipe admin | $bagian | $namapic";
                    // save session
                    $this->session->set_userdata('bagian', $akun[0]['bagian']);
                    $this->session->set_userdata('namapic', $akun[0]['namapic']);
                    $this->session->set_userdata('isadmin', $akun[0]['isadmin']);


                    // redirect ke dashboard admin
                    redirect(base_url() . 'index.php/ADM_Dashboard_c');
                } elseif ($akun[0]['isadmin'] == '0') {
                    //bagian username pass namapic isadmin
                    $bagian = $akun[0]['bagian'];
                    $namapic = $akun[0]['namapic'];

                    echo "tipe biasa | $bagian | $namapic";

                    // save session
                    $this->session->set_userdata('bagian', $akun[0]['bagian']);
                    $this->session->set_userdata('namapic', $akun[0]['namapic']);
                    $this->session->set_userdata('isadmin', $akun[0]['isadmin']);


//                    $departemen = $this->Account_m->selectDepartemen($akun[0]['id']);
//
//                    $nama = $akun[0]['nama'];
//                    $id = $akun[0]['id'];
//                    $namaDepartemen = $departemen[0]['namaDepartemen'];
//                    $idDepartemen = $departemen[0]['id'];
//
//                    //echo "dia departement | seslamat datang $nama _ $id | $idDepartemen _ $namaDepartemen";
//                    // simpan 4 session 
//                    $this->session->set_userdata('nama', $akun[0]['nama']);
//                    $this->session->set_userdata('id', $akun[0]['id']);
//                    $this->session->set_userdata('namaDepartemen', $departemen[0]['namaDepartemen']);
//                    $this->session->set_userdata('idDepartemen', $departemen[0]['id']);
//
                    // redirect ke dashboard departemen
                    redirect(base_url() . 'index.php/USR_Scoring_c');
                }
            }
        }
    }

}
