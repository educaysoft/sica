<?php
class Docente_model extends CI_model {

	function lista_docentes(){
		 $docente= $this->db->get('docente');
		 return $docente;
	}


	function lista_docentesA(){
		 $this->db->order_by("eldocente","asc");
		 $docente= $this->db->get('docente1');
		 return $docente;
	}

	function lista_docentesB(){
		 $this->db->order_by("eldocente","asc");
		 $docente= $this->db->get('docente2');
		 return $docente;
	}


 	function docente( $id){
 		$docente = $this->db->query('select * from docente where iddocente="'. $id.'"');
 		return $docente;
 	}


 	function docentespersona( $id){
 		$docente = $this->db->query('select * from docente where idpersona="'. $id.'"');
 		return $docente;
 	}



 	function save($array)
 	{
		$this->db->insert("docente", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddocente',$id);
 		$this->db->update('docente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddocente',$id);
		$this->db->delete('docente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocente")->get('docente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocente")->get('docente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$docente = $this->db->select("iddocente")->order_by("iddocente")->get('docente')->result_array();
		$arr=array("iddocente"=>$id);
		$clave=array_search($arr,$docente);
	   if(array_key_exists($clave+1,$docente))
		 {

 		$docente = $this->db->query('select * from docente where iddocente="'. $docente[$clave+1]["iddocente"].'"');
		 }else{

 		$docente = $this->db->query('select * from docente where iddocente="'. $id.'"');
		 }
		 	
 		return $docente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$docente = $this->db->select("iddocente")->order_by("iddocente")->get('docente')->result_array();
		$arr=array("iddocente"=>$id);
		$clave=array_search($arr,$docente);
	   if(array_key_exists($clave-1,$docente))
		 {

 		$docente = $this->db->query('select * from docente where iddocente="'. $docente[$clave-1]["iddocente"].'"');
		 }else{

 		$docente = $this->db->query('select * from docente where iddocente="'. $id.'"');
		 }
		 	
 		return $docente;
 	}






}
