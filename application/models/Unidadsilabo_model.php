<?php
class Unidadsilabo_model extends CI_model {

	function listar_unidadsilabo(){
		 $unidadsilabo= $this->db->get('unidadsilabo');
		 return $unidadsilabo;
	}




	function listar_unidadsilabo1(){
		 $unidadsilabo= $this->db->get('unidadsilabo1');
		 return $unidadsilabo;
	}

 
	function unidadsilaboss( $idsilabo){
 		$unidadsilabo = $this->db->query('select * from unidadsilabo where idsilabo="'. $idsilabo.'"');
 		return $unidadsilabo;
 	}


	function unidadsilabo( $id){
 		$unidadsilabo = $this->db->query('select * from unidadsilabo where idunidadsilabo="'. $id.'"');
 		return $unidadsilabo;
 	}

 	function lista_unidades( $id){
		$unidadsilabo = $this->db->query('select * from unidadsilabo1 where idsilabo="'. $id.'"');
 		return $unidadsilabo;
 	}




 	function unidadsilabos( $id){
 		$unidadsilabo = $this->db->query('select * from unidadsilabo1 where idevento="'. $id.'"');
 		return $unidadsilabo;
 	}

 	function save($array)
 	{
		$this->db->insert("unidadsilabo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idunidadsilabo',$id);
 		$this->db->update('unidadsilabo',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idunidadsilabo',$id);
		$this->db->delete('unidadsilabo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idunidadsilabo")->get('unidadsilabo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idunidadsilabo")->get('unidadsilabo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$unidadsilabo = $this->db->select("idunidadsilabo")->order_by("idunidadsilabo")->get('unidadsilabo')->result_array();
		$arr=array("idunidadsilabo"=>$id);
		$clave=array_search($arr,$unidadsilabo);
	   if(array_key_exists($clave+1,$unidadsilabo))
		 {

 		$unidadsilabo = $this->db->query('select * from unidadsilabo where idunidadsilabo="'. $unidadsilabo[$clave+1]["idunidadsilabo"].'"');
		 }else{

 		$unidadsilabo = $this->db->query('select * from unidadsilabo where idunidadsilabo="'. $id.'"');
		 }
		 	
 		return $unidadsilabo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$unidadsilabo = $this->db->select("idunidadsilabo")->order_by("idunidadsilabo")->get('unidadsilabo')->result_array();
		$arr=array("idunidadsilabo"=>$id);
		$clave=array_search($arr,$unidadsilabo);
	   if(array_key_exists($clave-1,$unidadsilabo))
		 {

 		$unidadsilabo = $this->db->query('select * from unidadsilabo where idunidadsilabo="'. $unidadsilabo[$clave-1]["idunidadsilabo"].'"');
		 }else{

 		$unidadsilabo = $this->db->query('select * from unidadsilabo where idunidadsilabo="'. $id.'"');
		 }
		 	
 		return $unidadsilabo;
 	}














}
