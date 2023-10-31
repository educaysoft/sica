<?php
class Tipopublicaciondocente_model extends CI_model {

	function lista_tipopublicaciondocentes(){
		 $tipopublicaciondocente= $this->db->get('tipopublicaciondocente');
		 return $tipopublicaciondocente;
	}

 	function tipopublicaciondocente( $id){
 		$tipopublicaciondocente = $this->db->query('select * from tipopublicaciondocente where idtipopublicaciondocente="'. $id.'"');
 		return $tipopublicaciondocente;
 	}

 	function save($array)
 	{
		$this->db->insert("tipopublicaciondocente", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipopublicaciondocente',$id);
 		$this->db->update('tipopublicaciondocente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipopublicaciondocente',$id);
		$this->db->delete('tipopublicaciondocente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipopublicaciondocente")->get('tipopublicaciondocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipopublicaciondocente")->get('tipopublicaciondocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipopublicaciondocente = $this->db->select("idtipopublicaciondocente")->order_by("idtipopublicaciondocente")->get('tipopublicaciondocente')->result_array();
		$arr=array("idtipopublicaciondocente"=>$id);
		$clave=array_search($arr,$tipopublicaciondocente);
	   if(array_key_exists($clave+1,$tipopublicaciondocente))
		 {

 		$tipopublicaciondocente = $this->db->query('select * from tipopublicaciondocente where idtipopublicaciondocente="'. $tipopublicaciondocente[$clave+1]["idtipopublicaciondocente"].'"');
		 }else{

 		$tipopublicaciondocente = $this->db->query('select * from tipopublicaciondocente where idtipopublicaciondocente="'. $id.'"');
		 }
		 	
 		return $tipopublicaciondocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipopublicaciondocente = $this->db->select("idtipopublicaciondocente")->order_by("idtipopublicaciondocente")->get('tipopublicaciondocente')->result_array();
		$arr=array("idtipopublicaciondocente"=>$id);
		$clave=array_search($arr,$tipopublicaciondocente);
	   if(array_key_exists($clave-1,$tipopublicaciondocente))
		 {

 		$tipopublicaciondocente = $this->db->query('select * from tipopublicaciondocente where idtipopublicaciondocente="'. $tipopublicaciondocente[$clave-1]["idtipopublicaciondocente"].'"');
		 }else{

 		$tipopublicaciondocente = $this->db->query('select * from tipopublicaciondocente where idtipopublicaciondocente="'. $id.'"');
		 }
		 	
 		return $tipopublicaciondocente;
 	}






}
