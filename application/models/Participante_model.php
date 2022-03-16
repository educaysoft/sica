<?php
class Participante_model extends CI_model {

	function listar_participante(){
		 $participante= $this->db->get('participante');
		 return $participante;
	}

	function listar_participante1(){
		 $participante= $this->db->get('participante1');
		 return $participante;
	}

 	function participante( $id){
 		$participante = $this->db->query('select * from participante where idevento="'. $id.'"');
 		return $participante;
 	}



 	function participantes( $id){
 		$participante = $this->db->query('select * from participante1 where idevento="'. $id.'"');
 		return $participante;
 	}

 	function save($array)
 	{
		$this->db->insert("participante", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idparticipante',$id);
 		$this->db->update('participante',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idparticipante',$id);
		$this->db->delete('participante');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idparticipante")->get('participante');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idparticipante")->get('participante');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$participante = $this->db->select("idparticipante")->order_by("idparticipante")->get('participante')->result_array();
		$arr=array("idparticipante"=>$id);
		$clave=array_search($arr,$participante);
	   if(array_key_exists($clave+1,$participante))
		 {

 		$participante = $this->db->query('select * from participante where idparticipante="'. $participante[$clave+1]["idparticipante"].'"');
		 }else{

 		$participante = $this->db->query('select * from participante where idparticipante="'. $id.'"');
		 }
		 	
 		return $participante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$participante = $this->db->select("idparticipante")->order_by("idparticipante")->get('participante')->result_array();
		$arr=array("idparticipante"=>$id);
		$clave=array_search($arr,$participante);
	   if(array_key_exists($clave-1,$participante))
		 {

 		$participante = $this->db->query('select * from participante where idparticipante="'. $participante[$clave-1]["idparticipante"].'"');
		 }else{

 		$participante = $this->db->query('select * from participante where idparticipante="'. $id.'"');
		 }
		 	
 		return $participante;
 	}














}
