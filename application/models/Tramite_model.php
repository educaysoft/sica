<?php
class Tramite_model extends CI_model {

	function lista_tramites(){
		 $tramite= $this->db->get('tramite');
		 return $tramite;
	}


	function lista_tramitesA(){
		 $tramite= $this->db->get('tramite1');
		 return $tramite;
	}




 	function tramite( $id){
 		$tramite = $this->db->query('select * from tramite where idtramite="'. $id.'"');
 		return $tramite;
 	}

 	function save($array)
 	{
		$this->db->insert("tramite", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtramite',$id);
 		$this->db->update('tramite',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idtramite',$id);
		$this->db->delete('tramite');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtramite")->get('tramite');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtramite")->get('tramite');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tramite = $this->db->select("idtramite")->order_by("idtramite")->get('tramite')->result_array();
		$arr=array("idtramite"=>$id);
		$clave=array_search($arr,$tramite);
	   if(array_key_exists($clave+1,$tramite))
		 {

 		$tramite = $this->db->query('select * from tramite where idtramite="'. $tramite[$clave+1]["idtramite"].'"');
		 }else{

 		$tramite = $this->db->query('select * from tramite where idtramite="'. $id.'"');
		 }
		 	
 		return $tramite;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tramite = $this->db->select("idtramite")->order_by("idtramite")->get('tramite')->result_array();
		$arr=array("idtramite"=>$id);
		$clave=array_search($arr,$tramite);
	   if(array_key_exists($clave-1,$tramite))
		 {

 		$tramite = $this->db->query('select * from tramite where idtramite="'. $tramite[$clave-1]["idtramite"].'"');
		 }else{

 		$tramite = $this->db->query('select * from tramite where idtramite="'. $id.'"');
		 }
		 	
 		return $tramite;
 	}






 

}
