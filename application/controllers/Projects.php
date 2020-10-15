<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->session->set_userdata('current_page', 'Projects');
        $this->load->model('admin/ProjectModel', 'proj_m');
    }

    public function index()
    {

        if (isset($_SESSION['selected_branch'])) {
            if ($_SESSION['selected_branch'] == 'FL') {
                $page_data = $this->proj_m->fetchFLProjectPageContent();
                $projects_data = $this->proj_m->fetchAllProjectsByBranch('FL');
            } else {
                $page_data = $this->proj_m->fetchCALProjectPageContent();
                $projects_data = $this->proj_m->fetchAllProjectsByBranch('CAL');
            }
        } else {
            $page_data = $this->proj_m->fetchFLProjectPageContent();
            $projects_data = $this->proj_m->fetchAllProjectsByBranch('FL');
        }

        $data['view_to_load'] = "user/pages/projects";
        $data['page_title'] = "Projects";
        $data['page_data'] = $page_data;
        $data['projects_data'] = $projects_data;
        $this->load->view('user/layouts/main_layout', $data);
    }
}
