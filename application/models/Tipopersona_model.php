<?php
class Tipopersona_model extends CI_model {

	function lista_tipopersona(){
		 $tipopersona= $this->db->get('tipopersona');
		 return $tipopersona;
	}


	function lista_tipopersonas(){
		 $tipopersona= $this->db->get('tipopersona');
		 return $tipopersona;
	}


	function lista_tipopersonasA(){
		 $tipopersona= $this->db->get('tipopersona1');
		 return $tipopersona;
	}




 	function tipopersona( $id){
 		$tipopersona = $this->db->query('select * from tipopersona where idtipopersona="'. $id.'"');
 		return $tipopersona;
 	}

 	function save($array)
 	{
		$this->db->insert("tipopersona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipopersona',$id);
 		$this->db->update('tipopersona',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipopersona',$id);
		$this->db->delete('tipopersona');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipopersona")->get('tipopersona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipopersona")->get('tipopersona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipopersona = $this->db->select("idtipopersona")->order_by("idtipopersona")->get('tipopersona')->result_array();
		$arr=array("idtipopersona"=>$id);
		$clave=array_search($arr,$tipopersona);
	   if(array_key_exists($clave+1,$tipopersona))
		 {

 		$tipopersona = $this->db->query('select * from tipopersona where idtipopersona="'. $tipopersona[$clave+1]["idtipopersona"].'"');
		 }else{

 		$tipopersona = $this->db->query('select * from tipopersona where idtipopersona="'. $id.'"');
		 }
		 	
 		return $tipopersona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipopersona = $this->db->select("idtipopersona")->order_by("idtipopersona")->get('tipopersona')->result_array();
		$arr=array("idtipopersona"=>$id);
		$clave=array_search($arr,$tipopersona);
	   if(array_key_exists($clave-1,$tipopersona))
		 {

 		$tipopersona = $this->db->query('select * from tipopersona where idtipopersona="'. $tipopersona[$clave-1]["idtipopersona"].'"');
		 }else{

 		$tipopersona = $this->db->query('select * from tipopersona where idtipopersona="'. $id.'"');
		 }
		 	
 		return $tipopersona;
 	}








}
