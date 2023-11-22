<?php
class Departamentofuente_model extends CI_model {

	function listar_departamentofuente(){
		 $departamentofuente= $this->db->get('departamentofuente');
		 return $departamentofuente;
	}

	function listar_departamentofuente1($id){

		if($id>0)
		{
 			$departamentofuente = $this->db->query('select * from departamentofuente1 where iddepartamentofuente="'. $id.'"');
		}else{
		 	$departamentofuente= $this->db->get('departamentofuente1');
		}	
		 return $departamentofuente;
	}


	function listar_departamentofuente1xestudio($id){

		if($id>0)
		{
 			$departamentofuente = $this->db->query('select * from departamentofuente1 where idestudio="'. $id.'"');
		}else{
		 	$departamentofuente= $this->db->get('departamentofuente1');
		}	
		 return $departamentofuente;
	}





 	function departamentofuente( $id){
 		$departamentofuente = $this->db->query('select * from departamentofuente where iddepartamentofuente="'. $id.'"');
 		return $departamentofuente;
 	}

 	function save($array)
 	{
		$this->db->insert("departamentofuente", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddepartamentofuente',$id);
		 $query= $this->db->get('departamentofuente');
		if($query->num_rows()>0)
		{
 			$this->db->where('iddepartamentofuente',$id);
 			$this->db->update('departamentofuente',$array_item);
			return true;
		}else{
	        	return false;
		}

	}
 

  public function delete($id)
	{
 		$this->db->where('iddepartamentofuente',$id);
		$this->db->delete('departamentofuente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddepartamentofuente")->get('departamentofuente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddepartamentofuente")->get('departamentofuente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$departamentofuente = $this->db->select("iddepartamentofuente")->order_by("iddepartamentofuente")->get('departamentofuente')->result_array();
		$arr=array("iddepartamentofuente"=>$id);
		$clave=array_search($arr,$departamentofuente);
	   if(array_key_exists($clave+1,$departamentofuente))
		 {

 		$departamentofuente = $this->db->query('select * from departamentofuente where iddepartamentofuente="'. $departamentofuente[$clave+1]["iddepartamentofuente"].'"');
		 }else{

 		$departamentofuente = $this->db->query('select * from departamentofuente where iddepartamentofuente="'. $id.'"');
		 }
		 	
 		return $departamentofuente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$departamentofuente = $this->db->select("iddepartamentofuente")->order_by("iddepartamentofuente")->get('departamentofuente')->result_array();
		$arr=array("iddepartamentofuente"=>$id);
		$clave=array_search($arr,$departamentofuente);
	   if(array_key_exists($clave-1,$departamentofuente))
		 {

 		$departamentofuente = $this->db->query('select * from departamentofuente where iddepartamentofuente="'. $departamentofuente[$clave-1]["iddepartamentofuente"].'"');
		 }else{

 		$departamentofuente = $this->db->query('select * from departamentofuente where iddepartamentofuente="'. $id.'"');
		 }
		 	
 		return $departamentofuente;
 	}


}
