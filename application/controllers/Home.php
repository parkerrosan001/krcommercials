<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->session->set_userdata('current_page', 'Home');
		$this->load->model('admin/ProjectModel', 'proj_m');
		$this->load->model('admin/ServiceModel', 'service_m');
		$this->load->model('admin/ContentModel', 'content_m');
	}

	public function index()
	{
		if (!isset($_SESSION['selected_branch'])) {
			$this->session->set_userdata('selected_branch', 'FL');
		} else {
			$_SESSION['selected_branch'] = 'FL';
		}

		$data['page_title'] = "KR Commercial Interiors Inc.";
		$this->load->view('user/pages/splash_screen', $data);
	}

	public function landing($branch)
	{
		if (isset($branch)) {
			if (!isset($_SESSION['selected_branch'])) {
				$this->session->set_userdata('selected_branch', $branch);
			} else {
				$_SESSION['selected_branch'] = $branch;
			}
		} else {
			if (!isset($_SESSION['selected_branch'])) {
				$this->session->set_userdata('selected_branch', 'FL');
			} else {
				$_SESSION['selected_branch'] = 'FL';
			}
		}


		redirect('home/homePage');
	}

	public function homePage()
	{

		if (isset($_SESSION['selected_branch'])) {
			if ($_SESSION['selected_branch'] == 'FL') {
				$projects_data = $this->proj_m->fetchAllProjectsByBranch('FL');
				$proj_page_data = $this->proj_m->fetchFLProjectPageContent();
				$services_data = $this->service_m->fetchAllProjectServicesByBranch('FL');
				$ser_page_data = $this->service_m->fetchFLServicesPageContent();
				$slider_data = $this->content_m->fetchFLSliders();
				$welcome_section_data = $this->content_m->fetchFLWelcomeSectionContent();
				$special_section_data = $this->content_m->fetchFLSpecialSectionContent();
				$contact_us_data = $this->content_m->fetchFlContactUsContent();
			} else {
				$projects_data = $this->proj_m->fetchAllProjectsByBranch('CAL');
				$proj_page_data = $this->proj_m->fetchFLProjectPageContent();
				$services_data = $this->service_m->fetchAllProjectServicesByBranch('CAL');
				$ser_page_data = $this->service_m->fetchFLServicesPageContent();
				$slider_data = $this->content_m->fetchCALSliders();
				$welcome_section_data = $this->content_m->fetchCALWelcomeSectionContent();
				$special_section_data = $this->content_m->fetchCALSpecialSectionContent();
				$contact_us_data = $this->content_m->fetchCalContactUsContent();
			}
		} else {
			$projects_data = $this->proj_m->fetchAllProjectsByBranch('FL');
			$proj_page_data = $this->proj_m->fetchFLProjectPageContent();
			$services_data = $this->service_m->fetchAllProjectServicesByBranch('FL');
			$ser_page_data = $this->service_m->fetchFLServicesPageContent();
			$slider_data = $this->content_m->fetchFLSliders();
			$welcome_section_data = $this->content_m->fetchFLWelcomeSectionContent();
			$special_section_data = $this->content_m->fetchFLSpecialSectionContent();
			$contact_us_data = $this->content_m->fetchFlContactUsContent();
		}

		$data['view_to_load'] = "user/pages/landing";
		$data['page_title'] = "Home";
		$data['projects_data'] = $projects_data;
		$data['proj_page_data'] = $proj_page_data;
		$data['services_data'] = $services_data;
		$data['ser_page_data'] = $ser_page_data;
		$data['slider_data'] = $slider_data;
		$data['special_section_data'] = $special_section_data;
		$data['welcome_section_data'] = $welcome_section_data;
		$data['contact_us_data'] = $contact_us_data;
		$this->load->view('user/layouts/main_layout', $data);
	}
}
