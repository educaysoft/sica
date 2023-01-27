<?php
class Cantonpersona_model extends CI_model {

	function lista_cantonpersonas(){
		 $cantonpersona= $this->db->get('cantonpersona');
		 return $cantonpersona;
	}


	function lista_cantonpersonas1($idpersona){

 		$this->db->where('idpersona',$idpersona);
		 $cantonpersona= $this->db->get('cantonpersona1');
		 return $cantonpersona;
	}




	function lista_cantonpersonasA(){
		 $cantonpersona= $this->db->get('cantonpersona1');
		 return $cantonpersona;
	}



 	function cantonpersona( $id){
 		$cantonpersona = $this->db->query('select * from cantonpersona where idcantonpersona="'. $id.'"');
 		return $cantonpersona;
 	}



 	function cantonpersonas( $idpersona){
 		$cantonpersona = $this->db->query('select * from cantonpersona1 where idpersona="'. $idpersona.'"');
 		return $cantonpersona;
 	}


 	function cantonpersonaspersona( $id){
 		$cantonpersona = $this->db->query('select * from cantonpersona where idpersona="'. $id.'"');
 		return $cantonpersona;
 	}



 	function save($array)
 	{
		$this->db->insert("cantonpersona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcantonpersona',$id);
 		$this->db->update('cantonpersona',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcantonpersona',$id);
		$this->db->delete('cantonpersona');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcantonpersona")->get('cantonpersona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcantonpersona")->get('cantonpersona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$cantonpersona = $this->db->select("idcantonpersona")->order_by("idcantonpersona")->get('cantonpersona')->result_array();
		$arr=array("idcantonpersona"=>$id);
		$clave=array_search($arr,$cantonpersona);
	   if(array_key_exists($clave+1,$cantonpersona))
		 {

 		$cantonpersona = $this->db->query('select * from cantonpersona where idcantonpersona="'. $cantonpersona[$clave+1]["idcantonpersona"].'"');
		 }else{

 		$cantonpersona = $this->db->query('select * from cantonpersona where idcantonpersona="'. $id.'"');
		 }
		 	
 		return $cantonpersona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$cantonpersona = $this->db->select("idcantonpersona")->order_by("idcantonpersona")->get('cantonpersona')->result_array();
		$arr=array("idcantonpersona"=>$id);
		$clave=array_search($arr,$cantonpersona);
	   if(array_key_exists($clave-1,$cantonpersona))
		 {

 		$cantonpersona = $this->db->query('select * from cantonpersona where idcantonpersona="'. $cantonpersona[$clave-1]["idcantonpersona"].'"');
		 }else{

 		$cantonpersona = $this->db->query('select * from cantonpersona where idcantonpersona="'. $id.'"');
		 }
		 	
 		return $cantonpersona;
 	}






}
