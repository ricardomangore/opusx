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
		//Cargamos el archivo de lenguaje
		$this->CI->lang->load('message','spanish');
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
	 * Ejecuta el procesos de login de un usuario
	 */
	public function auth_user($username, $password){
		$user = array(
			'user'  => $username,
			'password'	=> $password
		);
		$this->CI->load->model('user');
		try{
			$result = $this->CI->user->user_auth($user);
			$this->CI->session->set_userdata(array('OPX_AUTH' => $result));
		}catch(Exception $e){
			throw new Exception('Error', $e->getCode());
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