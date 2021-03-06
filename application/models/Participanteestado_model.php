<?php
class Participanteestado_model extends CI_model {

	function lista_participanteestados(){
		 $participanteestado= $this->db->get('participanteestado');
		 return $participanteestado;
	}

 	function participanteestado( $id){
 		$participanteestado = $this->db->query('select * from participanteestado where idparticipanteestado="'. $id.'"');
 		return $participanteestado;
 	}

 	function save($array)
 	{
		$this->db->insert("participanteestado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idparticipanteestado',$id);
 		$this->db->update('participanteestado',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idparticipanteestado',$id);
		$this->db->delete('participanteestado');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idparticipanteestado")->get('participanteestado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idparticipanteestado")->get('participanteestado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$participanteestado = $this->db->select("idparticipanteestado")->order_by("idparticipanteestado")->get('participanteestado')->result_array();
		$arr=array("idparticipanteestado"=>$id);
		$clave=array_search($arr,$participanteestado);
	   if(array_key_exists($clave+1,$participanteestado))
		 {

 		$participanteestado = $this->db->query('select * from participanteestado where idparticipanteestado="'. $participanteestado[$clave+1]["idparticipanteestado"].'"');
		 }else{

 		$participanteestado = $this->db->query('select * from participanteestado where idparticipanteestado="'. $id.'"');
		 }
		 	
 		return $participanteestado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$participanteestado = $this->db->select("idparticipanteestado")->order_by("idparticipanteestado")->get('participanteestado')->result_array();
		$arr=array("idparticipanteestado"=>$id);
		$clave=array_search($arr,$participanteestado);
	   if(array_key_exists($clave-1,$participanteestado))
		 {

 		$participanteestado = $this->db->query('select * from participanteestado where idparticipanteestado="'. $participanteestado[$clave-1]["idparticipanteestado"].'"');
		 }else{

 		$participanteestado = $this->db->query('select * from participanteestado where idparticipanteestado="'. $id.'"');
		 }
		 	
 		return $participanteestado;
 	}






}
