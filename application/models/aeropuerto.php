<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Aeropuerto extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * set_aeropuerto()
	 * 
	 * Inserta un registro de aeropuerto enla base de datos
	 * 
	 * Regresa FALSE si no fue posible insertar 
	 * Regresa TRUE si el registro se inserto exitosamente
	 */
	public function set_aeropuerto( $aeropuerto ){	
		if($this->db->insert('aeropuerto', $aeropuerto ))
			return TRUE;
		else
			return FALSE; 
	}
	
	public function get_aeropuerto(){
		
	}
	
	public function get_list_aeropuertos(){
		$this->db->select('*');
		$this->db->from('aeropuerto');
		$query = $this->db->get();		
		if(empty($query->result_array()))//Si esta el arreglo esta vacio el usuario NO existe
			return FALSE;
		else
			return $query->result_array(); 
	}
}