<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Recargo_Aereo extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	
	/**
	 * set_recargo_aereo
	 * 
	 * Inserta un nuevo registro recargo en la tabla recargo_Aereo
	 * 
	 * @param $recargo array	Arreglo con valores para cada uno de los campos recargo
	 * 							'idaerolinea'		Identificador de la aerolinea que ejerce el recargo
	 * 							'clave'				Clave alfanumerica del recargo
	 * 							'descripcion'		Descripción del recargo
	 * 							'costo'				Costo del recargo
	 */
	public function set_recargo_aereo( $recargo ){
		$data = array(
			'clave' 	  => $recargo['clave'],
			'descripcion' => $recargo['descripcion'],
			'costo'		  => (float)$recargo['costo']
		);
		$this->db->trans_start();
			$this->db->insert('recargo', $data );
			$recargo_aereo = array(
				'idaerolinea'	=> $recargo['idaerolinea'],
				'idrecargo'		=> $this->db->insert_id()
			);
			$this->db->insert('recargo_aereo', $recargo_aereo);
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
	/*
	 * get_recargos_aereos()
	 * 
	 * Regresa una lista de recargos aéreos
	 * 
	 */
	public function get_recargos_aereos(){
		$this->db->select('*');
		$this->db->from('recargo_aereo');
		$this->db->join('recargo', 'recargo.idrecargo = recargo_aereo.idrecargo','left');
		$this->db->join('aerolinea','aerolinea.idaerolinea = recargo_aereo.idaerolinea', 'left');
		$query  =$this->db->get();
		return $query->result_array();
	}
	
	/**
	 * get_recargo_aereo()
	 * 
	 * Retorna el un registro de un recargo aereo dado un ID de la tabla recargo_aereo
	 * 
	 * @param	INT		Identificador del recargo aereo
	 */
	public function get_recargo_aereo($id_recargo_aereo){
		$this->db->select('*');
		$this->db->from('recargo_aereo');
		$this->db->join('recargo','recargo.idrecargo = recargo_aereo.idrecargo','left');
		$this->db->join('aerolinea', 'aerolinea.idaerolinea = recargo_aereo.idaerolinea', 'left');
		$this->db->where('recargo_aereo.idrecargo_aereo = ' . $id_recargo_aereo);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * update_recargo_aereo
	 * 
	 * Actualiza un registro de recargo aereo y de la tabla recargo
	 * 
	 * @param array		params    Arreglo que contienen lo snuevo svalores de los campos a actulizar 
	 */
	public function update_recargo_aereo($params){
		$data_recargo = array(
			'clave'			=> $params['clave'],
			'descripcion'	=> $params['descripcion'],
			'costo'			=> $params['costo']
		);
		$data_recargo_aereo = array(
			'idaerolinea'	=> $params['idaerolinea']
		);
		$this->db->trans_start();
			$this->db->set($data_recargo);
			$this->db->where('idrecargo',$params['idrecargo']);
			$this->db->update('recargo');
			
			$this->db->set($data_recargo_aereo);
			$this->db->where('idrecargo_aereo',$params['idrecargo_aereo']);
			$this->db->update('recargo_aereo');
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}	
	}
}