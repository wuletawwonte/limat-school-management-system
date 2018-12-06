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

// Student Related quesries start here

    public function student_record_count() {

        return $this->db->count_all("students");
    }

    public function subject_record_count() {

        return $this->db->count_all("subjects");
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

    public function fetch_subject($limit, $start) {

        $this->db->limit($limit, $start);
        // $this->db->join('department', 'student.student_department = department.department_id');
        $query = $this->db->get("subjects");

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

	public function get_student_by_id($id) {
		$this->db->where('id', $id);
		$data = $this->db->get('students');

		return $data->result_array();
	}    

    public function create_student_record($student) {
    	$this->db->insert('students', $student);
    }

    public function create_subject_record($subject) {
    	$this->db->insert('subjects', $subject);
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

    public function fetch_subject_by_id($subject_id) {
    	
    	$this->db->where('id', $subject_id);
    	$data = $this->db->get('subjects');

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

    public function edit_subject_record($subject, $id) {
    	$this->db->where('id', $id);
    	$this->db->update('subjects', $subject);
    }

    public function delete_subject($id) {
    	$this->db->where('id', $id)->delete('subjects');
    }

// Teacher Related Transaction Starts Here 


    public function teacher_record_count() {

        return $this->db->count_all("teachers");
    }


    public function fetch_teacher($limit, $start) {

        $this->db->limit($limit, $start);
        $query = $this->db->get("teachers");

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;
            }

            return $data;
        }

        return false;

    }

    public function fetch_all_subjects() {
    	$data = $this->db->get('subjects');
    	return $data->result_array();
    }

    public function create_teacher_record($teacher) {
    	$this->db->insert('teachers', $teacher);
    }


    public function fetch_teacher_by_id($teacher_id) {
    	
    	$this->db->where('id', $teacher_id);
    	$data = $this->db->get('teachers');

    	if($data->num_rows() == 1) {
    		foreach ($data->result() as $value) {
    			# code...
    			return $value;
    		}
    	}

    	return false;
    }

    public function update_teacher_record($teacher, $id, $user_id){
    	$user = array(
    		'username' => strtolower($teacher['first_name']).'.'.strtolower($teacher['last_name']), 
    	);

    	$this->db->where('id', $id);
    	$this->db->update('teachers', $teacher);

    	$this->db->where('id', $user_id);
    	$this->db->update('users', $user);
    }

    public function delete_teacher($id) {
    	$this->db->where('id', $id);
    	$this->db->delete('teachers');
    }

	public function get_teacher_by_id($id) {
		$this->db->where('id', $id);
		$data = $this->db->get('teachers');

		return $data->result_array();
	}    


// Section Related Transaction Starts Here ...


    public function section_record_count() {

        return $this->db->count_all("sections");
    }


    public function fetch_section($limit, $start) {

        $this->db->limit($limit, $start);
        $query = $this->db->get("sections");

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;
            }

            return $data;
        }

        return false;

    }

    public function create_section_record($section) {
    	$this->db->insert('sections', $section);
    }


    public function fetch_section_by_id($section_id) {
    	
    	$this->db->where('id', $section_id);
    	$data = $this->db->get('sections');

    	if($data->num_rows() == 1) {
    		foreach ($data->result() as $value) {
    			# code...
    			return $value;
    		}
    	}

    	return false;
    }

    public function update_section_record($section, $id) {
    	$this->db->where('id', $id);
    	$this->db->update('sections', $section);
    }

    public function get_teacher_by_section($section_id) {
    	$this->db->where('section_id', $section_id);
    	$data = $this->db->get('section_teachers');

    	return $data->result_array();
    }

    public function fetch_all_teachers() {
    	$data = $this->db->get('teachers');

    	return $data->result_array();
    }



}
