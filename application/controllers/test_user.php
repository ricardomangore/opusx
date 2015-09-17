<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Test_User extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('user');
	}
	
	/**
	 * Test de la inserción de un usuario
	 */
	public function test_set_user(){
		$param = array(
			'user' => 'ricardo',
			'password' => 'asdfasdf',
			'name' => 'Ricardo',
			'last_name' => 'Rincón',
			'mail' => 'ricardomangore@gmail.com'
		);
		try{
			$this->user->set_user($param);
			echo "<p>El usuario fue agregado con exito</p>";	
		}catch(Exception $e){
			echo $e->getMessage();
		}
		
	}
	
	/**
	 * Test de la busqueda de un usuario por id
	 */
	public function test_get_user_by_id( $id ){
		try{
			$result = $this->user->get_user_by_id((int)$id);
			var_dump($result);
		}catch(Exception $e){
			echo $e->getMessage(). ' ' .$e->getCode();
		}
	}
	
	/**
	 * Test user_auth()
	 */
	 public function test_user_auth($user,$pass){
	 	try{
	 		$this->user->user_auth(array(
				'user' => $user,
				'password' => $pass
			));
			echo "El usuario esta autenticado";
	 	}catch(Exception $e){
	 		echo "Code: " . $e->getCode()." El usuario no esta registrado";
	 	}
	 }
	 
	/**
	 * Test get_users
	 */
	public function test_get_users(){
		try{
			$result = $this->user->get_users(array('orderby' => 'id_user','direction' => 'DESC'));
			var_dump($result);
		}catch(Exception $e){
			echo $e->getMessage() . ' ' . $e->getCode();
		}
	}
	
	/**
	 * test_update_user
	 * 
	 */
	 public function test_update_user_profile(){
	 	try{
	 		$this->user->update_user_profile(array(
	 			'id_user' => '5',
				'user' => 'mangore',
				'password' => 'nuevopassword',
				'name'	=> 'vitorino',
				'last_name' => 'teodoro',
				'mail'	=> 'micorreo@gmail.com'
			));
			echo "los datos fueron actualizados";
	 	}catch(Exception $e){
	 		echo $e->getMessage();
	 	}
	 }
	/**
	 * test_delete_user
	 */
	public function test_delete_user(){
		try{
			$this->user->delete_user(array('id_user' => 10));
			echo "usuario borrado exitosamente";
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
}