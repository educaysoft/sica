<?php
class Sexo_model extends CI_model {

	function lista_sexos(){
		 $sexo= $this->db->get('sexo');
		 return $sexo;
	}

	function lista_sexosA(){
		 $sexo= $this->db->get('sexo1');
		 return $sexo;
	}




 	function sexo( $id){
 		$sexo = $this->db->query('select * from sexo where idsexo="'. $id.'"');
 		return $sexo;
 	}

 	function save($array)
 	{
		$this->db->insert("sexo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idsexo',$id);
 		$this->db->update('sexo',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idsexo',$id);
		$this->db->delete('sexo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idsexo")->get('sexo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idsexo")->get('sexo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$sexo = $this->db->select("idsexo")->order_by("idsexo")->get('sexo')->result_array();
		$arr=array("idsexo"=>$id);
		$clave=array_search($arr,$sexo);
	   if(array_key_exists($clave+1,$sexo))
		 {

 		$sexo = $this->db->query('select * from sexo where idsexo="'. $sexo[$clave+1]["idsexo"].'"');
		 }else{

 		$sexo = $this->db->query('select * from sexo where idsexo="'. $id.'"');
		 }
		 	
 		return $sexo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$sexo = $this->db->select("idsexo")->order_by("idsexo")->get('sexo')->result_array();
		$arr=array("idsexo"=>$id);
		$clave=array_search($arr,$sexo);
	   if(array_key_exists($clave-1,$sexo))
		 {

 		$sexo = $this->db->query('select * from sexo where idsexo="'. $sexo[$clave-1]["idsexo"].'"');
		 }else{

 		$sexo = $this->db->query('select * from sexo where idsexo="'. $id.'"');
		 }
		 	
 		return $sexo;
 	}








}
