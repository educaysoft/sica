<?php
class Modulo_model extends CI_model {

	function lista_modulos(){
		 $modulo= $this->db->get('modulo');
		 return $modulo;
	}

 	function elmodulo( $id){
 		$modulo = $this->db->query('select * from modulo where idmodulo="'. $id.'"');
 		return $modulo;
 	}



 	function modulo( $id){
 		$modulo = $this->db->query('select * from modulo where idmodulo="'. $id.'"');
 		return $modulo;
 	}

 	function arrmodulo( $id){
 		$modulo = $this->db->query('select * from modulo where idmodulo="'. $id.'"');
 		return $modulo->result();
 	}




 	function save($array)
 	{
		$this->db->insert("modulo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmodulo',$id);
 		$this->db->update('modulo',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idmodulo',$id);
		$this->db->delete('modulo');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmodulo")->get('modulo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmodulo")->get('modulo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$modulo = $this->db->select("idmodulo")->order_by("idmodulo")->get('modulo')->result_array();
		$arr=array("idmodulo"=>$id);
		$clave=array_search($arr,$modulo);
	   if(array_key_exists($clave+1,$modulo))
		 {

 		$modulo = $this->db->query('select * from modulo where idmodulo="'. $modulo[$clave+1]["idmodulo"].'"');
		 }else{

 		$modulo = $this->db->query('select * from modulo where idmodulo="'. $id.'"');
		 }
		 	
 		return $modulo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$modulo = $this->db->select("idmodulo")->order_by("idmodulo")->get('modulo')->result_array();
		$arr=array("idmodulo"=>$id);
		$clave=array_search($arr,$modulo);
	   if(array_key_exists($clave-1,$modulo))
		 {

 		$modulo = $this->db->query('select * from modulo where idmodulo="'. $modulo[$clave-1]["idmodulo"].'"');
		 }else{

 		$modulo = $this->db->query('select * from modulo where idmodulo="'. $id.'"');
		 }
		 	
 		return $modulo;
 	}






 

}
