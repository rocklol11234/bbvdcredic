<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelo extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

}