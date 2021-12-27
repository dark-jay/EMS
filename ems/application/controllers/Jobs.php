<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_Jobs');
	}

	public function index()
	{
		$this->load->view('dash/add_job');
	}

	public function view_jobs()
	{
		$this->load->view('dash/job_list');
	}

	public function add_job()
	{
		if ( $this->input->post('add_job') ) 
		{
			$j_name = $this->input->post('j_name');

			$jobs_data = array(
				'j_name'	=>	$j_name
			);

			$this->Employee_Jobs->add_job($jobs_data);

			redirect('jobs/view_jobs','refresh');

		}
	}

	public function update_job( $j_id )
	{
		$this->load->view('dash/update_job', $j_id);
	}

	public function update_process_jobs( $j_id )
	{
		if ( $this->input->post('update_job') ) 
		{
			$j_name = $this->input->post('j_name');
			$job_details = array( 
				'j_name'	=> $j_name
			);
			$this->db->where('j_id', $j_id);
			$this->db->update('jobs', $job_details);
			redirect('jobs/view_jobs','refresh');
		}
	}

	public function delete_job( $j_id )
	{
		$this->db->where('j_id', $j_id);
		$this->db->delete('jobs');
		redirect('jobs/view_jobs','refresh');
	}

}

/* End of file Jobs.php */
/* Location: ./application/controllers/Jobs.php */