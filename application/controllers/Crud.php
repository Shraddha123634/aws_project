<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model("Crud_model");
    }

	public function index()
	{
		if(!empty($_POST)) {
			$this->Crud_model->add();
		}

		$result['listing'] = array();
        $result['listing'] = $this->Crud_model->listing();
        echo $this->load->view('crud', $result, true);
	}

	public function delete()
	{
		$id = $this->input->post('id');
		// run the delete
		$this->db->where('id', (int)$id)->delete('user_details');
		   
		// check how many rows were affected
		if ($this->db->affected_rows() > 0) {
			// success — return the ID that was deleted
			echo json_encode(array('status' => 'success', 'msg' => 'Deleted successfully!'));
		} else {
			echo json_encode(array('status' => 'fail', 'msg' => 'Failed to delete!')); 
		}

	}
}
