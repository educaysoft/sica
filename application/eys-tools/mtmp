<?php
class Pertinencia_model extends CI_model {

	function listar_pertinencia(){
		 $pertinencia= $this->db->get('pertinencia');
		 return $pertinencia;
	}

	function listar_pertinencia1($id){

		if($id>0)
		{
 			$pertinencia = $this->db->query('select * from pertinencia1 where idpertinencia="'. $id.'"');
		}else{
		 	$pertinencia= $this->db->get('pertinencia1');
		}	
		 return $pertinencia;
	}


	function listar_pertinencia1xestudio($id){

		if($id>0)
		{
 			$pertinencia = $this->db->query('select * from pertinencia1 where idestudio="'. $id.'"');
		}else{
		 	$pertinencia= $this->db->get('pertinencia1');
		}	
		 return $pertinencia;
	}





 	function pertinencia( $id){
 		$pertinencia = $this->db->query('select * from pertinencia where idpertinencia="'. $id.'"');
 		return $pertinencia;
 	}

 	function save($array)
 	{
		$this->db->insert("pertinencia", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpertinencia',$id);
		 $query= $this->db->get('pertinencia');
		if($query->num_rows()>0)
		{
 			$this->db->where('idpertinencia',$id);
 			$this->db->update('pertinencia',$array_item);
			return true;
		}else{
	        	return false;
		}

	}
 

  public function delete($id)
	{
 		$this->db->where('idpertinencia',$id);
		$this->db->delete('pertinencia');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idpertinencia")->get('pertinencia');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpertinencia")->get('pertinencia');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$pertinencia = $this->db->select("idpertinencia")->order_by("idpertinencia")->get('pertinencia')->result_array();
		$arr=array("idpertinencia"=>$id);
		$clave=array_search($arr,$pertinencia);
	   if(array_key_exists($clave+1,$pertinencia))
		 {

 		$pertinencia = $this->db->query('select * from pertinencia where idpertinencia="'. $pertinencia[$clave+1]["idpertinencia"].'"');
		 }else{

 		$pertinencia = $this->db->query('select * from pertinencia where idpertinencia="'. $id.'"');
		 }
		 	
 		return $pertinencia;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$pertinencia = $this->db->select("idpertinencia")->order_by("idpertinencia")->get('pertinencia')->result_array();
		$arr=array("idpertinencia"=>$id);
		$clave=array_search($arr,$pertinencia);
	   if(array_key_exists($clave-1,$pertinencia))
		 {

 		$pertinencia = $this->db->query('select * from pertinencia where idpertinencia="'. $pertinencia[$clave-1]["idpertinencia"].'"');
		 }else{

 		$pertinencia = $this->db->query('select * from pertinencia where idpertinencia="'. $id.'"');
		 }
		 	
 		return $pertinencia;
 	}


}
