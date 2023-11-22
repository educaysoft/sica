<?php
class Departamentodestino_model extends CI_model {

	function listar_departamentodestino(){
		 $departamentodestino= $this->db->get('departamentodestino');
		 return $departamentodestino;
	}

	function listar_departamentodestino1($id){

		if($id>0)
		{
 			$departamentodestino = $this->db->query('select * from departamentodestino1 where iddepartamentodestino="'. $id.'"');
		}else{
		 	$departamentodestino= $this->db->get('departamentodestino1');
		}	
		 return $departamentodestino;
	}


	function listar_departamentodestino1xestudio($id){

		if($id>0)
		{
 			$departamentodestino = $this->db->query('select * from departamentodestino1 where idestudio="'. $id.'"');
		}else{
		 	$departamentodestino= $this->db->get('departamentodestino1');
		}	
		 return $departamentodestino;
	}





 	function departamentodestino( $id){
 		$departamentodestino = $this->db->query('select * from departamentodestino where iddepartamentodestino="'. $id.'"');
 		return $departamentodestino;
 	}

 	function save($array)
 	{
		$this->db->insert("departamentodestino", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddepartamentodestino',$id);
		 $query= $this->db->get('departamentodestino');
		if($query->num_rows()>0)
		{
 			$this->db->where('iddepartamentodestino',$id);
 			$this->db->update('departamentodestino',$array_item);
			return true;
		}else{
	        	return false;
		}

	}
 

  public function delete($id)
	{
 		$this->db->where('iddepartamentodestino',$id);
		$this->db->delete('departamentodestino');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddepartamentodestino")->get('departamentodestino');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddepartamentodestino")->get('departamentodestino');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$departamentodestino = $this->db->select("iddepartamentodestino")->order_by("iddepartamentodestino")->get('departamentodestino')->result_array();
		$arr=array("iddepartamentodestino"=>$id);
		$clave=array_search($arr,$departamentodestino);
	   if(array_key_exists($clave+1,$departamentodestino))
		 {

 		$departamentodestino = $this->db->query('select * from departamentodestino where iddepartamentodestino="'. $departamentodestino[$clave+1]["iddepartamentodestino"].'"');
		 }else{

 		$departamentodestino = $this->db->query('select * from departamentodestino where iddepartamentodestino="'. $id.'"');
		 }
		 	
 		return $departamentodestino;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$departamentodestino = $this->db->select("iddepartamentodestino")->order_by("iddepartamentodestino")->get('departamentodestino')->result_array();
		$arr=array("iddepartamentodestino"=>$id);
		$clave=array_search($arr,$departamentodestino);
	   if(array_key_exists($clave-1,$departamentodestino))
		 {

 		$departamentodestino = $this->db->query('select * from departamentodestino where iddepartamentodestino="'. $departamentodestino[$clave-1]["iddepartamentodestino"].'"');
		 }else{

 		$departamentodestino = $this->db->query('select * from departamentodestino where iddepartamentodestino="'. $id.'"');
		 }
		 	
 		return $departamentodestino;
 	}


}
