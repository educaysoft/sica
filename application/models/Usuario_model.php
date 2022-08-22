<?php
class Usuario_model extends CI_model {

	function lista_usuarios(){
		 $usuario= $this->db->get('usuario');
		 return $usuario;
	}

	function lista_usuarios1(){
		 $usuario= $this->order_by("elusuario")->db->get('usuario1');
		 return $usuario;
	}



 	function usuario( $id){
 		$usuario = $this->db->query('select * from usuario where idusuario="'. $id.'"');
 		return $usuario;
 	}

 	function save($array)
 	{
		$this->db->insert("usuario", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idusuario',$id);
 		$this->db->update('usuario',$array_item);
	}
 
 	public function delete($id)
	{
 		$this->db->where('idusuario',$id);
		$this->db->delete('usuario');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}




  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idusuario")->get('usuario');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idusuario")->get('usuario');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$usuario = $this->db->select("idusuario")->order_by("idusuario")->get('usuario')->result_array();
		$arr=array("idusuario"=>$id);
		$clave=array_search($arr,$usuario);
	   if(array_key_exists($clave+1,$usuario))
		 {

 		$usuario = $this->db->query('select * from usuario where idusuario="'. $usuario[$clave+1]["idusuario"].'"');
		 }else{

 		$usuario = $this->db->query('select * from usuario where idusuario="'. $id.'"');
		 }
		 	
 		return $usuario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$usuario = $this->db->select("idusuario")->order_by("idusuario")->get('usuario')->result_array();
		$arr=array("idusuario"=>$id);
		$clave=array_search($arr,$usuario);
	   if(array_key_exists($clave-1,$usuario))
		 {

 		$usuario = $this->db->query('select * from usuario where idusuario="'. $usuario[$clave-1]["idusuario"].'"');
		 }else{

 		$usuario = $this->db->query('select * from usuario where idusuario="'. $id.'"');
		 }
		 	
 		return $usuario;
 	}






}
