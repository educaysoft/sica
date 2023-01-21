<?php
class Tipodocumento_model extends CI_model {

	function lista_tipodocumento(){
		 $tipodocumento= $this->db->get('tipodocumento');
		 return $tipodocumento;
	}

	function lista_tipodocumentosA(){
		 $tipodocumento= $this->db->get('tipodocumento1');
		 return $tipodocumento;
	}




 	function tipodocumento( $id){
 		$tipodocumento = $this->db->query('select * from tipodocumento where idtipodocumento="'. $id.'"');
 		return $tipodocumento;
 	}

 	function save($array)
 	{
		$this->db->insert("tipodocumento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipodocumento',$id);
 		$this->db->update('tipodocumento',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipodocumento',$id);
		$this->db->delete('tipodocumento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipodocumento")->get('tipodocumento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipodocumento")->get('tipodocumento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipodocumento = $this->db->select("idtipodocumento")->order_by("idtipodocumento")->get('tipodocumento')->result_array();
		$arr=array("idtipodocumento"=>$id);
		$clave=array_search($arr,$tipodocumento);
	   if(array_key_exists($clave+1,$tipodocumento))
		 {

 		$tipodocumento = $this->db->query('select * from tipodocumento where idtipodocumento="'. $tipodocumento[$clave+1]["idtipodocumento"].'"');
		 }else{

 		$tipodocumento = $this->db->query('select * from tipodocumento where idtipodocumento="'. $id.'"');
		 }
		 	
 		return $tipodocumento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipodocumento = $this->db->select("idtipodocumento")->order_by("idtipodocumento")->get('tipodocumento')->result_array();
		$arr=array("idtipodocumento"=>$id);
		$clave=array_search($arr,$tipodocumento);
	   if(array_key_exists($clave-1,$tipodocumento))
		 {

 		$tipodocumento = $this->db->query('select * from tipodocumento where idtipodocumento="'. $tipodocumento[$clave-1]["idtipodocumento"].'"');
		 }else{

 		$tipodocumento = $this->db->query('select * from tipodocumento where idtipodocumento="'. $id.'"');
		 }
		 	
 		return $tipodocumento;
 	}








}
