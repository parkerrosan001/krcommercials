<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_admin_id'])) {
            redirect('admin/login', 'refresh');
        }
        $this->session->set_userdata('current_page', 'Staff');

        $this->load->model('admin/StaffModel', 'staff_m');
    }

    public function index()
    {

        $fl_page_data = $this->staff_m->fetchFLStaffPageContent();
        $cal_page_data = $this->staff_m->fetchCALStaffPageContent();

        $data['view_to_load'] = "admin/pages/staff_page_content_management";
        $data['page_title'] = "Manage Staff Page Content";
        $data['fl_page_data'] = $fl_page_data;
        $data['cal_page_data'] = $cal_page_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function manageStaff()
    {

        $staff_data = $this->staff_m->fetchAllStaff();

        $data['view_to_load'] = "admin/pages/manage_staff";
        $data['page_title'] = "Manage Staff";
        $data['staff_data'] = $staff_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function updateFlStaffPageContent()
    {
        if (isset($_POST['fl_staff_content_updt_btn'])) {

            $fl_banner_pic = '';
            $id = $this->input->post('fl_id_field');
            $fl_banner_pic = $this->input->post('fl_banner_old_pic_field');

            $_FILES['file']['name']       = $_FILES['fl_banner_pic_field']['name'];
            $_FILES['file']['type']       = $_FILES['fl_banner_pic_field']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['fl_banner_pic_field']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['fl_banner_pic_field']['error'];
            $_FILES['file']['size']       = $_FILES['fl_banner_pic_field']['size'];

            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $attachmentData = $this->upload->data();
                $fl_banner_pic = $attachmentData['file_name'];
            }

            $fl_staff_page_content_data = array(
                'page_heading' => $this->input->post('fl_page_heading_field'),
                'sub_text' => $this->input->post('fl_sub_text_field'),
                'branch' => 'FL',
                'banner_image' => $fl_banner_pic
            );

            $value = $this->staff_m->updateFlStaffPageContent($fl_staff_page_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('fl_staff_page_content_succ', 'Heads up! Staff Page Content for Florida updated successfully.');
                redirect('admin/staff/', 'refresh');
            } else {
                $this->session->set_flashdata('fl_staff_page_content_err', 'Oh Snap! Staff Page Content for Florida is not updated. Please try again!');
                redirect('admin/staff/', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function updateCALStaffPageContent()
    {
        if (isset($_POST['cal_staff_content_updt_btn'])) {

            $cal_banner_pic = '';
            $id = $this->input->post('cal_id_field');
            $cal_banner_pic = $this->input->post('cal_banner_old_pic_field');

            $_FILES['file']['name']       = $_FILES['cal_banner_pic_field']['name'];
            $_FILES['file']['type']       = $_FILES['cal_banner_pic_field']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['cal_banner_pic_field']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['cal_banner_pic_field']['error'];
            $_FILES['file']['size']       = $_FILES['cal_banner_pic_field']['size'];

            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $attachmentData = $this->upload->data();
                $cal_banner_pic = $attachmentData['file_name'];
            }

            $cal_staff_page_content_data = array(
                'page_heading' => $this->input->post('cal_page_heading_field'),
                'sub_text' => $this->input->post('cal_sub_text_field'),
                'branch' => 'CAL',
                'banner_image' => $cal_banner_pic
            );

            $value = $this->staff_m->updateCALStaffPageContent($cal_staff_page_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('cal_staff_page_content_succ', 'Heads up! Staff Page Content for California updated successfully.');
                redirect('admin/staff/', 'refresh');
            } else {
                $this->session->set_flashdata('cal_staff_page_content_err', 'Oh Snap! Staff Page Content for California is not updated. Please try again!');
                redirect('admin/staff/', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function addStaff()
    {
        if (isset($_POST['staff_add_btn'])) {

            $_FILES['file']['name']       = $_FILES['employee_pic_field']['name'];
            $_FILES['file']['type']       = $_FILES['employee_pic_field']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['employee_pic_field']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['employee_pic_field']['error'];
            $_FILES['file']['size']       = $_FILES['employee_pic_field']['size'];

            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $attachmentData = $this->upload->data();
                $staff_pic = $attachmentData['file_name'];
            }

            $staff_data = array(
                'full_name' => $this->input->post('full_name_field'),
                'designation' => $this->input->post('designation_field'),
                'facebook' => $this->input->post('facebook_field'),
                'twitter' => $this->input->post('twitter_field'),
                'google_plus' => $this->input->post('google_plus_field'),
                'branch' => $this->input->post('staff_branch_field'),
                'staff_image' => $staff_pic
            );

            $value = $this->staff_m->addStaff($staff_data);

            if ($value == true) {
                $this->session->set_flashdata('staff_add_succ', 'Heads up! Staff data added successfully.');
                redirect('admin/staff/manageStaff', 'refresh');
            } else {
                $this->session->set_flashdata('staff_add_err', 'Oh Snap! Staff data is not added. Please try again!');
                redirect('admin/staff/manageStaff', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function deleteStaff($id)
    {

        $value = $this->staff_m->deleteStaff($id);

        if ($value == true) {
            $this->session->set_flashdata('staff_delete_succ', '<b>Heads up!</b> Team Member Deleted successfully.');
            redirect('admin/staff/manageStaff', 'refresh');
        } else {
            $this->session->set_flashdata('staff_delete_err', '<b>Oh Snap!</b> Team Member is not deleted. Please try again!');
            redirect('admin/staff/manageStaff', 'refresh');
        }
    }

    public function fetchSingleStaff()
    {

        $staff_id = $this->input->post('id');

        $single_staff_data = $this->staff_m->fetchSingleStaff($staff_id);

        echo json_encode(array(
            'single_staff_data' => $single_staff_data
        ));
    }

    public function updateStaff()
    {

        $staff_pic = '';
        $staff_id = $this->input->post('id_field');
        $staff_pic = $this->input->post('staff_old_pic_field');

        $_FILES['file']['name']       = $_FILES['staff_edit_image_field']['name'];
        $_FILES['file']['type']       = $_FILES['staff_edit_image_field']['type'];
        $_FILES['file']['tmp_name']   = $_FILES['staff_edit_image_field']['tmp_name'];
        $_FILES['file']['error']      = $_FILES['staff_edit_image_field']['error'];
        $_FILES['file']['size']       = $_FILES['staff_edit_image_field']['size'];

        $uploadPath = './uploads/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {

            $attachmentData = $this->upload->data();
            $staff_pic = $attachmentData['file_name'];
        }

        $staff_data = array(
            'full_name' => $this->input->post('staff_edit_full_name_field'),
            'designation' => $this->input->post('staff_edit_designation_field'),
            'facebook' => $this->input->post('staff_edit_facebook_field'),
            'twitter' => $this->input->post('staff_edit_twitter_field'),
            'google_plus' => $this->input->post('staff_edit_google_plus_field'),
            'branch' => $this->input->post('staff_edit_branch_field'),
            'staff_image' => $staff_pic
        );

        $value = $this->staff_m->updateStaff($staff_data, $staff_id);

        if ($value == true) {
            $this->session->set_flashdata('staff_edit_succ', 'Heads up! Team Member updated successfully.');
            echo json_encode(array(
                'status' => 'success'
            ));
        } else {
            $this->session->set_flashdata('staff_edit_err', 'Oh Snap! Team Member is not updated. Please try again!');
            echo json_encode(array(
                'status' => 'fail'
            ));
        }
    }
}
