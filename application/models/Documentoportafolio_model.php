<?php
class Documentoportafolio_model extends CI_model {

	function lista_documentoportafolios(){
		 $documentoportafolio= $this->db->get('documentoportafolio');
		 return $documentoportafolio;
	}


	function lista_documentoportafoliosA(){
		 $documentoportafolio= $this->db->get('documentoportafolio1');
		 return $documentoportafolio;
	}



 	function documentoportafolio( $id){
 		$documentoportafolio = $this->db->query('select * from documentoportafolio where iddocumentoportafolio="'. $id.'"');
 		return $documentoportafolio;
 	}


 	function documentoportafoliospersona( $id){
 		$documentoportafolio = $this->db->query('select * from documentoportafolio where idpersona="'. $id.'"');
 		return $documentoportafolio;
 	}



 	function save($array)
 	{
		$this->db->insert("documentoportafolio", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddocumentoportafolio',$id);
 		$this->db->update('documentoportafolio',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddocumentoportafolio',$id);
		$this->db->delete('documentoportafolio');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocumentoportafolio")->get('documentoportafolio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocumentoportafolio")->get('documentoportafolio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$documentoportafolio = $this->db->select("iddocumentoportafolio")->order_by("iddocumentoportafolio")->get('documentoportafolio')->result_array();
		$arr=array("iddocumentoportafolio"=>$id);
		$clave=array_search($arr,$documentoportafolio);
	   if(array_key_exists($clave+1,$documentoportafolio))
		 {

 		$documentoportafolio = $this->db->query('select * from documentoportafolio where iddocumentoportafolio="'. $documentoportafolio[$clave+1]["iddocumentoportafolio"].'"');
		 }else{

 		$documentoportafolio = $this->db->query('select * from documentoportafolio where iddocumentoportafolio="'. $id.'"');
		 }
		 	
 		return $documentoportafolio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$documentoportafolio = $this->db->select("iddocumentoportafolio")->order_by("iddocumentoportafolio")->get('documentoportafolio')->result_array();
		$arr=array("iddocumentoportafolio"=>$id);
		$clave=array_search($arr,$documentoportafolio);
	   if(array_key_exists($clave-1,$documentoportafolio))
		 {

 		$documentoportafolio = $this->db->query('select * from documentoportafolio where iddocumentoportafolio="'. $documentoportafolio[$clave-1]["iddocumentoportafolio"].'"');
		 }else{

 		$documentoportafolio = $this->db->query('select * from documentoportafolio where iddocumentoportafolio="'. $id.'"');
		 }
		 	
 		return $documentoportafolio;
 	}






}
