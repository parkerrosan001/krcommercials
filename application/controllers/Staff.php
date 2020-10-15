<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->session->set_userdata('current_page', 'Our Staff');
        $this->load->model('admin/StaffModel', 'staff_m');
    }

    public function index()
    {

        if (isset($_SESSION['selected_branch'])) {
            if ($_SESSION['selected_branch'] == 'FL') {
                $page_data = $this->staff_m->fetchFLStaffPageContent();
                $staff_data = $this->staff_m->fetchAllStaffByBranch('FL');
            } else {
                $page_data = $this->staff_m->fetchCALStaffPageContent();
                $staff_data = $this->staff_m->fetchAllStaffByBranch('CAL');
            }
        } else {
            $page_data = $this->staff_m->fetchFLStaffPageContent();
            $staff_data = $this->staff_m->fetchAllStaffByBranch('FL');
        }

        $data['view_to_load'] = "user/pages/our_staff";
        $data['page_title'] = "Our Staff";
        $data['page_data'] = $page_data;
        $data['staff_data'] = $staff_data;
        $this->load->view('user/layouts/main_layout', $data);
    }
}
