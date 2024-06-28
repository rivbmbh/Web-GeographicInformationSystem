<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Backend extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('email')){
            redirect('auth');
        }
    }

public function index() 
{ 
$data= array( 
'judul' => 'WebGIS', 
'content' => 'admin'
);
$this->load->view('layout/viewunion', $data, FALSE); 


} 
} 
/* End of file Backend.php */