<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Flete_Aereo extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * set_flete_aereo()
	 * 
	 * Inserta un registro de flete_aereo enla base de datos
	 * 
	 * Regresa FALSE si no fue posible insertar 
	 * Regresa TRUE si el registro se inserto exitosamente
	 */
	public function set_flete_aereo( $flete_aereo ){	
		if($this->db->insert('flete_aereo', $flete_aereo ))
			return TRUE;
		else
			return FALSE; 
	}
	
	public function get_flete_aereo(){
		
	}
	
	public function get_list_fletes_aereos(){
		
		/**
		 * Aqui debe de haber un JOIN entre todas las tablas involucradas
		 */
		$this->db->select('*');
		$this->db->from('flete_aereo');
		$query = $this->db->get();		
		if(empty($query->result_array()))//Si esta el arreglo esta vacio el usuario NO existe
			return FALSE;
		else
			return $query->result_array(); 
	}
}