<?php
class Relacionpersona_model extends CI_model {

	function lista_relacionpersonas(){
		 $relacionpersona= $this->db->get('relacionpersona');
		 return $relacionpersona;
	}


	function lista_relacionpersonasA(){
		 $relacionpersona= $this->db->get('relacionpersona1');
		 return $relacionpersona;
	}



 	function relacionpersona( $id){
 		$relacionpersona = $this->db->query('select * from relacionpersona where idrelacionpersona="'. $id.'"');
 		return $relacionpersona;
 	}


 	function relacionpersonaspersona( $id){
 		$relacionpersona = $this->db->query('select * from relacionpersona where idpersona="'. $id.'"');
 		return $relacionpersona;
 	}



 	function save($array)
 	{
		$this->db->insert("relacionpersona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idrelacionpersona',$id);
 		$this->db->update('relacionpersona',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idrelacionpersona',$id);
		$this->db->delete('relacionpersona');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idrelacionpersona")->get('relacionpersona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idrelacionpersona")->get('relacionpersona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$relacionpersona = $this->db->select("idrelacionpersona")->order_by("idrelacionpersona")->get('relacionpersona')->result_array();
		$arr=array("idrelacionpersona"=>$id);
		$clave=array_search($arr,$relacionpersona);
	   if(array_key_exists($clave+1,$relacionpersona))
		 {

 		$relacionpersona = $this->db->query('select * from relacionpersona where idrelacionpersona="'. $relacionpersona[$clave+1]["idrelacionpersona"].'"');
		 }else{

 		$relacionpersona = $this->db->query('select * from relacionpersona where idrelacionpersona="'. $id.'"');
		 }
		 	
 		return $relacionpersona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$relacionpersona = $this->db->select("idrelacionpersona")->order_by("idrelacionpersona")->get('relacionpersona')->result_array();
		$arr=array("idrelacionpersona"=>$id);
		$clave=array_search($arr,$relacionpersona);
	   if(array_key_exists($clave-1,$relacionpersona))
		 {

 		$relacionpersona = $this->db->query('select * from relacionpersona where idrelacionpersona="'. $relacionpersona[$clave-1]["idrelacionpersona"].'"');
		 }else{

 		$relacionpersona = $this->db->query('select * from relacionpersona where idrelacionpersona="'. $id.'"');
		 }
		 	
 		return $relacionpersona;
 	}






}
