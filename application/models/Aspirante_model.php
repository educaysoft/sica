<?php
class Aspirante_model extends CI_model {

	function lista_aspirantes(){
		 $aspirante= $this->db->get('aspirante');
		 return $aspirante;
	}


	function lista_aspirantesA(){
		 $this->db->order_by("elaspirante","asc");
		 $aspirante= $this->db->get('aspirante1');
		 return $aspirante;
	}

	function lista_aspirantesB(){
		 $this->db->order_by("elaspirante","asc");
		 $aspirante= $this->db->get('aspirante2');
		 return $aspirante;
	}


 	function aspirante( $id){
 		$aspirante = $this->db->query('select * from aspirante where idaspirante="'. $id.'"');
 		return $aspirante;
 	}


 	function aspirantespersona( $id){
 		$aspirante = $this->db->query('select * from aspirante where idpersona="'. $id.'"');
 		return $aspirante;
 	}



 	function save($array)
 	{
		$this->db->insert("aspirante", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idaspirante',$id);
 		$this->db->update('aspirante',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idaspirante',$id);
		$this->db->delete('aspirante');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idaspirante")->get('aspirante');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idaspirante")->get('aspirante');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$aspirante = $this->db->select("idaspirante")->order_by("idaspirante")->get('aspirante')->result_array();
		$arr=array("idaspirante"=>$id);
		$clave=array_search($arr,$aspirante);
	   if(array_key_exists($clave+1,$aspirante))
		 {

 		$aspirante = $this->db->query('select * from aspirante where idaspirante="'. $aspirante[$clave+1]["idaspirante"].'"');
		 }else{

 		$aspirante = $this->db->query('select * from aspirante where idaspirante="'. $id.'"');
		 }
		 	
 		return $aspirante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$aspirante = $this->db->select("idaspirante")->order_by("idaspirante")->get('aspirante')->result_array();
		$arr=array("idaspirante"=>$id);
		$clave=array_search($arr,$aspirante);
	   if(array_key_exists($clave-1,$aspirante))
		 {

 		$aspirante = $this->db->query('select * from aspirante where idaspirante="'. $aspirante[$clave-1]["idaspirante"].'"');
		 }else{

 		$aspirante = $this->db->query('select * from aspirante where idaspirante="'. $id.'"');
		 }
		 	
 		return $aspirante;
 	}






}
