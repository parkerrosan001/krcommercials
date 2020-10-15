<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_admin_id'])) {
            redirect('admin/login', 'refresh');
        }
        $this->session->set_userdata('current_page', 'Services');

        $this->load->model('admin/ServiceModel', 'service_m');
    }

    public function index()
    {

        $fl_page_data = $this->service_m->fetchFLServicesPageContent();
        $cal_page_data = $this->service_m->fetchCALServicesPageContent();

        $data['view_to_load'] = "admin/pages/services_page_content_management";
        $data['page_title'] = "Manage Services Page Content";
        $data['fl_page_data'] = $fl_page_data;
        $data['cal_page_data'] = $cal_page_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function manageServices()
    {

        $services_data = $this->service_m->fetchAllServices();

        $data['view_to_load'] = "admin/pages/manage_services";
        $data['page_title'] = "Manage Services";
        $data['services_data'] = $services_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function updateFlServicesPageContent()
    {
        if (isset($_POST['fl_services_content_updt_btn'])) {

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

            $fl_services_page_content_data = array(
                'page_heading' => $this->input->post('fl_page_heading_field'),
                'sub_text' => $this->input->post('fl_sub_text_field'),
                'branch' => 'FL',
                'banner_image' => $fl_banner_pic
            );

            $value = $this->service_m->updateFlServicesPageContent($fl_services_page_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('fl_services_page_content_succ', 'Heads up! Services Page Content for Florida updated successfully.');
                redirect('admin/services/', 'refresh');
            } else {
                $this->session->set_flashdata('fl_services_page_content_err', 'Oh Snap! Services Page Content for Florida is not updated. Please try again!');
                redirect('admin/services/', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function updateCALServicesPageContent()
    {
        if (isset($_POST['cal_services_content_updt_btn'])) {

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

            $cal_services_page_content_data = array(
                'page_heading' => $this->input->post('cal_page_heading_field'),
                'sub_text' => $this->input->post('cal_sub_text_field'),
                'branch' => 'CAL',
                'banner_image' => $cal_banner_pic
            );

            $value = $this->service_m->updateCALServicesPageContent($cal_services_page_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('cal_services_page_content_succ', 'Heads up! Services Page Content for California updated successfully.');
                redirect('admin/services/', 'refresh');
            } else {
                $this->session->set_flashdata('cal_services_page_content_err', 'Oh Snap! Services Page Content for California is not updated. Please try again!');
                redirect('admin/services/', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function addServices()
    {
        if (isset($_POST['services_add_btn'])) {

            $services_data = array(
                'service_type' => $this->input->post('services_type_field'),
                'service_title' => $this->input->post('services_title_field'),
                'service_description' => $this->input->post('services_description_field'),
                'branch' => $this->input->post('services_branch_field')
            );

            $value = $this->service_m->addServices($services_data);

            if ($value == true) {
                $this->session->set_flashdata('services_add_succ', 'Heads up! Services data added successfully.');
                redirect('admin/services/manageServices', 'refresh');
            } else {
                $this->session->set_flashdata('staff_add_err', 'Oh Snap! Staff data is not added. Please try again!');
                redirect('admin/services/manageServices', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function deleteService($id)
    {

        $value = $this->service_m->deleteService($id);

        if ($value == true) {
            $this->session->set_flashdata('services_delete_succ', '<b>Heads up!</b> Service Deleted successfully.');
            redirect('admin/services/manageServices', 'refresh');
        } else {
            $this->session->set_flashdata('staff_delete_err', '<b>Oh Snap!</b> Service is not deleted. Please try again!');
            redirect('admin/services/manageServices', 'refresh');
        }
    }

    public function fetchSingleService()
    {

        $service_id = $this->input->post('id');

        $single_service_data = $this->service_m->fetchSingleService($service_id);

        echo json_encode(array(
            'single_service_data' => $single_service_data
        ));
    }

    public function updateServices()
    {
        $service_id = $this->input->post('id_field');

        $service_data = array(
            'service_type' => $this->input->post('services_edit_type_field'),
            'service_title' => $this->input->post('service_edit_title_field'),
            'service_description' => $this->input->post('service_edit_description_field'),
            'branch' => $this->input->post('service_edit_branch_field')
        );

        $value = $this->service_m->updateService($service_data, $service_id);

        if ($value == true) {
            $this->session->set_flashdata('service_edit_succ', 'Heads up! Service updated successfully.');
            echo json_encode(array(
                'status' => 'success'
            ));
        } else {
            $this->session->set_flashdata('service_edit_err', 'Oh Snap! Service is not updated. Please try again!');
            echo json_encode(array(
                'status' => 'fail'
            ));
        }
    }
}
