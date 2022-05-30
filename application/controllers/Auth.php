<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('auth/login');
        } else {
            // jika validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        // cek username
        if (!$user) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan </div>');
            redirect('auth');
        }
        $data = [
            'id' =>$user['id'],
            'name' => $user['name'],
            'image' => $user['image'],
            'username' => $user['username'],
            'role_id' => $user['role_id'],
        ];
        // jika user ada
        if ($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                // cek password
                    if (password_verify($password, $user['password'])) {
                        // cek role
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else if($user['role_id'] == 2){
                        redirect('petugas_lapangan');
                    } else if($user['role_id'] == 3){
                        redirect('pelanggan');
                    } else if($user['role_id'] == 4){
                        redirect('kabag');
                    }else {
                        redirect('direktur');
                    }
                } else {
                    // salah password
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah! </div>');
                    redirect('auth');
                }
            } else {
                // username tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak aktif </div>');
                redirect('auth');
            }
        } else {
            // username belum terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar </div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nohp', 'Nomor Hp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has been register'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password to sort!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'username' => htmlspecialchars($this->input->post('username')),
                'nohp' => $this->input->post('nohp'),
                'address' => htmlspecialchars($this->input->post('alamat')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'role_id' => 3,
                'date_created' => time(),
                'image' => ''
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Anda sudah dibuat, Silahkan login </div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil log out </div>');
        redirect('auth');
    }
}
