<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Geojson extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek apakah admin sudah login atau belum
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
      
    
        //Load Dependencies 
        $this->load->model('Model_geojson'); // model yang diload 
    }


    public function index()
    {
        $data = array(
            'judul' => 'Data Geojson', // Keterangan Judul
            'geojson' => $this->Model_geojson->tampil_data(), // Pembuatan variabel buat looping dari model dan function
            'content' => 'geojson/v_geojson'
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }

    public function add()
    {

        $this->form_validation->set_rules('nama_objek', 'Nama Objek Wisata', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('type', 'Type Geojson', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('variabel', 'Code Geojson', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));


        if ($this->form_validation->run() == TRUE) {

            //upload file geojson
            $config['upload_path'] = './assets/geojson/';
            $config['allowed_types'] = 'geojson|js|json';
            $config['max_size'] = 50048; //50MB
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('file_geojson')) {
                $data = array(
                    'judul' => 'insert Data Geojson',
                    'error_upload' => $this->upload->display_errors(),
                    'content' => 'geojson/add_geojson'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {

                $upload_data = array('uploads' => $this->upload->data());
                $config['file_library'] = 'gd2';
                $config['source_file'] = './assets/geojson/' . $upload_data['uploads']['file_name'];
                $this->load->library('upload', $config);

                $data = array(
                    'nama_objek' =>  htmlspecialchars($this->input->post('nama_objek')),
                    'type' =>  htmlspecialchars($this->input->post('type')),
                    'variabel' =>  htmlspecialchars($this->input->post('variabel')),
                    'color' =>  htmlspecialchars($this->input->post('color')),
                    'marker' =>  htmlspecialchars($this->input->post('marker')),
                    'file_geojson' =>  $upload_data['uploads']['file_name'],
                );

                $this->Model_geojson->tambah_data($data);
                redirect('geojson');
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            }
        }
        $data = array(
            'judul' => 'Tambah Data',
            'content' => 'geojson/add_geojson'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }


    //TAMPIL FORM EDIT
    public function get($id = null)
    {
        $data = array(
            'judul' => 'Edit Data',
            'error_upload' => $this->upload->display_errors(),
            'geo' => $this->Model_geojson->detail($id),
            'content' => 'geojson/edit_geojson'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    public function edit($id = null)
    {
        $this->form_validation->set_rules('nama_objek', 'Nama Objek Wisata', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('type', 'Type Geojson', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('variabel', 'Code Geojson', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));


        if ($this->form_validation->run() == TRUE) {

            //upload file geojson
            $config['upload_path'] = './assets/geojson/';
            $config['allowed_types'] = 'geojson|js|json';
            $config['max_size'] = 60048; //60MB
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('file_geojson')) {
                $data = array(
                    'judul' => 'insert Data Geojson',
                    'error_upload' => $this->upload->display_errors(),
                    'content' => 'geojson/edit_geojson'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {

                $upload_data = array('uploads' => $this->upload->data());
                $config['file_library'] = 'gd2';
                $config['source_file'] = './assets/geojson/' . $upload_data['uploads']['file_name'];
                $this->load->library('upload', $config);

                $data = array(
                    'id' =>  htmlspecialchars($id),
                    'nama_objek' =>  htmlspecialchars($this->input->post('nama_objek')),
                    'type' =>  htmlspecialchars($this->input->post('type')),
                    'variabel' =>  htmlspecialchars($this->input->post('variabel')),
                    'color' =>  htmlspecialchars($this->input->post('color')),
                    'marker' =>  htmlspecialchars($this->input->post('marker')),
                    'file_geojson' =>  $upload_data['uploads']['file_name'],
                );
                $this->Model_geojson->update($data);
                redirect('geojson');
            }
            $data = array(
                'id' =>  htmlspecialchars($id),
                'nama_objek' =>  htmlspecialchars($this->input->post('nama_objek')),
                'type' =>  htmlspecialchars($this->input->post('type')),
                'variabel' =>  htmlspecialchars($this->input->post('variabel')),
                'color' =>  htmlspecialchars($this->input->post('color')),
                'marker' =>  htmlspecialchars($this->input->post('marker')),
                // 'file_geojson' =>  $upload_data['uploads']['file_name'],
            );

            $this->Model_geojson->update($data);
            redirect('geojson');
        }
        $data = array(
            'judul' => 'Edit Data',
            'geo' => $this->Model_geojson->detail($id),
            'content' => 'geojson/edit_geojson'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }


    //DELETE
    public function delete($id)
    {
        $file = $this->db->select('file_geojson')->get_where('tb_geojson', ['id' => $id])->row();

        // Menghapus file jika ada
        if ($file) {
            $path = FCPATH . 'assets/geojson/' . $file->file_geojson;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $data = array('id' => $id);
        $this->Model_geojson->delete($data);
        // $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !!!');
        redirect('geojson');
    }
}