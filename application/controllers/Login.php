<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	function __construct() {
		parent::__construct();
		
		$this->load->model('model_user');
	}

	public function index() {
		$this->load->view("view_login");
	}

	public function validateLogin() {
		$username = $this->input->post('loginUsername');
		$query = $this->model_user->validate();
		
		if ($query) {
			$sess_array = array();

			foreach($query as $row)
			{
				$sess_array = array(
					'userID' => $row->userID, 
					'username' => $row->username, 
					'email' => $row->email, 
					'usertype' => $row->userType
					);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			redirect('home', 'refresh');
		} else {
			redirect('login','refresh');
		}
	}
}
?>