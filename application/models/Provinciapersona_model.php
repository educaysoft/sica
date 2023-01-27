<?php
class Provinciapersona_model extends CI_model {

	function lista_provinciapersonas(){
		 $provinciapersona= $this->db->get('provinciapersona');
		 return $provinciapersona;
	}


	function lista_provinciapersonas1($idpersona){

 		$this->db->where('idpersona',$idpersona);
		 $provinciapersona= $this->db->get('provinciapersona1');
		 return $provinciapersona;
	}




	function lista_provinciapersonasA(){
		 $provinciapersona= $this->db->get('provinciapersona1');
		 return $provinciapersona;
	}



 	function provinciapersona( $id){
 		$provinciapersona = $this->db->query('select * from provinciapersona where idprovinciapersona="'. $id.'"');
 		return $provinciapersona;
 	}



 	function provinciapersonas( $idpersona){
 		$provinciapersona = $this->db->query('select * from provinciapersona1 where idpersona="'. $idpersona.'"');
 		return $provinciapersona;
 	}


 	function provinciapersonaspersona( $id){
 		$provinciapersona = $this->db->query('select * from provinciapersona where idpersona="'. $id.'"');
 		return $provinciapersona;
 	}



 	function save($array)
 	{
		$this->db->insert("provinciapersona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idprovinciapersona',$id);
 		$this->db->update('provinciapersona',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idprovinciapersona',$id);
		$this->db->delete('provinciapersona');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idprovinciapersona")->get('provinciapersona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idprovinciapersona")->get('provinciapersona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$provinciapersona = $this->db->select("idprovinciapersona")->order_by("idprovinciapersona")->get('provinciapersona')->result_array();
		$arr=array("idprovinciapersona"=>$id);
		$clave=array_search($arr,$provinciapersona);
	   if(array_key_exists($clave+1,$provinciapersona))
		 {

 		$provinciapersona = $this->db->query('select * from provinciapersona where idprovinciapersona="'. $provinciapersona[$clave+1]["idprovinciapersona"].'"');
		 }else{

 		$provinciapersona = $this->db->query('select * from provinciapersona where idprovinciapersona="'. $id.'"');
		 }
		 	
 		return $provinciapersona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$provinciapersona = $this->db->select("idprovinciapersona")->order_by("idprovinciapersona")->get('provinciapersona')->result_array();
		$arr=array("idprovinciapersona"=>$id);
		$clave=array_search($arr,$provinciapersona);
	   if(array_key_exists($clave-1,$provinciapersona))
		 {

 		$provinciapersona = $this->db->query('select * from provinciapersona where idprovinciapersona="'. $provinciapersona[$clave-1]["idprovinciapersona"].'"');
		 }else{

 		$provinciapersona = $this->db->query('select * from provinciapersona where idprovinciapersona="'. $id.'"');
		 }
		 	
 		return $provinciapersona;
 	}






}
