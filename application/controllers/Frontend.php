<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Frontend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //Load Dependencies 
        $this->load->model('Model_point'); // model yang diload 
        $this->load->model('Model_kecamatan'); // model yang diload
        $this->load->model('Model_kampung'); // model yang diload
    }

    public function index()
    {
        $data = array(
            'judul' => 'WebGIS',
            // 'kecamatan' => $this->Model_kecamatan->get_relasi(),
            // 'kampung' => $this->Model_kampung->get_relasi(),
            // 'point' => $this->Model_point->detail($id),
            'content' => 'home1'
        );
        $this->load->view('layout_frontend/viewunion', $data, FALSE);
    }
} 
/* End of file Frontend.php */