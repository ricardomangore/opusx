<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Carga_Aerea extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * set_carga_aerea()
	 * 
	 * Inserta un registro de carga_aerea enla base de datos
	 * 
	 * Regresa FALSE si no fue posible insertar 
	 * Regresa TRUE si el registro se inserto exitosamente
	 */
	public function set_carga_aerea( $carga_aerea ){	
		if($this->db->insert('carga2', $carga_aerea ))
			return TRUE;
		else
			return FALSE; 
	}
	
	public function get_carga_aerea(){
		
	}
	
	public function get_list_cargas_aereas(){
		$this->db->select('*');
		$this->db->from('carga2');
		$query = $this->db->get();		
		if(empty($query->result_array()))//Si esta el arreglo esta vacio el usuario NO existe
			return FALSE;
		else
			return $query->result_array(); 
	}
}