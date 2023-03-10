<?php
class Evaluacionpersona_model extends CI_model {

	function listar_evaluacionpersona(){
		 $evaluacionpersona= $this->db->get('evaluacionpersona');
		 return $evaluacionpersona;
	}

	function listar_evaluacionpersona1(){
		 $evaluacionpersona= $this->db->get('evaluacionpersona1');
		 return $evaluacionpersona;
	}



 	function evaluacionpersona( $id){
 		$evaluacionpersona = $this->db->query('select * from evaluacionpersona where idevaluacionpersona="'. $id.'"');
 		return $evaluacionpersona;
 	}

 	function save($array)
 	{
		$this->db->insert("evaluacionpersona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idusuario',$id);
 		$this->db->update('usuario',$array_item);
	}
 

  public function delete($id)
	{
 		$this->db->where('idevaluacionpersona',$id);
		$this->db->delete('evaluacionpersona');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idevaluacionpersona")->get('evaluacionpersona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idevaluacionpersona")->get('evaluacionpersona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$evaluacionpersona = $this->db->select("idevaluacionpersona")->order_by("idevaluacionpersona")->get('evaluacionpersona')->result_array();
		$arr=array("idevaluacionpersona"=>$id);
		$clave=array_search($arr,$evaluacionpersona);
	   if(array_key_exists($clave+1,$evaluacionpersona))
		 {

 		$evaluacionpersona = $this->db->query('select * from evaluacionpersona where idevaluacionpersona="'. $evaluacionpersona[$clave+1]["idevaluacionpersona"].'"');
		 }else{

 		$evaluacionpersona = $this->db->query('select * from evaluacionpersona where idevaluacionpersona="'. $id.'"');
		 }
		 	
 		return $evaluacionpersona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$evaluacionpersona = $this->db->select("idevaluacionpersona")->order_by("idevaluacionpersona")->get('evaluacionpersona')->result_array();
		$arr=array("idevaluacionpersona"=>$id);
		$clave=array_search($arr,$evaluacionpersona);
	   if(array_key_exists($clave-1,$evaluacionpersona))
		 {

 		$evaluacionpersona = $this->db->query('select * from evaluacionpersona where idevaluacionpersona="'. $evaluacionpersona[$clave-1]["idevaluacionpersona"].'"');
		 }else{

 		$evaluacionpersona = $this->db->query('select * from evaluacionpersona where idevaluacionpersona="'. $id.'"');
		 }
		 	
 		return $evaluacionpersona;
 	}


}
