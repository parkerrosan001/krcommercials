<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_admin_id'])) {
            redirect('admin/login', 'refresh');
        }
        $this->session->set_userdata('current_page', 'Users');
        $this->load->model("admin/UserModel", "user_m");
    }

    public function index()
    {

        $users_data = $this->user_m->fetchAllUsers();

        $data['view_to_load'] = "admin/pages/users";
        $data['page_title'] = "All Customers";
        $data['users_data'] = $users_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function fetchSingleUser()
    {

        $user_id = $this->input->post('id');

        $single_user_data = $this->user_m->fetchSingleCustomer($user_id);

        echo json_encode(array(
            'single_user_data' => $single_user_data
        ));
    }

    public function updateUser()
    {
        $user_id = $this->input->post('id_field');

        $account_data = array(
            'email' => $this->input->post('user_edit_email_field'),
            'status' => $this->input->post('user_edit_status_field')
        );

        $user_data = array(
            'user_full_name' => $this->input->post('user_edit_name_field'),
            'user_phone' => $this->input->post('user_edit_phone_field'),
            'user_branch' => $this->input->post('user_edit_branch_field'),
            'user_address' => $this->input->post('user_edit_address_field')
        );

        $value = $this->user_m->updateUser($user_data, $account_data, $user_id);

        if ($value == true) {
            $this->session->set_flashdata('user_edit_succ', 'Heads up! User Profile updated successfully.');
            echo json_encode(array(
                'status' => 'success'
            ));
        } else {
            $this->session->set_flashdata('user_edit_err', 'Oh Snap! User Profile is not updated. Please try again!');
            echo json_encode(array(
                'status' => 'fail'
            ));
        }
    }

    public function enableUser($acc_id)
    {

        $data = array(
            'status' => 'Active'
        );

        $value = $this->user_m->enableUser($data, $acc_id);

        if ($value == true) {
            $this->session->set_flashdata('user_enable_succ', '<b>Heads up!</b> User enabled successfully.');
            redirect('admin/users/', 'refresh');
        } else {
            $this->session->set_flashdata('user_disable_err', '<b>Oh Snap!</b> User is not enabled. Please try again!');
            redirect('admin/users/', 'refresh');
        }
    }

    public function disableUser($acc_id)
    {

        $data = array(
            'status' => 'In-Active'
        );

        $value = $this->user_m->disableUser($data, $acc_id);

        if ($value == true) {
            $this->session->set_flashdata('user_disable_succ', '<b>Heads up!</b> User disabled successfully.');
            redirect('admin/users/', 'refresh');
        } else {
            $this->session->set_flashdata('user_disable_err', '<b>Oh Snap!</b> User is not disabled. Please try again!');
            redirect('admin/users/', 'refresh');
        }
    }
}
