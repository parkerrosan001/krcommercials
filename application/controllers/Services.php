<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->session->set_userdata('current_page', 'Services');
        $this->load->model('admin/ServiceModel', 'service_m');
        $this->load->model('admin/ContentModel', 'content_m');
    }

    public function index()
    {

        if (isset($_SESSION['selected_branch'])) {
            if ($_SESSION['selected_branch'] == 'FL') {
                $page_data = $this->service_m->fetchFLServicesPageContent();
                $services_data = $this->service_m->fetchAllProjectServicesByBranch('FL');
                $contact_us_data = $this->content_m->fetchFlContactUsContent();
            } else {
                $page_data = $this->service_m->fetchCALServicesPageContent();
                $services_data = $this->service_m->fetchAllProjectServicesByBranch('CAL');
                $contact_us_data = $this->content_m->fetchCalContactUsContent();
            }
        } else {
            $page_data = $this->service_m->fetchFLServicesPageContent();
            $services_data = $this->service_m->fetchAllProjectServicesByBranch('FL');
            $contact_us_data = $this->content_m->fetchFlContactUsContent();
        }
        $data['view_to_load'] = "user/pages/services";
        $data['page_title'] = "Services";
        $data['page_data'] = $page_data;
        $data['services_data'] = $services_data;
        $data['contact_us_data'] = $contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }

    public function skilledTradeServices()
    {

        if (isset($_SESSION['selected_branch'])) {
            if ($_SESSION['selected_branch'] == 'FL') {
                $page_data = $this->service_m->fetchFLServicesPageContent();
                $services_data = $this->service_m->fetchAllSkilledTradeServicesByBranch('FL');
                $contact_us_data = $this->content_m->fetchFlContactUsContent();
            } else {
                $page_data = $this->service_m->fetchCALServicesPageContent();
                $services_data = $this->service_m->fetchAllSkilledTradeServicesByBranch('CAL');
                $contact_us_data = $this->content_m->fetchCalContactUsContent();
            }
        } else {
            $page_data = $this->service_m->fetchFLServicesPageContent();
            $services_data = $this->service_m->fetchAllSkilledTradeServicesByBranch('FL');
            $contact_us_data = $this->content_m->fetchFlContactUsContent();
        }
        $data['view_to_load'] = "user/pages/skilled_trade_services";
        $data['page_title'] = "Services";
        $data['page_data'] = $page_data;
        $data['services_data'] = $services_data;
        $data['contact_us_data'] = $contact_us_data;
        $this->load->view('user/layouts/main_layout', $data);
    }
}
