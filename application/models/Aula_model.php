<?php
class Aula_model extends CI_model {

	function lista_aulas(){
		 $aula= $this->db->get('aula');
		 return $aula;
	}


	function lista_aulasA(){
		 $aula= $this->db->get('aula1');
		 return $aula;
	}




 	function aula( $id){
 		$aula = $this->db->query('select * from aula where idaula="'. $id.'"');
 		return $aula;
 	}

 	function save($array)
 	{
		$this->db->insert("aula", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idaula',$id);
 		$this->db->update('aula',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idaula',$id);
		$this->db->delete('aula');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idaula")->get('aula');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idaula")->get('aula');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$aula = $this->db->select("idaula")->order_by("idaula")->get('aula')->result_array();
		$arr=array("idaula"=>$id);
		$clave=array_search($arr,$aula);
	   if(array_key_exists($clave+1,$aula))
		 {

 		$aula = $this->db->query('select * from aula where idaula="'. $aula[$clave+1]["idaula"].'"');
		 }else{

 		$aula = $this->db->query('select * from aula where idaula="'. $id.'"');
		 }
		 	
 		return $aula;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$aula = $this->db->select("idaula")->order_by("idaula")->get('aula')->result_array();
		$arr=array("idaula"=>$id);
		$clave=array_search($arr,$aula);
	   if(array_key_exists($clave-1,$aula))
		 {

 		$aula = $this->db->query('select * from aula where idaula="'. $aula[$clave-1]["idaula"].'"');
		 }else{

 		$aula = $this->db->query('select * from aula where idaula="'. $id.'"');
		 }
		 	
 		return $aula;
 	}






 

}
