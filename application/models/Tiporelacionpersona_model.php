<?php
class Tiporelacionpersona_model extends CI_model {

	function lista_tiporelacionpersonas(){
		 $tiporelacionpersona= $this->db->get('tiporelacionpersona');
		 return $tiporelacionpersona;
	}

 	function tiporelacionpersona( $id){
 		$tiporelacionpersona = $this->db->query('select * from tiporelacionpersona where idtiporelacionpersona="'. $id.'"');
 		return $tiporelacionpersona;
 	}

 	function save($array)
 	{
		$this->db->insert("tiporelacionpersona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtiporelacionpersona',$id);
 		$this->db->update('tiporelacionpersona',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idtiporelacionpersona',$id);
		$this->db->delete('tiporelacionpersona');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtiporelacionpersona")->get('tiporelacionpersona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtiporelacionpersona")->get('tiporelacionpersona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tiporelacionpersona = $this->db->select("idtiporelacionpersona")->order_by("idtiporelacionpersona")->get('tiporelacionpersona')->result_array();
		$arr=array("idtiporelacionpersona"=>$id);
		$clave=array_search($arr,$tiporelacionpersona);
	   if(array_key_exists($clave+1,$tiporelacionpersona))
		 {

 		$tiporelacionpersona = $this->db->query('select * from tiporelacionpersona where idtiporelacionpersona="'. $tiporelacionpersona[$clave+1]["idtiporelacionpersona"].'"');
		 }else{

 		$tiporelacionpersona = $this->db->query('select * from tiporelacionpersona where idtiporelacionpersona="'. $id.'"');
		 }
		 	
 		return $tiporelacionpersona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tiporelacionpersona = $this->db->select("idtiporelacionpersona")->order_by("idtiporelacionpersona")->get('tiporelacionpersona')->result_array();
		$arr=array("idtiporelacionpersona"=>$id);
		$clave=array_search($arr,$tiporelacionpersona);
	   if(array_key_exists($clave-1,$tiporelacionpersona))
		 {

 		$tiporelacionpersona = $this->db->query('select * from tiporelacionpersona where idtiporelacionpersona="'. $tiporelacionpersona[$clave-1]["idtiporelacionpersona"].'"');
		 }else{

 		$tiporelacionpersona = $this->db->query('select * from tiporelacionpersona where idtiporelacionpersona="'. $id.'"');
		 }
		 	
 		return $tiporelacionpersona;
 	}






 

}
