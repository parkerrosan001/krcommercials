<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactus extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->session->set_userdata('current_page', 'Contact Us');
    }

    public function index()
    {
        $data['view_to_load'] = "user/pages/contact_us";
        $data['page_title'] = "Contact Us";
        $this->load->view('user/layouts/main_layout', $data);
    }
}
