<?php
class Identificacion_model extends CI_model {

	function lista_identificacions(){
		 $identificacion= $this->db->get('identificacion');
		 return $identificacion;
	}


	function lista_identificacions1($idpersona){

 		$this->db->where('idpersona',$idpersona);
		 $identificacion= $this->db->get('identificacion1');
		 return $identificacion;
	}




	function lista_identificacionsA(){
		 $identificacion= $this->db->get('identificacion1');
		 return $identificacion;
	}



 	function identificacion( $id){
 		$identificacion = $this->db->query('select * from identificacion where ididentificacion="'. $id.'"');
 		return $identificacion;
 	}



 	function identificacions( $idpersona){
 		$identificacion = $this->db->query('select * from identificacion1 where idpersona="'. $idpersona.'"');
 		return $identificacion;
 	}


 	function identificacionspersona( $id){
 		$identificacion = $this->db->query('select * from identificacion where idpersona="'. $id.'"');
 		return $identificacion;
 	}



 	function save($array)
 	{
		$this->db->insert("identificacion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('ididentificacion',$id);
 		$this->db->update('identificacion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('ididentificacion',$id);
		$this->db->delete('identificacion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("ididentificacion")->get('identificacion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("ididentificacion")->get('identificacion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$identificacion = $this->db->select("ididentificacion")->order_by("ididentificacion")->get('identificacion')->result_array();
		$arr=array("ididentificacion"=>$id);
		$clave=array_search($arr,$identificacion);
	   if(array_key_exists($clave+1,$identificacion))
		 {

 		$identificacion = $this->db->query('select * from identificacion where ididentificacion="'. $identificacion[$clave+1]["ididentificacion"].'"');
		 }else{

 		$identificacion = $this->db->query('select * from identificacion where ididentificacion="'. $id.'"');
		 }
		 	
 		return $identificacion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$identificacion = $this->db->select("ididentificacion")->order_by("ididentificacion")->get('identificacion')->result_array();
		$arr=array("ididentificacion"=>$id);
		$clave=array_search($arr,$identificacion);
	   if(array_key_exists($clave-1,$identificacion))
		 {

 		$identificacion = $this->db->query('select * from identificacion where ididentificacion="'. $identificacion[$clave-1]["ididentificacion"].'"');
		 }else{

 		$identificacion = $this->db->query('select * from identificacion where ididentificacion="'. $id.'"');
		 }
		 	
 		return $identificacion;
 	}






}
