<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edits extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model('model_course');
		$this->load->model('model_slide');
	}

	public function index() {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['usertype'] = $session_data['usertype'];
			$data['menu'] = "admin";

			$query = $this->model_course->GetCourseById();

			if ($query) {
				$data['course'] = $query;
				$slides = $this->model_slide->GetSlidesByCourse($data['course']->courseID);
			}

			if ($slides) {
				$data['slides'] = $slides;
			} else {
				$data['slides'] = array();
			}

			// If user is not admin, redirect to dashboard.
			if ($data['usertype'] != "admin") {
				$this->session->set_flashdata('denied', 'You do not have permission to view this page.');
				redirect('home', 'refresh');
			} else {
				$this->load->view('header', $data);
				$this->load->view('view_editCourse');
			}
		} else {
			 //If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	
	public function save() {
		$courseID = $this->input->get('courseID');
		$courseName = $this->input->post('courseName');
		$courseCategory = $this->input->post('courseCategory');
		$courseDescription = $this->input->post('courseDescription');

		$this->model_course->UpdateCourse($courseID, $courseName, $courseCategory, $courseDescription);

		redirect('admin#tab-courses','refresh');
	}
	
}
?>