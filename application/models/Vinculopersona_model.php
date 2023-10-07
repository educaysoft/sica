<?php
class Vinculopersona_model extends CI_model {

	function lista_vinculopersonas(){
		 $vinculopersona= $this->db->get('vinculopersona');
		 return $vinculopersona;
	}


	function lista_vinculopersonasA(){
		 $vinculopersona= $this->db->get('vinculopersona1');
		 return $vinculopersona;
	}



 	function vinculopersona( $id){
 		$vinculopersona = $this->db->query('select * from vinculopersona where idvinculopersona="'. $id.'"');
 		return $vinculopersona;
 	}


 	function vinculopersona1( $id){
 		$vinculopersona = $this->db->query('select * from vinculopersona1 where idvinculopersona="'. $id.'"');
 		return $vinculopersona;
 	}





 	function vinculopersonaspersona( $id){
 		$vinculopersona = $this->db->query('select * from vinculopersona1 where idpersona="'. $id.'"');
 		return $vinculopersona;
 	}



 	function save($array)
 	{
		$this->db->insert("vinculopersona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idvinculopersona',$id);
 		$this->db->update('vinculopersona',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idvinculopersona',$id);
		$this->db->delete('vinculopersona');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idvinculopersona")->get('vinculopersona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idvinculopersona")->get('vinculopersona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$vinculopersona = $this->db->select("idvinculopersona")->order_by("idvinculopersona")->get('vinculopersona')->result_array();
		$arr=array("idvinculopersona"=>$id);
		$clave=array_search($arr,$vinculopersona);
	   if(array_key_exists($clave+1,$vinculopersona))
		 {

 		$vinculopersona = $this->db->query('select * from vinculopersona where idvinculopersona="'. $vinculopersona[$clave+1]["idvinculopersona"].'"');
		 }else{

 		$vinculopersona = $this->db->query('select * from vinculopersona where idvinculopersona="'. $id.'"');
		 }
		 	
 		return $vinculopersona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$vinculopersona = $this->db->select("idvinculopersona")->order_by("idvinculopersona")->get('vinculopersona')->result_array();
		$arr=array("idvinculopersona"=>$id);
		$clave=array_search($arr,$vinculopersona);
	   if(array_key_exists($clave-1,$vinculopersona))
		 {

 		$vinculopersona = $this->db->query('select * from vinculopersona where idvinculopersona="'. $vinculopersona[$clave-1]["idvinculopersona"].'"');
		 }else{

 		$vinculopersona = $this->db->query('select * from vinculopersona where idvinculopersona="'. $id.'"');
		 }
		 	
 		return $vinculopersona;
 	}






}
