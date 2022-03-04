<?php
class Departamento_model extends CI_model {

	function lista_departamentos(){
		 $departamento= $this->db->get('departamento');
		 return $departamento;
	}

 	function departamento( $id){
 		$departamento = $this->db->query('select * from departamento where iddepartamento="'. $id.'"');
 		return $departamento;
 	}

 	function save($array)
 	{
		$this->db->insert("departamento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddepartamento',$id);
 		$this->db->update('departamento',$array_item);
	}



 	public function delete($id)
	{
 		$this->db->where('iddepartamento',$id);
		$this->db->delete('departamento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_departamento($id){
	$condition = "iddepartamento =" .  $id ;
	$this->db->select('*');
	$this->db->from('departamento');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}





	function elprimero()
	{
		$query=$this->db->order_by("iddepartamento")->get('departamento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddepartamento")->get('departamento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$departamento = $this->db->select("iddepartamento")->order_by("iddepartamento")->get('departamento')->result_array();
		$arr=array("iddepartamento"=>$id);
		$clave=array_search($arr,$departamento);
	   if(array_key_exists($clave+1,$departamento))
		 {

 		$departamento = $this->db->query('select * from departamento where iddepartamento="'. $departamento[$clave+1]["iddepartamento"].'"');
		 }else{

 		$departamento = $this->db->query('select * from departamento where iddepartamento="'. $id.'"');
		 }
		 	
 		return $departamento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$departamento = $this->db->select("iddepartamento")->order_by("iddepartamento")->get('departamento')->result_array();
		$arr=array("iddepartamento"=>$id);
		$clave=array_search($arr,$departamento);
	   if(array_key_exists($clave-1,$departamento))
		 {

 		$departamento = $this->db->query('select * from departamento where iddepartamento="'. $departamento[$clave-1]["iddepartamento"].'"');
		 }else{

 		$departamento = $this->db->query('select * from departamento where iddepartamento="'. $id.'"');
		 }
		 	
 		return $departamento;
 	}







}
