<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('security');
	}	
	
	/**
	 * get_menu_items()
	 * 
	 * Optiene los items que compondran el menu del suaurio segun su rol o grupo al que pertenezca
	 */
	public function get_menu_items($user_id = NULL){
		if(is_null($user_id))
			$items = NULL;
		else	
			$items = array(
				'item1',
				'item2',
				'item3'
			);
		return $items;
	}
	
	
	/**
	 * auth_user()
	 * 
	 * Optienen los datos del usuario por autenticacion
	 * 
	 * Regresa FALSE si no esta autenticado
	 * Regresa TRUE si el usuario es valido
	 */
	public function auth_user( $user ){
		$this->db->select('*');
		$this->db->from('opx_user');
		$this->db->where('user',$user['user']);
		$this->db->where('password',do_hash($user['password'],'md5'));
		$query = $this->db->get();
		if(empty($query->result_array()))
			return FALSE;
		else
			return $query->result_array();
	}
	
	/**
	 * set_user()
	 * 
	 * Inserta un usuario en la base de datos
	 * 
	 * Retorna 1 si el registro fue insertado
	 */
	public function set_user( $user ){
		$user['password'] = do_hash($user['password'],'md5');
		if($this->db->insert('opx_user', $user ))
			return TRUE;
		else
			return FALSE; 
	}
	
	/**
	 * user_exist()
	 * 
	 * Determina si un usuario existe
	 * 
	 * Retorna TRUE si el usuario existe 
	 * Retorna FALSE si el usuario no existe
	 */
	public function username_exist( $user ){
		$this->db->select('*');
		$this->db->from('opx_user');
		$this->db->where('user',$user['user']);
		$query = $this->db->get();		
		if(empty($query->result_array()))//Si esta el arreglo esta vacio el usuario NO existe
			return FALSE;
		else
			return TRUE; 
	}
	
}