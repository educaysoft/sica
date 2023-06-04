<?php
class Codigopostal_model extends CI_model {

	function lista_codigopostales(){
		 $codigopostal= $this->db->get('codigopostal');
		 return $codigopostal;
	}

	function lista_codigopostalsA(){
		 $codigopostal= $this->db->get('codigopostal1');
		 return $codigopostal;
	}




 	function codigopostal( $id){
 		$codigopostal = $this->db->query('select * from codigopostal where idcodigopostal="'. $id.'"');
 		return $codigopostal;
 	}

 	function save($array)
 	{
		$this->db->insert("codigopostal", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcodigopostal',$id);
 		$this->db->update('codigopostal',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcodigopostal',$id);
		$this->db->delete('codigopostal');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcodigopostal")->get('codigopostal');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcodigopostal")->get('codigopostal');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$codigopostal = $this->db->select("idcodigopostal")->order_by("idcodigopostal")->get('codigopostal')->result_array();
		$arr=array("idcodigopostal"=>$id);
		$clave=array_search($arr,$codigopostal);
	   if(array_key_exists($clave+1,$codigopostal))
		 {

 		$codigopostal = $this->db->query('select * from codigopostal where idcodigopostal="'. $codigopostal[$clave+1]["idcodigopostal"].'"');
		 }else{

 		$codigopostal = $this->db->query('select * from codigopostal where idcodigopostal="'. $id.'"');
		 }
		 	
 		return $codigopostal;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$codigopostal = $this->db->select("idcodigopostal")->order_by("idcodigopostal")->get('codigopostal')->result_array();
		$arr=array("idcodigopostal"=>$id);
		$clave=array_search($arr,$codigopostal);
	   if(array_key_exists($clave-1,$codigopostal))
		 {

 		$codigopostal = $this->db->query('select * from codigopostal where idcodigopostal="'. $codigopostal[$clave-1]["idcodigopostal"].'"');
		 }else{

 		$codigopostal = $this->db->query('select * from codigopostal where idcodigopostal="'. $id.'"');
		 }
		 	
 		return $codigopostal;
 	}








}
