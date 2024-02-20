<?php
class Tipolector_model extends CI_model {

	function lista_tipolector(){
		 $tipolector= $this->db->get('tipolector');
		 return $tipolector;
	}

	function lista_tipolectorsA(){
		 $tipolector= $this->db->get('tipolector1');
		 return $tipolector;
	}




 	function tipolector( $id){
 		$tipolector = $this->db->query('select * from tipolector where idtipolector="'. $id.'"');
 		return $tipolector;
 	}

 	function save($array)
 	{
		$this->db->insert("tipolector", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipolector',$id);
 		$this->db->update('tipolector',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipolector',$id);
		$this->db->delete('tipolector');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipolector")->get('tipolector');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipolector")->get('tipolector');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipolector = $this->db->select("idtipolector")->order_by("idtipolector")->get('tipolector')->result_array();
		$arr=array("idtipolector"=>$id);
		$clave=array_search($arr,$tipolector);
	   if(array_key_exists($clave+1,$tipolector))
		 {

 		$tipolector = $this->db->query('select * from tipolector where idtipolector="'. $tipolector[$clave+1]["idtipolector"].'"');
		 }else{

 		$tipolector = $this->db->query('select * from tipolector where idtipolector="'. $id.'"');
		 }
		 	
 		return $tipolector;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipolector = $this->db->select("idtipolector")->order_by("idtipolector")->get('tipolector')->result_array();
		$arr=array("idtipolector"=>$id);
		$clave=array_search($arr,$tipolector);
	   if(array_key_exists($clave-1,$tipolector))
		 {

 		$tipolector = $this->db->query('select * from tipolector where idtipolector="'. $tipolector[$clave-1]["idtipolector"].'"');
		 }else{

 		$tipolector = $this->db->query('select * from tipolector where idtipolector="'. $id.'"');
		 }
		 	
 		return $tipolector;
 	}








}
