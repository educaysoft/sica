<?php
class Funcionario_model extends CI_model {

	function lista_funcionarios(){
		 $funcionario= $this->db->get('funcionario0');
		 return $funcionario;
	}


	function lista_funcionariosA(){
		 $this->db->order_by("elfuncionario","asc");
		 $funcionario= $this->db->get('funcionario1');
		 return $funcionario;
	}

	function lista_funcionariosB(){
		 $this->db->order_by("elfuncionario","asc");
		 $funcionario= $this->db->get('funcionario2');
		 return $funcionario;
	}


 	function funcionario( $id){
 		$funcionario = $this->db->query('select * from funcionario0 where idfuncionario="'. $id.'"');
 		return $funcionario;
 	}


 	function funcionario1( $id){
 		$funcionario = $this->db->query('select * from funcionario1 where idfuncionario="'. $id.'"');
 		return $funcionario;
 	}



 	function funcionariospersona( $id){
 		$funcionario = $this->db->query('select * from funcionario0 where idpersona="'. $id.'"');
 		return $funcionario;
 	}



 	function esfuncionario( $id){
 		$query = $this->db->query('select * from funcionario0 where idpersona="'. $id.'"');
		if ($query->num_rows() == 0) {
			return false;
		   }else{
			return true;
		   }
 	}



 	function save($array)
 	{
		$condition1 = "iddepartamento =" . "'" . $array['iddepartamento'] . "'";
		$condition2 = "idpersona =" . "'" . $array['idpersona'] . "'";
		$this->db->select('*');
		$this->db->from('funcionario0');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("funcionario", $array);
			return true;
		   }else{
			return false;
		   }




 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idfuncionario',$id);
 		$this->db->update('funcionario0',$array_item);
	}
 


 	public function delete($idfuncionario)
	{

		$condition = "idfuncionario =" . $idfuncionario ;
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idfuncionario',$idp);
				$this->db->update('funcionario', array('eliminado'=>1));
			$result=true;
		}else{
			$result=false;
		}
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idfuncionario")->get('funcionario0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idfuncionario")->get('funcionario0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$funcionario = $this->db->select("idfuncionario")->order_by("idfuncionario")->get('funcionario0')->result_array();
		$arr=array("idfuncionario"=>$id);
		$clave=array_search($arr,$funcionario);
	   if(array_key_exists($clave+1,$funcionario))
		 {

 		$funcionario = $this->db->query('select * from funcionario0 where idfuncionario="'. $funcionario[$clave+1]["idfuncionario"].'"');
		 }else{

 		$funcionario = $this->db->query('select * from funcionario0 where idfuncionario="'. $id.'"');
		 }
		 	
 		return $funcionario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$funcionario = $this->db->select("idfuncionario")->order_by("idfuncionario")->get('funcionario0')->result_array();
		$arr=array("idfuncionario"=>$id);
		$clave=array_search($arr,$funcionario);
	   if(array_key_exists($clave-1,$funcionario))
		 {

 		$funcionario = $this->db->query('select * from funcionario0 where idfuncionario="'. $funcionario[$clave-1]["idfuncionario"].'"');
		 }else{

 		$funcionario = $this->db->query('select * from funcionario0 where idfuncionario="'. $id.'"');
		 }
		 	
 		return $funcionario;
 	}






}
