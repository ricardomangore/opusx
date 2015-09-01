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
	
	/**
	 * update_puerto()
	 * 
	 * Actualiza los datos de un registro de la tabla region
	 * 
	 * Regresa el numero de registros afectados
	 * Regresa 0 si no efectuo ningun cambio
	 */
	public function update_puerto($puerto){
		$data = array(
			'puerto' => $puerto['puerto'],
			'locode' => $puerto['locode']
		);
		$this->db->where('idpuerto', ((int) $puerto['idpuerto']) );
		$var = $this->db->update('puerto', $data);
		return $this->db->affected_rows();
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