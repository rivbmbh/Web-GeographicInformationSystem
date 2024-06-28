<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_kecamatan extends CI_Model
{
    public function get_relasi()
    {
        $this->db->select('*');
        $this->db->from('tb_kecamatan');
        $this->db->order_by('id_kecamatan', 'asc'); 
        return $this->db->get()->result();
    }
    public function tambah($data)
    {
        $this->db->insert('tb_kecamatan', $data);
        $info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
	    $this->session->set_flashdata('info',$info);
    }
    //CEK DB
    public function detail($id) 
    { 
        $this->db->select('*'); 
        $this->db->from('tb_kecamatan'); 
        $this->db->where('id_kecamatan', $id); 
        return $this->db->get()->row(); 
    } 

    //EDIT
    public function e_kecamatan($data) 
    { 
        $this->db->where('id_kecamatan', $data['id_kecamatan']); 
        $this->db->update('tb_kecamatan', $data); 
        $info='<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
        $this->session->set_flashdata('info',$info);
    } 
    //DELETE
    public function delete($data) 
    { 
        $this->db->where('id_kecamatan', $data['id_kecamatan']); 
        $this->db->delete('tb_kecamatan', $data); 
        $info='<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
	    $this->session->set_flashdata('info',$info);
    } 
}