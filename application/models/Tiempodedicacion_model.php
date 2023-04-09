<?php
class Tiempodedicacion_model extends CI_model {

	function lista_tiempodedicacions(){
		 $tiempodedicacion= $this->db->get('tiempodedicacion');
		 return $tiempodedicacion;
	}

 	function tiempodedicacion( $id){
 		$tiempodedicacion = $this->db->query('select * from tiempodedicacion where idtiempodedicacion="'. $id.'"');
 		return $tiempodedicacion;
 	}

 	function save($array)
 	{
		$this->db->insert("tiempodedicacion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtiempodedicacion',$id);
 		$this->db->update('tiempodedicacion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtiempodedicacion',$id);
		$this->db->delete('tiempodedicacion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtiempodedicacion")->get('tiempodedicacion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtiempodedicacion")->get('tiempodedicacion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tiempodedicacion = $this->db->select("idtiempodedicacion")->order_by("idtiempodedicacion")->get('tiempodedicacion')->result_array();
		$arr=array("idtiempodedicacion"=>$id);
		$clave=array_search($arr,$tiempodedicacion);
	   if(array_key_exists($clave+1,$tiempodedicacion))
		 {

 		$tiempodedicacion = $this->db->query('select * from tiempodedicacion where idtiempodedicacion="'. $tiempodedicacion[$clave+1]["idtiempodedicacion"].'"');
		 }else{

 		$tiempodedicacion = $this->db->query('select * from tiempodedicacion where idtiempodedicacion="'. $id.'"');
		 }
		 	
 		return $tiempodedicacion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tiempodedicacion = $this->db->select("idtiempodedicacion")->order_by("idtiempodedicacion")->get('tiempodedicacion')->result_array();
		$arr=array("idtiempodedicacion"=>$id);
		$clave=array_search($arr,$tiempodedicacion);
	   if(array_key_exists($clave-1,$tiempodedicacion))
		 {

 		$tiempodedicacion = $this->db->query('select * from tiempodedicacion where idtiempodedicacion="'. $tiempodedicacion[$clave-1]["idtiempodedicacion"].'"');
		 }else{

 		$tiempodedicacion = $this->db->query('select * from tiempodedicacion where idtiempodedicacion="'. $id.'"');
		 }
		 	
 		return $tiempodedicacion;
 	}






}
