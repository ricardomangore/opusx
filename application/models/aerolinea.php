<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Aerolinea extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * set_aerolinea()
	 * 
	 * Inserta un registro de aerolinea enla base de datos
	 * 
	 * Regresa FALSE si no fue posible insertar 
	 * Regresa TRUE si el registro se inserto exitosamente
	 */
	public function set_aerolinea( $aerolinea ){	
		if($this->db->insert('aerolinea', $aerolinea ))
			return TRUE;
		else
			return FALSE; 
	}
	
	public function get_aerolinea(){
		
	}
	
	public function get_list_aerolineas(){
		$this->db->select('*');
		$this->db->from('aerolinea');
		$query = $this->db->get();		
		if(empty($query->result_array()))//Si esta el arreglo esta vacio el usuario NO existe
			return FALSE;
		else
			return $query->result_array(); 
	}
}