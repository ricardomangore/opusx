<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . 'third_party/opusx/system/OPX_Auth.php';

class OPX_Controller extends CI_Controller{
	
	public $opx_auth;
	public $opx_sidebar_opt;
	public $opx_errors = array();
	
    public $opxmessage = array(
		'1' => 'El registro fue insertado exitosamente',
		'2' => 'El registro no fue insertado',
		'3' => 'El registro fue modificado exitosamente',
		'4' => 'El registro no fue modificado',
	);
	
	public $opxclass = array(
		'1' => 'success',
		'2' => 'danger'
	);
	
	public function __construct(){
		parent::__construct();
		$this->load->config('opusx');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('opx_user');
		$this->opx_auth = new OPX_Auth();
		$this->opx_sidebar_opt = array(
			'item1' => array(
				'menu'  => '',
				'hrf'   => '',
				'class' => ''
			),
		);			
	}
	
	
}