<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

    public function search()
        {
            $cari = $this->input->GET('cari', TRUE);
            $data = $this->db->query("SELECT * from dosen where nama_dosen like '%$cari%' ");
            return $data->result();
        }

    public function list($limit, $start)
    {
        $query = $this->db->get('dosen', $limit, $start);
        return ($query->num_rows()>0) ? $query->result() :false;
    }

    public function getTotal()
        {
            return $this->db->count_all('dosen');
        }

    public function insert($data = [])
    {
    $result = $this->db->insert('dosen', $data);
    return $result;
    }

    public function show($id_dosen)
    {
    $this->db->where('id_dosen', $id_dosen);
    $query = $this->db->get('dosen');
    return $query->row();
    }

    public function update($id_dosen, $data = [])
	{
    $update = array(
        'nama_dosen'=> $data['nama_dosen'],
        'nip'=> $data['nip'],
        'alamat'=> $data['alamat']
    );

    $this->db->where('id_dosen',$id_dosen);
    $this->db->update('dosen',$update);
    }
    
    public function delete($id_dosen)
    {
        $this->db->where('id_dosen',$id_dosen);
        $this->db->delete('dosen');
    }

}

/* End of file Dosen_model.php */


?>