<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_kampung extends CI_Model
{

    public function viewByKecamatan($id_kecamatan)
	{
		$this->db->where('id_kecamatan', $id_kecamatan);
		$result = $this->db->get('tb_kampung')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		return $result; 
	}
    
        public function get_relasi()
        {
            $this->db->select('*');
            $this->db->from('tb_kampung'); // Tabel yang digunakan dalam halaman: v_wisata
            $this->db->join('tb_kecamatan ', 'tb_kecamatan.id_kecamatan = tb_kampung.id_kecamatan', 'left');
            $this->db->order_by('id_kampung', 'desc');
            return $this->db->get()->result();
        }

        // TAMBAH DATA
        public function tambah_data($idKecamatan, $namaKampung)
        {
            $data = array();
            foreach ($namaKampung as $kampung) {
                if (!empty($kampung)) {
                    $data[] = array(
                        'id_kecamatan' => $idKecamatan,
                        'n_kampung' => $kampung
                    );
                }
            }
            if (!empty($data)) {
                $this->db->insert_batch('tb_kampung', $data);
                $info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses Ditambah </div>';
                $this->session->set_flashdata('info',$info);
            }
    
           
        }
    
        //CEK DB
        public function detail($id) 
        { 
            $this->db->select('*'); 
            $this->db->from('tb_kampung'); 
            $this->db->where('id_kampung', $id); 
            return $this->db->get()->row(); 
        } 
    
        //EDIT
        public function e_kampung($data) 
        { 
            $this->db->where('id_kampung', $data['id_kampung']); 
            $this->db->update('tb_kampung', $data); 
            $info='<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
            $this->session->set_flashdata('info',$info);
        } 
    
        //DELETE
        public function delete($data) 
        { 
            $this->db->where('id_kampung', $data['id_kampung']); 
            $this->db->delete('tb_kampung', $data); 
            $info='<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
            $this->session->set_flashdata('info',$info);
        } 

       
}