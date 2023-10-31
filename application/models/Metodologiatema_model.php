<?php
class Metodologiatema_model extends CI_model {

	function lista_metodologiatemas(){
		 $metodologiatema= $this->db->get('metodologiatema');
		 return $metodologiatema;
	}


	function lista_metodologiatemasA(){
		 $metodologiatema= $this->db->get('metodologiatema1');
		 return $metodologiatema;
	}



 	function metodologiatema( $id){
 		$metodologiatema = $this->db->query('select * from metodologiatema where idmetodologiatema="'. $id.'"');
 		return $metodologiatema;
 	}


 	function metodologiatemasA( $idasignatura){
 		$metodologiatema = $this->db->query('select * from metodologiatema1 where idasignatura="'. $idasignatura.'"');
 		return $metodologiatema;
 	}



 	function save($array)
 	{
		$this->db->insert("metodologiatema", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmetodologiatema',$id);
 		$this->db->update('metodologiatema',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmetodologiatema',$id);
		$this->db->delete('metodologiatema');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmetodologiatema")->get('metodologiatema');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmetodologiatema")->get('metodologiatema');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$metodologiatema = $this->db->select("idmetodologiatema")->order_by("idmetodologiatema")->get('metodologiatema')->result_array();
		$arr=array("idmetodologiatema"=>$id);
		$clave=array_search($arr,$metodologiatema);
	   if(array_key_exists($clave+1,$metodologiatema))
		 {

 		$metodologiatema = $this->db->query('select * from metodologiatema where idmetodologiatema="'. $metodologiatema[$clave+1]["idmetodologiatema"].'"');
		 }else{

 		$metodologiatema = $this->db->query('select * from metodologiatema where idmetodologiatema="'. $id.'"');
		 }
		 	
 		return $metodologiatema;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$metodologiatema = $this->db->select("idmetodologiatema")->order_by("idmetodologiatema")->get('metodologiatema')->result_array();
		$arr=array("idmetodologiatema"=>$id);
		$clave=array_search($arr,$metodologiatema);
	   if(array_key_exists($clave-1,$metodologiatema))
		 {

 		$metodologiatema = $this->db->query('select * from metodologiatema where idmetodologiatema="'. $metodologiatema[$clave-1]["idmetodologiatema"].'"');
		 }else{

 		$metodologiatema = $this->db->query('select * from metodologiatema where idmetodologiatema="'. $id.'"');
		 }
		 	
 		return $metodologiatema;
 	}






}
