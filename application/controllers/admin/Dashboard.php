<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_admin_id'])) {
            redirect('admin/login', 'refresh');
        }
        $this->session->set_userdata('current_page', 'Dashboard');
        $this->load->model("admin/DashboardModel", "dash_m");
    }

    public function index()
    {

        // $total_subscriptions_count = $this->dash_m->fetchTotalSubscriptionsCount();
        // $total_users_count = $this->dash_m->fetchTotalUsersCount();
        // $total_customer_subscriptions_count = $this->dash_m->fetchTotalCustomerSubscriptionsCount();
        // $total_subscription_orders_count = $this->dash_m->fetchTotalSubscriptionOrdersCount();
        // $total_sales = $this->dash_m->fetchTotalSales();

        // $subs_orders_data = $this->dash_m->fetchTodayOrdersThisWeek();

        $data['view_to_load'] = "admin/pages/dashboard";
        $data['page_title'] = "Dashboard";
        // $data['subs_orders_data'] = $subs_orders_data;
        // $data['total_subscriptions_count'] = $total_subscriptions_count;
        // $data['total_users_count'] = $total_users_count;
        // $data['total_customer_subscriptions_count'] = $total_customer_subscriptions_count;
        // $data['total_subscription_orders_count'] = $total_subscription_orders_count;
        // $data['total_sales'] = $total_sales;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function accountSettings()
    {

        $this->session->set_userdata('current_page', 'Account Settings');
        $admin_profile_data = $this->dash_m->fetchAdminProfile();

        $data['view_to_load'] = "admin/pages/account_settings";
        $data['page_title'] = "Account Settings";
        $data['admin_profile_data'] = $admin_profile_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function updateAdminProfile()
    {

        if (isset($_POST['admin_profile_updt_btn'])) {

            $admin_id = $_SESSION['logged_in_admin_id'];
            $admin_pic = '';

            $_FILES['file']['name']       = $_FILES['profile_image_field']['name'];
            $_FILES['file']['type']       = $_FILES['profile_image_field']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['profile_image_field']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['profile_image_field']['error'];
            $_FILES['file']['size']       = $_FILES['profile_image_field']['size'];

            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $attachmentData = $this->upload->data();
                $admin_pic = $attachmentData['file_name'];
            }

            $admin_profile_data = array(
                'admin_full_name' => $this->input->post('full_name_field'),
                'admin_address' => $this->input->post('address_field'),
                'admin_phone' => $this->input->post('number_field'),
                'admin_pic' => $admin_pic
            );

            $admin_account_data = array(
                'email' => $this->input->post('email_field')
            );

            $value = $this->dash_m->updateAdminProfile($admin_account_data, $admin_profile_data, $admin_id);

            if ($value == true) {
                $this->session->set_flashdata('admin_profile_updt_succ', 'Heads up! Profile updated successfully.');
                redirect('admin/dashboard/accountSettings', 'refresh');
            } else {
                $this->session->set_flashdata('admin_profile_updt_err', 'Oh Snap! Profile is not updated. Please try again!');
                redirect('admin/dashboard/accountSettings', 'refresh');
            }
        } else {
            $this->accountSettings();
        }
    }

    public function updateAdminPassword()
    {

        if (isset($_POST['admin_password_updt_btn'])) {

            $this->form_validation->set_rules('current_pass_field', 'Current Password', 'trim|required|min_length[6]|alpha_numeric');
            $this->form_validation->set_rules('new_pass_field', 'New Password', 'trim|required|min_length[6]|alpha_numeric');
            $this->form_validation->set_rules('confirm_pass_field', 'Confirm New Password', 'trim|required|min_length[6]|alpha_numeric|matches[new_pass_field]');

            if ($this->form_validation->run() == TRUE) {

                $admin_profile_data = $this->dash_m->fetchAdminProfile();

                if ($admin_profile_data->password == md5($this->input->post('current_pass_field'))) {

                    $admin_id = $_SESSION['logged_in_admin_id'];

                    $password_data = array(
                        'password' => md5($this->input->post('new_pass_field'))
                    );

                    $value = $this->dash_m->updateAdminPassword($password_data, $admin_id);

                    if ($value == true) {
                        $this->session->set_flashdata('admin_password_updt_succ', 'Heads up! Password Updated successfully.');
                        redirect('admin/login/logout', 'refresh');
                    } else {
                        $this->session->set_flashdata('admin_password_updt_err', 'Oh Snap! Password is not updated. Please try again!');
                        redirect('admin/dashboard/accountSettings', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('admin_password_updt_err', 'Oh Snap! Your current password does not match. Please try again!');
                    redirect('admin/dashboard/accountSettings', 'refresh');
                }
            } else {
                $this->accountSettings();
            }
        } else {
            $this->accountSettings();
        }
    }
}
