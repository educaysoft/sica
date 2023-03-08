<?php
class Tramite_model extends CI_model {

	function lista_procesos(){
		 $proceso= $this->db->get('proceso');
		 return $proceso;
	}


	function lista_procesosA(){
		 $proceso= $this->db->get('proceso1');
		 return $proceso;
	}




 	function proceso( $id){
 		$proceso = $this->db->query('select * from proceso where idproceso="'. $id.'"');
 		return $proceso;
 	}

 	function save($array)
 	{
		$this->db->insert("proceso", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idproceso',$id);
 		$this->db->update('proceso',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idproceso',$id);
		$this->db->delete('proceso');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idproceso")->get('proceso');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idproceso")->get('proceso');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$proceso = $this->db->select("idproceso")->order_by("idproceso")->get('proceso')->result_array();
		$arr=array("idproceso"=>$id);
		$clave=array_search($arr,$proceso);
	   if(array_key_exists($clave+1,$proceso))
		 {

 		$proceso = $this->db->query('select * from proceso where idproceso="'. $proceso[$clave+1]["idproceso"].'"');
		 }else{

 		$proceso = $this->db->query('select * from proceso where idproceso="'. $id.'"');
		 }
		 	
 		return $proceso;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$proceso = $this->db->select("idproceso")->order_by("idproceso")->get('proceso')->result_array();
		$arr=array("idproceso"=>$id);
		$clave=array_search($arr,$proceso);
	   if(array_key_exists($clave-1,$proceso))
		 {

 		$proceso = $this->db->query('select * from proceso where idproceso="'. $proceso[$clave-1]["idproceso"].'"');
		 }else{

 		$proceso = $this->db->query('select * from proceso where idproceso="'. $id.'"');
		 }
		 	
 		return $proceso;
 	}






 

}
