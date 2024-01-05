<?php
class Documentoevento_model extends CI_model {

	function listar_documentoevento(){
		 $documentoevento= $this->db->get('documentoevento');
		 return $documentoevento;
	}

	function listar_documentoevento1($idsilabo){
		if($idsilabo==0)
		{
		$documentoevento=$this->db->order_by("elsilabo")->get('documentoevento1');
		}else{

		$this->db->where('idsilabo='.$idsilabo);
		$documentoevento=$this->db->order_by("elsilabo")->get('documentoevento1');
		}

		 return $documentoevento;
	}

 	function documentoevento( $id){
 		$documentoevento = $this->db->query('select * from documentoevento where iddocumentoevento="'. $id.'"');
 		return $documentoevento;
 	}
 	function lista_unidades( $id){
		$documentoevento = $this->db->query('select * from documentoevento1 where idsilabo="'. $id.'"');
 		return $documentoevento;
 	}




 	function documentoeventos( $id){
 		$documentoevento = $this->db->query('select * from documentoevento1 where idevento="'. $id.'"');
 		return $documentoevento;
 	}

 	function save($array)
 	{
		$this->db->insert("documentoevento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddocumentoevento',$id);
 		$this->db->update('documentoevento',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('iddocumentoevento',$id);
		$this->db->delete('documentoevento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocumentoevento")->get('documentoevento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocumentoevento")->get('documentoevento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$documentoevento = $this->db->select("iddocumentoevento")->order_by("iddocumentoevento")->get('documentoevento')->result_array();
		$arr=array("iddocumentoevento"=>$id);
		$clave=array_search($arr,$documentoevento);
	   if(array_key_exists($clave+1,$documentoevento))
		 {

 		$documentoevento = $this->db->query('select * from documentoevento where iddocumentoevento="'. $documentoevento[$clave+1]["iddocumentoevento"].'"');
		 }else{

 		$documentoevento = $this->db->query('select * from documentoevento where iddocumentoevento="'. $id.'"');
		 }
		 	
 		return $documentoevento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$documentoevento = $this->db->select("iddocumentoevento")->order_by("iddocumentoevento")->get('documentoevento')->result_array();
		$arr=array("iddocumentoevento"=>$id);
		$clave=array_search($arr,$documentoevento);
	   if(array_key_exists($clave-1,$documentoevento))
		 {

 		$documentoevento = $this->db->query('select * from documentoevento where iddocumentoevento="'. $documentoevento[$clave-1]["iddocumentoevento"].'"');
		 }else{

 		$documentoevento = $this->db->query('select * from documentoevento where iddocumentoevento="'. $id.'"');
		 }
		 	
 		return $documentoevento;
 	}














}
