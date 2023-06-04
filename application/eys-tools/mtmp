<?php
class Correo_model extends CI_model {

	function lista_correos(){
		 $correo= $this->db->get('correo');
		 return $correo;
	}


	function lista_correosA(){
		 $correo= $this->db->get('correo1');
		 return $correo;
	}



 	function correo( $id){
 		$correo = $this->db->query('select * from correo where idcorreo="'. $id.'"');
 		return $correo;
 	}


 	function correospersona( $id){
 		$correo = $this->db->query('select * from correo where idpersona="'. $id.'"');
 		return $correo;
 	}



 	function save($array)
 	{
		$this->db->insert("correo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcorreo',$id);
 		$this->db->update('correo',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcorreo',$id);
		$this->db->delete('correo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcorreo")->get('correo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcorreo")->get('correo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$correo = $this->db->select("idcorreo")->order_by("idcorreo")->get('correo')->result_array();
		$arr=array("idcorreo"=>$id);
		$clave=array_search($arr,$correo);
	   if(array_key_exists($clave+1,$correo))
		 {

 		$correo = $this->db->query('select * from correo where idcorreo="'. $correo[$clave+1]["idcorreo"].'"');
		 }else{

 		$correo = $this->db->query('select * from correo where idcorreo="'. $id.'"');
		 }
		 	
 		return $correo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$correo = $this->db->select("idcorreo")->order_by("idcorreo")->get('correo')->result_array();
		$arr=array("idcorreo"=>$id);
		$clave=array_search($arr,$correo);
	   if(array_key_exists($clave-1,$correo))
		 {

 		$correo = $this->db->query('select * from correo where idcorreo="'. $correo[$clave-1]["idcorreo"].'"');
		 }else{

 		$correo = $this->db->query('select * from correo where idcorreo="'. $id.'"');
		 }
		 	
 		return $correo;
 	}






}
