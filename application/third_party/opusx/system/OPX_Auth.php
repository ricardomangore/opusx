<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');


/**
 * OPX_Auth
 * 
 * Esta clase proporciona métodos para modelar el procesos de Autenticación
 */
class OPX_Auth{
	
	private $CI;
	
	public function __construct(){
		$this->CI = & get_instance();
		$this->CI->load->library('session');
	}
	
	/**
	 * is_auth()
	 * 
	 * Determina con base a la variable de session OPX_AUTH si el usuario esta autenticado o no
	 */
	public function is_auth(){
		if($this->CI->session->userdata('OPX_AUTH'))
			return TRUE;
		else	
			return FALSE;
	}
	
	/**
	 * login()
	 * 
	 * efectua el procesos de login de un usuario
	 */
	public function login($username, $password){
		$user = array(
			'user'  => $username,
			'password'	=> $password
		);
		$this->CI->load->model('user');
		$user = $this->CI->user->auth_user($user);
		if(!$user){
			return FALSE;
		}else{
			$this->CI->session->set_userdata(array(
					'OPX_AUTH'	=> TRUE,
					'user'      => $user['user'],
					'name'      => $user['name'],
					'last_name' => $user['last_name'],
					'mail'      => $user['ricardomangore@gmail.com']
				));
			return TRUE;
		}

	}
	
	/**
	 * logout()
	 * 
	 * efectua el procesos de logout para un usuario
	 */
	 public function logout(){
	 	$this->CI->session->unset_userdata(array(
	 				'OPX_AUTH'	  => TRUE,
					'user_name'   => 'admin',
					'user_group'  => 0,
					'user_mail'   => 'ricardomangore@gmail.com'
				));
		$this->CI->session->sess_destroy();
	 }
}