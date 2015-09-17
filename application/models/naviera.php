<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Naviera extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('security');
	}	
	
	
	/**
	 * set_naviera()
	 * 
	 * Inserta el registro de una naviera en la tabla naviera
	 * 
	 * @param	array	$data	Arreglo asociativo con pares de campo-valor
	 * 							'naviera'
	 */
	public function set_naviera( $data){
		if(!$this->db->insert('naviera', $data)){//Si no pudo efectuar la inserción
			throw new Exception('Error',1007);		
		}
	}
	
	/**
	 * get_naviera_by_id()
	 * 
	 * Retorna el registro de la tabla naviera buscandolo por idnaviera
	 * 
	 * @param	int		$idnaviera		Identificador de usuaario en la tabla de
	 */
	public function get_naviera_by_id($idnaviera){
		$query = $this->db->select('naviera')
						  ->where('idnaviera',$idnaviera)
						  ->get('naviera');
		$result = $query->result_array();
		if(empty($query->result_array())){
			throw new Exception('Error', 1008);
		}
		else
			return $query->result_array();
	}
	
	
	/**
	 * get_navieras()
	 * 
	 * Regresa una lista de usuarios delimitada en orden u longitud por los parametros
	 * 
	 * @param	array	$param  Arreglo asociativo con valores para los parametros de busqueda
	 * 							'offset'	desplazamiento de la busqueda
	 * 							'value'		número de registros devueltos en la busqueda
	 * 							'orderby'	campo sobre el cual ordenar
	 * 							'direction'	Tipo de order 'ASC' o 'DESC'
	 * 
	 */
	public function get_users($param = null){
		if(isset($param))
			extract($param);
		$this->db->select('idnaviera,naviera');
		$this->db->from('naviera');
		if(isset($offset))
			$this->db->limit($value,$offset);
		if(isset($orderby))
			$this->db->order_by($orderby,$direction);
		$query = $this->db->get();
		$result = $query->result_array();
		if(empty($result)){
			throw new Exception('Error', 1009);
		}else{
			return $result;
		}
		
	}
	
	/**
	 * update_naviera()
	 * 
	 * Actualiza los datos de un usuario
	 * 
	 * @param	array	$user	Arreglo con los datos a actualizar de un usuario
	 */
	public function update_user_profile( $naviera = null){
		if(isset($user)){
			extract($user);
			$data = array();
			$this->db->where('idnaviera', $idnaviera);
			if(isset($user))
				$data['naviera'] = $user;
			/*if(isset($name))
				$data['name'] = $name;
			if(isset($last_name)) 
				$data['last_name']= $last_name;
			if(isset($mail))
				$data['mail'] = $mail;
			if(isset($password))
				$data['password'] = $password;*/
			$result = $this->db->update('naviera', $data);
			if(!$result){
				throw new Exception('Error', 1010);
			}
		}else{
			throw new Exception('Error', 6001);
		}
	} 
	
	/**
	 * delete_naviera()
	 * 
	 * 
	 */
	public function delete_naviera($naviera = null){
		if(isset($naviera)){
			extract($naviera);
			$this->db->where('idnaviera',$idnaviera);
			$this->db->delete('naviera');
			$affected_rows = $this->db->affected_rows();
			if($affected_rows == 0)
				throw new Exception('Error', 1006);
		}else{
			throw new Exception('Error', 6001);
		}	
	}
}