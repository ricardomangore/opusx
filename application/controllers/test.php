<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Test extends CI_Controller{
	
	public function index(){

	}
	
	public function test1(){
		$this->load->model('user');
		$this->load->helper('security');	
		if ($this->user->username_exist(array('user' => 'mangore')))
			echo "TRUE";
		else 
			echo "FALSE";
	}
	
	public function insert_user(){
		$this->load->model('user');
		$this->load->helper('security');
		$user = array(
			'user' => 'mangore',
			'password' => do_hash('1nt3rm3zz0','md5'),
			'name'  => 'Ricardo',
			'last_name' => 'Rincon',
			'mail' => 'ricardomangore@gmail.com'
		);
		if($this->user->set_user( $user ))
			echo "INSERTADO";
		else
			echo "NO FALLO AL INSERTAR";
	}

	public function auth_user(){
		$this->load->model('user');
		$this->load->helper('security');
		$user = array(
			'user' => 'mangore',
			'password' => do_hash('1nt3rm3zz0','md5'),
			'name'  => 'Ricardo',
			'last_name' => 'Rincon',
			'mail' => 'ricardomangore@gmail.com'
		);		
		if(! $this->user->auth_user( $user ))
			echo "No se encontro el usuario";
		else
			echo "Se encontro el usuario ";
	}
	
}