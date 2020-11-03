<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['logged_in_admin_id'])) {
            redirect('admin/login', 'refresh');
        }
        $this->session->set_userdata('current_page', 'Manage Content');
        $this->load->model("admin/ContentModel", "content_m");
    }

    public function index()
    {
        $fl_sliders_data = $this->content_m->fetchFLSliders();
        $cal_sliders_data = $this->content_m->fetchCALSliders();

        $data['view_to_load'] = "admin/pages/slider_content_management";
        $data['page_title'] = "Manage Slider Content";
        $data['fl_sliders_data'] = $fl_sliders_data;
        $data['cal_sliders_data'] = $cal_sliders_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function homePageContent()
    {
        $fl_welcome_section_data = $this->content_m->fetchFLWelcomeSectionContent();
        $cal_welcome_section_data = $this->content_m->fetchCALWelcomeSectionContent();
        $fl_special_section_data = $this->content_m->fetchFLSpecialSectionContent();
        $cal_special_section_data = $this->content_m->fetchCALSpecialSectionContent();

        $data['view_to_load'] = "admin/pages/home_page_content_management";
        $data['page_title'] = "Manage Home Page Content";
        $data['fl_welcome_section_data'] = $fl_welcome_section_data;
        $data['cal_welcome_section_data'] = $cal_welcome_section_data;
        $data['fl_special_section_data'] = $fl_special_section_data;
        $data['cal_special_section_data'] = $cal_special_section_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function contactUsContent()
    {

        $cal_contact_us_data = $this->content_m->fetchCalContactUsContent();
        $fl_contact_us_data = $this->content_m->fetchFlContactUsContent();

        $data['view_to_load'] = "admin/pages/contact_us_content_management.php";
        $data['page_title'] = "Contact Us Page Content";
        $data['fl_contact_us_data'] = $fl_contact_us_data;
        $data['cal_contact_us_data'] = $cal_contact_us_data;
        $this->load->view('admin/layouts/dashboard_layout', $data);
    }

    public function addFlSlider()
    {
        if (isset($_POST['add_fl_slider_btn'])) {

            $_FILES['file']['name']       = $_FILES['slider_image_fl_field']['name'];
            $_FILES['file']['type']       = $_FILES['slider_image_fl_field']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['slider_image_fl_field']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['slider_image_fl_field']['error'];
            $_FILES['file']['size']       = $_FILES['slider_image_fl_field']['size'];

            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $attachmentData = $this->upload->data();
                $fl_slider_pic = $attachmentData['file_name'];
            }

            $fl_slider_content_data = array(
                'slider_heading' => $this->input->post('heading_fl_field'),
                'slider_sub_text' => $this->input->post('sub_title_fl_field'),
                'branch' => 'FL',
                'slider_image' => $fl_slider_pic
            );

            $value = $this->content_m->addFlSlider($fl_slider_content_data);

            if ($value == true) {
                $this->session->set_flashdata('fl_slider_content_succ', 'Heads up! Slider Content for Florida added successfully.');
                redirect('admin/content/', 'refresh');
            } else {
                $this->session->set_flashdata('fl_slider_content_err', 'Oh Snap! Slider Content for Florida is not added. Please try again!');
                redirect('admin/content/', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function addCalSlider()
    {
        if (isset($_POST['add_cal_slider_btn'])) {

            $_FILES['file']['name']       = $_FILES['slider_image_cal_field']['name'];
            $_FILES['file']['type']       = $_FILES['slider_image_cal_field']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['slider_image_cal_field']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['slider_image_cal_field']['error'];
            $_FILES['file']['size']       = $_FILES['slider_image_cal_field']['size'];

            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $attachmentData = $this->upload->data();
                $cal_slider_pic = $attachmentData['file_name'];
            }

            $cal_slider_content_data = array(
                'slider_heading' => $this->input->post('heading_cal_field'),
                'slider_sub_text' => $this->input->post('sub_title_cal_field'),
                'branch' => 'CAL',
                'slider_image' => $cal_slider_pic
            );

            $value = $this->content_m->addCalSlider($cal_slider_content_data);

            if ($value == true) {
                $this->session->set_flashdata('cal_slider_content_succ', 'Heads up! Slider Content for California added successfully.');
                redirect('admin/content/', 'refresh');
            } else {
                $this->session->set_flashdata('cal_slider_content_err', 'Oh Snap! Slider Content for California is not added. Please try again!');
                redirect('admin/content/', 'refresh');
            }
        } else {
            $this->index();
        }
    }

    public function deleteSlide($id)
    {

        $value = $this->content_m->deleteSlide($id);

        if ($value == true) {
            $this->session->set_flashdata('slide_delete_succ', '<b>Heads up!</b> Slide Deleted successfully.');
            redirect('admin/content', 'refresh');
        } else {
            $this->session->set_flashdata('slide_delete_err', '<b>Oh Snap!</b> Slide is not deleted. Please try again!');
            redirect('admin/content', 'refresh');
        }
    }

    public function updateFlWelcomeSectionContent()
    {
        if (isset($_POST['fl_home_section_content_updt_btn'])) {

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

            $fl_welcome_section_content_data = array(
                'heading' => $this->input->post('fl_heading_field'),
                'description' => $this->input->post('fl_description_field'),
                'image' => $fl_banner_pic
            );

            $value = $this->content_m->updateFlWelcomeSectionContent($fl_welcome_section_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('fl_welcome_section_content_succ', 'Heads up! Welcome Section Content for Florida updated successfully.');
                redirect('admin/content/homePageContent', 'refresh');
            } else {
                $this->session->set_flashdata('fl_welcome_section_content_err', 'Oh Snap! Welcome Section Content for Florida is not updated. Please try again!');
                redirect('admin/content/homePageContent', 'refresh');
            }
        } else {
            $this->homePageContent();
        }
    }

    public function updateCalWelcomeSectionContent()
    {
        if (isset($_POST['cal_home_section_content_updt_btn'])) {

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

            $cal_home_section_content_data = array(
                'heading' => $this->input->post('cal_heading_field'),
                'description' => $this->input->post('cal_description_field'),
                'image' => $cal_banner_pic
            );

            $value = $this->content_m->updateCalWelcomeSectionContent($cal_home_section_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('cal_welcome_section_content_succ', 'Heads up! Welcome Section Content for Californai updated successfully.');
                redirect('admin/content/homePageContent', 'refresh');
            } else {
                $this->session->set_flashdata('cal_welcome_section_content_err', 'Oh Snap! Welcome Section Content for Californai is not updated. Please try again!');
                redirect('admin/content/homePageContent', 'refresh');
            }
        } else {
            $this->homePageContent();
        }
    }

    public function updateFlSpecialSectionContent()
    {
        if (isset($_POST['fl_special_section_content_updt_btn'])) {

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

            $fl_special_section_content_data = array(
                'heading' => $this->input->post('fl_heading_field'),
                'description' => $this->input->post('fl_description_field'),
                'image' => $fl_banner_pic
            );

            $value = $this->content_m->updateFlSpecialSectionContent($fl_special_section_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('fl_special_section_content_succ', 'Heads up! Specialization Section Content for Florida updated successfully.');
                redirect('admin/content/homePageContent', 'refresh');
            } else {
                $this->session->set_flashdata('fl_special_section_content_err', 'Oh Snap! Specialization Section Content for Florida is not updated. Please try again!');
                redirect('admin/content/homePageContent', 'refresh');
            }
        } else {
            $this->homePageContent();
        }
    }

    public function updateCalSpecialSectionContent()
    {
        if (isset($_POST['cal_special_section_content_updt_btn'])) {

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

            $cal_special_section_content_data = array(
                'heading' => $this->input->post('cal_heading_field'),
                'description' => $this->input->post('cal_description_field'),
                'image' => $cal_banner_pic
            );

            $value = $this->content_m->updateCalSpecialSectionContent($cal_special_section_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('cal_special_section_content_succ', 'Heads up! Specialization Section Content for Californai updated successfully.');
                redirect('admin/content/homePageContent', 'refresh');
            } else {
                $this->session->set_flashdata('cal_special_section_content_err', 'Oh Snap! Specialization Section Content for Californai is not updated. Please try again!');
                redirect('admin/content/homePageContent', 'refresh');
            }
        } else {
            $this->homePageContent();
        }
    }

    public function updateFlContactUsContent()
    {
        if (isset($_POST['fl_contact_btn'])) {

            $id = $this->input->post('fl_id_field');

            $fl_contact_us_content_data = array(
                'facebook_url' => $this->input->post('fl_facebook_field'),
                'twitter_url' => $this->input->post('fl_twitter_field'),
                'linkedin_url' => $this->input->post('fl_linkedin_field'),
                'address' => $this->input->post('fl_address_field'),
                'latitude' => $this->input->post('fl_latitude_field'),
                'longitude' => $this->input->post('fl_longitude_field'),
                'phone' => $this->input->post('fl_phone_field'),
                'fax' => $this->input->post('fl_fax_field'),
                'email' => $this->input->post('fl_email_field'),
                'short_description' => $this->input->post('fl_short_description')
            );

            $value = $this->content_m->updateFlContactUsContent($fl_contact_us_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('fl_contact_updt_succ', 'Heads up! Contact Us Content for Florida updated successfully.');
                redirect('admin/content/contactUsContent', 'refresh');
            } else {
                $this->session->set_flashdata('fl_contact_updt_err', 'Oh Snap! Contact Us Content for Florida is not updated. Please try again!');
                redirect('admin/content/contactUsContent', 'refresh');
            }
        } else {
            $this->contactUsContent();
        }
    }

    public function updateCalContactUsContent()
    {
        if (isset($_POST['cal_contact_btn'])) {

            $id = $this->input->post('cal_id_field');

            $cal_contact_us_content_data = array(
                'facebook_url' => $this->input->post('cal_facebook_field'),
                'twitter_url' => $this->input->post('cal_twitter_field'),
                'linkedin_url' => $this->input->post('cal_linkedin_field'),
                'address' => $this->input->post('cal_address_field'),
                'latitude' => $this->input->post('cal_latitude_field'),
                'longitude' => $this->input->post('cal_longitude_field'),
                'phone' => $this->input->post('cal_phone_field'),
                'fax' => $this->input->post('cal_fax_field'),
                'email' => $this->input->post('cal_email_field'),
                'short_description' => $this->input->post('cal_short_description')
            );

            $value = $this->content_m->updateCalContactUsContent($cal_contact_us_content_data, $id);

            if ($value == true) {
                $this->session->set_flashdata('cal_contact_updt_succ', 'Heads up! Contact Us Content for California updated successfully.');
                redirect('admin/content/contactUsContent', 'refresh');
            } else {
                $this->session->set_flashdata('cal_contact_updt_err', 'Oh Snap! Contact Us Content for California is not updated. Please try again!');
                redirect('admin/content/contactUsContent', 'refresh');
            }
        } else {
            $this->contactUsContent();
        }
    }
}
