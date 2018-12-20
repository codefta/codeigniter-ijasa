<?php 

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->model('m_auth');
    }

    public function index(){
        $this->load->view('user/auth/login');
    }

    public function login(){
        $this->load->view('user/auth/login');
    }

    public function auth_login(){
        //menerima username dan password
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //admin cek
        $cek_admin = $this->m_auth->auth_admin($username, $password);

        if($cek_admin->num_rows() > 0){
            //session login admin
                $data = $cek_admin->row_array();
                if($data['username'] == 'admin' || $data['username'] == 'petugas'){
                    $this->session->set_userdata('logged_in', $data);
                    redirect('dashboard');    
                }
        } else{
            $cek_user = $this->m_auth->auth_users($username, $password);
            if($cek_user->num_rows() > 0){
                $data = $cek_user->row_array();
                $this->session->set_userdata('logged_in', $data);
                redirect('beranda');
            }else {
                $this->session->set_flashdata('log_gagal', 'Username/Password salah');
                redirect('auth/login');
            }
        }
    }

    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function register(){
        $this->load->view('user/auth/register');
    }

    //save pendaftaran
    public function save_register(){
        //Form validation config

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('nohp', 'No Handphone', 'required|numeric|max_length[12]|is_unique[users.nohp]');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array('required' => 'You must provide a %s.'));
        
        // Config for uploading Photos
        $config['upload_path']          = './uploads/profil';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $this->input->post('username');
        $config['overwrite']            = TRUE;

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto')){
            $foto =  $this->upload->data('file_name');
        } else{
            $foto = 'default.png';
        }

        if($this->form_validation->run() == FALSE){
            return $this->load->view('user/auth/register');
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'email' =>$this->input->post('email'),
                'nohp' =>$this->input->post('nohp'),
                'username' => $this->input->post('username'),
                'pass' => hash('sha256', $this->input->post('password')),
                'foto' => $foto
            ];

            $save = $this->m_auth->add_account($data);
            if($save){
                $this->session->set_flashdata('auth_sukses_reg', 'Anda telah berhasil daftar, Silakan Login!');
            }else{
                $this->session->set_flashdata('auth_gagal_reg', 'Maaf anda gagal mendaftar');
            }

            redirect('auth/login');
        }
    }


    //edit profil
    public function update_register(){
        //Form validation config

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'No Handphone', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array('required' => 'You must provide a %s.'));
        
        // Config for uploading Photos
        $config['upload_path']          = './uploads/profil';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $this->input->post('username');
        $config['overwrite']            = TRUE;

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto')){
            $foto =  $this->upload->data('file_name');
            $this->session->set_flashdata('foto_berhasil', 'Anda berhasil mengubah foto profil');
        } else {
            $foto = $this->input->post('image_lama');
        }

        if($this->form_validation->run() == FALSE){
            return $this->load->view('user/profil/edit_profil');
        } else {
           
            $id = $this->input->post('id');
            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'email' =>$this->input->post('email'),
                'nohp' =>$this->input->post('nohp'),
                'foto' => $foto
            ];

            $save = $this->m_auth->update_account($data, $id);
            $this->session->userdata('logged_in')['id'];

            redirect('profil');
        }
    }

}