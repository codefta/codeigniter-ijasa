<?php

class Beranda extends CI_Controller{
    public function __construct(){
        parent::__construct();        
        $this->load->model('m_auth');
        $this->load->model('m_infobencana');
        
    }

    public function index(){
        $this->load->library('pagination');
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $data ['berita'] = $this->m_infobencana->get_info_limit($config['per_page']);
        $this->load->view('user/beranda', $data);
    }

}