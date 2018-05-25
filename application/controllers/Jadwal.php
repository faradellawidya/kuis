<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('Jadwal_model');
    }

    public function index()
    {
        /*$jadwal = $this->jadwal_model->list();
        $data = ['title' => 'Pemrograman Web Framework :: Data jadwal','jadwal' => $jadwal];
        $this->load->view('jadwal/index', $data);*/

        $filter = $this->input->post('filter');
        $field  = $this->input->post('field');
        $search = $this->input->post('search');

        if (isset($filter) && !empty($search)) {
            $this->load->model('Jadwal_Model');
            $data['jadwal'] = $this->Jadwal_Model->getJadwalWhereLike($field, $search);
        } else {
            $this->load->model('Jadwal_Model');
            $data['jadwal'] = $this->Jadwal_Model->getJadwal();
        }

        $dosen = $this->Jadwal_model->get_dosen();
        $data = [];
        $total = $this->Jadwal_model->getTotal();

        if ($total > 0) {
            $limit = 2;
            $start = $this->uri->segment(3, 0);

            $config = [
                'base_url' => base_url() . 'jadwal/index',
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 3,

                // Bootstrap 3 Pagination
                'first_link' => '&laquo;',
                'last_link' => '&raquo;',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];
            $this->pagination->initialize($config);

            $data = [
                'results' => $this->Jadwal_model->list($limit, $start),
                'links' => $this->pagination->create_links(),
                'dosen' => $dosen
            ];
        }

        $this->load->view('jadwal/index', $data);
    }


    public function create()
    {
        $dosen = $this->Jadwal_model->get_dosen();
        $dataDosen = ['dataDosen' => $dosen];
        $this->load->view('jadwal/create', $dataDosen);
    }

    public function store()
    {
    $data = [
        'id_dosen' => $this->input->post('id_dosen'),
        'mata_kuliah' => $this->input->post('mata_kuliah'),
        'waktu' => $this->input->post('waktu')
        ];
    $rules = [
        [
        'field' => 'mata_kuliah',
        'label' => 'mata_kuliah',
        'rules' => 'trim|required'
        ]
    ];
    
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run()) {
        $result = $this->Jadwal_model->insert($data);
        if ($result) {
        redirect('jadwal');
        }
    } else {
        redirect('jadwal/create');
    }
    }

    public function show($id_jadwal)
    {
    $jadwal = $this->Jadwal_model->show($id_jadwal);
    $data = [
        'data' => $jadwal
    ];
    $data['dosen'] = $this->Jadwal_model->get_dosen();
    $this->load->view('jadwal/show', $data);
    }

    public function edit($id_jadwal)
	{
    $dosen = $this->Jadwal_model->get_dosen();
	$jadwal = $this->Jadwal_model->show($id_jadwal);
    $data = [
        'data' => $jadwal,
        'dosen' => $dosen
    ];
    $this->load->view('jadwal/edit', $data);
	}

    public function update($id_jadwal)
	{
        $id_jadwal = $this->input->post('id_jadwal');
        $data = array(
            'id_dosen' => $this->input->post('id_dosen'),
            'mata_kuliah' => $this->input->post('mata_kuliah'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Jadwal_model->update($id_jadwal, $data);
        redirect('jadwal');
    }
    
    public function destroy($id_jadwal)
    {
      $this->Jadwal_model->delete($id_jadwal);
      redirect('jadwal');
    }

    public function cari() 
	{
        $data =[
            'dosen' => $this->Jadwal_model->get_dosen(),
            'cari' => $this->Jadwal_model->search()
        ];
		$this->load->view('jadwal/search', $data);
	}
 

}

/* End of file jadwal.php */

?>