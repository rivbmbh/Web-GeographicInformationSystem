<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('Model_user','user_model'); 
    }

    //LOGIN ADMIN
    public function index()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'WebGIS Login';
            $this->load->view('adminLog/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('adminLog/auth_footer');
        } else {
            //validasi berhasil
            $this->_login();
        }
    }
    private function _login()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['name' => $name])->row_array();

        // jika user ada
        if ($user) {
            //usernya aktif

            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'name' => $user['name'],
                   
                ];
                $this->session->set_userdata($data);
                redirect('backend');
                
                //3
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger font-italic text-left" style="color:red;font-weight:bold" role="alert">Password anda salah!!</div>');
                redirect('auth');
            }
            //1
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger font-italic text-left" style="color:red;font-weight:bold" role="alert">Username belum terdaftar!!</div>');
            redirect('auth');
            redirect('auth');
        }
    }

    //REGISTRASI
    public function registration()
    {                                                              //spasi
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [ //pesan kesalahan
            'is_unique' => 'Email sudah terdaftar!!'
        ]);
        //password
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [ //pesan kesalahan
            'matches' => 'Password tidak sama', //password tidak sama
            'min_length' => 'Password terlalu pendek' //password terlalu pendek
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'WeBGIS Registrasi';
            $this->load->view('adminLog/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('adminLog/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),

            ];
            //insert ke DB
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message', '<div class="alert alert-success font-italic text-left text-dark" style="font-weight:bold" role="alert">Berhasil Log out!</div>');
        redirect('auth');
    }

}