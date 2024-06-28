<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        //Load Dependencies 
        $this->load->model('Model_point'); // model yang diload 
        $this->load->model('Model_polyline');
        $this->load->model('Model_polygon');
        $this->load->model('Model_geojson');
    }

    public function index()
    {
        $data = array(
            'judul' => 'WebGIS',
            'point' => $this->Model_point->tampil_data(),
            // 'alam' => $this->Model_point->tampil_alam(),
            // 'buatan' => $this->Model_point->tampil_buatan(),
            // 'sejarah' => $this->Model_point->tampil_sejarah(),
            // 'spotDiving' => $this->Model_point->tampil_spotDiving(),
            'polyline' => $this->Model_polyline->tampil_data(),
            'polygon' => $this->Model_polygon->tampil_data(),
            'geojson' => $this->Model_geojson->tampil_data(),
            'content' => 'peta',
        );
        $this->load->view('layout_content/viewunion', $data, FALSE);
    }
    public function info()
    {
        if ($feature = $this->input->get('feature')) {
            // Mendekode JSON ke dalam bentuk array
            $featureData = json_decode($feature, true);

            // Melakukan pengolahan data sesuai kebutuhan

            $objek = $featureData['properties']['nama_objek'];
            $jenis = $featureData['properties']['jenis_wisa'];
            $kecamatan = $featureData['properties']['kecamatan'];
            $kampung = $featureData['properties']['kampung'];
            $gambar = $featureData['properties']['gambar'];
            $longitude = $featureData['properties']['kordinat_x'];
            $latitude = $featureData['properties']['kordinat_y'];
            $keterangan = $featureData['properties']['keterangan'];
            $infra = $featureData['properties']['infrastruk'];


        } else {
            //for polyline
            // $nama = $featureData['properties']['Name'];

        }

        $data = [
            'objek' => $objek,
            'jenis' => $jenis,
            'kecamatan' => $kecamatan,
            'kampung' => $kampung,
            'gambar' => $gambar,
            'keterangan' => $keterangan,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'infrastruk' => $infra,
            'content' => 'detail_geojson'
        ];
        $this->load->view('layout_content/viewunion', $data, FALSE);
    }

}