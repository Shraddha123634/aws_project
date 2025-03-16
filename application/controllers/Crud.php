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
		$this->Crud_model->delete();
		echo json_encode(array('status' => 'success', 'msg' => 'Deleted successfully!')); 
	}
}
