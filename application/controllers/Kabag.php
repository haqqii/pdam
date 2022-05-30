<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kabag extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $user = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');
		if (!$user OR $role != 4) {
			redirect('/');
		}
    }

    public function index()
    {
        $page_data['title'] = 'Kabag Langgaan';
        $page_data['user'] = 'kabag';
        $page_data['page_name'] = 'index';
        $this->load->view('index', $page_data);
    }

    public function laporan()
    {
        $page_data['title'] = 'Laporan Pengaduan';
        $page_data['user'] = 'kabag';
        $page_data['page_name'] = 'laporan';
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', 'Selesai');
        $page_data['query'] = $this->db->get('pengaduan')->result_array();
        $this->load->view('index', $page_data);
    }

    public function laporan_sambung_kembali()
    {
        $page_data['title'] = 'Laporan Sambung Kembali';
        $page_data['user'] = 'kabag';
        $page_data['page_name'] = 'laporan_sambung_kembali';
        $this->db->order_by('id', 'DESC');
        $page_data['query'] = $this->db->get('sambung_kembali')->result_array();
        $this->load->view('index', $page_data);
    }
    
    public function laporan_pemutusan_sambungan()
    {
        $page_data['title'] = 'Laporan Pemutusan Sambungan';
        $page_data['user'] = 'kabag';
        $page_data['page_name'] = 'laporan_pemutusan_sambungan';
        $this->db->order_by('id', 'DESC');
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
        $this->load->view('kabag/print_laporan', $page_data);
    }
}