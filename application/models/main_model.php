<?php

class Main_model extends CI_Model {	


	public function __construct() {
		parent::__construct();

		
	}


	public function user_can_log_in($username, $password) {

		$data = array(
			'username' => $username ,
			'password' => $password
			);
		
		$this->db->where($data);
		$query = $this->db->get('users');

		if($query->num_rows() == 1){
			return true;
		} else {
			return false;
		}
	}

	public function get_user_type($username) {
		$this->db->where('username', $username);
		$res = $this->db->get('users');
		$res = $res->result_array();
		return $res[0]['user_type'];
	}

	public function get_users() {
		$data = $this->db->get('users');

		return $data->result_array();
	}

// Studnet Related quesries start here

    public function student_record_count() {

        return $this->db->count_all("students");
    }


	public function getstudents() {

		$data = $this->db->get('students');
		
		return $data->result_array();
	}

    public function fetch_student($limit, $start) {

        $this->db->limit($limit, $start);
        // $this->db->join('department', 'student.student_department = department.department_id');
        $query = $this->db->get("students");

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;
            }

            return $data;
        }

        return false;

    }

	public function create_user_record($user) {
		$this->db->insert('users', $user);
	}

	public function get_user_by_username($username) {
		$this->db->where('username', $username);
		$data = $this->db->get('users');

		return $data->result_array();
	}    

	public function get_user_by_id($id) {
		$this->db->where('id', $id);
		$data = $this->db->get('students');

		return $data->result_array();
	}    

    public function create_student_record($student) {
    	$this->db->insert('students', $student);
    }

    public function update_student_record($student, $id, $user_id){
    	$user = array(
    		'username' => strtolower($student['first_name']).'.'.strtolower($student['last_name']), 
    	);

    	$this->db->where('id', $id);
    	$this->db->update('students', $student);

    	$this->db->where('id', $user_id);
    	$this->db->update('users', $user);
    }

    public function fetch_student_by_id($student_id) {
    	
    	$this->db->where('id', $student_id);
    	$data = $this->db->get('students');

    	if($data->num_rows() == 1) {
    		foreach ($data->result() as $value) {
    			# code...
    			return $value;
    		}
    	}

    	return false;
    }

    public function delete_student($id) {
    	$this->db->where('id', $id);
    	$this->db->delete('students');
    }

    public function delete_user($id) {
    	$this->db->where('id', $id);
    	$this->db->delete('users');
    }




	// public function get_departments() {
	// 	$data = $this->db->get('departments');

	// 	return $data->result_array();
	// }

	// public function get_employees() {
	// 	$data = $this->db->get('employees');

	// 	return $data->result_array();
	// }

	// public function get_nationality() {
	// 	$data = $this->db->get('nationality');

	// 	return $data->result_array();
	// }

	// public function get_constants() {
	// 	$data = $this->db->get('constants');

	// 	return $data->result_array();
	// }

	// public function editAdminAccount($passwd) {
	// 	$data = array(
	// 		'password' => $passwd
	// 		);
	// 	$this->db->where('username', 'admin');
	// 	$this->db->update('users', $data);
	// }

	// public function check_position($pos) {		
	// 	$this->db->where('user_type', $pos);
	// 	$query = $this->db->get('users');

	// 	if($query->num_rows() == 1){
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function getDep($depId) {
	// 	$this->db->where('department_id', $depId);
	// 	$data = $this->db->get('departments');
	// 	$data = $data->result_array();
	// 	return $data[0]['name'];
	// }


	// public function check_department($dep) {		
	// 	$this->db->where('name', $dep);
	// 	$query = $this->db->get('departments');

	// 	if($query->num_rows() == 1){
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function create_user_account($username, $password, $user_type) {
	// 	$data = array(
	// 		'username' => $username,
	// 		'password' => $password,
	// 		'user_type' => $user_type 
	// 		);
	// 	$this->db->insert('users', $data);
	// }

	// public function create_department_account($name, $username, $password) {
	// 	$this->create_user_account($username, $password, 'Department Head');
	// 	$result = $this->db->get_where('users', array('username' => $username));
	// 	$result = $result->result_array();
	// 	$data = array(
	// 		'name' => $name,
	// 		'dep_head' => $result[0]['user_id'] 
	// 		);
	// 	$this->db->insert('departments', $data);
	// }

	// public function create_employee_account($id, $fname, $lname, $department, $gender, $banknumber, $houseAllowance, $basicsalary, $nationality) {
	// 	$data = array(
	// 		'employeeId' => $id,
	// 		'fname' => $fname, 
	// 		'lname' => $lname,
	// 		'username' => strtolower($fname) . "." . strtolower($lname),
	// 		'department' => $department, 
	// 		'gender' => $gender,
	// 		'account_number' => $banknumber,
	// 		'house_allowance' => $houseAllowance,
	// 		'basic_salary' => $basicsalary,
	// 		'nationality' => $nationality
	// 		);
	// 	$this->db->insert('employees', $data);

	// }

	// public function get_employees_for_salary() {
	// 	$data = array(
	// 		'status' => 'active',
	// 		'detail_status' => 'payroll accepted' 
	// 		);
	// 	$this->db->where($data);
	// 	$res = $this->db->get('payrolls');
	// 	$res = $res->result_array();
	// 	foreach ($res as $row) {
	// 		$this->db->where('payroll_id', $row['payroll_id']);
	// 	}
	// 	$result = $this->db->get('employees_payroll');

	// 	return $result->result_array();
	// }

	// public function get_active_payroll() {
	// 	$this->db->where('status', 'active');
	// 	$this->db->where('department', $this->session->userdata('dep_id'));
	// 	$res = $this->db->get('payrolls');
	// 	$res = $res->result_array();
	// 	return $res[0];
	// }

	// public function get_employees_payroll() {
	// 	$this->db->where('department', $this->session->userdata('dep_id'));
	// 	$this->db->where('payroll_id', $this->get_active_payroll()['payroll_id']);
	// 	$result = $this->db->get('employees_payroll');
	// 	return $result->result_array();
	// }

	// public function get_dep_id($username) {
	// 	$this->db->where('username', $username);
	// 	$res = $this->db->get('users');
	// 	$res = $res->result_array();
	// 	$this->db->where('dep_head', $res[0]['user_id']);
	// 	$result = $this->db->get('departments');
	// 	$result = $result->result_array();
	// 	return $result[0]['department_id'];
	// }

	// public function get_user_id_for_department($username) {
	// 	$this->db->where('username', $username);
	// 	$res = $this->db->get('users');
	// 	$res = $res->result_array();

	// 	return $res[0]['user_id'];
	// }


}
