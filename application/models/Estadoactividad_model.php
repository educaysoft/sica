<?php
class Estadoactividad_model extends CI_model {

	function lista_estadoactividads(){
		 $estadoactividad= $this->db->get('estadoactividad');
		 return $estadoactividad;
	}

 	function estadoactividad( $id){
 		$estadoactividad = $this->db->query('select * from estadoactividad where idestadoactividad="'. $id.'"');
 		return $estadoactividad;
 	}

 	function save($array)
 	{
		$this->db->insert("estadoactividad", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestadoactividad',$id);
 		$this->db->update('estadoactividad',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idestadoactividad',$id);
		$this->db->delete('estadoactividad');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestadoactividad")->get('estadoactividad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestadoactividad")->get('estadoactividad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estadoactividad = $this->db->select("idestadoactividad")->order_by("idestadoactividad")->get('estadoactividad')->result_array();
		$arr=array("idestadoactividad"=>$id);
		$clave=array_search($arr,$estadoactividad);
	   if(array_key_exists($clave+1,$estadoactividad))
		 {

 		$estadoactividad = $this->db->query('select * from estadoactividad where idestadoactividad="'. $estadoactividad[$clave+1]["idestadoactividad"].'"');
		 }else{

 		$estadoactividad = $this->db->query('select * from estadoactividad where idestadoactividad="'. $id.'"');
		 }
		 	
 		return $estadoactividad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estadoactividad = $this->db->select("idestadoactividad")->order_by("idestadoactividad")->get('estadoactividad')->result_array();
		$arr=array("idestadoactividad"=>$id);
		$clave=array_search($arr,$estadoactividad);
	   if(array_key_exists($clave-1,$estadoactividad))
		 {

 		$estadoactividad = $this->db->query('select * from estadoactividad where idestadoactividad="'. $estadoactividad[$clave-1]["idestadoactividad"].'"');
		 }else{

 		$estadoactividad = $this->db->query('select * from estadoactividad where idestadoactividad="'. $id.'"');
		 }
		 	
 		return $estadoactividad;
 	}






}
