<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Region extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * set_region()
	 * 
	 * Inserta un registro de region enla base de datos
	 * 
	 * Regresa FALSE si no fue posible insertar 
	 * Regresa TRUE si el registro se inserto exitosamente
	 */
	public function set_region( $region ){	
		$region['region'] = $region['region'];
		if($this->db->insert('region', $region ))
			return TRUE;
		else
			return FALSE; 
	}
	
	/**
	 * update_region()
	 * 
	 * Actualiza los datos de un registro de la tabla region
	 * 
	 * Regresa el numero de registros afectados
	 * Regresa 0 si no efectuo ningun cambio
	 */
	public function update_region($region){
		$data = array(
			'region' => $region['region']
		);
		$this->db->where('idregion', ((int) $region['idregion']) );
		$var = $this->db->update('region', $data);
		return $this->db->affected_rows();
	}
	
	public function get_region(){
		
	}
	
	public function get_list_regiones(){
		$this->db->select('*');
		$this->db->from('region');
		$query = $this->db->get();		
		if(empty($query->result_array()))//Si esta el arreglo esta vacio el usuario NO existe
			return FALSE;
		else
			return $query->result_array(); 
	}
	
	public function ssprocess(){
		$this->db->select('*');
		$this->db->from('region');
	}
	
	
	
	
}