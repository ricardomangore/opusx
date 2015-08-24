<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_Auth.php';

class OPX_Controller extends CI_Controller{
	
	public $opx_auth;
	
	public function __construct(){
		parent::__construct();
		$this->load->config('opusx');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('opx_user');
		$this->opx_auth = new OPX_Auth();			
	}
	
	
}