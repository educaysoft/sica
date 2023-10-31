<?php
class Metodoaprendizajetema_model extends CI_model {

	function lista_metodoaprendizajetemas(){
		 $metodoaprendizajetema= $this->db->get('metodoaprendizajetema');
		 return $metodoaprendizajetema;
	}


	function lista_metodoaprendizajetemas1(){
		 $metodoaprendizajetema= $this->db->get('metodoaprendizajetema1');
		 return $metodoaprendizajetema;
	}



 	function metodoaprendizajetema( $id){
 		$metodoaprendizajetema = $this->db->query('select * from metodoaprendizajetema where idmetodoaprendizajetema="'. $id.'"');
 		return $metodoaprendizajetema;
 	}


 	function metodoaprendizajetemas1( $idtema){
 		$metodoaprendizajetema = $this->db->query('select * from metodoaprendizajetema1 where idtema="'. $idtema.'"');
 		return $metodoaprendizajetema;
 	}



 	function save($array)
 	{
		$this->db->insert("metodoaprendizajetema", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmetodoaprendizajetema',$id);
 		$this->db->update('metodoaprendizajetema',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmetodoaprendizajetema',$id);
		$this->db->delete('metodoaprendizajetema');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmetodoaprendizajetema")->get('metodoaprendizajetema');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmetodoaprendizajetema")->get('metodoaprendizajetema');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$metodoaprendizajetema = $this->db->select("idmetodoaprendizajetema")->order_by("idmetodoaprendizajetema")->get('metodoaprendizajetema')->result_array();
		$arr=array("idmetodoaprendizajetema"=>$id);
		$clave=array_search($arr,$metodoaprendizajetema);
	   if(array_key_exists($clave+1,$metodoaprendizajetema))
		 {

 		$metodoaprendizajetema = $this->db->query('select * from metodoaprendizajetema where idmetodoaprendizajetema="'. $metodoaprendizajetema[$clave+1]["idmetodoaprendizajetema"].'"');
		 }else{

 		$metodoaprendizajetema = $this->db->query('select * from metodoaprendizajetema where idmetodoaprendizajetema="'. $id.'"');
		 }
		 	
 		return $metodoaprendizajetema;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$metodoaprendizajetema = $this->db->select("idmetodoaprendizajetema")->order_by("idmetodoaprendizajetema")->get('metodoaprendizajetema')->result_array();
		$arr=array("idmetodoaprendizajetema"=>$id);
		$clave=array_search($arr,$metodoaprendizajetema);
	   if(array_key_exists($clave-1,$metodoaprendizajetema))
		 {

 		$metodoaprendizajetema = $this->db->query('select * from metodoaprendizajetema where idmetodoaprendizajetema="'. $metodoaprendizajetema[$clave-1]["idmetodoaprendizajetema"].'"');
		 }else{

 		$metodoaprendizajetema = $this->db->query('select * from metodoaprendizajetema where idmetodoaprendizajetema="'. $id.'"');
		 }
		 	
 		return $metodoaprendizajetema;
 	}






}
