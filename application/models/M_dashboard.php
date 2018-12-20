<?php

class M_dashboard extends CI_Model{

    public function sum_diterima_kebutuhan(){
        $query = $this->db->query(
        "SELECT 
            (SUM(target_kebutuhan.makanan)+SUM(target_kebutuhan.pakaian)+SUM(target_kebutuhan.buku)+SUM(target_kebutuhan.kendaraan)) as total
        FROM 
            transaksi 
        INNER JOIN 
            target_kebutuhan on transaksi.jenis_kebutuhan = target_kebutuhan.idtarget 
        where 
            id_stats = '2' 
        ");
        return $query->result_array();
    }

    public function progress_kebutuhan($id){
        $query = $this->db->query(
        "SELECT 
            SUM(target_kebutuhan.makanan) as makan, SUM(target_kebutuhan.pakaian) as pakai, SUM(target_kebutuhan.buku) as buku, SUM(target_kebutuhan.kendaraan) as kendaraan
        FROM 
            transaksi 
        JOIN 
            target_kebutuhan on transaksi.jenis_kebutuhan = target_kebutuhan.idtarget 
        where 
            bencana = $id 
        ");
        return $query->result_array();
    }

    public function sum_belum_diterima(){
        $query = $this->db->query("SELECT (SUM(makanan)+SUM(pakaian)+SUM(buku)+SUM(kendaraan)) as total
        FROM daftar_kebutuhan");
        return $query->result_array();
    }

    
    public function sum_info(){
        return $this->db->query("SELECT count(idbencana) as jml_bencana from kelola_bencana")->result_array();
    }
    
    public function sum_info_donated(){
        return $this->db->query("SELECT count(DISTINCT bencana) as bencana_terdanai from transaksi where id_stats = '2'")->result_array();
    }
    
    //kalkulasi akun
    public function total_akun_donated(){
        return $this->db->query('SELECT COUNT(DISTINCT bencana) as akun_donated FROM transaksi where id_stats = "2"')->result_array();
    }

    public function sum_account(){
        return $this->db->query("SELECT count(id) as jml_akun from users")->result_array();
    }
}