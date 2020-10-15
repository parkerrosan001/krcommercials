<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_admin_id'])) {
            redirect('admin/login', 'refresh');
        }
        $this->session->set_userdata('current_page', 'Projects');

        $this->load->model('admin/ProjectModel', 'proj_m');
    }

    public function index()
    {

        $fl_page_data = $this->proj_m->fetchFLProjectPageContent();
        $cal_page_data = $this->proj_m->fetchCALProjectPageContent();

        $data['view_to_load'] = "admin/pages/project_page_content_management";
        $data['page_title'] = "Manage Project Page Content";
        $data['fl_page_data'] = $fl_page_data;
        $data['cal_page_data'] = $cal_page_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function manageProjects()
    {

        $projects_data = $this->proj_m->fetchAllProjects();

        $data['view_to_load'] = "admin/pages/manage_projects";
        $data['page_title'] = "Manage Projects";
        $data['projects_data'] = $projects_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function updateFlProjectPageContent()
    {
        if (isset($_POST['fl_project_content_updt_btn'])) {

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

            $fl_project_page_content_data = array(
                'page_heading' => $this->input->post('fl_page_heading_field'),
                'sub_text' => $this->input->post('fl_sub_text_field'),
                'branch' => 'FL',
                'banner_image' => $fl_banner_pic
            );

            $value = $this->proj_m->updateFlProjectPageContent($fl_project_page_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('fl_project_page_content_succ', 'Heads up! Project Page Content for Florida updated successfully.');
                redirect('admin/projects/', 'refresh');
            } else {
                $this->session->set_flashdata('fl_project_page_content_err', 'Oh Snap! Project Page Content for Florida is not updated. Please try again!');
                redirect('admin/projects/', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function updateCALProjectPageContent()
    {
        if (isset($_POST['cal_project_content_updt_btn'])) {

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

            $cal_project_page_content_data = array(
                'page_heading' => $this->input->post('cal_page_heading_field'),
                'sub_text' => $this->input->post('cal_sub_text_field'),
                'branch' => 'CAL',
                'banner_image' => $cal_banner_pic
            );

            $value = $this->proj_m->updateCALProjectPageContent($cal_project_page_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('cal_project_page_content_succ', 'Heads up! Project Page Content for California updated successfully.');
                redirect('admin/projects/', 'refresh');
            } else {
                $this->session->set_flashdata('cal_project_page_content_err', 'Oh Snap! Project Page Content for California is not updated. Please try again!');
                redirect('admin/projects/', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function addProject()
    {
        if (isset($_POST['project_add_btn'])) {

            $_FILES['file']['name']       = $_FILES['project_pic_field']['name'];
            $_FILES['file']['type']       = $_FILES['project_pic_field']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['project_pic_field']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['project_pic_field']['error'];
            $_FILES['file']['size']       = $_FILES['project_pic_field']['size'];

            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $attachmentData = $this->upload->data();
                $project_pic = $attachmentData['file_name'];
            }

            $project_data = array(
                'project_title' => $this->input->post('project_title_field'),
                'project_description' => $this->input->post('project_description_field'),
                'branch' => $this->input->post('project_branch_field'),
                'project_image' => $project_pic
            );

            $value = $this->proj_m->addProject($project_data);

            if ($value == true) {
                $this->session->set_flashdata('project_add_succ', 'Heads up! Project data added successfully.');
                redirect('admin/projects/manageProjects', 'refresh');
            } else {
                $this->session->set_flashdata('project_add_err', 'Oh Snap! Project data added not added. Please try again!');
                redirect('admin/projects/manageProjects', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function deleteProject($id)
    {

        $value = $this->proj_m->deleteProject($id);

        if ($value == true) {
            $this->session->set_flashdata('project_delete_succ', '<b>Heads up!</b> Project Deleted successfully.');
            redirect('admin/projects/manageProjects', 'refresh');
        } else {
            $this->session->set_flashdata('project_delete_err', '<b>Oh Snap!</b> Project is not deleted. Please try again!');
            redirect('admin/projects/manageProjects', 'refresh');
        }
    }

    public function fetchSingleProject()
    {

        $project_id = $this->input->post('id');

        $single_project_data = $this->proj_m->fetchSingleProject($project_id);

        echo json_encode(array(
            'single_project_data' => $single_project_data
        ));
    }

    public function updateProject()
    {

        $project_pic = '';
        $project_id = $this->input->post('id_field');
        $project_pic = $this->input->post('project_old_pic_field');

        $_FILES['file']['name']       = $_FILES['project_edit_image_field']['name'];
        $_FILES['file']['type']       = $_FILES['project_edit_image_field']['type'];
        $_FILES['file']['tmp_name']   = $_FILES['project_edit_image_field']['tmp_name'];
        $_FILES['file']['error']      = $_FILES['project_edit_image_field']['error'];
        $_FILES['file']['size']       = $_FILES['project_edit_image_field']['size'];

        $uploadPath = './uploads/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {

            $attachmentData = $this->upload->data();
            $project_pic = $attachmentData['file_name'];
        }

        $project_data = array(
            'project_title' => $this->input->post('project_edit_title_field'),
            'project_description' => $this->input->post('project_edit_description_field'),
            'branch' => $this->input->post('project_edit_branch_field'),
            'project_image' => $project_pic
        );

        $value = $this->proj_m->updateProject($project_data, $project_id);

        if ($value == true) {
            $this->session->set_flashdata('project_edit_succ', 'Heads up! Project updated successfully.');
            echo json_encode(array(
                'status' => 'success'
            ));
        } else {
            $this->session->set_flashdata('project_edit_err', 'Oh Snap! Project is not updated. Please try again!');
            echo json_encode(array(
                'status' => 'fail'
            ));
        }
    }
}
