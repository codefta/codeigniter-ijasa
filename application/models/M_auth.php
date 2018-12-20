<?php

class M_auth extends CI_Model {

    public function auth_users($username, $password){
        return $this->db->query("SELECT * FROM users WHERE username='$username' AND pass=sha2('$password', 256) LIMIT 1");
    }

    public function auth_admin($username, $password){
        return $this->db->query("SELECT * FROM admin WHERE username='$username' AND pass=sha2('$password', 256) LIMIT 1");
    }

    public function get_account($id){
        return $this->db->where('id', $id)->get('users')->row_array();
    }
    
    public function get_account_all(){
        return $this->db->get('users')->result_array();
    }

    public function add_account($data){
        return $this->db->insert('users', $data);
    }

    public function update_account($data, $id){
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete_account($id){
        return $this->db->where('id', $id)->delete('users');
    }


}