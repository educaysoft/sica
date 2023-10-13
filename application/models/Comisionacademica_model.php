<?php
class Comisionacademica_model extends CI_model {

	function lista_comisionacademicas(){
		 $comisionacademica= $this->db->get('comisionacademica');
		 return $comisionacademica;
	}

	function lista_comisionacademicasA(){
		 $comisionacademica= $this->db->get('comisionacademica1');
		 return $comisionacademica;
	}




 	function comisionacademica( $id){
 		$comisionacademica = $this->db->query('select * from comisionacademica where idcomisionacademica="'. $id.'"');
 		return $comisionacademica;
 	}

 	function save($array)
 	{
		$this->db->insert("comisionacademica", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcomisionacademica',$id);
 		$this->db->update('comisionacademica',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcomisionacademica',$id);
		$this->db->delete('comisionacademica');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcomisionacademica")->get('comisionacademica');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcomisionacademica")->get('comisionacademica');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$comisionacademica = $this->db->select("idcomisionacademica")->order_by("idcomisionacademica")->get('comisionacademica')->result_array();
		$arr=array("idcomisionacademica"=>$id);
		$clave=array_search($arr,$comisionacademica);
	   if(array_key_exists($clave+1,$comisionacademica))
		 {

 		$comisionacademica = $this->db->query('select * from comisionacademica where idcomisionacademica="'. $comisionacademica[$clave+1]["idcomisionacademica"].'"');
		 }else{

 		$comisionacademica = $this->db->query('select * from comisionacademica where idcomisionacademica="'. $id.'"');
		 }
		 	
 		return $comisionacademica;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$comisionacademica = $this->db->select("idcomisionacademica")->order_by("idcomisionacademica")->get('comisionacademica')->result_array();
		$arr=array("idcomisionacademica"=>$id);
		$clave=array_search($arr,$comisionacademica);
	   if(array_key_exists($clave-1,$comisionacademica))
		 {

 		$comisionacademica = $this->db->query('select * from comisionacademica where idcomisionacademica="'. $comisionacademica[$clave-1]["idcomisionacademica"].'"');
		 }else{

 		$comisionacademica = $this->db->query('select * from comisionacademica where idcomisionacademica="'. $id.'"');
		 }
		 	
 		return $comisionacademica;
 	}








}
