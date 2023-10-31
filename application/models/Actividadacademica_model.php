<?php
class Actividadacademica_model extends CI_model {

	function lista_actividadacademicas(){
		 $actividadacademica= $this->db->get('actividadacademica');
		 return $actividadacademica;
	}


	function lista_actividadacademicasA(){
		 $actividadacademica= $this->db->get('actividadacademica1');
		 return $actividadacademica;
	}



 	function actividadacademica( $id){
 		$actividadacademica = $this->db->query('select * from actividadacademica where idactividadacademica="'. $id.'"');
 		return $actividadacademica;
 	}


 	function actividadacademicasA( $idasignatura){
 		$actividadacademica = $this->db->query('select * from actividadacademica1 where idasignatura="'. $idasignatura.'"');
 		return $actividadacademica;
 	}



 	function save($array)
 	{
		$this->db->insert("actividadacademica", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idactividadacademica',$id);
 		$this->db->update('actividadacademica',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idactividadacademica',$id);
		$this->db->delete('actividadacademica');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idactividadacademica")->get('actividadacademica');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idactividadacademica")->get('actividadacademica');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$actividadacademica = $this->db->select("idactividadacademica")->order_by("idactividadacademica")->get('actividadacademica')->result_array();
		$arr=array("idactividadacademica"=>$id);
		$clave=array_search($arr,$actividadacademica);
	   if(array_key_exists($clave+1,$actividadacademica))
		 {

 		$actividadacademica = $this->db->query('select * from actividadacademica where idactividadacademica="'. $actividadacademica[$clave+1]["idactividadacademica"].'"');
		 }else{

 		$actividadacademica = $this->db->query('select * from actividadacademica where idactividadacademica="'. $id.'"');
		 }
		 	
 		return $actividadacademica;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$actividadacademica = $this->db->select("idactividadacademica")->order_by("idactividadacademica")->get('actividadacademica')->result_array();
		$arr=array("idactividadacademica"=>$id);
		$clave=array_search($arr,$actividadacademica);
	   if(array_key_exists($clave-1,$actividadacademica))
		 {

 		$actividadacademica = $this->db->query('select * from actividadacademica where idactividadacademica="'. $actividadacademica[$clave-1]["idactividadacademica"].'"');
		 }else{

 		$actividadacademica = $this->db->query('select * from actividadacademica where idactividadacademica="'. $id.'"');
		 }
		 	
 		return $actividadacademica;
 	}






}
