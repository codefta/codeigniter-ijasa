<?php

class Kebutuhanlogistik extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('m_logistik');
        $this->load->model('m_infobencana');
    }

    public function index(){
        $data['log'] = $this->m_logistik->get_log();
        $data['info'] = $this->m_infobencana->get_info();
        $this->load->view('admin/kebutuhan_logistik/index', $data);
    }
}