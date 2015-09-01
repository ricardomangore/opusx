<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Naviera extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * set_naviera()
	 * 
	 * Inserta un registro de naviera enla base de datos
	 * 
	 * Regresa FALSE si no fue posible insertar 
	 * Regresa TRUE si el registro se inserto exitosamente
	 */
	public function set_naviera( $naviera ){	
		$naviera['naviera'] = $naviera['naviera'];
		if($this->db->insert('naviera', $naviera ))
			return TRUE;
		else
			return FALSE; 
	}
	
	/**
	 * update_naviera()
	 * 
	 * Actualiza los datos de un registro de la tabla naviera
	 * 
	 * Regresa el numero de registros afectados
	 * Regresa 0 si no efectuo ningun cambio
	 */
	public function update_naviera($naviera){
		$data = array(
			'naviera' => $naviera['naviera']
		);
		$this->db->where('idnaviera', ((int) $naviera['idnaviera']) );
		$var = $this->db->update('naviera', $data);
		return $this->db->affected_rows();
	}
	
	public function get_naviera(){
		
	}
	
	public function get_list_navieras(){
		$this->db->select('*');
		$this->db->from('naviera');
		$query = $this->db->get();		
		if(empty($query->result_array()))//Si esta el arreglo esta vacio el usuario NO existe
			return FALSE;
		else
			return $query->result_array(); 
	}
}