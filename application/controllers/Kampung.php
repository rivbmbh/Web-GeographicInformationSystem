<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kampung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek apakah admin sudah login atau belum
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    
        //Load Dependencies 
        $this->load->model('Model_kampung'); // model yang diload 
        $this->load->model('Model_kecamatan'); // model yang diload 

    }
    public function index()
    {
        $data = array(
            'judul' => 'Data Kampung',
            'kampung' => $this->Model_kampung->get_relasi(),
            'content' => 'kecamatanKampung/v_kampung'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    public function tambah()
    {
    
        $this->form_validation->set_rules('n_kampung[]', 'Nama Kampung', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {

            $idKecamatan = $this->input->post('id_kecamatan');
            $namaKampung = $this->input->post('n_kampung');
            $this->Model_kampung->tambah_data($idKecamatan, $namaKampung);
            redirect('kampung');
            
            // $nama_kampung_array = $this->input->post('n_kampung'); 
            // $rows_inserted = $this->Model_kampung->tambah_data($nama_kampung_array);
            
            // if ($rows_inserted > 0) {
            //     echo "<script>
            //     alert('Data berhasil ditambahkan');
            // </script>";
            // redirect('kampung'); 
            // } else {
            //     echo "Terjadi kesalahan saat memasukkan data.";
            // }
                // $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
              
        }
        $data = array(
            'judul' => 'Tambah Data Kampung',
            'kecamatan' => $this->Model_kecamatan->get_relasi(),
            'content' => 'kecamatanKampung/add_kampung'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

// EDIT DATA KAMPUNG
public function edit($id = null)
{
    $this->form_validation->set_rules('n_kampung[]', 'Nama Kampung', 'required', array(
        'required' => '%s Harus Diisi !!!'
    ));
    

    if ($this->form_validation->run() == TRUE) {
       
            $data = array(
                'judul' => 'edit Kampung',
                'error_upload' => $this->upload->display_errors(),
                'kecamatan' => $this->Model_kecamatan->get_relasi(),
                'kampung' => $this->Model_kampung->detail($id),
                'content' => 'kecamatanKampung/edit_kampung'
            );
            $this->load->view('layout/viewunion', $data, FALSE);
            
            $data = array(
                'id_kampung' => $id,
                'id_kecamatan' => $this->input->post('id_kecamatan'),
                'n_kampung' => $this->input->post('n_kampung'),
    
            );
            $this->Model_kampung->e_kampung($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil diperbarui !!!');
            redirect('kampung');
    
    
        $data = array(
            'id_kampung' => $id,
            'id_kecamatan' => $this->input->post('id_kecamatan'),
            'n_kampung' => $this->input->post('n_kampung'),
           
        );
    
        $this->Model_kampung->e_kampung($data);
        redirect('kampung');
        } 
           
    

    $data = array(
        'judul' => 'edit Data',
        'kecamatan' => $this->Model_kecamatan->get_relasi(),
        'kampung' => $this->Model_kampung->detail($id),
        'content' => 'kecamatanKampung/edit_kampung'
    );
    $this->load->view('layout/viewunion', $data, FALSE);
}


    public function delete($id)
    {
        $data = array('id_kampung' => $id);
        $this->Model_kampung->delete($data);
        $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !!!');
        redirect('kampung');
    }

} 