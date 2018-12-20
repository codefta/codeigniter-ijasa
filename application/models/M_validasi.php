<?php

class M_validasi extends CI_Model{
    public function get_validasi(){
        return $this->db->select('transaksi.*, users.id, users.nama nama_pengguna, kelola_bencana.idbencana, kelola_bencana.nama info_bencana, target_kebutuhan.*, stats.idstats, stats.nama nama_status')
                        ->from('transaksi')
                        ->join('users', 'users.id = transaksi.pengguna')
                        ->join('kelola_bencana', 'kelola_bencana.idbencana = transaksi.bencana')
                        ->join('target_kebutuhan', 'target_kebutuhan.idtarget = transaksi.jenis_kebutuhan')
                        ->join('stats', 'stats.idstats = transaksi.id_stats')
                        ->get()->result();
    }

    public function add_transaksi($data){
        return $this->db->insert('transaksi', $data);
    }

    public function verif_transaksi($data, $id){
        return $this->db->where('idtransaksi', $id)->update('transaksi', $data);
    }

    public function validasi_userid($id){
        return $this->db->where('pengguna', $id)->get('transaksi')->row();
    }

    public function delete_transaksi($id){
        return $this->db->where('idtransaksi', $id)->delete('transaksi');
    }
}