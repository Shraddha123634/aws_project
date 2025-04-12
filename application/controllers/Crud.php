<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		// Manually set CORS headers
		$allowed_origins = [
			'https://trackerzz.club',
			'https://www.trackerzz.club'
		];

		$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

		if (in_array($origin, $allowed_origins)) {
			header("Access-Control-Allow-Origin: $origin");
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
			header("Access-Control-Allow-Credentials: true");
		}

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			header('HTTP/1.1 200 OK');
			exit();
		}

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
