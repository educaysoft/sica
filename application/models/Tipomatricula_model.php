<?php
class Tipomatricula_model extends CI_model {

	function lista_tipomatriculas(){
		 $tipomatricula= $this->db->get('tipomatricula');
		 return $tipomatricula;
	}

	function lista_tipomatriculasA(){
		 $tipomatricula= $this->db->get('tipomatricula1');
		 return $tipomatricula;
	}




 	function tipomatricula( $id){
 		$tipomatricula = $this->db->query('select * from tipomatricula where idtipomatricula="'. $id.'"');
 		return $tipomatricula;
 	}

 	function save($array)
 	{
		$this->db->insert("tipomatricula", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipomatricula',$id);
 		$this->db->update('tipomatricula',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipomatricula',$id);
		$this->db->delete('tipomatricula');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipomatricula")->get('tipomatricula');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipomatricula")->get('tipomatricula');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipomatricula = $this->db->select("idtipomatricula")->order_by("idtipomatricula")->get('tipomatricula')->result_array();
		$arr=array("idtipomatricula"=>$id);
		$clave=array_search($arr,$tipomatricula);
	   if(array_key_exists($clave+1,$tipomatricula))
		 {

 		$tipomatricula = $this->db->query('select * from tipomatricula where idtipomatricula="'. $tipomatricula[$clave+1]["idtipomatricula"].'"');
		 }else{

 		$tipomatricula = $this->db->query('select * from tipomatricula where idtipomatricula="'. $id.'"');
		 }
		 	
 		return $tipomatricula;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipomatricula = $this->db->select("idtipomatricula")->order_by("idtipomatricula")->get('tipomatricula')->result_array();
		$arr=array("idtipomatricula"=>$id);
		$clave=array_search($arr,$tipomatricula);
	   if(array_key_exists($clave-1,$tipomatricula))
		 {

 		$tipomatricula = $this->db->query('select * from tipomatricula where idtipomatricula="'. $tipomatricula[$clave-1]["idtipomatricula"].'"');
		 }else{

 		$tipomatricula = $this->db->query('select * from tipomatricula where idtipomatricula="'. $id.'"');
		 }
		 	
 		return $tipomatricula;
 	}








}
