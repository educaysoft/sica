<?php
class Emisor_model extends CI_model {

	function listar_emisor(){
		 $emisor= $this->db->get('emisor');
		 return $emisor;
	}

	function listar_emisor1(){
		 $emisor= $this->db->get('emisor1');
		 return $emisor;
	}



 	function emisor( $id){
 		$emisor = $this->db->query('select * from emisor where idemisor="'. $id.'"');
 		return $emisor;
 	}

 	function save($array)
 	{
		$this->db->insert("emisor", $array);
 	}

 	function update($id,$array_item)
 	{
 		$query = $this->db->query('select * from emisor where idemisor="'. $id.'"');

		if($query->num_rows()>0)
		{
 			$this->db->where('idemisor',$id);
 			$this->db->update('emisor',$array_item);
			return true;
		}else{
	        	return false;
		}

	}
 

  public function delete($id)
	{
 		$this->db->where('idemisor',$id);
		$this->db->delete('emisor');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idemisor")->get('emisor');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idemisor")->get('emisor');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$emisor = $this->db->select("idemisor")->order_by("idemisor")->get('emisor')->result_array();
		$arr=array("idemisor"=>$id);
		$clave=array_search($arr,$emisor);
	   if(array_key_exists($clave+1,$emisor))
		 {

 		$emisor = $this->db->query('select * from emisor where idemisor="'. $emisor[$clave+1]["idemisor"].'"');
		 }else{

 		$emisor = $this->db->query('select * from emisor where idemisor="'. $id.'"');
		 }
		 	
 		return $emisor;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$emisor = $this->db->select("idemisor")->order_by("idemisor")->get('emisor')->result_array();
		$arr=array("idemisor"=>$id);
		$clave=array_search($arr,$emisor);
	   if(array_key_exists($clave-1,$emisor))
		 {

 		$emisor = $this->db->query('select * from emisor where idemisor="'. $emisor[$clave-1]["idemisor"].'"');
		 }else{

 		$emisor = $this->db->query('select * from emisor where idemisor="'. $id.'"');
		 }
		 	
 		return $emisor;
 	}


}
