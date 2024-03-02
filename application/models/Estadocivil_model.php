<?php
class Estadocivil_model extends CI_model {

	function lista_estadocivils(){
		 $estadocivil= $this->db->get('estadocivil');
		 return $estadocivil;
	}

	function lista_estadocivilsA(){
		 $estadocivil= $this->db->get('estadocivil1');
		 return $estadocivil;
	}




 	function estadocivil( $id){
 		$estadocivil = $this->db->query('select * from estadocivil where idestadocivil="'. $id.'"');
 		return $estadocivil;
 	}

 	function save($array)
 	{
		$this->db->insert("estadocivil", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestadocivil',$id);
 		$this->db->update('estadocivil',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idestadocivil',$id);
		$this->db->delete('estadocivil');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestadocivil")->get('estadocivil');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestadocivil")->get('estadocivil');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estadocivil = $this->db->select("idestadocivil")->order_by("idestadocivil")->get('estadocivil')->result_array();
		$arr=array("idestadocivil"=>$id);
		$clave=array_search($arr,$estadocivil);
	   if(array_key_exists($clave+1,$estadocivil))
		 {

 		$estadocivil = $this->db->query('select * from estadocivil where idestadocivil="'. $estadocivil[$clave+1]["idestadocivil"].'"');
		 }else{

 		$estadocivil = $this->db->query('select * from estadocivil where idestadocivil="'. $id.'"');
		 }
		 	
 		return $estadocivil;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estadocivil = $this->db->select("idestadocivil")->order_by("idestadocivil")->get('estadocivil')->result_array();
		$arr=array("idestadocivil"=>$id);
		$clave=array_search($arr,$estadocivil);
	   if(array_key_exists($clave-1,$estadocivil))
		 {

 		$estadocivil = $this->db->query('select * from estadocivil where idestadocivil="'. $estadocivil[$clave-1]["idestadocivil"].'"');
		 }else{

 		$estadocivil = $this->db->query('select * from estadocivil where idestadocivil="'. $id.'"');
		 }
		 	
 		return $estadocivil;
 	}








}
