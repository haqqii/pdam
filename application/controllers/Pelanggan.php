<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $user = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');
        if (!$user OR $role != 3) {
            redirect('/');
        }
    }

    public function index()
    {
        $page_data['title'] = 'Pelanggan';
        $page_data['user'] = 'pelanggan';
        $page_data['page_name'] = 'index';
        $this->load->view('index', $page_data);
    }

    public function pengaduan($param1 = '', $id = '')
    {
        if ($param1 == 'create') {
            $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
            $data = [
                'kode' => htmlspecialchars($this->input->post('kode')),
                'jenis' => htmlspecialchars($this->input->post('jenis')),
                'alamat' => $this->db->get_where('user', array('id' =>$this->session->userdata('id')))->row()->address,
                'nohp' => $this->db->get_where('user', array('id' =>$this->session->userdata('id')))->row()->nohp,
                'id_user' => $this->session->userdata('name'),
                'tanggal' => date('Y-m-d'),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
                'status' => 'Pending',
                'Petugas' => 'Sinyo',

            ];

            $input_image = $this->input->post('foto');
            // cek gambar
            if (!$input_image) {
                $data['foto'] = '';
            } else {
                $data['foto'] = substr(md5(rand(100000000, 200000000)), 0, 10);
            }
            $simpan = $this->db->insert('pengaduan', $data);
            $sql = $this->db->get_where('pengaduan', array('id' => $this->db->insert_id()))->row();
            // menyimpan gambar
            $image = $sql->foto;
            move_uploaded_file($_FILES['foto']['tmp_name'], 'img/pengaduan/' . $image . '.jpg');

            if ($simpan) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Data Berhasil disimpan </div>');
                redirect(base_url() . 'pelanggan/notif/' . $sql->kode, 'refresh');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-check"></i>Data Gagal disimpan </div>');
                redirect(base_url() . 'pelanggan/pengaduan/', 'refresh');
            }
        }

        // if ($param1 == 'delete') {
        //     $this->db->where('id', $id);
        //     $this->db->delete('pengaduan');
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-check"></i>Data Berhasil disimpan </div>');
        //     redirect(base_url() . 'admin/kelola_user/', 'refresh');
        // }

        // if ($param1 == 'ubah') {
        //     $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        //         'is_unique' => 'Email ini sudah terdaftar'
        //     ]);
        //     $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
        //         'is_unique' => 'Username ini sudah terdaftar'
        //     ]);
        //     $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
        //         'min_length' => 'Password to sort!'
        //     ]);
        //     $data = [
        //         'name' => htmlspecialchars($this->input->post('nama')),
        //         'email' => htmlspecialchars($this->input->post('email')),
        //         'username' => htmlspecialchars($this->input->post('username')),
        //         'nohp' => $this->input->post('nohp'),
        //         'address' => htmlspecialchars($this->input->post('alamat')),
        //         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        //         'is_active' => $this->input->post('is_active'),
        //         'role_id' => $this->input->post('role_id'),
        //         'date_created' => time()

        //     ];
        //     $image = $this->db->get_where('user', array('id' => $id))->row()->image;
        //     $input_image = $this->input->post('foto');
        //     // cek gambar
        //     if (!$image || !$input_image) {
        //         $data['image'] = '';
        //     }else{
        //         $data['image'] = substr(md5(rand(100000000, 200000000)), 0, 10);
        //     }
        //     $this->db->where('id', $id);
        //     $this->db->update('user', $data);
        //     // menyimpan gambar
        //     $image = $this->db->get_where('user', array('id' => $id))->row()->image;
        //     move_uploaded_file($_FILES['foto']['tmp_name'], 'img/user/' . $image . '.jpg');
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Data Berhasil disimpan </div>');
        //     redirect(base_url() . 'admin/kelola_user/', 'refresh');
        // }

        $page_data['title'] = 'Form Pengaduan';
        $page_data['user'] = 'pelanggan';
        $page_data['page_name'] = 'form_pengaduan';
        $this->load->view('index', $page_data);
    }

    public function notif($kode = '')
    {
        $page_data['title'] = 'Kode';
        $page_data['user'] = 'pelanggan';
        $page_data['kode'] = $kode;
        $page_data['page_name'] = 'notif';
        $this->load->view('index', $page_data);
    }

    public function monitoring_pengaduan()
    {
        $page_data['title'] = 'Monitor Pengaduan';
        $page_data['user'] = 'pelanggan';
        $page_data['page_name'] = 'monitoring_pengaduan';
        $this->load->view('index', $page_data);
    }

    public function hasil_monitoring()
    {
        $this->form_validation->set_rules('cari', 'Cari', 'required|trim');
        $cari = $this->input->post('cari');
        $page_data['title'] = 'Monitor Pengaduan';
        $page_data['user'] = 'pelanggan';
        $page_data['query'] = $this->db->get_where('pengaduan', array('kode' => $cari))->result_array();
        $page_data['page_name'] = 'hasil_monitoring';
        $this->load->view('index', $page_data);
    }
}
