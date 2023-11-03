<?php
class Destinodocumento_model extends CI_model {

	function lista_destinodocumento(){
		 $destinodocumento= $this->db->get('destinodocumento');
		 return $destinodocumento;
	}



	function lista_destinodocumentos(){
		 $destinodocumento= $this->db->get('destinodocumento');
		 return $destinodocumento;
	}

 	function destinodocumento( $id){
 		$destinodocumento = $this->db->query('select * from destinodocumento where iddestinodocumento="'. $id.'"');
 		return $destinodocumento;
 	}

 	function save($array)
 	{
		$this->db->insert("destinodocumento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddestinodocumento',$id);
 		$this->db->update('destinodocumento',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddestinodocumento',$id);
		$this->db->delete('destinodocumento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddestinodocumento")->get('destinodocumento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddestinodocumento")->get('destinodocumento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$destinodocumento = $this->db->select("iddestinodocumento")->order_by("iddestinodocumento")->get('destinodocumento')->result_array();
		$arr=array("iddestinodocumento"=>$id);
		$clave=array_search($arr,$destinodocumento);
	   if(array_key_exists($clave+1,$destinodocumento))
		 {

 		$destinodocumento = $this->db->query('select * from destinodocumento where iddestinodocumento="'. $destinodocumento[$clave+1]["iddestinodocumento"].'"');
		 }else{

 		$destinodocumento = $this->db->query('select * from destinodocumento where iddestinodocumento="'. $id.'"');
		 }
		 	
 		return $destinodocumento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$destinodocumento = $this->db->select("iddestinodocumento")->order_by("iddestinodocumento")->get('destinodocumento')->result_array();
		$arr=array("iddestinodocumento"=>$id);
		$clave=array_search($arr,$destinodocumento);
	   if(array_key_exists($clave-1,$destinodocumento))
		 {

 		$destinodocumento = $this->db->query('select * from destinodocumento where iddestinodocumento="'. $destinodocumento[$clave-1]["iddestinodocumento"].'"');
		 }else{

 		$destinodocumento = $this->db->query('select * from destinodocumento where iddestinodocumento="'. $id.'"');
		 }
		 	
 		return $destinodocumento;
 	}






}
