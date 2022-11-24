<?php
class Horariodocente_model extends CI_model {

	function lista_horariodocentes(){
		 $horariodocente= $this->db->get('horariodocente');
		 return $horariodocente;
	}


	function lista_horariodocentesA(){
		 $horariodocente= $this->db->get('horariodocente1');
		 return $horariodocente;
	}



 	function horariodocente( $id){
 		$horariodocente = $this->db->query('select * from horariodocente where idhorariodocente="'. $id.'"');
 		return $horariodocente;
 	}


 	function horariodocentespersona( $id){
 		$horariodocente = $this->db->query('select * from horariodocente where idpersona="'. $id.'"');
 		return $horariodocente;
 	}



 	function save($array)
 	{
		$this->db->insert("horariodocente", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idhorariodocente',$id);
 		$this->db->update('horariodocente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idhorariodocente',$id);
		$this->db->delete('horariodocente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idhorariodocente")->get('horariodocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idhorariodocente")->get('horariodocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$horariodocente = $this->db->select("idhorariodocente")->order_by("idhorariodocente")->get('horariodocente')->result_array();
		$arr=array("idhorariodocente"=>$id);
		$clave=array_search($arr,$horariodocente);
	   if(array_key_exists($clave+1,$horariodocente))
		 {

 		$horariodocente = $this->db->query('select * from horariodocente where idhorariodocente="'. $horariodocente[$clave+1]["idhorariodocente"].'"');
		 }else{

 		$horariodocente = $this->db->query('select * from horariodocente where idhorariodocente="'. $id.'"');
		 }
		 	
 		return $horariodocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$horariodocente = $this->db->select("idhorariodocente")->order_by("idhorariodocente")->get('horariodocente')->result_array();
		$arr=array("idhorariodocente"=>$id);
		$clave=array_search($arr,$horariodocente);
	   if(array_key_exists($clave-1,$horariodocente))
		 {

 		$horariodocente = $this->db->query('select * from horariodocente where idhorariodocente="'. $horariodocente[$clave-1]["idhorariodocente"].'"');
		 }else{

 		$horariodocente = $this->db->query('select * from horariodocente where idhorariodocente="'. $id.'"');
		 }
		 	
 		return $horariodocente;
 	}






}
