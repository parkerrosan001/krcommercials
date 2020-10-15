<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->session->set_userdata('current_page', 'Home');
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
		$data['view_to_load'] = "user/pages/landing";
		$data['page_title'] = "Home";
		$this->load->view('user/layouts/main_layout', $data);
	}
}
