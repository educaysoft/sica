<?php
class Metodologiastema_model extends CI_model {

	function lista_metodologiastemas(){
		 $metodologiastema= $this->db->get('metodologiastema');
		 return $metodologiastema;
	}


	function lista_metodologiastemasA(){
		 $metodologiastema= $this->db->get('metodologiastema1');
		 return $metodologiastema;
	}



 	function metodologiastema( $id){
 		$metodologiastema = $this->db->query('select * from metodologiastema where idmetodologiastema="'. $id.'"');
 		return $metodologiastema;
 	}


 	function metodologiastemasA( $idasignatura){
 		$metodologiastema = $this->db->query('select * from metodologiastema1 where idasignatura="'. $idasignatura.'"');
 		return $metodologiastema;
 	}



 	function save($array)
 	{
		$this->db->insert("metodologiastema", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmetodologiastema',$id);
 		$this->db->update('metodologiastema',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmetodologiastema',$id);
		$this->db->delete('metodologiastema');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmetodologiastema")->get('metodologiastema');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmetodologiastema")->get('metodologiastema');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$metodologiastema = $this->db->select("idmetodologiastema")->order_by("idmetodologiastema")->get('metodologiastema')->result_array();
		$arr=array("idmetodologiastema"=>$id);
		$clave=array_search($arr,$metodologiastema);
	   if(array_key_exists($clave+1,$metodologiastema))
		 {

 		$metodologiastema = $this->db->query('select * from metodologiastema where idmetodologiastema="'. $metodologiastema[$clave+1]["idmetodologiastema"].'"');
		 }else{

 		$metodologiastema = $this->db->query('select * from metodologiastema where idmetodologiastema="'. $id.'"');
		 }
		 	
 		return $metodologiastema;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$metodologiastema = $this->db->select("idmetodologiastema")->order_by("idmetodologiastema")->get('metodologiastema')->result_array();
		$arr=array("idmetodologiastema"=>$id);
		$clave=array_search($arr,$metodologiastema);
	   if(array_key_exists($clave-1,$metodologiastema))
		 {

 		$metodologiastema = $this->db->query('select * from metodologiastema where idmetodologiastema="'. $metodologiastema[$clave-1]["idmetodologiastema"].'"');
		 }else{

 		$metodologiastema = $this->db->query('select * from metodologiastema where idmetodologiastema="'. $id.'"');
		 }
		 	
 		return $metodologiastema;
 	}






}
