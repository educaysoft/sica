<?php
class Beneficiario_model extends CI_model {

	function lista_beneficiarios(){
		 $beneficiario= $this->db->get('beneficiario');
		 return $beneficiario;
	}

	function listar_beneficiario1(){
		 $beneficiario= $this->db->get('beneficiario1');
		 return $beneficiario;
	}



 	function beneficiario( $id){
 		$beneficiario = $this->db->query('select * from beneficiario where idbeneficiario="'. $id.'"');
 		return $beneficiario;
 	}

 	function save($array)
 	{
		$this->db->insert("beneficiario", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idbeneficiario',$id);
		 $query= $this->db->get('beneficiario');
		if($query->num_rows()>0)
		{
 			$this->db->where('idbeneficiario',$id);
 			$this->db->update('beneficiario',$array_item);
			return true;
		}else{
	        	return false;
		}

	}
 

  public function delete($id)
	{
 		$this->db->where('idbeneficiario',$id);
		$this->db->delete('beneficiario');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idbeneficiario")->get('beneficiario');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idbeneficiario")->get('beneficiario');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$beneficiario = $this->db->select("idbeneficiario")->order_by("idbeneficiario")->get('beneficiario')->result_array();
		$arr=array("idbeneficiario"=>$id);
		$clave=array_search($arr,$beneficiario);
	   if(array_key_exists($clave+1,$beneficiario))
		 {

 		$beneficiario = $this->db->query('select * from beneficiario where idbeneficiario="'. $beneficiario[$clave+1]["idbeneficiario"].'"');
		 }else{

 		$beneficiario = $this->db->query('select * from beneficiario where idbeneficiario="'. $id.'"');
		 }
		 	
 		return $beneficiario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$beneficiario = $this->db->select("idbeneficiario")->order_by("idbeneficiario")->get('beneficiario')->result_array();
		$arr=array("idbeneficiario"=>$id);
		$clave=array_search($arr,$beneficiario);
	   if(array_key_exists($clave-1,$beneficiario))
		 {

 		$beneficiario = $this->db->query('select * from beneficiario where idbeneficiario="'. $beneficiario[$clave-1]["idbeneficiario"].'"');
		 }else{

 		$beneficiario = $this->db->query('select * from beneficiario where idbeneficiario="'. $id.'"');
		 }
		 	
 		return $beneficiario;
 	}


}
