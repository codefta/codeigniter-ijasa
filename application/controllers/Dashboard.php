<?php 

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') != TRUE){
            $url = base_url();
            redirect($url);
        }

        $this->load->model('m_dashboard');
    }

    public function index(){
        //kalkulasi kebutuhan
        $data['otw'] = $this->m_dashboard->sum_diterima_kebutuhan();
        $data['target'] = $this->m_dashboard->sum_belum_diterima();
        //kalkulasi akun
        $data['akun'] = $this->m_dashboard->sum_account();
        $data['akun_donated'] = $this->m_dashboard->total_akun_donated();
        //kalkulasi info bencana
        $data['info'] = $this->m_dashboard->sum_info();
        $data['info_donated'] = $this->m_dashboard->sum_info_donated();
        $this->load->view('admin/dashboard/index', $data);
    }

}