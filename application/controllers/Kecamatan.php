<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kecamatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek apakah admin sudah login atau belum
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    
        //Load Dependencies 
        $this->load->model('Model_kecamatan'); // model yang diload 
    }
    public function index()
    {
        $data = array(
            'judul' => 'Data Kecamatan',
            'kecamatan' => $this->Model_kecamatan->get_relasi(),
            'content' => 'kecamatanKampung/v_kecamatan'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }
    
    public function tambah()
    {
    
        $this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama_kecamatan' => $this->input->post('nama_kecamatan'),
            );

            $this->Model_kecamatan->tambah($data);
            redirect('kecamatan');
            
        }
        $data = array(
            'judul' => 'Tambah Data kecamatan',
            'content' => 'kecamatanKampung/add_kecamatan'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
        }

        
// EDIT DATA POINT
public function edit($id = null)
{
    $this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required', array(
        'required' => '%s Harus Diisi !!!'
    ));
    

    if ($this->form_validation->run() == TRUE) {
       
            $data = array(
                'judul' => 'edit Kecamatan',
                'error_upload' => $this->upload->display_errors(),
                'kecamatan' => $this->Model_kecamatan->detail($id),
                'content' => 'kecamatanKampung/edit_kecamatan'
            );
            $this->load->view('layout/viewunion', $data, FALSE);
            
            $data = array(
                'id_kecamatan' => $id,
                'nama_kecamatan' => $this->input->post('nama_kecamatan'),
    
            );
            $this->Model_kecamatan->e_kecamatan($data);
            redirect('kecamatan');
    
    
        $data = array(
            'id_kecamatan' => $id,
            'nama_kecamatan' => $this->input->post('nama_kecamatan'),
           
        );
    
        $this->Model_kecamatan->e_kecamatan($data);
        redirect('kecamatan');
        } 
           
    $data = array(
        'judul' => 'edit Data',
        'kecamatan' => $this->Model_kecamatan->detail($id),
        'content' => 'kecamatanKampung/edit_kecamatan'
    );
    $this->load->view('layout/viewunion', $data, FALSE);
}


    public function delete($id)
    {
        $data = array('id_kecamatan' => $id);
        $this->Model_kecamatan->delete($data);
        redirect('kecamatan');
    }

   
} 