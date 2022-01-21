<?php
class Detainventario_model extends CI_model {

	function lista_detainventarios(){
		 $detainventario= $this->db->get('detainventario');
		 return $detainventario;
	}


	function lista_detainventariosA(){
		 $detainventario= $this->db->get('detainventario1');
		 return $detainventario;
	}



 	function detainventario( $id){
 		$detainventario = $this->db->query('select * from detainventario where iddetainventario="'. $id.'"');
 		return $detainventario;
 	}


 	function detainventariospersona( $id){
 		$detainventario = $this->db->query('select * from detainventario where idpersona="'. $id.'"');
 		return $detainventario;
 	}



 	function save($array)
 	{
		$this->db->insert("detainventario", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddetainventario',$id);
 		$this->db->update('detainventario',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddetainventario',$id);
		$this->db->delete('detainventario');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddetainventario")->get('detainventario');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddetainventario")->get('detainventario');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$detainventario = $this->db->select("iddetainventario")->order_by("iddetainventario")->get('detainventario')->result_array();
		$arr=array("iddetainventario"=>$id);
		$clave=array_search($arr,$detainventario);
	   if(array_key_exists($clave+1,$detainventario))
		 {

 		$detainventario = $this->db->query('select * from detainventario where iddetainventario="'. $detainventario[$clave+1]["iddetainventario"].'"');
		 }else{

 		$detainventario = $this->db->query('select * from detainventario where iddetainventario="'. $id.'"');
		 }
		 	
 		return $detainventario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$detainventario = $this->db->select("iddetainventario")->order_by("iddetainventario")->get('detainventario')->result_array();
		$arr=array("iddetainventario"=>$id);
		$clave=array_search($arr,$detainventario);
	   if(array_key_exists($clave-1,$detainventario))
		 {

 		$detainventario = $this->db->query('select * from detainventario where iddetainventario="'. $detainventario[$clave-1]["iddetainventario"].'"');
		 }else{

 		$detainventario = $this->db->query('select * from detainventario where iddetainventario="'. $id.'"');
		 }
		 	
 		return $detainventario;
 	}






}
