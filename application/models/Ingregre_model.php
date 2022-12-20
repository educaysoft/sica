<?php
class Ingregre_model extends CI_model {

	function lista_ingregres(){
		 $ingregre= $this->db->get('ingregre');
		 return $ingregre;
	}


	function lista_ingregresA(){
		 $ingregre= $this->db->get('ingregre1');
		 return $ingregre;
	}



 	function ingregre( $id){
 		$ingregre = $this->db->query('select * from ingregre where idingregre="'. $id.'"');
 		return $ingregre;
 	}


 	function ingregrespersona( $id){
 		$ingregre = $this->db->query('select * from ingregre where idpersona="'. $id.'"');
 		return $ingregre;
 	}



 	function save($array)
 	{
		$this->db->insert("ingregre", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idingregre',$id);
 		$this->db->update('ingregre',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idingregre',$id);
		$this->db->delete('ingregre');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idingregre")->get('ingregre');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idingregre")->get('ingregre');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ingregre = $this->db->select("idingregre")->order_by("idingregre")->get('ingregre')->result_array();
		$arr=array("idingregre"=>$id);
		$clave=array_search($arr,$ingregre);
	   if(array_key_exists($clave+1,$ingregre))
		 {

 		$ingregre = $this->db->query('select * from ingregre where idingregre="'. $ingregre[$clave+1]["idingregre"].'"');
		 }else{

 		$ingregre = $this->db->query('select * from ingregre where idingregre="'. $id.'"');
		 }
		 	
 		return $ingregre;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ingregre = $this->db->select("idingregre")->order_by("idingregre")->get('ingregre')->result_array();
		$arr=array("idingregre"=>$id);
		$clave=array_search($arr,$ingregre);
	   if(array_key_exists($clave-1,$ingregre))
		 {

 		$ingregre = $this->db->query('select * from ingregre where idingregre="'. $ingregre[$clave-1]["idingregre"].'"');
		 }else{

 		$ingregre = $this->db->query('select * from ingregre where idingregre="'. $id.'"');
		 }
		 	
 		return $ingregre;
 	}






}
