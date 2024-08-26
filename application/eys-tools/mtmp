<?php
class Estadoproceso_model extends CI_model {

	function lista_estadoprocesos(){
		 $estadoproceso= $this->db->get('estadoproceso');
		 return $estadoproceso;
	}

 	function estadoproceso( $id){
 		$estadoproceso = $this->db->query('select * from estadoproceso where idestadoproceso="'. $id.'"');
 		return $estadoproceso;
 	}

 	function save($array)
 	{
		$this->db->insert("estadoproceso", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestadoproceso',$id);
 		$this->db->update('estadoproceso',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idestadoproceso',$id);
		$this->db->delete('estadoproceso');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestadoproceso")->get('estadoproceso');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestadoproceso")->get('estadoproceso');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estadoproceso = $this->db->select("idestadoproceso")->order_by("idestadoproceso")->get('estadoproceso')->result_array();
		$arr=array("idestadoproceso"=>$id);
		$clave=array_search($arr,$estadoproceso);
	   if(array_key_exists($clave+1,$estadoproceso))
		 {

 		$estadoproceso = $this->db->query('select * from estadoproceso where idestadoproceso="'. $estadoproceso[$clave+1]["idestadoproceso"].'"');
		 }else{

 		$estadoproceso = $this->db->query('select * from estadoproceso where idestadoproceso="'. $id.'"');
		 }
		 	
 		return $estadoproceso;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estadoproceso = $this->db->select("idestadoproceso")->order_by("idestadoproceso")->get('estadoproceso')->result_array();
		$arr=array("idestadoproceso"=>$id);
		$clave=array_search($arr,$estadoproceso);
	   if(array_key_exists($clave-1,$estadoproceso))
		 {

 		$estadoproceso = $this->db->query('select * from estadoproceso where idestadoproceso="'. $estadoproceso[$clave-1]["idestadoproceso"].'"');
		 }else{

 		$estadoproceso = $this->db->query('select * from estadoproceso where idestadoproceso="'. $id.'"');
		 }
		 	
 		return $estadoproceso;
 	}






}
