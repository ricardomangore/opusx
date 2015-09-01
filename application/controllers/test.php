<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Test extends CI_Controller{

	private static $er;
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('region');
		self::$er = "ER test";
	}
	
	/*public function index(){
        $this->load->helper('form');

        $this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'Username', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('formtest');
        }
        else
        {
                $this->load->view('formtest');
        }
	}*/
	
	public function index(){
		echo self::$er;
	}
	
	public function test1(){
		self::$er = "ER modificado";
		$this->index();
	}
		
	
}