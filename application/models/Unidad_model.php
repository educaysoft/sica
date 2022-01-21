<?php
class Unidad_model extends CI_model {

	function lista_unidad(){
		 $unidad= $this->db->get('unidad');
		 return $unidad;
	}


	function lista_unidadesA(){
		 $unidad= $this->db->get('unidad1');
		 return $unidad;
	}



 	function unidad( $id){
 		$unidad = $this->db->query('select * from unidad where idunidad="'. $id.'"');
 		return $unidad;
 	}

 	function save($array)
 	{
		$this->db->insert("unidad", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idunidad',$id);
 		$this->db->update('unidad',$array_item);
	}



 	public function delete($id)
	{
 		$this->db->where('idunidad',$id);
		$this->db->delete('unidad');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idunidad")->get('unidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idunidad")->get('unidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$unidad = $this->db->select("idunidad")->order_by("idunidad")->get('unidad')->result_array();
		$arr=array("idunidad"=>$id);
		$clave=array_search($arr,$unidad);
	   if(array_key_exists($clave+1,$unidad))
		 {

 		$unidad = $this->db->query('select * from unidad where idunidad="'. $unidad[$clave+1]["idunidad"].'"');
		 }else{

 		$unidad = $this->db->query('select * from unidad where idunidad="'. $id.'"');
		 }
		 	
 		return $unidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$unidad = $this->db->select("idunidad")->order_by("idunidad")->get('unidad')->result_array();
		$arr=array("idunidad"=>$id);
		$clave=array_search($arr,$unidad);
	   if(array_key_exists($clave-1,$unidad))
		 {

 		$unidad = $this->db->query('select * from unidad where idunidad="'. $unidad[$clave-1]["idunidad"].'"');
		 }else{

 		$unidad = $this->db->query('select * from unidad where idunidad="'. $id.'"');
		 }
		 	
 		return $unidad;
 	}








}
