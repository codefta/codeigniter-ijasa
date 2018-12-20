<?php

class M_lokasi extends CI_Model{
    public function get_provinsi(){
        return $this->db->get('provinces')->result();
    }

    public function get_id($id){
        return $this->db->where('id', $id)->get('lokasi')->row();
    }

    public function get_kabupaten($id_provinsi){
        $this->db->where('province_id', $id_provinsi);
        return $this->db->select('regencies.id id_kab, regencies.name name_kab, regencies.province_id, provinces.id, provinces.name provinsi' )
                        ->from('regencies')
                        ->join('provinces', 'provinces.id = regencies.province_id')
                        ->get()->result();
    }

    public function get_kecamatan($id_kabupaten){
        $this->db->where('regency_id', $id_kabupaten);
        return $this->db->select('districts.id id_kec, districts.name name_kec , regencies.id, regencies.name kabupaten')
                        ->from('districts')
                        ->join('regencies', 'regencies.id = districts.regency_id')
                        ->get()->result();
    }

    public function get_desa($id_kecamatan){
        $this->db->where('district_id', $id_kecamatan);
        return $this->db->select('villages.id id_desa, villages.name name_desa, districts.id id_kec, districts.name name_kec ')
                        ->from('villages')
                        ->join('districts', 'districts.id = villages.district_id')
                        ->get()->result();
    }

    public function add_lokasi($data){
        return $this->db->insert('lokasi', $data);
    }

    public function update_lokasi($data, $id){
        return $this->db->where('id', $id)->update('lokasi', $data);
    }

    public function get_lokasi(){
        $this->db->select('kelola_bencana.lokasi_id, lokasi.*')
                 ->from('kelola_becana')
                 ->join('lokasi','lokasi.id = kelola_bencana.lokasi_id');
        return $this->db->select('lokasi.*, provinces.id, provinces.name provinsi, regencies.id, regencies.name kabupaten, districts.id, districts.name kecamatan, villages.id, villages.name desa')
                        ->from('lokasi')
                        ->join('provinces', 'provinces.id = lokasi.id_provinsi')
                        ->join('regencies', 'regencies.id = lokasi.id_kabupaten')
                        ->join('districts', 'districts.id = districts.id_kecamatan')
                        ->join('villages', 'villages.id = villages.id_desa')
                        ->get()->result_array();
    }
}
