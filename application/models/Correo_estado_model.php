<?php
class Correo_estado_model extends CI_model {

	function lista_correo_estados(){
		 $correo_estado= $this->db->get('correo_estado');
		 return $correo_estado;
	}

 	function correo_estado( $id){
 		$correo_estado = $this->db->query('select * from correo_estado where idcorreo_estado="'. $id.'"');
 		return $correo_estado;
 	}

 	function save($array)
 	{
		$this->db->insert("correo_estado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcorreo_estado',$id);
 		$this->db->update('correo_estado',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcorreo_estado',$id);
		$this->db->delete('correo_estado');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcorreo_estado")->get('correo_estado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcorreo_estado")->get('correo_estado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$correo_estado = $this->db->select("idcorreo_estado")->order_by("idcorreo_estado")->get('correo_estado')->result_array();
		$arr=array("idcorreo_estado"=>$id);
		$clave=array_search($arr,$correo_estado);
	   if(array_key_exists($clave+1,$correo_estado))
		 {

 		$correo_estado = $this->db->query('select * from correo_estado where idcorreo_estado="'. $correo_estado[$clave+1]["idcorreo_estado"].'"');
		 }else{

 		$correo_estado = $this->db->query('select * from correo_estado where idcorreo_estado="'. $id.'"');
		 }
		 	
 		return $correo_estado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$correo_estado = $this->db->select("idcorreo_estado")->order_by("idcorreo_estado")->get('correo_estado')->result_array();
		$arr=array("idcorreo_estado"=>$id);
		$clave=array_search($arr,$correo_estado);
	   if(array_key_exists($clave-1,$correo_estado))
		 {

 		$correo_estado = $this->db->query('select * from correo_estado where idcorreo_estado="'. $correo_estado[$clave-1]["idcorreo_estado"].'"');
		 }else{

 		$correo_estado = $this->db->query('select * from correo_estado where idcorreo_estado="'. $id.'"');
		 }
		 	
 		return $correo_estado;
 	}






}
