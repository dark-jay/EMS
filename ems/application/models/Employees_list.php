<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees_list extends CI_Model {

	public function insert_employee( $employee_details )
	{
		$this->db->insert('employees', $employee_details);
	}

}

/* End of file Employees_list.php */
/* Location: ./application/models/Employees_list.php */