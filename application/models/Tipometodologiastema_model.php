<?php
class Tipometodologiastema_model extends CI_model {

	function lista_tipometodologiastemas(){
		 $tipometodologiastema= $this->db->get('tipometodologiastema');
		 return $tipometodologiastema;
	}

 	function tipometodologiastema( $id){
 		$tipometodologiastema = $this->db->query('select * from tipometodologiastema where idtipometodologiastema="'. $id.'"');
 		return $tipometodologiastema;
 	}

 	function save($array)
 	{
		$this->db->insert("tipometodologiastema", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipometodologiastema',$id);
 		$this->db->update('tipometodologiastema',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipometodologiastema',$id);
		$this->db->delete('tipometodologiastema');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipometodologiastema")->get('tipometodologiastema');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipometodologiastema")->get('tipometodologiastema');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipometodologiastema = $this->db->select("idtipometodologiastema")->order_by("idtipometodologiastema")->get('tipometodologiastema')->result_array();
		$arr=array("idtipometodologiastema"=>$id);
		$clave=array_search($arr,$tipometodologiastema);
	   if(array_key_exists($clave+1,$tipometodologiastema))
		 {

 		$tipometodologiastema = $this->db->query('select * from tipometodologiastema where idtipometodologiastema="'. $tipometodologiastema[$clave+1]["idtipometodologiastema"].'"');
		 }else{

 		$tipometodologiastema = $this->db->query('select * from tipometodologiastema where idtipometodologiastema="'. $id.'"');
		 }
		 	
 		return $tipometodologiastema;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipometodologiastema = $this->db->select("idtipometodologiastema")->order_by("idtipometodologiastema")->get('tipometodologiastema')->result_array();
		$arr=array("idtipometodologiastema"=>$id);
		$clave=array_search($arr,$tipometodologiastema);
	   if(array_key_exists($clave-1,$tipometodologiastema))
		 {

 		$tipometodologiastema = $this->db->query('select * from tipometodologiastema where idtipometodologiastema="'. $tipometodologiastema[$clave-1]["idtipometodologiastema"].'"');
		 }else{

 		$tipometodologiastema = $this->db->query('select * from tipometodologiastema where idtipometodologiastema="'. $id.'"');
		 }
		 	
 		return $tipometodologiastema;
 	}






}
