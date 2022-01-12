<?php
class Perfil_model extends CI_model {

	function lista_perfiles(){
		 $perfil= $this->db->get('perfil');
		 return $perfil;
	}

 	function perfil( $id){
 		$perfil = $this->db->query('select * from perfil where idperfil="'. $id.'"');
 		return $perfil;
 	}

 	function save($array)
 	{
		$this->db->insert("perfil", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idperfil',$id);
 		$this->db->update('perfil',$array_item);
	}
 

 	public function delete($id)
	{
 		$this->db->where('idperfil',$id);
		$this->db->delete('perfil');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idperfil")->get('perfil');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idperfil")->get('perfil');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$perfil = $this->db->select("idperfil")->order_by("idperfil")->get('perfil')->result_array();
		$arr=array("idperfil"=>$id);
		$clave=array_search($arr,$perfil);
	   if(array_key_exists($clave+1,$perfil))
		 {

 		$perfil = $this->db->query('select * from perfil where idperfil="'. $perfil[$clave+1]["idperfil"].'"');
		 }else{

 		$perfil = $this->db->query('select * from perfil where idperfil="'. $id.'"');
		 }
		 	
 		return $perfil;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$perfil = $this->db->select("idperfil")->order_by("idperfil")->get('perfil')->result_array();
		$arr=array("idperfil"=>$id);
		$clave=array_search($arr,$perfil);
	   if(array_key_exists($clave-1,$perfil))
		 {

 		$perfil = $this->db->query('select * from perfil where idperfil="'. $perfil[$clave-1]["idperfil"].'"');
		 }else{

 		$perfil = $this->db->query('select * from perfil where idperfil="'. $id.'"');
		 }
		 	
 		return $perfil;
 	}












}
