<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_admin_id'])) {
            redirect('admin/login', 'refresh');
        }
        $this->session->set_userdata('current_page', 'Manage Content');
    }

    public function index()
    {

        $data['view_to_load'] = "admin/pages/home_page_content_management";
        $data['page_title'] = "Manage Home Page Content";
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }
}
