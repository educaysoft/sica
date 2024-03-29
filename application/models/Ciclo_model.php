<?php
class Ciclo_model extends CI_model {

	function lista_ciclos(){
		 $ciclo= $this->db->get('ciclo');
		 return $ciclo;
	}

 	function ciclo( $id){
 		$ciclo = $this->db->query('select * from ciclo where idciclo="'. $id.'"');
 		return $ciclo;
 	}

 	function save($array)
 	{
		$this->db->insert("ciclo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idciclo',$id);
 		$this->db->update('ciclo',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idciclo',$id);
		$this->db->delete('ciclo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idciclo")->get('ciclo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idciclo")->get('ciclo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ciclo = $this->db->select("idciclo")->order_by("idciclo")->get('ciclo')->result_array();
		$arr=array("idciclo"=>$id);
		$clave=array_search($arr,$ciclo);
	   if(array_key_exists($clave+1,$ciclo))
		 {

 		$ciclo = $this->db->query('select * from ciclo where idciclo="'. $ciclo[$clave+1]["idciclo"].'"');
		 }else{

 		$ciclo = $this->db->query('select * from ciclo where idciclo="'. $id.'"');
		 }
		 	
 		return $ciclo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ciclo = $this->db->select("idciclo")->order_by("idciclo")->get('ciclo')->result_array();
		$arr=array("idciclo"=>$id);
		$clave=array_search($arr,$ciclo);
	   if(array_key_exists($clave-1,$ciclo))
		 {

 		$ciclo = $this->db->query('select * from ciclo where idciclo="'. $ciclo[$clave-1]["idciclo"].'"');
		 }else{

 		$ciclo = $this->db->query('select * from ciclo where idciclo="'. $id.'"');
		 }
		 	
 		return $ciclo;
 	}






}
