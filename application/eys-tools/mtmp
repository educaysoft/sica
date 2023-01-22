<?php
class Nacionalidad_model extends CI_model {

	function lista_nacionalidades(){
		 $nacionalidad= $this->db->get('nacionalidad');
		 return $nacionalidad;
	}

	function lista_nacionalidadesA(){
		 $nacionalidad= $this->db->get('nacionalidad1');
		 return $nacionalidad;
	}




 	function nacionalidad( $id){
 		$nacionalidad = $this->db->query('select * from nacionalidad where idnacionalidad="'. $id.'"');
 		return $nacionalidad;
 	}

 	function save($array)
 	{
		$this->db->insert("nacionalidad", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idnacionalidad',$id);
 		$this->db->update('nacionalidad',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idnacionalidad',$id);
		$this->db->delete('nacionalidad');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idnacionalidad")->get('nacionalidad');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idnacionalidad")->get('nacionalidad');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$nacionalidad = $this->db->select("idnacionalidad")->order_by("idnacionalidad")->get('nacionalidad')->result_array();
		$arr=array("idnacionalidad"=>$id);
		$clave=array_search($arr,$nacionalidad);
	   if(array_key_exists($clave+1,$nacionalidad))
		 {

 		$nacionalidad = $this->db->query('select * from nacionalidad where idnacionalidad="'. $nacionalidad[$clave+1]["idnacionalidad"].'"');
		 }else{

 		$nacionalidad = $this->db->query('select * from nacionalidad where idnacionalidad="'. $id.'"');
		 }
		 	
 		return $nacionalidad;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$nacionalidad = $this->db->select("idnacionalidad")->order_by("idnacionalidad")->get('nacionalidad')->result_array();
		$arr=array("idnacionalidad"=>$id);
		$clave=array_search($arr,$nacionalidad);
	   if(array_key_exists($clave-1,$nacionalidad))
		 {

 		$nacionalidad = $this->db->query('select * from nacionalidad where idnacionalidad="'. $nacionalidad[$clave-1]["idnacionalidad"].'"');
		 }else{

 		$nacionalidad = $this->db->query('select * from nacionalidad where idnacionalidad="'. $id.'"');
		 }
		 	
 		return $nacionalidad;
 	}








}
