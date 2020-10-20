<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FileSystem extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_admin_id'])) {
            redirect('admin/login', 'refresh');
        }
        $this->session->set_userdata('current_page', 'File System');
        $this->load->model("admin/FileSystemModel", "file_m");
    }

    public function index()
    {

        // $total_subscriptions_count = $this->file_m->fetchTotalSubscriptionsCount();
        // $total_users_count = $this->file_m->fetchTotalUsersCount();
        // $total_customer_subscriptions_count = $this->file_m->fetchTotalCustomerSubscriptionsCount();
        // $total_subscription_orders_count = $this->file_m->fetchTotalSubscriptionOrdersCount();
        // $total_sales = $this->file_m->fetchTotalSales();

        // $subs_orders_data = $this->file_m->fetchTodayOrdersThisWeek();

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
}
