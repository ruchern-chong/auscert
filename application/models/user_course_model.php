<?php

Class user_course_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function validate() {
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',$this->input->post('password'));

		$query = $this->db->get('user');

		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	public function GetUserCourses() {
		$this->db->select('*');
		// $this->db->from('user_courses');
		$this->db->join('courses', 'courses.courseID = user_courses.courseID', "INNER");
		$this->db->where('userID', $this->session->userdata['logged_in']['userID']);
		$query = $this->db->get('user_courses');
		// $query = $this->db->get();
		return $query->result();
	}

	public function GetNumberOfCourses() {
		$this->db->where('userID', $this->session->userdata['logged_in']['userID']);
		$query = $this->db->get('user_courses');
		return $query->num_rows;
	}
}
?>