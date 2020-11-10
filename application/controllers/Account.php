<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends MY_Controller
{
    public $contact_us_data;

    public function __construct()
    {
        parent::__construct();

        $this->load->model("user/AccountModel", "acc_m");
        $this->session->set_userdata('current_page', 'Account');
        $this->load->model('admin/ContentModel', 'content_m');

        if (isset($_SESSION['selected_branch'])) {
            if ($_SESSION['selected_branch'] == 'FL') {
                $this->contact_us_data = $this->content_m->fetchFlContactUsContent();
            } else {
                $this->contact_us_data = $this->content_m->fetchCalContactUsContent();
            }
        } else {
            $this->contact_us_data = $this->content_m->fetchFlContactUsContent();
        }
    }

    public function index()
    {

        if (!isset($_SESSION['logged_in_id'])) {

            $this->session->set_userdata('current_page', 'Sign-In');

            $data['view_to_load'] = "user/pages/signin";
            $data['page_title'] = "Sign-In";
            $data['contact_us_data'] = $this->contact_us_data;
            $this->load->view('user/layouts/main_layout', $data);
        } else {

            redirect('account/myAccount', 'refresh');
        }
    }

    public function userLoginValidate()
    {

        if (isset($_POST['user_login_btn'])) {

            $email = $this->input->post('email_field');
            $password = $this->input->post('password_field');

            $data = array(
                'email' => $email,
                'password' => md5($password),
                'role' => 'User',
            );

            $user_data = $this->acc_m->userLoginValidate($data);

            if ($user_data == false) {

                $this->session->set_flashdata("login_err", "Oh Snap! Login Failed. Please try again!");
                redirect('account', 'refresh');
            } else {

                if ($user_data->status == 'In-Active') {
                    $this->session->set_flashdata("login__status_err", "Oh Snap! Your Account is disabled. Please contact administrator!");
                    redirect('account', 'refresh');
                } else {
                    $user_id = $user_data->id;
                    $user_email = $user_data->email;
                    $user_name = $user_data->user_full_name;
                    $user_pic = $user_data->user_pic;
                    $user_branch = $user_data->user_branch;

                    $this->session->set_userdata('logged_in_id', $user_id);
                    $this->session->set_userdata('logged_in_email', $user_email);
                    $this->session->set_userdata('logged_in_name', $user_name);
                    $this->session->set_userdata('logged_in_pic', $user_pic);
                    $this->session->set_userdata('logged_in_user_branch', $user_branch);

                    redirect('account/myAccount', 'refresh');
                }
            }
        } else {
            $this->index();
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('logged_in_id');
        $this->session->unset_userdata('logged_in_email');
        $this->session->unset_userdata('logged_in_name');
        $this->session->unset_userdata('logged_in_pic');

        session_destroy();

        redirect('home', 'refresh');
    }

    public function signup()
    {

        if (!isset($_SESSION['logged_in_id'])) {

            $this->session->set_userdata('current_page', 'Sign-Up');

            $data['view_to_load'] = "user/pages/signup";
            $data['page_title'] = "Sign-Up";
            $data['contact_us_data'] = $this->contact_us_data;
            $this->load->view('user/layouts/main_layout', $data);
        } else {

            redirect('account/myAccount', 'refresh');
        }
    }

    public function userSignUp()
    {

        if (isset($_POST['user_register_btn'])) {

            $this->form_validation->set_rules('full_name_field', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('phone_field', 'Phone #', 'required');
            $this->form_validation->set_rules('email_field', 'Email', 'trim|required');
            $this->form_validation->set_rules('password_field', 'Password', 'trim|required|min_length[6]|alpha_numeric');
            $this->form_validation->set_rules('confirm_password_field', 'Confirm Password', 'trim|required|min_length[6]|alpha_numeric|matches[password_field]');

            if ($this->form_validation->run() == TRUE) {


                $email = $this->input->post('email_field');
                $password = $this->input->post('password_field');
                $user_full_name = $this->input->post('full_name_field');
                $user_phone = $this->input->post('phone_field');
                $branch_field = $this->input->post('branch_field');

                $is_exist = $this->acc_m->checkEmailAddress($email);

                if ($is_exist == false) {

                    $user_data = $this->acc_m->registerUser($email, $password, $user_full_name, $user_phone, $branch_field);

                    if ($user_data == false) {

                        $this->session->set_flashdata("signup_err", "Oh Snap! Signup Failed. Please try again!");
                        redirect('account/signup', 'refresh');
                    } else {

                        $user_id = $user_data->id;
                        $user_email = $user_data->email;
                        $user_name = $user_data->user_full_name;
                        $user_pic = $user_data->user_pic;
                        $user_branch = $user_data->user_branch;

                        $this->session->set_userdata('logged_in_id', $user_id);
                        $this->session->set_userdata('logged_in_email', $user_email);
                        $this->session->set_userdata('logged_in_name', $user_name);
                        $this->session->set_userdata('logged_in_pic', $user_pic);
                        $this->session->set_userdata('logged_in_user_branch', $user_branch);

                        $this->session->set_flashdata("signup_succ", "Heads Up! Your account has been created.");

                        redirect('account/myAccount', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata("signup_err", "Oh Snap! This email is already taken. Please try again!");
                    redirect('account/signup', 'refresh');
                }
            } else {
                $this->signup();
            }
        } else {
            $this->index();
        }
    }

    public function forgotPassword()
    {

        $this->session->set_userdata('current_page', 'Forgot Password');

        $data['view_to_load'] = "user/pages/forgot_password";
        $data['page_title'] = "Forgot Password";
        $data['contact_us_data'] = $this->contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }

    public function sendResetPin()
    {

        if (isset($_POST['forget_pass_pin_btn'])) {

            $email = $this->input->post('email_field');

            $user_data = $this->acc_m->checkEmailAddress($email);

            if ($user_data == false) {

                $this->session->set_flashdata("forget_email_err", "Oh Snap! Email you provided does not exists. Please try again with a registered email!");
                redirect('account/forgotPassword', 'refresh');
            } else {

                $pin = rand(1000, 9999);
                $this->session->set_userdata('reset_pin', $pin);
                $this->session->set_userdata('user_email', $email);

                $host = 'smtp.hostinger.com';
                $user = 'support@appvelo.com';
                $password = 'support';
                $from = 'support@appvelo.com';
                $to = $user_data->email;

                $this->load->library('email');
                $this->email->initialize(array(
                    'protocol' => 'smtp',
                    'smtp_host' => $host,
                    'smtp_user' => $user,
                    'smtp_pass' => $password,
                    'smtp_port' => 587,
                    'crlf' => "\r\n",
                    'newline' => "\r\n",
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE,
                    'smtp_timeout' => 60,
                ));

                $data['name'] = $user_data->user_full_name;
                $data['pin'] = $pin;

                $message = $this->load->view('user/pages/email_templates/forget_email', $data, true);
                $this->email->from($from, 'KR Commercial Interiors Inc.');
                $this->email->message($message);
                $this->email->subject('Rest Password Pin Code');
                $this->email->to($to);

                $res = $this->email->send();

                if ($res) {
                    $this->session->set_flashdata("forget_email_sent_succ", "Heads Up! Email with a 4 digit pin is sent. Please check you email.");
                    redirect('account/resetPassword', 'refresh');
                } else {
                    $this->session->set_flashdata("forget_email_sent_err", "Oh Snap! Email with a 4 digit pin could not be sent. Please try again!");
                    redirect('account/forgotPassword', 'refresh');
                }
            }
        } else {
            $this->forgotPassword();
        }
    }

    public function resetPassword()
    {

        $this->session->set_userdata('current_page', 'Reset Password');

        $data['view_to_load'] = "user/pages/reset_password";
        $data['page_title'] = "Reset Password";
        $data['contact_us_data'] = $this->contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }

    public function resetPasswordForm()
    {

        if (isset($_POST['reset_pass_btn'])) {

            $this->form_validation->set_rules('pin_field', 'Pin', 'required');
            $this->form_validation->set_rules('new_pass_field', 'New Password', 'trim|required|min_length[6]|alpha_numeric');
            $this->form_validation->set_rules('confirm_new_pass_field', 'Confirm New Password', 'trim|required|min_length[6]|alpha_numeric|matches[new_pass_field]');

            if ($this->form_validation->run() == TRUE) {

                $pin = $this->input->post('pin_field');
                $password = $this->input->post('new_pass_field');

                if ($pin == $_SESSION['reset_pin']) {

                    $result = $this->acc_m->resetUserPassword($password, $_SESSION['user_email']);

                    if ($result == true) {

                        $this->session->unset_userdata('reset_pin');
                        $this->session->unset_userdata('user_email');

                        $this->session->set_flashdata("reset_succ", "Heads Up! Your password is reset. Please login to continue!");
                        redirect('account/', 'refresh');
                    } else {
                        $this->session->set_flashdata("reset_err", "Oh Snap! Something went wrong. Please try again!");
                        redirect('account/resetPassword', 'refresh');
                    }
                } else {

                    $this->session->set_flashdata("pin_err", "Oh Snap! Pin code you provided does not match to one sent in email.Please try again with a valid pin code!");
                    redirect('account/resetPassword', 'refresh');
                }
            } else {
                $this->resetPassword();
            }
        } else {
            $this->resetPassword();
        }
    }

    public function myAccount()
    {

        if (isset($_SESSION['logged_in_id'])) {

            $this->session->set_userdata('current_page', 'My Account');
            $user_data = $this->acc_m->fetchMyProfile($_SESSION['logged_in_id']);

            $data['view_to_load'] = "user/pages/my_profile";
            $data['page_title'] = "My Account";
            $data['user_data'] = $user_data;
            $data['contact_us_data'] = $this->contact_us_data;
            $this->load->view('user/layouts/main_layout', $data);
        } else {

            redirect('account/', 'refresh');
        }
    }

    public function updateProfile()
    {

        if (isset($_POST['profile_update_btn'])) {

            $full_name = $this->input->post('full_name_field');
            $email = $this->input->post('email_field');
            $phone = $this->input->post('phone_field');
            $branch = $this->input->post('branch_field');
            $address = $this->input->post('address_field');

            $user_data = $this->acc_m->updateMyProfile($full_name, $email, $phone, $branch, $address);

            if ($user_data == false) {

                $this->session->set_flashdata("update_profile_err", "Oh Snap! Profile is not updated successfully. Please try again!");
                redirect('account/myAccount', 'refresh');
            } else {
                $this->session->set_flashdata("update_profile_succ", "Heads Up! Profile updated successfully.");
                redirect('account/myAccount', 'refresh');
            }
        } else {
            $this->myAccount();
        }
    }

    public function updatePassword()
    {

        if (isset($_POST['update_pass_btn'])) {

            $this->form_validation->set_rules('current_pass_field', 'Current Password', 'trim|required|min_length[6]|alpha_numeric');
            $this->form_validation->set_rules('new_pass_field', 'New Password', 'trim|required|min_length[6]|alpha_numeric');
            $this->form_validation->set_rules('c_new_pass_field', 'Confirm New Password', 'trim|required|min_length[6]|alpha_numeric|matches[new_pass_field]');

            if ($this->form_validation->run() == TRUE) {

                $current_pass = $this->input->post('current_pass_field');
                $new_pass = $this->input->post('new_pass_field');

                $result = $this->acc_m->validateCurrentPassword($_SESSION['logged_in_id'], $current_pass);

                if ($result == false) {

                    $this->session->set_flashdata("upd_pass_err", "Oh Snap! Your Current Password does not match. Please try again!");
                    redirect('account/myAccount', 'refresh');
                } else {

                    $result1 = $this->acc_m->updatePassword($_SESSION['logged_in_id'], $new_pass);

                    if ($result1 == true) {

                        redirect('account/logout', 'refresh');
                    } else {

                        $this->session->set_flashdata("upd_pass_err", "Oh Snap! Password not updated successfully. Please try again!");
                        redirect('account/myAccount', 'refresh');
                    }
                }
            } else {
                $this->myAccount();
            }
        } else {
            $this->myAccount();
        }
    }

    public function updateProfileImage()
    {
        if (isset($_POST['profile_image_btn'])) {

            $profile_pic = '';

            $_FILES['file']['name']       = $_FILES['user_image_field']['name'];
            $_FILES['file']['type']       = $_FILES['user_image_field']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['user_image_field']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['user_image_field']['error'];
            $_FILES['file']['size']       = $_FILES['user_image_field']['size'];

            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $attachmentData = $this->upload->data();
                $profile_pic = $attachmentData['file_name'];
            }

            $user_data = $this->acc_m->updateMyProfileImage($profile_pic);

            if ($user_data == false) {

                $this->session->set_flashdata("update_profile_img_err", "Oh Snap! Profile Image is not updated successfully. Please try again!");
                redirect('account/myAccount', 'refresh');
            } else {
                $this->session->set_flashdata("update_profile_img_succ", "Heads Up! Profile Image updated successfully.");
                redirect('account/myAccount', 'refresh');
            }
        } else {
            $this->myAccount();
        }
    }

    public function sendContactUsEmail()
    {

        if (isset($_POST['contact_us_btn'])) {

            $host = 'smtp.hostinger.com';
            $user = 'support@appvelo.com';
            $password = 'support';
            $from = 'support@appvelo.com';
            $to = 'nickkurat017@gmail.com';

            $this->load->library('email');
            $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => $host,
                'smtp_user' => $user,
                'smtp_pass' => $password,
                'smtp_port' => 587,
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE,
                'smtp_timeout' => 60,
            ));

            $data['name'] = $this->input->post('full_name_field');
            $data['email'] = $this->input->post('email_field');
            $data['subject'] = $this->input->post('subject_field');
            $data['message'] = $this->input->post('message_field');

            $message = $this->load->view('user/pages/email_templates/contact_us_email', $data, true);
            $this->email->from($from, 'KR Commercial Interiors Inc.');
            $this->email->message($message);
            $this->email->subject('Get in touch with us!');
            $this->email->to($to);

            $res = $this->email->send();

            if ($res) {
                $this->session->set_flashdata("contact_us_email_sent_succ", "Heads Up! Email sent successfully to KR-Commercials.");
                redirect('contactus', 'refresh');
            } else {
                $this->session->set_flashdata("contact_us_email_sent_err", "Oh Snap! Email is not sent to KR-Commercials. Please try again!");
                redirect('contactus', 'refresh');
            }
        } else {
            $this->forgotPassword();
        }
    }
}
