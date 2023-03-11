<?php
class Respuesta_model extends CI_model {

	function lista_respuesta(){
		 $respuesta= $this->db->get('respuesta');
		 return $respuesta;
	}

 	function respuesta( $id){
 		$respuesta = $this->db->query('select * from respuesta where idrespuesta="'. $id.'"');
 		return $respuesta;
 	}

	function respuestasxpregunta( $id){
 		$respuesta = $this->db->query('select * from respuesta where idpregunta="'. $id.'"');
 		return $respuesta;
 	}

	function respuestasxreactivo( $idreactivo){
 		$respuesta = $this->db->query('select * from respuesta1 where idreactivo="'. $idreactivo.'"');
 		return $respuesta;
 	}






 	function save($array)
 	{
		$this->db->insert("respuesta", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idrespuesta',$id);
 		$this->db->update('respuesta',$array_item);
	}



 	public function delete($id)
	{
 		$this->db->where('idrespuesta',$id);
		$this->db->delete('respuesta');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idrespuesta")->get('respuesta');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idrespuesta")->get('respuesta');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$respuesta = $this->db->select("idrespuesta")->order_by("idrespuesta")->get('respuesta')->result_array();
		$arr=array("idrespuesta"=>$id);
		$clave=array_search($arr,$respuesta);
	   if(array_key_exists($clave+1,$respuesta))
		 {

 		$respuesta = $this->db->query('select * from respuesta where idrespuesta="'. $respuesta[$clave+1]["idrespuesta"].'"');
		 }else{

 		$respuesta = $this->db->query('select * from respuesta where idrespuesta="'. $id.'"');
		 }
		 	
 		return $respuesta;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$respuesta = $this->db->select("idrespuesta")->order_by("idrespuesta")->get('respuesta')->result_array();
		$arr=array("idrespuesta"=>$id);
		$clave=array_search($arr,$respuesta);
	   if(array_key_exists($clave-1,$respuesta))
		 {

 		$respuesta = $this->db->query('select * from respuesta where idrespuesta="'. $respuesta[$clave-1]["idrespuesta"].'"');
		 }else{

 		$respuesta = $this->db->query('select * from respuesta where idrespuesta="'. $id.'"');
		 }
		 	
 		return $respuesta;
 	}








}
