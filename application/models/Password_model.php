<?php
class Password_model extends CI_model {

	function lista_passwords(){
		 $password= $this->db->get('password');
		 return $password;
	}


	function lista_passwordsA($id){
		 if($id>0){
		 $this->db->where('idusuario',$id);
		 }
		 $password= $this->db->get('password1');
		 return $password;
	}



 	function password( $id){
 		$password = $this->db->query('select * from password where idpassword="'. $id.'"');
 		return $password;
 	}


 	function usuario($id){
 		$password = $this->db->where('idusuario',$id)->get('password');
 		return $password;
 	}


 	function get_usuario($id){
 		$password = $this->db->where('idusuario',$id)->get('password');
 		return $password->result();
 	}


 	function save($array)
 	{
		$this->db->insert("password", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpassword',$id);
 		$this->db->update('password',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idpassword',$id);
		$this->db->delete('password');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idpassword")->get('password');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpassword")->get('password');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$password = $this->db->select("idpassword")->order_by("idpassword")->get('password')->result_array();
		$arr=array("idpassword"=>$id);
		$clave=array_search($arr,$password);
	   if(array_key_exists($clave+1,$password))
		 {

 		$password = $this->db->query('select * from password where idpassword="'. $password[$clave+1]["idpassword"].'"');
		 }else{

 		$password = $this->db->query('select * from password where idpassword="'. $id.'"');
		 }
		 	
 		return $password;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$password = $this->db->select("idpassword")->order_by("idpassword")->get('password')->result_array();
		$arr=array("idpassword"=>$id);
		$clave=array_search($arr,$password);
	   if(array_key_exists($clave-1,$password))
		 {

 		$password = $this->db->query('select * from password where idpassword="'. $password[$clave-1]["idpassword"].'"');
		 }else{

 		$password = $this->db->query('select * from password where idpassword="'. $id.'"');
		 }
		 	
 		return $password;
 	}






}
