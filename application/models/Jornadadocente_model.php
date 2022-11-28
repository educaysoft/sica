<?php
class Jornadadocente_model extends CI_model {

	function lista_jornadadocentes(){
		 $jornadadocente= $this->db->get('jornadadocente');
		 return $jornadadocente;
	}


	function lista_jornadadocentesA(){
		 $jornadadocente= $this->db->get('jornadadocente1');
		 return $jornadadocente;
	}



 	function jornadadocente( $id){
 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $id.'"');
 		return $jornadadocente;
 	}


 	function jornadadocentespersona( $id){
 		$jornadadocente = $this->db->query('select * from jornadadocente where idpersona="'. $id.'"');
 		return $jornadadocente;
 	}



 	function save($array)
 	{
		$this->db->insert("jornadadocente", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idjornadadocente',$id);
 		$this->db->update('jornadadocente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idjornadadocente',$id);
		$this->db->delete('jornadadocente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idjornadadocente")->get('jornadadocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idjornadadocente")->get('jornadadocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$jornadadocente = $this->db->select("idjornadadocente")->order_by("idjornadadocente")->get('jornadadocente')->result_array();
		$arr=array("idjornadadocente"=>$id);
		$clave=array_search($arr,$jornadadocente);
	   if(array_key_exists($clave+1,$jornadadocente))
		 {

 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $jornadadocente[$clave+1]["idjornadadocente"].'"');
		 }else{

 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $id.'"');
		 }
		 	
 		return $jornadadocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$jornadadocente = $this->db->select("idjornadadocente")->order_by("idjornadadocente")->get('jornadadocente')->result_array();
		$arr=array("idjornadadocente"=>$id);
		$clave=array_search($arr,$jornadadocente);
	   if(array_key_exists($clave-1,$jornadadocente))
		 {

 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $jornadadocente[$clave-1]["idjornadadocente"].'"');
		 }else{

 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $id.'"');
		 }
		 	
 		return $jornadadocente;
 	}






}
