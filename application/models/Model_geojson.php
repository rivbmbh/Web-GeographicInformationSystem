<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_geojson extends CI_Model
{ // nama class harus sesuai dengan nama 

    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tb_geojson'); // Tabel yang digunakan 
        $this->db->order_by('id', 'asc'); // Id yang di tabel 
        return $this->db->get()->result();
    }
    //INSERT TO DB
    public function tambah_data($data)
    {
        $this->db->insert('tb_geojson', $data);
        $info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
	    $this->session->set_flashdata('info',$info);
    }
    //CEK DB
    public function detail($id) 
    { 
        $this->db->select('*'); 
        $this->db->from('tb_geojson'); 
        $this->db->where('id', $id); 
        return $this->db->get()->row(); 
    } 

     //EDIT
     public function update($data) 
     { 
         $this->db->where('id', $data['id']); 
         $this->db->update('tb_geojson', $data); 
         $info='<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
	    $this->session->set_flashdata('info',$info);
     } 

     //DELETE
     public function delete($data) 
     { 
         $this->db->where('id', $data['id']); 
         $this->db->delete('tb_geojson', $data); 
         $info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
	    $this->session->set_flashdata('info',$info);
     } 
     public function get_all_geojson()
     {
         return $this->db->get('tb_geojson')->result_array();
     }
}