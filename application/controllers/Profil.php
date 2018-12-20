<?php

class Profil extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_auth');
        if($this->session->userdata('logged_in') != TRUE){
            redirect('auth');
        }
    }

    public function index(){
        $id = $this->session->userdata('logged_in')['id'];
        $data['profil'] = $this->m_auth->get_account($id);
        $this->load->view('user/profil/index', $data);
    }

    public function sunting_profil(){
        $id = $this->session->userdata('logged_in')['id'];
        $data['profil'] = $this->m_auth->get_account($id);
        $this->load->view('user/profil/edit_profil', $data);
    }
}