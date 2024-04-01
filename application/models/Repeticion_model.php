<?php
class Repeticion_model extends CI_model {

	function lista_repeticions(){
		 $repeticion= $this->db->get('repeticion');
		 return $repeticion;
	}

	function lista_repeticionsA(){
		 $repeticion= $this->db->get('repeticion1');
		 return $repeticion;
	}




 	function repeticion( $id){
 		$repeticion = $this->db->query('select * from repeticion where idrepeticion="'. $id.'"');
 		return $repeticion;
 	}

 	function save($array)
 	{
		$this->db->insert("repeticion", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idrepeticion',$id);
 		$this->db->update('repeticion',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idrepeticion',$id);
		$this->db->delete('repeticion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idrepeticion")->get('repeticion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idrepeticion")->get('repeticion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$repeticion = $this->db->select("idrepeticion")->order_by("idrepeticion")->get('repeticion')->result_array();
		$arr=array("idrepeticion"=>$id);
		$clave=array_search($arr,$repeticion);
	   if(array_key_exists($clave+1,$repeticion))
		 {

 		$repeticion = $this->db->query('select * from repeticion where idrepeticion="'. $repeticion[$clave+1]["idrepeticion"].'"');
		 }else{

 		$repeticion = $this->db->query('select * from repeticion where idrepeticion="'. $id.'"');
		 }
		 	
 		return $repeticion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$repeticion = $this->db->select("idrepeticion")->order_by("idrepeticion")->get('repeticion')->result_array();
		$arr=array("idrepeticion"=>$id);
		$clave=array_search($arr,$repeticion);
	   if(array_key_exists($clave-1,$repeticion))
		 {

 		$repeticion = $this->db->query('select * from repeticion where idrepeticion="'. $repeticion[$clave-1]["idrepeticion"].'"');
		 }else{

 		$repeticion = $this->db->query('select * from repeticion where idrepeticion="'. $id.'"');
		 }
		 	
 		return $repeticion;
 	}








}
