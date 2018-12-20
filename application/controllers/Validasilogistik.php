<?php 

class Validasilogistik extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_validasi');
    }

    public function index(){
        $data['validasi'] = $this->m_validasi->get_validasi();
        $this->load->view('admin/validasi_logistik/index.php', $data);
    }

    public function save_validasi(){
        $id = $this->input->post('idvalid');
        $status = $this->input->post('status');
        $tanggal = date("Y-m-d H:i:s");

        $data = [
            'id_stats' => $status,
            'tgl_diterima' => $tanggal
        ];

        $this->m_validasi->verif_transaksi($data, $id);

        redirect('validasilogistik');
    }

    public function delete_validasi($id){
        $this->m_validasi->delete_transaksi($id);
        redirect('validasilogistik');
    }
}