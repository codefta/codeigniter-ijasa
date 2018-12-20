<?php

class Daftarakun extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("m_auth");
    }

    public function index(){
        $data ['daftar_akun'] = $this->m_auth->get_account_all();

        $this->load->view('admin/daftar_akun/index', $data);
    }

    public function hapus_akun($id){
        $delete = $this->m_auth->delete_account($id);
        unlink(base_url()."uploads/".$delete['foto']);
        if ($delete){
            $this->session->set_flashdata('akun_hapus_sukses', "akun berhasil dihapus");
        } else {
            $this->session->set_flashdata('akun_hapus_gagal', 'gagal');
        }

        redirect('daftarakun');
    }
}