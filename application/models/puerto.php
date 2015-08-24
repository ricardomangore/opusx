<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Puerto extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * set_puerto()
	 * 
	 * Inserta un registro de puerto enla base de datos
	 * 
	 * Regresa FALSE si no fue posible insertar 
	 * Regresa TRUE si el registro se inserto exitosamente
	 */
	public function set_puerto( $puerto ){	
		if($this->db->insert('puerto', $puerto ))
			return TRUE;
		else
			return FALSE; 
	}
	
	public function get_puerto(){
		
	}
	
	public function get_list_puertos(){
		$this->db->select('*');
		$this->db->from('puerto');
		$query = $this->db->get();		
		if(empty($query->result_array()))//Si esta el arreglo esta vacio el usuario NO existe
			return FALSE;
		else
			return $query->result_array(); 
	}
}