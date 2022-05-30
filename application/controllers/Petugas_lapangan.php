<?php
defined('BASEPATH') or exit('No direct script access allowed');

class petugas_lapangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $user = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');
		if (!$user OR $role != 2) {
            redirect('/');
		}
    }

    public function index()
    {
        $page_data['title'] = 'Petugas Lapangan';
        $page_data['user'] = 'petugas_lapangan';
        $page_data['page_name'] = 'index';
        $this->load->view('index', $page_data);
    }
    
    public function monitoring_pengaduan()
    {
        $page_data['title'] = 'Monitor Pengaduan';
        $page_data['user'] = 'petugas_lapangan';
        $page_data['page_name'] = 'monitoring_pengaduan';
        $this->load->view('index', $page_data);
    }
    public function hasil_monitoring()
    {
        $this->form_validation->set_rules('cari', 'Cari', 'required|trim');
        $cari = $this->input->post('cari');
        $page_data['title'] = 'Monitor Pengaduan';
        $page_data['user'] = 'petugas_lapangan';
        $page_data['query'] = $this->db->get_where('pengaduan', array('kode' => $cari))->result_array();
        $page_data['page_name'] = 'hasil_monitoring';
        $this->load->view('index', $page_data);
    }
    
    public function kelola_tindak_lanjut()
    {
        $id = $this->session->userdata('id');
        $page_data['title'] = 'Kelola Tindak Lanjut';
        $page_data['user'] = 'petugas_lapangan';
        if ($id == 36 ) {
            $this->db->order_by('id', 'DESC');
            $page_data['query_pemutusan'] = $this->db->get('pemutusan')->result_array();
            $this->db->order_by('id', 'DESC');
            $page_data['query_sambung'] = $this->db->get('sambung_kembali')->result_array();
            $page_data['page_name'] = 'kelola_pemutusan';
        }else{
            $this->db->order_by('id', 'DESC');
            $page_data['query'] = $this->db->get('pengaduan')->result_array();
            $page_data['page_name'] = 'kelola_tindak_lanjut';
        }
        $this->load->view('index', $page_data);
    }

    public function pengerjaan($param1, $id, $id_user, $cek)
    {
        if ($param1 == 'kerjakan') {
            if ($cek == 'pemutusan') {
                $this->db->where('id', $id);
                $this->db->update('pemutusan', array('petugas' => $this->session->userdata('name'), 'status' => 'Proses'));
            }else {
                $this->db->where('id', $id);
                $this->db->update('pengaduan', array('petugas' => $this->session->userdata('name'), 'status' => 'Proses'));
            }
            if ($cek == 'pemutusan') {
                $data['id_pengaduan'] = '';
                $data['id_pemutusan'] = $id;
            }else {
                $data['id_pengaduan'] = $id;
                $data['id_pemutusan'] = '';
            }
            $data['id_pelanggan'] = $id_user;
            $data['tgl_dikerjakan'] = date('Y-m-d');
            $data['tgl_selesai'] = '0000-0-0';
            $this->db->insert('tindak_lanjut', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Selamat Mengarjakan! </div>');
            redirect(base_url() . 'petugas_lapangan/kelola_tindak_lanjut/', 'refresh');
        }
        if ($param1 == 'selesaikan') {
            if ($cek == 'pemutusan') {
                $this->db->where('id', $id);
                $this->db->update('pemutusan', array('petugas' => $this->session->userdata('name'), 'status' => 'Selesai'));
                $this->db->where('id_pemutusan', $id);
                $this->db->where('id_pelanggan', $id_user);
                $this->db->update('tindak_lanjut', array('tgl_selesai' => date('Y-m-d')));
            }else {
                $cek_inputan = $this->input->post('keterangan');
                $this->db->where('id', $id);
                $this->db->update('pengaduan', array('petugas' => $this->session->userdata('name'), 'status' => 'Selesai'));
                $this->db->where('id_pengaduan', $id);
                $this->db->where('id_pelanggan', $id_user);
                $this->db->update('tindak_lanjut', array('tgl_selesai' => date('Y-m-d'), 'keterangan' => $cek_inputan));
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i>Terimakasih! </div>');
            redirect(base_url() . 'petugas_lapangan/kelola_tindak_lanjut/', 'refresh');
        }
    }
    
}