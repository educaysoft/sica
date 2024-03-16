<?php
class Tipoidentificacion_model extends CI_model {

	function lista_tipoidentificacions(){
		 $tipoidentificacion= $this->db->get('tipoidentificacion');
		 return $tipoidentificacion;
	}

	function lista_tipoidentificacionsA(){
		 $tipoidentificacion= $this->db->get('tipoidentificacion1');
		 return $tipoidentificacion;
	}




 	function tipoidentificacion( $id){
 		$tipoidentificacion = $this->db->query('select * from tipoidentificacion where idtipoidentificacion="'. $id.'"');
 		return $tipoidentificacion;
 	}

 	function save($array)
 	{
		$this->db->insert("tipoidentificacion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipoidentificacion',$id);
 		$this->db->update('tipoidentificacion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipoidentificacion',$id);
		$this->db->delete('tipoidentificacion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipoidentificacion")->get('tipoidentificacion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipoidentificacion")->get('tipoidentificacion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipoidentificacion = $this->db->select("idtipoidentificacion")->order_by("idtipoidentificacion")->get('tipoidentificacion')->result_array();
		$arr=array("idtipoidentificacion"=>$id);
		$clave=array_search($arr,$tipoidentificacion);
	   if(array_key_exists($clave+1,$tipoidentificacion))
		 {

 		$tipoidentificacion = $this->db->query('select * from tipoidentificacion where idtipoidentificacion="'. $tipoidentificacion[$clave+1]["idtipoidentificacion"].'"');
		 }else{

 		$tipoidentificacion = $this->db->query('select * from tipoidentificacion where idtipoidentificacion="'. $id.'"');
		 }
		 	
 		return $tipoidentificacion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipoidentificacion = $this->db->select("idtipoidentificacion")->order_by("idtipoidentificacion")->get('tipoidentificacion')->result_array();
		$arr=array("idtipoidentificacion"=>$id);
		$clave=array_search($arr,$tipoidentificacion);
	   if(array_key_exists($clave-1,$tipoidentificacion))
		 {

 		$tipoidentificacion = $this->db->query('select * from tipoidentificacion where idtipoidentificacion="'. $tipoidentificacion[$clave-1]["idtipoidentificacion"].'"');
		 }else{

 		$tipoidentificacion = $this->db->query('select * from tipoidentificacion where idtipoidentificacion="'. $id.'"');
		 }
		 	
 		return $tipoidentificacion;
 	}








}
