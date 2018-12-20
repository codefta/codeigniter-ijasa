<?php 

class Infobencana extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_infobencana');
        $this->load->model('m_lokasi');
        $this->load->model('m_logistik');
    }

    public function index(){
        $data['info'] = $this->m_infobencana->get_info();
        $this->load->view('admin/info_bencana/index', $data);
    }

    public function tambah_info(){
        $data['info'] = $this->m_infobencana->get_info();
        $data['provinsi'] = $this->m_lokasi->get_provinsi();
        $data['logistik'] = $this->m_logistik->get_log();
        $data['daftar_kebutuhan'] = $this->m_logistik->get_list();
        $this->load->view('admin/info_bencana/tambah_info', $data);
    }

    public function save_info(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $i = time();

        $config['upload_path'] = './uploads/infobencana/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = $this->input->post('nama'). $i;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
            $foto = $this->upload->data('file_name');
        }

        if($this->form_validation->run() == FALSE){
            $data['provinsi'] = $this->m_lokasi->get_provinsi();
            $this->load->view('admin/info_bencana/tambah_info', $data);
        } else {
            //menambahkan data untuk nama dan deskripsi
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            //menambahkan data untuk lokasi
            $data_lokasi = [
                'id_provinsi' => $this->input->post('provinsi'),
                'id_kabupaten' => $this->input->post('kabupaten'),
                'id_kecamatan' => $this->input->post('kecamatan'),
                'id_desa' => $this->input->post('desa')
            ];
            $this->m_lokasi->add_lokasi($data_lokasi);
            $lokasi = $this->db->insert_id();
            
            //menambahkan data untuk kebutuhan
            $data_kebutuhan = [
                'makanan' => $this->input->post('makanan'),
                'pakaian' => $this->input->post('pakaian'),
                'buku' => $this->input->post('buku'),
                'kendaraan' => $this->input->post('kendaraan')
            ];
            $this->m_logistik->add_kebutuhan($data_kebutuhan);
            $kebutuhan = $this->db->insert_id();

            //menambahkan data untuk keseluruhan
            $data = [
                'nama' => $nama,
                'lokasi_id' => $lokasi,
                'deskripsi' => $deskripsi,
                'foto' => $foto,
                'id_kebutuhan' => $kebutuhan
            ];

            $save = $this->m_infobencana->add_info($data);

            if ($save){
                $this->session->set_flashdata('inf_buat_sukses', 'Anda berhasil menambahkan info bencana');
            } else {
                $this->session->set_flashdata('inf_buat_gagal', 'Anda gagal menambahkan info bencana');
            }
            redirect('infobencana');
        }
               
    }

    public function sunting_info($id){
        $data['info'] = $this->m_infobencana->get_id($id);

        $data['provinsi'] = $this->m_lokasi->get_provinsi();
        $data['lokasi'] = $this->m_lokasi->get_id($data['info']->lokasi_id);    
        $data['kabupaten'] = $this->m_lokasi->get_kabupaten($data['lokasi']->id_provinsi);
        $data['kecamatan'] = $this->m_lokasi->get_kecamatan($data['lokasi']->id_kabupaten);
        $data['desa'] = $this->m_lokasi->get_desa($data['lokasi']->id_kecamatan);
        
        $data['daftar_kebutuhan'] = $this->m_logistik->get_list();
        $data['kebutuhan'] = $this->m_logistik->get_id_kebutuhan($data['info']->id_kebutuhan);
        $this->load->view('admin/info_bencana/sunting_info', $data);
    }

    public function save_sunting_info(){

        $id = $this->input->post('id');
        $id_lokasi = $this->input->post('id_lokasi');
        $id_kebutuhan = $this->input->post('id_kebutuhan');
        $nama = $this->input->post('namabencana');
        $deskripsi = $this->input->post('deskripsi');

        $i = time();

        $config['upload_path'] = './uploads/infobencana/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = $this->input->post('nama').$i;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        

        if($this->upload->do_upload('foto')){
            $foto = $this->upload->data('file_name');
        } else{
            $foto = $this->input->post('image_lama');
        }

        $data_lokasi = [
            'id_provinsi' => $this->input->post('provinsi'),
            'id_kabupaten' => $this->input->post('kabupaten'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'id_desa' => $this->input->post('desa')
        ];

        $this->m_lokasi->update_lokasi($data_lokasi, $id_lokasi);
        
        $data_kebutuhan = [
            'makanan' => $this->input->post('makanan'),
            'pakaian' => $this->input->post('pakaian'),
            'buku' => $this->input->post('buku'),
            'kendaraan' => $this->input->post('kendaraan'),
        ];

        $this->m_logistik->update_kebutuhan($data_kebutuhan, $id);

        $all_data = [
            'nama' => $this->input->post('namabencana'),
            'lokasi_id' => $id_lokasi,
            'deskripsi' => $deskripsi,
            'foto' => $foto
        ];

        $save = $this->m_infobencana->update_info($all_data, $id);

        if ($save){
            $this->session->set_flashdata('inf_sunting_sukses', 'Anda berhasil menyunting info bencana');
        } else {
            $this->session->set_flashdata('inf_sunting_gagal', 'Anda gagal menyunting info bencana');
        }
        redirect('infobencana');    
    }

    public function hapus_info($id){
        $delete = $this->m_infobencana->delete_info($id);
        if ($delete){
            $this->session->set_flashdata('inf_hapus_sukses', "berhasil dihapus");
        } else {
            $this->session->set_flashdata('inf_hapus_gagal', 'gagal');
        }

        redirect('infobencana');
    }
    //adding daftar
    public function daftar_kabupaten(){
        $id_provinsi = $this->input->post('provinsi');

        $kabupaten = $this->m_lokasi->get_kabupaten($id_provinsi);

        $daftar = "<option value=''>Kabupaten</option>";
        foreach($kabupaten as $data){
            $daftar .= "<option value='".$data->id_kab."'>".$data->name_kab."</option>";
        }

        $callback = array('daftar_kabupaten' => $daftar);

        echo json_encode($callback);
    }

    public function daftar_kecamatan(){
        $id_kabupaten = $this->input->post('kabupaten');

        $kecamatan = $this->m_lokasi->get_kecamatan($id_kabupaten);

        $daftar = "<option value=''>Kecamatan</option>";
        foreach($kecamatan as $data){
            $daftar .= "<option value='".$data->id_kec."'>".$data->name_kec."</option>";
        }

        $callback = array('daftar_kecamatan' => $daftar);

        echo json_encode($callback);
    }

    public function daftar_desa(){
        $id_kecamatan = $this->input->post('kecamatan');

        $desa = $this->m_lokasi->get_desa($id_kecamatan);

        $daftar = "<option value=''>Desa</option>";
        foreach($desa as $data){
            $daftar .= "<option value='".$data->id_desa."'>".$data->name_desa."</option>";
        }

        $callback = array('daftar_desa' => $daftar);

        echo json_encode($callback);
    }
}