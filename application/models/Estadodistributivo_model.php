<?php
class Estadodistributivo_model extends CI_model {

	function lista_estadodistributivos(){
		 $estadodistributivo= $this->db->get('estadodistributivo');
		 return $estadodistributivo;
	}

 	function estadodistributivo( $id){
 		$estadodistributivo = $this->db->query('select * from estadodistributivo where idestadodistributivo="'. $id.'"');
 		return $estadodistributivo;
 	}

 	function save($array)
 	{
		$this->db->insert("estadodistributivo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestadodistributivo',$id);
 		$this->db->update('estadodistributivo',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idestadodistributivo',$id);
		$this->db->delete('estadodistributivo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestadodistributivo")->get('estadodistributivo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestadodistributivo")->get('estadodistributivo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estadodistributivo = $this->db->select("idestadodistributivo")->order_by("idestadodistributivo")->get('estadodistributivo')->result_array();
		$arr=array("idestadodistributivo"=>$id);
		$clave=array_search($arr,$estadodistributivo);
	   if(array_key_exists($clave+1,$estadodistributivo))
		 {

 		$estadodistributivo = $this->db->query('select * from estadodistributivo where idestadodistributivo="'. $estadodistributivo[$clave+1]["idestadodistributivo"].'"');
		 }else{

 		$estadodistributivo = $this->db->query('select * from estadodistributivo where idestadodistributivo="'. $id.'"');
		 }
		 	
 		return $estadodistributivo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estadodistributivo = $this->db->select("idestadodistributivo")->order_by("idestadodistributivo")->get('estadodistributivo')->result_array();
		$arr=array("idestadodistributivo"=>$id);
		$clave=array_search($arr,$estadodistributivo);
	   if(array_key_exists($clave-1,$estadodistributivo))
		 {

 		$estadodistributivo = $this->db->query('select * from estadodistributivo where idestadodistributivo="'. $estadodistributivo[$clave-1]["idestadodistributivo"].'"');
		 }else{

 		$estadodistributivo = $this->db->query('select * from estadodistributivo where idestadodistributivo="'. $id.'"');
		 }
		 	
 		return $estadodistributivo;
 	}






}
