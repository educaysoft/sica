<?php
class Nacionalidadpersona_model extends CI_model {

	function lista_nacionalidadpersonas(){
		 $nacionalidadpersona= $this->db->get('nacionalidadpersona');
		 return $nacionalidadpersona;
	}


	function lista_nacionalidadpersonas1($idpersona){

 		$this->db->where('idpersona',$idpersona);
		 $nacionalidadpersona= $this->db->get('nacionalidadpersona1');
		 return $nacionalidadpersona;
	}




	function lista_nacionalidadpersonasA(){
		 $nacionalidadpersona= $this->db->get('nacionalidadpersona1');
		 return $nacionalidadpersona;
	}



 	function nacionalidadpersona( $id){
 		$nacionalidadpersona = $this->db->query('select * from nacionalidadpersona where idnacionalidadpersona="'. $id.'"');
 		return $nacionalidadpersona;
 	}



 	function nacionalidadpersonas( $idpersona){
 		$nacionalidadpersona = $this->db->query('select * from nacionalidadpersona1 where idpersona="'. $idpersona.'"');
 		return $nacionalidadpersona;
 	}


 	function nacionalidadpersonaspersona( $id){
 		$nacionalidadpersona = $this->db->query('select * from nacionalidadpersona where idpersona="'. $id.'"');
 		return $nacionalidadpersona;
 	}



 	function save($array)
 	{
		$this->db->insert("nacionalidadpersona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idnacionalidadpersona',$id);
 		$this->db->update('nacionalidadpersona',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idnacionalidadpersona',$id);
		$this->db->delete('nacionalidadpersona');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idnacionalidadpersona")->get('nacionalidadpersona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idnacionalidadpersona")->get('nacionalidadpersona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$nacionalidadpersona = $this->db->select("idnacionalidadpersona")->order_by("idnacionalidadpersona")->get('nacionalidadpersona')->result_array();
		$arr=array("idnacionalidadpersona"=>$id);
		$clave=array_search($arr,$nacionalidadpersona);
	   if(array_key_exists($clave+1,$nacionalidadpersona))
		 {

 		$nacionalidadpersona = $this->db->query('select * from nacionalidadpersona where idnacionalidadpersona="'. $nacionalidadpersona[$clave+1]["idnacionalidadpersona"].'"');
		 }else{

 		$nacionalidadpersona = $this->db->query('select * from nacionalidadpersona where idnacionalidadpersona="'. $id.'"');
		 }
		 	
 		return $nacionalidadpersona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$nacionalidadpersona = $this->db->select("idnacionalidadpersona")->order_by("idnacionalidadpersona")->get('nacionalidadpersona')->result_array();
		$arr=array("idnacionalidadpersona"=>$id);
		$clave=array_search($arr,$nacionalidadpersona);
	   if(array_key_exists($clave-1,$nacionalidadpersona))
		 {

 		$nacionalidadpersona = $this->db->query('select * from nacionalidadpersona where idnacionalidadpersona="'. $nacionalidadpersona[$clave-1]["idnacionalidadpersona"].'"');
		 }else{

 		$nacionalidadpersona = $this->db->query('select * from nacionalidadpersona where idnacionalidadpersona="'. $id.'"');
		 }
		 	
 		return $nacionalidadpersona;
 	}






}
