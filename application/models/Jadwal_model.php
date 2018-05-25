<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
        public function search()
        {
            $cari = $this->input->GET('cari', TRUE);
            $data = $this->db->query("SELECT * from jadwal where mata_kuliah like '%$cari%' ");
            return $data->result();
        }

        public function list($limit, $start)
        {
            $query = $this->db->get('jadwal', $limit, $start);
            return ($query->num_rows()>0) ? $query->result() :false;
        }

        public function getTotal()
        {
            return $this->db->count_all('jadwal');
        }


        public function insert($data = [])
        {
            $result = $this->db->insert('jadwal', $data);
            return $result;
        }

        public function show($id_jadwal)
        {
            $this->db->where('id_jadwal', $id_jadwal);
            $query = $this->db->get('jadwal');
            return $query->row();
        }

        public function update($id_jadwal, $data = [])
        {
            $ubah = array(
                'id_dosen' => $data['id_dosen'],
                'mata_kuliah' => $data['mata_kuliah'],
                'waktu' => $data['waktu']
            );

            $this->db->where('id_jadwal', $id_jadwal);
            $this->db->update('jadwal', $ubah);
        }


        public function delete($id_jadwal)
        {
            $this->db->where('id_jadwal', $id_jadwal);
            $this->db->delete('jadwal');
        }

        public function get_dosen()
        {
            $query = $this->db->get('dosen');
            return $query->result();
        }


        public function getJadwalWhereLike($field, $search)
        {

            $sql = "
                SELECT * FROM jadwal
                
            ";

            $query = $this->db->query($sql);
            return $query->result();
        }

        public function getJadwal()
        {

            $query = $this->db->get('jadwal');
            return $query->result();
        }

}

/* End of file jadwal_model.php */


?>