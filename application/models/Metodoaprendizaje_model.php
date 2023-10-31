<?php
class Metodoaprendizaje_model extends CI_model {

	function lista_metodoaprendizajes(){
		 $metodoaprendizaje= $this->db->get('metodoaprendizaje');
		 return $metodoaprendizaje;
	}

 	function metodoaprendizaje( $id){
 		$metodoaprendizaje = $this->db->query('select * from metodoaprendizaje where idmetodoaprendizaje="'. $id.'"');
 		return $metodoaprendizaje;
 	}

 	function save($array)
 	{
		$this->db->insert("metodoaprendizaje", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmetodoaprendizaje',$id);
 		$this->db->update('metodoaprendizaje',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmetodoaprendizaje',$id);
		$this->db->delete('metodoaprendizaje');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmetodoaprendizaje")->get('metodoaprendizaje');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmetodoaprendizaje")->get('metodoaprendizaje');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$metodoaprendizaje = $this->db->select("idmetodoaprendizaje")->order_by("idmetodoaprendizaje")->get('metodoaprendizaje')->result_array();
		$arr=array("idmetodoaprendizaje"=>$id);
		$clave=array_search($arr,$metodoaprendizaje);
	   if(array_key_exists($clave+1,$metodoaprendizaje))
		 {

 		$metodoaprendizaje = $this->db->query('select * from metodoaprendizaje where idmetodoaprendizaje="'. $metodoaprendizaje[$clave+1]["idmetodoaprendizaje"].'"');
		 }else{

 		$metodoaprendizaje = $this->db->query('select * from metodoaprendizaje where idmetodoaprendizaje="'. $id.'"');
		 }
		 	
 		return $metodoaprendizaje;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$metodoaprendizaje = $this->db->select("idmetodoaprendizaje")->order_by("idmetodoaprendizaje")->get('metodoaprendizaje')->result_array();
		$arr=array("idmetodoaprendizaje"=>$id);
		$clave=array_search($arr,$metodoaprendizaje);
	   if(array_key_exists($clave-1,$metodoaprendizaje))
		 {

 		$metodoaprendizaje = $this->db->query('select * from metodoaprendizaje where idmetodoaprendizaje="'. $metodoaprendizaje[$clave-1]["idmetodoaprendizaje"].'"');
		 }else{

 		$metodoaprendizaje = $this->db->query('select * from metodoaprendizaje where idmetodoaprendizaje="'. $id.'"');
		 }
		 	
 		return $metodoaprendizaje;
 	}






}
