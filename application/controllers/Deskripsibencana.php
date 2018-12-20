<?php

class Deskripsibencana extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_infobencana');
        $this->load->model('m_logistik');
        $this->load->model('m_lokasi');
        $this->load->model('m_auth');
        $this->load->model('m_validasi');
        $this->load->model('m_dashboard');

    }

    public function index(){
        $this->load->library('pagination');
        $config['per_page'] = 9;

        $this->pagination->initialize($config);
        $data ['berita'] = $this->m_infobencana->get_info_limit($config['per_page']);
        $this->load->view('user/deskripsi_bencana/index', $data);
    }

    public function detail_bencana($id){
        $data['info'] = $this->m_infobencana->get_id($id);
        $data['logistik'] = $this->m_dashboard->progress_kebutuhan($id);
        $data ['kebutuhan'] = $this->m_logistik->get_list();
        $this->load->view('user/deskripsi_bencana/deskripsi_bencana', $data);
    }

    public function donasi_bencana($idbencana){
        if($this->session->userdata('logged_in') != TRUE){
            redirect('auth');
        }

        $id = $this->session->userdata('logged_in')['id'];
        $data['profil'] = $this->m_auth->get_account($id);
        $data ['donasi'] = $this->m_infobencana->get_id($idbencana);
        $data['kebutuhan'] = $this->m_logistik->get_list();
        $this->load->view('user/deskripsi_bencana/donasi_bencana', $data);
    }

    public function save_donasi(){

        $pengguna = $this->input->post('user');
        $bencana = $this->input->post('bencana');
       
        $data_kebutuhan = [
            'makanan' => $this->input->post('makanan'),
            'pakaian' => $this->input->post('pakaian'),
            'buku' => $this->input->post('buku'),
            'kendaraan' => $this->input->post('kendaraan')
        ];
        $this->m_logistik->target_kebutuhan($data_kebutuhan);
        $kebutuhan = $this->db->insert_id();

        $data = [
            'pengguna' => $pengguna,
            'bencana' => $bencana,
            'jenis_kebutuhan' => $kebutuhan
        ];

        $save = $this->m_validasi->add_transaksi($data);

        if($save){
            redirect('deskripsibencana/donasi_sukses');
        } else {
            redirect('beranda');
        }

    }

    public function donasi_sukses(){
        $this->load->view('user/deskripsi_bencana/donasi_sukses');
    }


    public function status_donasi(){
        $data['status'] = $this->m_validasi->get_validasi();
        $this->load->view('user/deskripsi_bencana/status_donasi', $data);
    }
}