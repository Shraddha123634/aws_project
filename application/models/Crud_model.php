<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model{

  public function __construct()
  {
      parent::__construct();  // Make sure this is present
  }

  public function listing(){
    return $this->db->get("user_details")->result_array();
  }

  public function add() {
    $data = array(
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
    );
    $this->db->insert("user_details",$data);
  }

  public function delete()
  {
      $id = $this->input->post('id');
      return $this->db->delete('user_details', array('id' => $id));
  }

}
?>