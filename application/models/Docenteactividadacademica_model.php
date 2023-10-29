<?php
class Docenteactividadacademica_model extends CI_model {

	function lista_docenteactividadacademicas(){
		 $docenteactividadacademica= $this->db->get('docenteactividadacademica');
		 return $docenteactividadacademica;
	}


	function lista_docenteactividadacademicasA($id){
		if($id>0){
 			$this->db->where('iddistributivodocente',$id);
		}
		 $docenteactividadacademica= $this->db->order_by("item")->get('docenteactividadacademica1');
		 return $docenteactividadacademica;
	}



 	function docenteactividadacademica( $id){
 		$docenteactividadacademica = $this->db->query('select * from docenteactividadacademica where iddocenteactividadacademica="'. $id.'"');
 		return $docenteactividadacademica;
 	}


 	function docenteactividadacademicasA( $idasignatura){
 		$docenteactividadacademica = $this->db->query('select * from docenteactividadacademica1 where idasignatura="'. $idasignatura.'"');
 		return $docenteactividadacademica;
 	}



 	function save($array)
 	{
		$this->db->insert("docenteactividadacademica", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddocenteactividadacademica',$id);
 		$this->db->update('docenteactividadacademica',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddocenteactividadacademica',$id);
		$this->db->delete('docenteactividadacademica');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocenteactividadacademica")->get('docenteactividadacademica');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocenteactividadacademica")->get('docenteactividadacademica');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$docenteactividadacademica = $this->db->select("iddocenteactividadacademica")->order_by("iddocenteactividadacademica")->get('docenteactividadacademica')->result_array();
		$arr=array("iddocenteactividadacademica"=>$id);
		$clave=array_search($arr,$docenteactividadacademica);
	   if(array_key_exists($clave+1,$docenteactividadacademica))
		 {

 		$docenteactividadacademica = $this->db->query('select * from docenteactividadacademica where iddocenteactividadacademica="'. $docenteactividadacademica[$clave+1]["iddocenteactividadacademica"].'"');
		 }else{

 		$docenteactividadacademica = $this->db->query('select * from docenteactividadacademica where iddocenteactividadacademica="'. $id.'"');
		 }
		 	
 		return $docenteactividadacademica;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$docenteactividadacademica = $this->db->select("iddocenteactividadacademica")->order_by("iddocenteactividadacademica")->get('docenteactividadacademica')->result_array();
		$arr=array("iddocenteactividadacademica"=>$id);
		$clave=array_search($arr,$docenteactividadacademica);
	   if(array_key_exists($clave-1,$docenteactividadacademica))
		 {

 		$docenteactividadacademica = $this->db->query('select * from docenteactividadacademica where iddocenteactividadacademica="'. $docenteactividadacademica[$clave-1]["iddocenteactividadacademica"].'"');
		 }else{

 		$docenteactividadacademica = $this->db->query('select * from docenteactividadacademica where iddocenteactividadacademica="'. $id.'"');
		 }
		 	
 		return $docenteactividadacademica;
 	}






}
