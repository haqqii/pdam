<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $user = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');
		if (!$user OR $role != 1) {
			redirect('/');
		}
    }

    public function index()
    {
        $page_data['title'] = 'Admin';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'index';
        $this->load->view('index', $page_data);
    }

    public function kelola_user($param1='', $id='', $role='')
    {
        $role_id = $this->input->post('role_id');
        if ($param1 == 'create') {
            $this->form_validation->set_rules('name', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                'is_unique' => 'Email ini sudah terdaftar'
            ]);
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username ini sudah terdaftar'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
                'min_length' => 'Password to sort!'
            ]);
            $data = [
                'name' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'username' => htmlspecialchars($this->input->post('username')),
                'role_id' => htmlspecialchars($this->input->post('role_id')),
                'nohp' => htmlspecialchars($this->input->post('nohp')),
                'no_sambungan' => htmlspecialchars($this->input->post('nosambungan')),
                'address' => htmlspecialchars($this->input->post('alamat')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => $this->input->post('is_active'),
                'date_created' => time()

            ];
            
            $input_image = $this->input->post('foto');
            // cek gambar
            if (!$input_image) {
                $data['image'] = '';
            }else{
                $data['image'] = substr(md5(rand(100000000, 200000000)), 0, 10);
            }
            $this->db->insert('user', $data);
            // menyimpan gambar
            $image = $this->db->get_where('user', array('id' => $this->db->insert_id()))->row()->image;
            move_uploaded_file($_FILES['foto']['tmp_name'], 'img/user/' . $image . '.jpg');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Data Berhasil disimpan </div>');
            if ($role_id == 3) {
                redirect(base_url() . 'admin/kelola_pelanggan/', 'refresh');
            }else{
                redirect(base_url() . 'admin/kelola_user/', 'refresh');
            }
        }
        if ($param1 == 'delete') {
            $this->db->where('id', $id);
            $this->db->delete('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Data Berhasil disimpan </div>');
            if ($role == 3) {
                redirect(base_url() . 'admin/kelola_pelanggan/', 'refresh');
            }else{
                redirect(base_url() . 'admin/kelola_user/', 'refresh');
            }
        }

        if ($param1 == 'ubah') {
            $this->form_validation->set_rules('name', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                'is_unique' => 'Email ini sudah terdaftar'
            ]);
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username ini sudah terdaftar'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
                'min_length' => 'Password to sort!'
            ]);
            $pass = $this->input->post('password');
            if ($pass) {
                $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }else{
                $pass = password_hash('bismillah', PASSWORD_DEFAULT);
            }
            $data = [
                'name' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'username' => htmlspecialchars($this->input->post('username')),
                'nohp' => $this->input->post('nohp'),
                'no_sambungan' => htmlspecialchars($this->input->post('nosambungan')),
                'address' => htmlspecialchars($this->input->post('alamat')),
                'password' => $pass,
                'is_active' => $this->input->post('is_active'),
                'role_id' => $this->input->post('role_id'),
                'date_created' => time()
                
            ];
            $image = $this->db->get_where('user', array('id' => $id))->row()->image;
            $input_image = $_FILES['foto']['name'];
            // cek gambar
            if ($image == '' AND $input_image == '') {
                $data['image'] = '';
            }else{
                $data['image'] = substr(md5(rand(100000000, 200000000)), 0, 10);
            }
            $this->db->where('id', $id);
            $this->db->update('user', $data);
            // menyimpan gambar
            $image = $this->db->get_where('user', array('id' => $id))->row()->image;
            move_uploaded_file($_FILES['foto']['tmp_name'], 'img/user/' . $image . '.jpg');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Data Berhasil disimpan </div>');
            if ($role_id == 3) {
                redirect(base_url() . 'admin/kelola_pelanggan/', 'refresh');
            }else{
                redirect(base_url() . 'admin/kelola_user/', 'refresh');
            }
        }
        
        $page_data['title'] = 'Kelola User';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'kelola_user';
                                $this->db->select('*');
                                $this->db->from('user');
                                $this->db->where('role_id != 3');
        $page_data['query'] = $this->db->get()->result_array();
        $this->load->view('index', $page_data);
    }

    public function form_user()
    {
        $page_data['title'] = 'Form User';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'form_user';
        $this->load->view('index', $page_data);   
    }

    public function kelola_pelanggan()
    {
        $page_data['title'] = 'Kelola Pelanggan';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'kelola_pelanggan';
                                $this->db->select('*');
                                $this->db->from('user');
                                $this->db->where('role_id = 3');
        $page_data['query'] = $this->db->get()->result_array();
        $this->load->view('index', $page_data);
    }

    public function kelola_pengaduan($param1 = '', $id = '')
    {
        if ($param1 == 'create') {
            $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
            $this->form_validation->set_rules('user', 'Nama Pelanggan', 'required|trim');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
            $data = [
                'kode' => htmlspecialchars($this->input->post('kode')),
                'jenis' => htmlspecialchars($this->input->post('jenis')),
                'id_user' => htmlspecialchars($this->input->post('user')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'nohp' => htmlspecialchars($this->input->post('nohp')),
                'tanggal' => date('Y-m-d'),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
                'status' => 'Pending',
                'petugas' => 'Sinyo',

            ];            
            $this->db->insert('pengaduan', $data);
            $sql = $this->db->get_where('pengaduan', array('id' => $this->db->insert_id()))->row();
            redirect(base_url() . 'admin/notif/' . $sql->kode, 'refresh');
        }

        if ($param1 == 'delete') {
            $this->db->where('id', $id);
            $this->db->delete('pengaduan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Data Berhasil disimpan </div>');
            redirect(base_url() . 'admin/kelola_pengaduan/', 'refresh');
        }

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

        $page_data['title'] = 'Tabel Pengaduan';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'kelola_pengaduan';
        $page_data['query'] = $this->db->get('pengaduan')->result_array();
        $this->load->view('index', $page_data);
    }
    public function notif($kode = '')
    {
        $page_data['title'] = 'Kode';
        $page_data['user'] = 'admin';
        $page_data['kode'] = $kode;
        $page_data['page_name'] = 'notif';
        $this->load->view('index', $page_data);
    }

    public function detail_pengaduan($id='')
    {
        $page_data['title'] = 'Detail Pengaduan';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'detail_pengaduan';
                                $this->db->where('id', $id);
        $page_data['query'] = $this->db->get('pengaduan')->result_array();
        $this->load->view('index', $page_data);
    }
    
    public function form_pengaduan()
    {
        $page_data['title'] = 'Form Pengaduan';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'form_pengaduan';
        $this->load->view('index', $page_data);
    }
    
    public function form_sambung_kembali($param1='')
    {
        if ($param1 == 'create') {
            $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required|trim');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
            $this->form_validation->set_rules('no_sambungan', 'Nomor Sambungan', 'required|trim');
            $this->form_validation->set_rules('rek_bulanan', 'Rek Bulanan', 'required|trim');
            $this->form_validation->set_rules('biaya_pembukaan', 'Biaya Pembukaan', 'required|trim');
            $this->form_validation->set_rules('angsuran', 'Angsuran Sambungan', 'required|trim');
            $data = [
                'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'no_sambungan' => htmlspecialchars($this->input->post('no_sambungan')),
                'rek_bulanan' => htmlspecialchars($this->input->post('rek_bulanan')),
                'angsuran' => htmlspecialchars($this->input->post('angsuran')),
                'biaya_pembukaan' => htmlspecialchars($this->input->post('biaya_pembukaan')),
                'tanggal' => date('Y-m-d'),
                'petugas' => 'Hasan'

            ];            
            $this->db->insert('sambung_kembali', $data);
            $this->db->where('id', $this->input->post('id_pelanggan'));
            $this->db->update('user', array('is_active' => 1));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Data Berhasil disimpan </div>');
            redirect(base_url() . 'admin/form_sambung_kembali/', 'refresh');
        }
        $page_data['title'] = 'Form Sambung Kembali';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'form_sambung_kembali';
        $this->load->view('index', $page_data);
    }
    
    public function form_pemutusan_langganan($param1='')
    {
        if ($param1 == 'create') {
            $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required|trim');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
            $this->form_validation->set_rules('no_sambungan', 'Nomor Sambungan', 'required|trim');
            $this->form_validation->set_rules('rek_bulanan', 'Rek Bulanan', 'required|trim');
            $this->form_validation->set_rules('angsuran', 'Angsuran Sambungan', 'required|trim');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
            $data = [
                'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'no_sambungan' => htmlspecialchars($this->input->post('no_sambungan')),
                'rek_bulanan' => htmlspecialchars($this->input->post('rek_bulanan')),
                'angsuran' => htmlspecialchars($this->input->post('angsuran')),
                'biaya_pembukaan' => '',
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
                'tanggal' => date('Y-m-d'),
                'petugas' => 'Hasan',
                'status' => 'Pending'

            ];            
            $this->db->insert('pemutusan', $data);
            $this->db->where('id', $this->input->post('id_pelanggan'));
            $this->db->update('user', array('is_active' => 0));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Data Berhasil disimpan </div>');
            redirect(base_url() . 'admin/form_pemutusan_langganan/', 'refresh');
        }
        $page_data['title'] = 'Form Pemutusan Langganan';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'form_pemutusan_langganan';
        $this->load->view('index', $page_data);
    }

    public function monitoring_pengaduan()
    {
        $page_data['title'] = 'Monitor Pengaduan';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'monitoring_pengaduan';
        $this->load->view('index', $page_data);
    }
    
    public function hasil_monitoring()
    {
        $this->form_validation->set_rules('cari', 'Cari', 'required|trim');
        $cari = $this->input->post('cari');
        $page_data['title'] = 'Monitor Pengaduan';
        $page_data['user'] = 'admin';
        $page_data['query'] = $this->db->get_where('pengaduan', array('kode' => $cari))->result_array();
        $page_data['page_name'] = 'hasil_monitoring';
        $this->load->view('index', $page_data);
    }
    
    public function kelola_tindak_lanjut()
    {
        $page_data['title'] = 'Kelola Tindak Lanjut';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'kelola_tindak_lanjut';
        $this->db->order_by('id', 'DESC');
        $page_data['query'] = $this->db->get('pengaduan')->result_array();
        $this->load->view('index', $page_data);
    }

    public function laporan()
    {
        $tanggal = $this->input->post('tanggal');

        $page_data['title'] = 'Laporan Pengaduan';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'laporan';
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', 'Selesai');
        if ($tanggal) {
            $this->db->where('tanggal', $tanggal);    
        }else{}
        $page_data['query'] = $this->db->get('pengaduan')->result_array();
        $this->load->view('index', $page_data);
    }

    public function laporan_sambung_kembali()
    {
        $tanggal = $this->input->post('tanggal');

        $page_data['title'] = 'Laporan Sambung Kembali';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'laporan_sambung_kembali';
        $this->db->order_by('id', 'DESC');
        if ($tanggal) {
            $this->db->where('tanggal', $tanggal);    
        }else{}
        $page_data['query'] = $this->db->get('sambung_kembali')->result_array();
        $this->load->view('index', $page_data);
    }
    
    public function laporan_pemutusan_sambungan()
    {
        $tanggal = $this->input->post('tanggal');

        $page_data['title'] = 'Laporan Pemutusan Sambungan';
        $page_data['user'] = 'admin';
        $page_data['page_name'] = 'laporan_pemutusan_sambungan';
        $this->db->order_by('id', 'DESC');
        if ($tanggal) {
            $this->db->where('tanggal', $tanggal);    
        }else{}
        $page_data['query'] = $this->db->get('pemutusan')->result_array();
        $this->load->view('index', $page_data);
    }

     public function print_laporan($type='')
    {

        if ($type == 'pengaduan') {
            $this->db->order_by('id', 'DESC');
            $this->db->where('status', 'Selesai');
            $page_data['query'] = $this->db->get('pengaduan')->result_array();
        }elseif ($type == 'pemutusan') {
            $this->db->order_by('id', 'DESC');
            $page_data['query'] = $this->db->get('pemutusan')->result_array();
        }elseif ($type == 'sambung'){
            $this->db->order_by('id', 'DESC');
            $page_data['query'] = $this->db->get('pemutusan')->result_array();
        }
        $page_data['type'] = $type;
        $this->load->view('admin/print_laporan', $page_data);
    }
}