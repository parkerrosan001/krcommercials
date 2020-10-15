<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/LoginModel", "login_m");
    }

    public function index()
    {

        if (!isset($_SESSION['logged_in_id'])) {

            $data['view_to_load'] = "admin/pages/login";
            $data['page_title'] = "Admin Login";
            $this->load->view('admin/layouts/login_layout', $data);
        } else {

            redirect('admin/dashboard', 'refresh');
        }
    }

    public function adminLoginValidate()
    {

        if (isset($_POST['admin_login'])) {

            $this->form_validation->set_rules('email_field', 'Email', 'trim|required');
            $this->form_validation->set_rules('password_field', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {

                $email = $this->input->post('email_field');
                $password = $this->input->post('password_field');

                $data = array(
                    'email' => $email,
                    'password' => md5($password),
                    'role' => 'Admin',
                    'status' => 'Active'
                );

                $admin_data = $this->login_m->adminLoginValidate($data);

                if ($admin_data == false) {

                    $this->session->set_flashdata("login_err", "Oh Snap! Login Failed. Please try again!");
                    redirect('admin/login', 'refresh');
                } else {

                    $admin_id = $admin_data->id;
                    $admin_name = $admin_data->admin_full_name;
                    $admin_pic=$admin_data->admin_pic;

                    $this->session->set_userdata('logged_in_admin_id', $admin_id);
                    $this->session->set_userdata('logged_in_name', $admin_name);
                    $this->session->set_userdata('logged_in_pic',$admin_pic);

                    redirect('admin/dashboard', 'refresh');
                }
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('logged_in_admin_id');
        $this->session->unset_userdata('logged_in_name');
        $this->session->unset_userdata('logged_in_pic');
        $this->session->unset_userdata('current_page');

        redirect('admin/login', 'refresh');
    }
}
