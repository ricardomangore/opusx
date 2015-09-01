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
	
	/**
	 * update_aeropuerto()
	 * 
	 * Actualiza los datos de un registro de la tabla aeropuerto
	 * 
	 * Regresa el numero de registros afectados
	 * Regresa 0 si no efectuo ningun cambio
	 */
	public function update_aeropuerto($aeropuerto){
		$data = array(
			'aeropuerto' => $aeropuerto['aeropuerto'],
			'code' => $aeropuerto['code'],
			'ciudad' => $aeropuerto['ciudad'],
			'pais' => $aeropuerto['pais']
		);
		$this->db->where('idaeropuerto', ((int) $aeropuerto['idaeropuerto']) );
		$var = $this->db->update('aeropuerto', $data);
		return $this->db->affected_rows();
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