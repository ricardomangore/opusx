<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Recargo extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * set_recargo()
	 * 
	 * Inserta un registro de recargo enla base de datos
	 * 
	 * Regresa FALSE si no fue posible insertar 
	 * Regresa TRUE si el registro se inserto exitosamente
	 */
	public function set_recargo( $recargo ){	
		if($this->db->insert('recargo', $recargo ))
			return TRUE;
		else
			return FALSE; 
	}
	
	public function get_recargo(){
		
	}
	
	public function get_list_recargos(){
		$this->db->select('*');
		$this->db->from('recargo');
		$query = $this->db->get();		
		if(empty($query->result_array()))//Si esta el arreglo esta vacio el usuario NO existe
			return FALSE;
		else
			return $query->result_array(); 
	}
}