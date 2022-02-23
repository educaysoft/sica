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






}
