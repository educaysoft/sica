<?php
class Operadora_model extends CI_model {

	function lista_operadoras(){
		 $operadora= $this->db->get('operadora');
		 return $operadora;
	}

 	function operadora( $id){
 		$operadora = $this->db->query('select * from operadora where idoperadora="'. $id.'"');
 		return $operadora;
 	}

 	function save($array)
 	{
		$this->db->insert("operadora", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idoperadora',$id);
 		$this->db->update('operadora',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idoperadora',$id);
		$this->db->delete('operadora');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idoperadora")->get('operadora');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idoperadora")->get('operadora');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$operadora = $this->db->select("idoperadora")->order_by("idoperadora")->get('operadora')->result_array();
		$arr=array("idoperadora"=>$id);
		$clave=array_search($arr,$operadora);
	   if(array_key_exists($clave+1,$operadora))
		 {

 		$operadora = $this->db->query('select * from operadora where idoperadora="'. $operadora[$clave+1]["idoperadora"].'"');
		 }else{

 		$operadora = $this->db->query('select * from operadora where idoperadora="'. $id.'"');
		 }
		 	
 		return $operadora;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$operadora = $this->db->select("idoperadora")->order_by("idoperadora")->get('operadora')->result_array();
		$arr=array("idoperadora"=>$id);
		$clave=array_search($arr,$operadora);
	   if(array_key_exists($clave-1,$operadora))
		 {

 		$operadora = $this->db->query('select * from operadora where idoperadora="'. $operadora[$clave-1]["idoperadora"].'"');
		 }else{

 		$operadora = $this->db->query('select * from operadora where idoperadora="'. $id.'"');
		 }
		 	
 		return $operadora;
 	}






 

}
