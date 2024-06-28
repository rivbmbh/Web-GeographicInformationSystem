<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_polyline extends CI_Model
{

    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tb_polyline'); // Tabel yang digunakan 
        $this->db->order_by('id', 'desc'); // Id yang di tabel 
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tb_polyline', $data);
        $info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
	    $this->session->set_flashdata('info',$info);
    }

    public function detail($id) 
    { 
        $this->db->select('*'); 
        $this->db->from('tb_polyline'); 
        $this->db->where('id', $id); 
        return $this->db->get()->row(); 
    } 

    public function edit($data) 
    { 
        $this->db->where('id', $data['id']); 
        $this->db->update('tb_polyline', $data); 
    } 
    public function delete($data) 
    { 
        $this->db->where('id', $data['id']); 
        $this->db->delete('tb_polyline', $data); 
    } 
}