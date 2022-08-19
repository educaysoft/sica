<?php
class Documentosilabo_model extends CI_model {

	function listar_documentosilabo(){
		 $documentosilabo= $this->db->get('documentosilabo');
		 return $documentosilabo;
	}

	function listar_documentosilabo1($idsilabo){
		if($idsilabo==0)
		{
		$documentosilabo=$this->db->order_by("asunto")->get('documentosilabo1');
		}else{

		$this->db->where('idsilabo='.$idsilabo);
		$documentosilabo=$this->db->order_by("asunto")->get('documentosilabo1');
		}

		 return $documentosilabo;
	}

 	function documentosilabo( $id){
 		$documentosilabo = $this->db->query('select * from documentosilabo where iddocumentosilabo="'. $id.'"');
 		return $documentosilabo;
 	}
 	function lista_unidades( $id){
		$documentosilabo = $this->db->query('select * from documentosilabo1 where idsilabo="'. $id.'"');
 		return $documentosilabo;
 	}




 	function documentosilabos( $id){
 		$documentosilabo = $this->db->query('select * from documentosilabo1 where idevento="'. $id.'"');
 		return $documentosilabo;
 	}

 	function save($array)
 	{
		$this->db->insert("documentosilabo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddocumentosilabo',$id);
 		$this->db->update('documentosilabo',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('iddocumentosilabo',$id);
		$this->db->delete('documentosilabo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocumentosilabo")->get('documentosilabo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocumentosilabo")->get('documentosilabo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$documentosilabo = $this->db->select("iddocumentosilabo")->order_by("iddocumentosilabo")->get('documentosilabo')->result_array();
		$arr=array("iddocumentosilabo"=>$id);
		$clave=array_search($arr,$documentosilabo);
	   if(array_key_exists($clave+1,$documentosilabo))
		 {

 		$documentosilabo = $this->db->query('select * from documentosilabo where iddocumentosilabo="'. $documentosilabo[$clave+1]["iddocumentosilabo"].'"');
		 }else{

 		$documentosilabo = $this->db->query('select * from documentosilabo where iddocumentosilabo="'. $id.'"');
		 }
		 	
 		return $documentosilabo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$documentosilabo = $this->db->select("iddocumentosilabo")->order_by("iddocumentosilabo")->get('documentosilabo')->result_array();
		$arr=array("iddocumentosilabo"=>$id);
		$clave=array_search($arr,$documentosilabo);
	   if(array_key_exists($clave-1,$documentosilabo))
		 {

 		$documentosilabo = $this->db->query('select * from documentosilabo where iddocumentosilabo="'. $documentosilabo[$clave-1]["iddocumentosilabo"].'"');
		 }else{

 		$documentosilabo = $this->db->query('select * from documentosilabo where iddocumentosilabo="'. $id.'"');
		 }
		 	
 		return $documentosilabo;
 	}














}
