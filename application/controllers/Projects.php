<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->session->set_userdata('current_page', 'Projects');
        $this->load->model('admin/ProjectModel', 'proj_m');
        $this->load->model('admin/ContentModel', 'content_m');
    }

    public function index()
    {

        if (isset($_SESSION['selected_branch'])) {
            if ($_SESSION['selected_branch'] == 'FL') {
                $page_data = $this->proj_m->fetchFLProjectPageContent();
                $projects_data = $this->proj_m->fetchAllProjectsByBranch('FL');
                $contact_us_data = $this->content_m->fetchFlContactUsContent();
            } else {
                $page_data = $this->proj_m->fetchCALProjectPageContent();
                $projects_data = $this->proj_m->fetchAllProjectsByBranch('CAL');
                $contact_us_data = $this->content_m->fetchCalContactUsContent();
            }
        } else {
            $page_data = $this->proj_m->fetchFLProjectPageContent();
            $projects_data = $this->proj_m->fetchAllProjectsByBranch('FL');
            $contact_us_data = $this->content_m->fetchFlContactUsContent();
        }

        $data['view_to_load'] = "user/pages/projects";
        $data['page_title'] = "Projects";
        $data['page_data'] = $page_data;
        $data['contact_us_data'] = $contact_us_data;
        $data['projects_data'] = $projects_data;
        $this->load->view('user/layouts/main_layout', $data);
    }
}
