<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactus extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->session->set_userdata('current_page', 'Contact Us');
        $this->load->model('admin/ContentModel', 'content_m');
    }

    public function index()
    {
        if (isset($_SESSION['selected_branch'])) {
            if ($_SESSION['selected_branch'] == 'FL') {
                $contact_us_data = $this->content_m->fetchFlContactUsContent();
            } else {
                $contact_us_data = $this->content_m->fetchCalContactUsContent();
            }
        } else {
            $contact_us_data = $this->content_m->fetchFlContactUsContent();
        }

        $data['view_to_load'] = "user/pages/contact_us";
        $data['page_title'] = "Contact Us";
        $data['contact_us_data'] = $contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }
}
