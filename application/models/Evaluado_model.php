<?php
class Evaluado_model extends CI_model {

	function lista_evaluados(){
		 $evaluado= $this->db->get('evaluado');
		 return $evaluado;
	}


	function lista_evaluadosA(){
		 $evaluado= $this->db->get('evaluado1');
		 return $evaluado;
	}



 	function evaluado( $id){
 		$evaluado = $this->db->query('select * from evaluado where idevaluado="'. $id.'"');
 		return $evaluado;
 	}


 	function evaluadospersona( $id){
 		$evaluado = $this->db->query('select * from evaluado where idpersona="'. $id.'"');
 		return $evaluado;
 	}



 	function save($array)
 	{
		$this->db->insert("evaluado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idevaluado',$id);
 		$this->db->update('evaluado',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idevaluado',$id);
		$this->db->delete('evaluado');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idevaluado")->get('evaluado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idevaluado")->get('evaluado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$evaluado = $this->db->select("idevaluado")->order_by("idevaluado")->get('evaluado')->result_array();
		$arr=array("idevaluado"=>$id);
		$clave=array_search($arr,$evaluado);
	   if(array_key_exists($clave+1,$evaluado))
		 {

 		$evaluado = $this->db->query('select * from evaluado where idevaluado="'. $evaluado[$clave+1]["idevaluado"].'"');
		 }else{

 		$evaluado = $this->db->query('select * from evaluado where idevaluado="'. $id.'"');
		 }
		 	
 		return $evaluado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$evaluado = $this->db->select("idevaluado")->order_by("idevaluado")->get('evaluado')->result_array();
		$arr=array("idevaluado"=>$id);
		$clave=array_search($arr,$evaluado);
	   if(array_key_exists($clave-1,$evaluado))
		 {

 		$evaluado = $this->db->query('select * from evaluado where idevaluado="'. $evaluado[$clave-1]["idevaluado"].'"');
		 }else{

 		$evaluado = $this->db->query('select * from evaluado where idevaluado="'. $id.'"');
		 }
		 	
 		return $evaluado;
 	}






}
