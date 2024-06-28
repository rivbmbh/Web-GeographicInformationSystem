<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Polyline extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    
        //Load Dependencies 
        $this->load->model('Model_polyline'); // model yang diload 
    }
    public function index()
    {
        $data = array(
            'judul' => 'Data Polyline', // Keterangan Judul
            'polyline' => $this->Model_polyline->tampil_data(), // Pembuatan variabel 
            // buat looping dari model dan function
            'content' => 'digitasi/v_polyline'
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('weight', 'Weight', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('color', 'Color', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('geojson', 'GeoJSON', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 5000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'judul' => 'Add Data Polyline',
                    'error_upload' => $this->upload->display_errors(),
                    'content' => 'digitasi/add_polyline'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_objek' => $this->input->post('nama_objek'),
                    'color' => $this->input->post('color'),
                    'weight' => $this->input->post('weight'),
                    'geojson' => $this->input->post('geojson'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->Model_polyline->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !!!');
                redirect('Polyline');
            }
        }
        $data = array(
            'judul' => 'Add Data Polyline',
            'content' => 'digitasi/add_polyline'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    //edit
    public function edit($id= null) 
    { 
        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array( 
        'required' => '%s Harus Diisi !!!'
        )); 
        $this->form_validation->set_rules('weight', 'Weight', 'required', array( 
        'required' => '%s Harus Diisi !!!'
        )); 
        $this->form_validation->set_rules('color', 'Color', 'required', array( 
        'required' => '%s Harus Diisi !!!'
        )); 
        // $this->form_validation->set_rules('geojson', 'GeoJSON', 'required', array( 
        // 'required' => '%s Harus Diisi !!!'
        // )); 
        
        if ($this->form_validation->run() == TRUE) { 
            $config['upload_path'] = './assets/gambar/'; 
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
            $config['max_size'] = 4000; 

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) { 
                $data = array( 
                    'judul' => 'edit Data', 
                    'error_upload' => $this->upload->display_errors(), 
                    'polyline' => $this->Model_polyline->detail($id), 
                    'content' => 'digitasi/edit_polyline'
                ); 
                $this->load->view('layout/viewunion', $data, FALSE); 
            } else { 

            $upload_data = array('uploads' => $this->upload->data()); 
            $config['image_library'] = 'gd2'; 
            $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name']; 
            $this->load->library('image_lib', $config); 

            $data = array( 
                'id'=>$id, 
                'nama_objek' => $this->input->post('nama_objek' ), 
                'color' => $this->input->post('color'), 
                'weight' => $this->input->post('weight'), 
                // 'geojson' => $this->input->post('geojson'), 
                'gambar' => $upload_data['uploads']['file_name'], 
            );
                $this->Model_polyline->edit($data); 
                $this->session->set_flashdata('pesan', 'Data Berhasil diperbarui !!!'); 
                redirect('polyline'); 
            } 
            $data = array( 
                'id'=>$id, 
                'nama_objek' => $this->input->post('nama_objek' ), 
                'color' => $this->input->post('color'), 
                'weight' => $this->input->post('weight'), 
                // 'geojson' => $this->input->post('geojson'),
                // 'gambar' => $upload_data['uploads']['file_name'],
                ); 
                $this->Model_polyline->edit($data); 
                $this->session->set_flashdata('pesan', 'Data Berhasil diperbarui !!!'); 
                redirect('polyline'); 
            } 
            $data = array( 
                'judul' => 'edit Data', 
                'polyline' => $this->Model_polyline->detail($id), 
                'content' => 'digitasi/edit_polyline'
            ); 
        $this->load->view('layout/viewunion', $data, FALSE); 
    } 

    //delete
    public function delete($id) 
    { 
        $data = array('id' => $id); 
        $this->Model_polyline->delete($data); 
        $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !!!'); 
        redirect('polyline'); 
    } 

}