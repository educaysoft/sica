<?php
class Codigoqr_model extends CI_model {

	function lista_codigoqrs(){
		 $codigoqr= $this->db->get('codigoqr');
		 return $codigoqr;
	}

 	function codigoqr( $id){
 		$codigoqr = $this->db->query('select * from codigoqr where idcodigoqr="'. $id.'"');
 		return $codigoqr;
 	}

 	function save($array)
 	{
		$this->db->insert("codigoqr", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcodigoqr',$id);
 		$this->db->update('codigoqr',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcodigoqr',$id);
		$this->db->delete('codigoqr');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcodigoqr")->get('codigoqr');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcodigoqr")->get('codigoqr');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$codigoqr = $this->db->select("idcodigoqr")->order_by("idcodigoqr")->get('codigoqr')->result_array();
		$arr=array("idcodigoqr"=>$id);
		$clave=array_search($arr,$codigoqr);
	   if(array_key_exists($clave+1,$codigoqr))
		 {

 		$codigoqr = $this->db->query('select * from codigoqr where idcodigoqr="'. $codigoqr[$clave+1]["idcodigoqr"].'"');
		 }else{

 		$codigoqr = $this->db->query('select * from codigoqr where idcodigoqr="'. $id.'"');
		 }
		 	
 		return $codigoqr;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$codigoqr = $this->db->select("idcodigoqr")->order_by("idcodigoqr")->get('codigoqr')->result_array();
		$arr=array("idcodigoqr"=>$id);
		$clave=array_search($arr,$codigoqr);
	   if(array_key_exists($clave-1,$codigoqr))
		 {

 		$codigoqr = $this->db->query('select * from codigoqr where idcodigoqr="'. $codigoqr[$clave-1]["idcodigoqr"].'"');
		 }else{

 		$codigoqr = $this->db->query('select * from codigoqr where idcodigoqr="'. $id.'"');
		 }
		 	
 		return $codigoqr;
 	}






}
