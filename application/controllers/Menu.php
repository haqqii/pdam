<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        if (!$_SESSION['username']) {
            redirect('auth');
        }else {
            
        $page_data['title'] = 'Menu';
        $page_data['page_name'] = 'index';
        $page_data['user'] = 'menu';

        $page_data['user_menu'] =$this->db->query("SELECT * FROM user_menu JOIN user_access_menu on user_access_menu.menu_id = user_menu.id")->result_array();;
    
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
    
        if ($this->form_validation->run() == false) {
    
            $this->load->view('index', $page_data);
        } else {
            // insert menu
            $data['menu'] = htmlspecialchars($this->input->post('menu'));
            $this->db->insert('user_menu', $data);
            $data_menu = $this->db->get_where('user_menu', array('menu' => $this->input->post('menu')))->result_array();
            $data2['menu_id'] = $data_menu[0]['id'];
            $data2['role_id'] = $this->input->post('role');

            $this->db->insert('user_access_menu', $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added </div>');
            redirect('menu');
        }
        }
    }
    public function ubah($id){
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        
        if ($this->form_validation->run() == false) {
            redirect('menu');
        } else {
            $data = [
                'menu' => htmlspecialchars($this->input->post('menu')),
            ];
            $this->db->where('id', $id);
            $this->db->update('user_menu',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diubah </div>');
            redirect('menu');
        }
    }
    public function hapus($id){
            $this->db->where('id', $id);
            $this->db->delete('user_menu');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil dihapus </div>');
            redirect('menu');
    }

    public function sub_menu()
    {
        if (!$_SESSION['username']) {
            redirect('auth');
        }else {
            
        $page_data['title'] = 'Sub Menu';
        $page_data['page_name'] = 'sub_menu';
        $page_data['user'] = 'menu';
        $page_data['user_sub_menu'] = $this->db->get('user_sub_menu')->result_array();
    
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
    
        if ($this->form_validation->run() == false) {
    
            $this->load->view('index', $page_data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added </div>');
            redirect('menu/sub_menu');
        }
        }
    }
    public function ubah_sub_menu($id){
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu Gagal Diubah! </div>');
            redirect('menu/sub_menu');
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title')),
                'url' =>$this->input->post('url'),
                'icon' => $this->input->post('icon')
            ];
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diubah </div>');
            redirect('menu/sub_menu');
        }
    }


}
