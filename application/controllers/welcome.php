<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->library(array('form_validation', 'pagination'));
		$this->load->model('main_model');
	}


	public function index() {
		if($this->session->userdata('is_logged_in') == TRUE) {
			if($this->session->userdata('user_type') == "administrator") {
				redirect('welcome/adminhome');
			} else if($this->session->userdata('user_type') == "Finance Head") {
				redirect('welcome/FinanceHeadHome');
			} else if($this->session->userdata('user_type') == "Scienctific Director") {
				redirect('welcome/ScientificDirectorHome');
			} else if($this->session->userdata('user_type') == "employee") {
				redirect('welcome/EmployeeHome');
			} else if($this->session->userdata('user_type') == "Department Head") {
				redirect('welcome/DepartmentHeadHome');
			} else {
				$this->session->sess_destroy();
				$this->load->view('login_page');
			}
		} else {
				$this->load->view('login_page');
		}
	}




	public function adminhome() {
		if($this->session->userdata('is_logged_in') == TRUE) {

        	$data = array();
        	$data['heading'] = "Main Menu";
			$data['content'] = $this->load->view('admin_home', $data, true);
			$this->load->view('admin_master', $data);
		} else {
			redirect();
		}
	}


	public function DepartmentHeadHome() {
		if($this->session->userdata('is_logged_in') == TRUE) {
			$data['employees'] = $this->main_model->get_employees_payroll();
			$data['active_payroll'] = $this->main_model->get_active_payroll();

			$this->load->view('DepartmentHeadHome', $data);
		} else {
			redirect('welcome/index');
		}
	}



	public function ScientificDirectorHome() {
		if($this->session->userdata('is_logged_in') == TRUE) {
			$data['payrolls'] = $this->main_model->get_all_payrolls();
			$data['acceptedPayrolls'] = $this->main_model->get_payrolls_for_finance_head();
			$data['controller'] = $this;

			$this->load->view('ScientificDirectorHome', $data);
		} else {
			redirect('welcome/index');
		}
	}

	public function FinanceHeadHome() {
		if($this->session->userdata('is_logged_in') == TRUE) {
			$data['constants'] = $this->main_model->get_constants();
			$data['employees'] = $this->main_model->get_employees_for_salary();
			$data['payrolls'] = $this->main_model->get_payrolls_for_finance_head();
			$data['controller'] = $this;

			$this->load->view('FinanceHeadHome', $data);
		} else {
			redirect('welcome/index');
		}
	}


	public function user_validation() {

		$this->form_validation->set_rules('username', 'username', 'required|trim|callback_validate_user_credentials');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		if($this->form_validation->run()){
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => TRUE,
				'user_type' => $this->main_model->get_user_type($this->input->post('username'))
				);

			$this->session->set_userdata($data);

			if($this->session->userdata('user_type') == "administrator") {
				redirect('welcome/adminhome');
			} else if($this->session->userdata('user_type') == "Finance Head") {
				redirect('welcome/FinanceHeadHome');
			} else if($this->session->userdata('user_type') == "Scienctific Director") {
				redirect('welcome/ScientificDirectorHome');
			} else if($this->session->userdata('user_type') == "employee") {
				redirect('welcome/EmployeeHome');
			} else {
				$this->session->sess_destroy();
				redirect('welcome/index');
			}

		} else {
			$this->session->sess_destroy();
			// $error = "Your username or password is not correct";
			redirect();
		}	
	}

	public function restricted() {
		$this->load->view('restricted');
	}

	public function validate_user_credentials() {

		if($this->main_model->user_can_log_in($this->input->post('username'), $this->input->post('password'))) {
			return true;
		} else {
			return false;
		}
 
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect();
	}


// Student Related functions start here 

	public function managestudents() {

		if($this->session->userdata('is_logged_in') == TRUE) {

	        $data = array();
	        $data['heading'] = "Student List";
	        $data["base_url"] = base_url() . "welcome/managestudents";
	        $data["total_rows"] = $this->main_model->student_record_count();
	        $data["per_page"] = 3;
	        $data["uri_segment"] = 3;

	        $this->pagination->initialize($data);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	        $data["result"] = $this->main_model->fetch_student($data["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();

	        $data['content'] = $this->load->view('admin_students',$data,true);
	        $this->load->view('admin_master',$data);


		} else {
			redirect();
		}
	}

	public function addstudentform() {
		
		if($this->session->userdata('is_logged_in') == TRUE) {
			$data = array();
			$data['heading'] = "Create Student Record";
			$data['content'] = $this->load->view('admin_add_student', $data, true);
			$this->load->view('admin_master', $data);
		} else {
			redirect();
		}
	} 

	public function createstudentrecord() {
		$user = array(
			'username' => strtolower($this->input->post('first_name')).'.'.strtolower($this->input->post('last_name')), 
    		'password' => '123456',
    		'user_type' => 'student'
		);
		$this->main_model->create_user_record($user);
		$user = $this->main_model->get_user_by_username($user['username']);
 
		$student = array(
			'first_name' => $this->input->post('first_name'), 
			'last_name' => $this->input->post('last_name'),
			'grade' => $this->input->post('grade'),
			'section' => $this->input->post('section'),
			'sex' => $this->input->post('sex'),
			'kebele' => $this->input->post('kebele'),
			'family_phone_number' => $this->input->post('family_phone_number'),
			'user_id' => $user[0][id] 
		);

		$this->main_model->create_student_record($student);
		redirect('welcome/managestudents');
	}

	public function updatestudentrecord() {

		$student = array(
			'first_name' => $this->input->post('first_name'), 
			'last_name' => $this->input->post('last_name'),
			'grade' => $this->input->post('grade'),
			'section' => $this->input->post('section'),
			'sex' => $this->input->post('sex'),
			'kebele' => $this->input->post('kebele'),
			'family_phone_number' => $this->input->post('family_phone_number') 
		);

		$user = $this->main_model->get_user_by_id($this->input->post('id'));
		$this->main_model->update_student_record($student, $this->input->post('id'), $user[0]['user_id']);
		redirect('welcome/managestudents');
	}

	public function updatestudentform($student_id) {
		if($this->session->userdata('is_logged_in') == TRUE) {

	        $data = array();
	        $data['heading'] = "Update Student Details";
	        $data['result'] = $this->main_model->fetch_student_by_id($student_id);
	        $data['content'] = $this->load->view('admin_update_student',$data,true);
	        $this->load->view('admin_master',$data);
	    } else {
	    	redirect();
	    }
	}

	public function deletestudent($student_id) {
		$user = $this->main_model->get_user_by_id($student_id);
		$this->main_model->delete_student($student_id);
		$this->main_model->delete_user($user[0]['user_id']);

		redirect('welcome/managestudents');
	}

	public function viewstudentdetails($student_id) {
		if($this->session->userdata('is_logged_in') == TRUE) {


	        $data = array();
	        $data['heading'] = "View Student Details";
	        $data['result'] = $this->main_model->fetch_student_by_id($student_id);
	        $data['content'] = $this->load->view('admin_view_student_details',$data,true);
	        $this->load->view('admin_master',$data);



		} else {

		}

	}




// // Teacher Related functions start here 

// 	public function manageteachers() {

// 		if($this->session->userdata('is_logged_in') == TRUE) {

// 	        $data = array();
// 	        $data['heading'] = "Student List";
// 	        $data["base_url"] = base_url() . "welcome/manageteachers";
// 	        $data["total_rows"] = $this->main_model->student_record_count();
// 	        $data["per_page"] = 3;
// 	        $data["uri_segment"] = 3;

// 	        $this->pagination->initialize($data);
// 	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

// 	        $data["result"] = $this->main_model->fetch_student($data["per_page"], $page);
// 	        $data["links"] = $this->pagination->create_links();

// 	        $data['content'] = $this->load->view('admin_students',$data,true);
// 	        $this->load->view('admin_master',$data);


// 		} else {
// 			redirect();
// 		}
// 	}

// 	public function addstudentform() {
		
// 		if($this->session->userdata('is_logged_in') == TRUE) {
// 			$data = array();
// 			$data['heading'] = "Create Student Record";
// 			$data['content'] = $this->load->view('admin_add_student', $data, true);
// 			$this->load->view('admin_master', $data);
// 		} else {
// 			redirect();
// 		}
// 	} 

// 	public function createstudentrecord() {
// 		$user = array(
// 			'username' => strtolower($this->input->post('first_name')).'.'.strtolower($this->input->post('last_name')), 
//     		'password' => '123456',
//     		'user_type' => 'student'
// 		);
// 		$this->main_model->create_user_record($user);
// 		$user = $this->main_model->get_user_by_username($user['username']);
 
// 		$student = array(
// 			'first_name' => $this->input->post('first_name'), 
// 			'last_name' => $this->input->post('last_name'),
// 			'grade' => $this->input->post('grade'),
// 			'section' => $this->input->post('section'),
// 			'sex' => $this->input->post('sex'),
// 			'kebele' => $this->input->post('kebele'),
// 			'family_phone_number' => $this->input->post('family_phone_number'),
// 			'user_id' => $user[0][id] 
// 		);

// 		$this->main_model->create_student_record($student);
// 		redirect('welcome/managestudents');
// 	}

// 	public function updatestudentrecord() {

// 		$student = array(
// 			'first_name' => $this->input->post('first_name'), 
// 			'last_name' => $this->input->post('last_name'),
// 			'grade' => $this->input->post('grade'),
// 			'section' => $this->input->post('section'),
// 			'sex' => $this->input->post('sex'),
// 			'kebele' => $this->input->post('kebele'),
// 			'family_phone_number' => $this->input->post('family_phone_number') 
// 		);

// 		$user = $this->main_model->get_user_by_id($this->input->post('id'));
// 		$this->main_model->update_student_record($student, $this->input->post('id'), $user[0]['user_id']);
// 		redirect('welcome/managestudents');
// 	}

// 	public function updatestudentform($student_id) {
// 		if($this->session->userdata('is_logged_in') == TRUE) {

// 	        $data = array();
// 	        $data['heading'] = "Update Student Details";
// 	        $data['result'] = $this->main_model->fetch_student_by_id($student_id);
// 	        $data['content'] = $this->load->view('admin_update_student',$data,true);
// 	        $this->load->view('admin_master',$data);
// 	    } else {
// 	    	redirect();
// 	    }
// 	}

// 	public function deletestudent($student_id) {
// 		$user = $this->main_model->get_user_by_id($student_id);
// 		$this->main_model->delete_student($student_id);
// 		$this->main_model->delete_user($user[0]['user_id']);

// 		redirect('welcome/managestudents');
// 	}

// 	public function viewstudentdetails($student_id) {
// 		if($this->session->userdata('is_logged_in') == TRUE) {


// 	        $data = array();
// 	        $data['heading'] = "View Student Details";
// 	        $data['result'] = $this->main_model->fetch_student_by_id($student_id);
// 	        $data['content'] = $this->load->view('admin_view_student_details',$data,true);
// 	        $this->load->view('admin_master',$data);



// 		} else {

// 		}

// 	}






























}
