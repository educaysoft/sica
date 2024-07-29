<?php
class Egresado_model extends CI_model {

	function listar_egresado(){
		 $egresado= $this->db->get('egresado');
		 return $egresado;
	}

	function listar_egresado1(){
		 $egresado= $this->db->get('egresado1');
		 return $egresado;
	}


	function listar_egresado2(){
		 $egresado= $this->db->get('egresado2');
		 return $egresado;
	}






 	function egresado( $id){
 		$egresado = $this->db->query('select * from egresado where idegresado="'. $id.'"');
 		return $egresado;
 	}

 	function save($array)
 	{
		if(!empty($array) & is_array($array)){             
			$this->db->insert("egresado", $array);
			return ($this->db->affected_rows()>0)? $this->db->insert_id() : false;
		}else{
			return false;
		}
 	}

 	function save2($array)
 	{
		if(!empty($array) & is_array($array)){             
			$this->db->insert("egresado", $array);
			return ($this->db->affected_rows()>0)? $this->db->insert_id() : false;
		}else{
			return false;
		}
 	}






 	function update($id,$array_item)
 	{
 		$this->db->where('idegresado',$id);
		 $query= $this->db->get('egresado');
		if($query->num_rows()>0)
		{
 			$this->db->where('idegresado',$id);
 			$this->db->update('egresado',$array_item);
			return true;
		}else{
	        	return false;
		}

	}
 

  public function delete($id)
	{
 		$this->db->where('idegresado',$id);
		$this->db->delete('egresado');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idegresado")->get('egresado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idegresado")->get('egresado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$egresado = $this->db->select("idegresado")->order_by("idegresado")->get('egresado')->result_array();
		$arr=array("idegresado"=>$id);
		$clave=array_search($arr,$egresado);
	   if(array_key_exists($clave+1,$egresado))
		 {

 		$egresado = $this->db->query('select * from egresado where idegresado="'. $egresado[$clave+1]["idegresado"].'"');
		 }else{

 		$egresado = $this->db->query('select * from egresado where idegresado="'. $id.'"');
		 }
		 	
 		return $egresado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$egresado = $this->db->select("idegresado")->order_by("idegresado")->get('egresado')->result_array();
		$arr=array("idegresado"=>$id);
		$clave=array_search($arr,$egresado);
	   if(array_key_exists($clave-1,$egresado))
		 {

 		$egresado = $this->db->query('select * from egresado where idegresado="'. $egresado[$clave-1]["idegresado"].'"');
		 }else{

 		$egresado = $this->db->query('select * from egresado where idegresado="'. $id.'"');
		 }
		 	
 		return $egresado;
 	}


}
