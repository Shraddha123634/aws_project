<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$result = array();
        echo $this->load->view('about', $result, true);
	}
}
