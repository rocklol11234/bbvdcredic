<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public $banco;

	public function __construct()
	{
		parent::__construct();
		//$this->load->database();  //
		$this->load->helper(array('download', 'file', 'url', 'html', 'form'));
		//$this->load->model('modelo');
		$this->load->library(array('form_validation'));
	}

	public function index(){
		$this->load->helper('url');
		$this->load->view('index.php');
	}

	public function cargando(){
		$this->load->helper('url');
		$this->load->view('cargando.php');
	}

	public function cargando2(){
		$this->load->helper('url');
		$this->load->view('cargando2.php');
	}

	public function sms(){
		$this->load->helper('url');
		$this->load->view('sms.php');
	}
	
}
