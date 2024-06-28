<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Polygon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
       
        //Load Dependencies 
        $this->load->model('Model_polygon'); // model yang diload 
    }

    public function index()
    {
        $data = array(
            'judul' => 'Data Polygon', // Keterangan Judul
            'polygon' => $this->Model_polygon->tampil_data(), // Pembuatan variabel 
            //buat looping dari model dan function
            'content' => 'digitasi/v_polygon'
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    // Add a new item 
    public function add()
    {
        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array(
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
            $config['max_size'] = 4000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'judul' => 'Add Data',
                    'error_upload' => $this->upload->display_errors(),
                    'content' => 'digitasi/add_polygon'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_objek' => $this->input->post('nama_objek'),
                    'color' => $this->input->post('color'),
                    'geojson' => $this->input->post('geojson'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->Model_polygon->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !!!');
                redirect('polygon');
            }
        }
        $data = array(
            'judul' => 'Add Data',
            'content' => 'digitasi/add_polygon'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    //edit
    public function edit($id = null)
    {
        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array(
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
                    'polygon' => $this->Model_polygon->detail($id),
                    'content' => 'digitasi/edit_polygon'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id' => $id,
                    'nama_objek' => $this->input->post('nama_objek'),
                    'color' => $this->input->post('color'),
                    // 'geojson' => $this->input->post('geojson'), 
                    'gambar' => $upload_data['uploads']['file_name'],
                );

                $this->Model_polygon->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil diperbarui !!!');
                redirect('polygon');
            }
            $data = array(
                'id' => $id,
                'nama_objek' => $this->input->post('nama_objek'),
                'color' => $this->input->post('color'),
                // 'geojson' => $this->input->post('geojson') 
            );
            $this->Model_polygon->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil diperbarui !!!');
            redirect('polygon');
        }
        $data = array(
            'judul' => 'edit Data',
            'polygon' => $this->Model_polygon->detail($id),
            'content' => 'digitasi/edit_polygon'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    //delete
    public function delete($id)
    {
        $data = array('id' => $id);
        $this->Model_polygon->delete($data);
        $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !!!');
        redirect('polygon');
    }
}