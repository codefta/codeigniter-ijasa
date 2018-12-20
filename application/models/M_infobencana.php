<?php

class M_infobencana extends CI_Model {

    public function get_info(){
        return  $this->db->select('kelola_bencana.idbencana, kelola_bencana.*, lokasi.*, provinces.id, provinces.name provinsi, regencies.id, regencies.name kabupaten, districts.id, districts.name kecamatan, villages.id, villages.name desa, daftar_kebutuhan.*')
                     ->from('kelola_bencana')
                     ->join('lokasi','lokasi.id = kelola_bencana.lokasi_id')
                     ->join('provinces', 'provinces.id = lokasi.id_provinsi')
                     ->join('regencies', 'regencies.id = lokasi.id_kabupaten')
                     ->join('districts', 'districts.id = lokasi.id_kecamatan')
                     ->join('villages', 'villages.id = lokasi.id_desa')
                     ->join('daftar_kebutuhan', 'daftar_kebutuhan.idbutuh = kelola_bencana.id_kebutuhan')
                     ->get()->result_array();
    }

    public function get_perid($id){
        $this->db->where('idbencana', $id);
        return $this->db->select('kelola_bencana.*, lokasi.*, ')
                        ->from('kelola_bencana')
                        ->join('lokasi','lokasi.id = kelola_bencana.lokasi_id')
                        ->get()->row();
    }

    public function get_info_limit($limit){
        return $this->db->get('kelola_bencana', $limit)->result_array();
    }

    public function add_info($data){
        return $this->db->insert('kelola_bencana', $data);
    }

    public function get_id($id){
        $this->db->where('idbencana', $id);
        return $this->db->select('kelola_bencana.*, lokasi.*, provinces.id provinsi_id, provinces.name provinsi, regencies.id kabupaten_id, regencies.name kabupaten, districts.id kecamatan_id, districts.name kecamatan, villages.id desa_id, villages.name desa, daftar_kebutuhan.*')
                        ->from('kelola_bencana')
                        ->join('lokasi','lokasi.id = kelola_bencana.lokasi_id')
                        ->join('provinces', 'provinces.id = lokasi.id_provinsi')
                        ->join('regencies', 'regencies.id = lokasi.id_kabupaten')
                        ->join('districts', 'districts.id = lokasi.id_kecamatan')
                        ->join('villages', 'villages.id = lokasi.id_desa')
                        ->join('daftar_kebutuhan', 'daftar_kebutuhan.idbutuh = kelola_bencana.id_kebutuhan')
                        ->get()->row();
    }

    public function update_info($data, $id){
        return  $this->db->where('idbencana', $id)->update('kelola_bencana', $data);
    }

    public function delete_info($id){
        return $this->db->where('idbencana', $id)->delete('kelola_bencana');
    }


}