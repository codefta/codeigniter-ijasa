<?php

class M_logistik extends CI_Model {
    //get judul tabel daftar kebutuhan
    public function get_list(){
        return $this->db->list_fields('daftar_kebutuhan'); //ambil judul
    }
    //tambah daftar kebutuhan
    public function add_kebutuhan($data ){
        return $this->db->insert('daftar_kebutuhan', $data);
    }
    //get daftar kebutuhan perid
    public function get_id_kebutuhan($id){ 
        return $this->db->where('idbutuh', $id)->get('daftar_kebutuhan')->row();
    }
    //update daftar kebutuhan
    public function update_kebutuhan($data, $id){
        return $this->db->where('idbutuh', $id)->update('daftar_kebutuhan', $data);
    }

    //get judul target kebutuhan
    public function get_list_target(){
        return $this->db->list_fields('target_kebutuhan');
    } 
    //tambah target kebutuhan
    public function target_kebutuhan($data){
        return $this->db->insert('target_kebutuhan', $data);
    }

    public function get_log(){
        return $this->db->get('kebutuhan_logistik')->result();
    }


    public function kebutuhan_logistik(){
            $this->db->select('kelola_bencana.idbencana, kelola_bencana.nama, kelola_becana.id_kebutuhan');
    }
}