<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Point extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //Load Dependencies 
        $this->load->model('Model_point'); // model yang diload 
        $this->load->model('Model_kecamatan'); // model yang diload
        $this->load->model('Model_kampung'); // model yang diload
    }


    public function listKampung(){
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_kecamatan = $this->input->post('id_kecamatan');
		
		$kampung = $this->Model_kampung->viewByKecamatan($id_kecamatan);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih Kampung</option>";
		
		foreach($kampung as $data){
			$lists .= "<option value='".$data->id_kampung."'>".$data->n_kampung."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_kampung'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kampung

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

    public function p_view()
    {
         //cek apakah admin sudah login atau belum
         if (!$this->session->userdata('email')) {
            redirect('auth');
        }
       
    
        $data = array(
            'judul' => 'Data Point', // Keterangan Judul
            'point' => $this->Model_point->tampil_data(), // Pembuatan variabel buat looping dari model dan function
            'content' => 'digitasi/v_point'
        );
        $this->load->view('layout/viewunion', $data, FALSE); // Template Backend
    }


    //TAMBAH DATA POINT
    public function tambah()
    {
        //cek apakah admin sudah login atau belum
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        //cek yang bisa masuk hanya admin
       

        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('id_kampung', 'Kampung', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('jenis_wisata', 'Jenis Wisata', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('marker', 'Marker', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('ket', 'Keterangan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {

            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 6000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'judul' => 'insert Data',
                    'error_upload' => $this->upload->display_errors(),
                    'content' => 'digitasi/add_point'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $infra = "Tidak Tersedia Apapun"; //jika kosong ini data yang akan masuk

                if ($this->input->post('infrastruktur') != null) //jika data tidak kosong
                    $infra = implode(', ', $this->input->post('infrastruktur'));

                $data = array(
                    'nama_objek' => $this->input->post('nama_objek'),
                    'id_kecamatan' => $this->input->post('id_kecamatan'),
                    'id_kampung' => $this->input->post('id_kampung'),
                    'jenis_wisata' => $this->input->post('jenis_wisata'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'infrastruktur' => $infra,
                    'marker' => $this->input->post('marker'),
                    'gambar' => $upload_data['uploads']['file_name'],
                    'ket' => $this->input->post('ket'),
                );

                $this->Model_point->tambah_data($data);
                redirect('point/p_view');
            }
        }
        $data = array(
            'judul' => 'Tambah Data',
            'kecamatan' => $this->Model_kecamatan->get_relasi(),
            'kampung' => $this->Model_kampung->get_relasi(),
            'content' => 'digitasi/add_point'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    // EDIT DATA POINT
    public function e_point($id = null)
    {
         //cek apakah admin sudah login atau belum
         if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        //cek yang bisa masuk hanya admin
       
        $this->form_validation->set_rules('nama_objek', 'Nama Objek', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('id_kampung', 'Kampung', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('jenis_wisata', 'Jenis Wisata', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('marker', 'Marker', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('ket', 'Keterangan', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 6000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'judul' => 'edit Data',
                    'error_upload' => $this->upload->display_errors(),
                    'point' => $this->Model_point->detail($id),
                    'content' => 'digitasi/edit_point'
                );
                $this->load->view('layout/viewunion', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                //cek jika tidak ada satupun data dari inputan checkbox maka data kosong 
                $infra = "Tidak Tersedia Apapun"; //jika kosong ini data yang akan masuk

                if ($this->input->post('infrastruktur') != null) //jika data tidak kosong
                    $infra = implode(', ', $this->input->post('infrastruktur'));

                $data = array(
                    'id' => $id,
                    'nama_objek' => $this->input->post('nama_objek'),
                    'id_kecamatan' => $this->input->post('id_kecamatan'),
                    'id_kampung' => $this->input->post('id_kampung'),
                    'jenis_wisata' => $this->input->post('jenis_wisata'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'infrastruktur' => $infra,
                    'marker' => $this->input->post('marker'),
                    'gambar' => $upload_data['uploads']['file_name'],
                    'ket' => $this->input->post('ket'),
                );
                $this->Model_point->e_point($data);
                redirect('point/p_view');
            }
            //cek jika tidak ada satupun data dari inputan checkbox maka data kosong 
            $infra = "Tidak Tersedia Apapun"; //jika kosong ini data yang akan masuk

            if ($this->input->post('infrastruktur') != null) //jika data tidak kosong
                $infra = implode(', ', $this->input->post('infrastruktur'));

            $data = array(
                'id' => $id,
                'nama_objek' => $this->input->post('nama_objek'),
                'id_kecamatan' => $this->input->post('id_kecamatan'),
                'id_kampung' => $this->input->post('id_kampung'),
                'jenis_wisata' => $this->input->post('jenis_wisata'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'infrastruktur' => $infra,
                'marker' => $this->input->post('marker'),
                'ket' => $this->input->post('ket'),
            );

            $this->Model_point->e_point($data);
            redirect('point/p_view');
        }

        $data = array(
            'judul' => 'edit Data',
            'kecamatan' => $this->Model_kecamatan->get_relasi(),
            'kampung' => $this->Model_kampung->get_relasi(),
            'point' => $this->Model_point->detail($id),
            'content' => 'digitasi/edit_point'
        );
        $this->load->view('layout/viewunion', $data, FALSE);
    }

    //DELETE
    public function delete($id)
    {
        //hapus file foto yang ada di direktori
        $file = $this->db->select('gambar')->get_where('tb_point', ['id' => $id])->row();

        // Menghapus file jika ada
        if ($file) {
            $path = FCPATH . 'assets/gambar/' . $file->gambar;
            if (file_exists($path)) {
                unlink($path);
            } 
        }
        $data = array('id' => $id);
        $this->Model_point->delete($data);
        redirect('point/p_view');
    }

    public function detail($id)
    {
        
        $data = array(
            'judul' => 'Detail Wisata',
            'kecamatan' => $this->Model_kecamatan->get_relasi(),
            'kampung' => $this->Model_kampung->get_relasi(),
            'point' => $this->Model_point->detail($id),
            'content' => 'detail_point'
        );
        $this->load->view('layout_content/viewdetail', $data, FALSE);
    }
    
}