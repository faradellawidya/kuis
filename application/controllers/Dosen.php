<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('Dosen_model');
    }

    public function index()
    {
        /*$dosen = $this->Dosen_model->list();
        $data = ['title' => 'Pemrograman Web Framework :: Data Dosen','dosen' => $dosen];
        $this->load->view('dosen/index', $data);*/

        //$dosen = $this->Dosen_model->get_dosen();
        $data = [];
        $total = $this->Dosen_model->getTotal();

        if ($total > 0) {
            $limit = 2;
            $start = $this->uri->segment(3, 0);

            $config = [
                'base_url' => base_url() . 'dosen/index',
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
                'results' => $this->Dosen_model->list($limit, $start),
                'links' => $this->pagination->create_links()
                //'dosen' => $dosen
            ];
        }

        $this->load->view('dosen/index', $data);
    }

    public function create()
    {
        $this->load->view('dosen/create');
    }

    public function store()
    {
    $data = [
        'nama_dosen' => $this->input->post('nama_dosen'),
        'nip' => $this->input->post('nip'),
        'alamat' => $this->input->post('alamat')
        ];
    $rules = [
        [
        'field' => 'nama_dosen',
        'label' => 'nama_dosen',
        'rules' => 'trim|required'
        ]
    ];
    
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run()) {
        $result = $this->Dosen_model->insert($data);
        if ($result) {
        redirect('dosen');
        }
    } else {
        redirect('dosen/create');
    }
    }

    public function show($id_dosen)
    {
    $dosen = $this->Dosen_model->show($id_dosen);
    $data = [
        'data' => $dosen
    ];
    $this->load->view('dosen/show', $data);
    }

    public function edit($id_dosen)
	{
	$dosen = $this->Dosen_model->show($id_dosen);
    $data = [
        'data' => $dosen
    ];
    $this->load->view('dosen/edit', $data);
	}

    public function update($id_dosen)
	{
        $id_dosen = $this->input->post('id_dosen');
        $data = array(
            'nama_dosen' => $this->input->post('nama_dosen'),
            'nip' => $this->input->post('nip'),
            'alamat' => $this->input->post('alamat'),
        );

        $this->Dosen_model->update($id_dosen, $data);
        redirect('dosen');
    }
    
    public function destroy($id_dosen)
    {
      $this->Dosen_model->delete($id_dosen);
      redirect('dosen');
    }

    public function cari() 
	{
        $data =[
            'cari' => $this->Dosen_model->search()
        ];
		$this->load->view('dosen/search', $data);
	}

}

/* End of file Dosen.php */

?>