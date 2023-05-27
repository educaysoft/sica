<?php
class Departamentofuncionario_model extends CI_model {

	function lista_departamentofuncionarios(){
		 $departamentofuncionario= $this->db->get('departamentofuncionario');
		 return $departamentofuncionario;
	}


	function lista_departamentofuncionarios1($idfuncionario){

 		$this->db->where('idfuncionario',$idfuncionario);
		 $departamentofuncionario= $this->db->get('departamentofuncionario1');
		 return $departamentofuncionario;
	}




	function lista_departamentofuncionariosA(){
		 $departamentofuncionario= $this->db->get('departamentofuncionario1');
		 return $departamentofuncionario;
	}



 	function departamentofuncionario( $id){
 		$departamentofuncionario = $this->db->query('select * from departamentofuncionario where iddepartamentofuncionario="'. $id.'"');
 		return $departamentofuncionario;
 	}



 	function departamentofuncionarios( $idpersona){
 		$departamentofuncionario = $this->db->query('select * from departamentofuncionario1 where idpersona="'. $idpersona.'"');
 		return $departamentofuncionario;
 	}


 	function departamentofuncionariospersona( $id){
 		$departamentofuncionario = $this->db->query('select * from departamentofuncionario where idpersona="'. $id.'"');
 		return $departamentofuncionario;
 	}



 	function save($array)
 	{
		$this->db->insert("departamentofuncionario", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddepartamentofuncionario',$id);
 		$this->db->update('departamentofuncionario',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddepartamentofuncionario',$id);
		$this->db->delete('departamentofuncionario');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddepartamentofuncionario")->get('departamentofuncionario');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddepartamentofuncionario")->get('departamentofuncionario');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$departamentofuncionario = $this->db->select("iddepartamentofuncionario")->order_by("iddepartamentofuncionario")->get('departamentofuncionario')->result_array();
		$arr=array("iddepartamentofuncionario"=>$id);
		$clave=array_search($arr,$departamentofuncionario);
	   if(array_key_exists($clave+1,$departamentofuncionario))
		 {

 		$departamentofuncionario = $this->db->query('select * from departamentofuncionario where iddepartamentofuncionario="'. $departamentofuncionario[$clave+1]["iddepartamentofuncionario"].'"');
		 }else{

 		$departamentofuncionario = $this->db->query('select * from departamentofuncionario where iddepartamentofuncionario="'. $id.'"');
		 }
		 	
 		return $departamentofuncionario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$departamentofuncionario = $this->db->select("iddepartamentofuncionario")->order_by("iddepartamentofuncionario")->get('departamentofuncionario')->result_array();
		$arr=array("iddepartamentofuncionario"=>$id);
		$clave=array_search($arr,$departamentofuncionario);
	   if(array_key_exists($clave-1,$departamentofuncionario))
		 {

 		$departamentofuncionario = $this->db->query('select * from departamentofuncionario where iddepartamentofuncionario="'. $departamentofuncionario[$clave-1]["iddepartamentofuncionario"].'"');
		 }else{

 		$departamentofuncionario = $this->db->query('select * from departamentofuncionario where iddepartamentofuncionario="'. $id.'"');
		 }
		 	
 		return $departamentofuncionario;
 	}






}
