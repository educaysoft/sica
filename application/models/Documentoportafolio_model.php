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
			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];
	   $this->db->trans_begin();
		$condition1 = "iddocumento =" . "'" . $array['iddocumento'] . "'";
		$condition2 = "idportafolio =" . "'" . $array['idportafolio'] . "'";
		$this->db->select('*');
		$this->db->from('documentoportafolio');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("documentoportafolio", $array);
		   if( $this->db->affected_rows()>0){
			$iddocumentoportafolio=$this->db->insert_id();
		   	$this->db->insert("vitacora", array("idusuario"=>$idusuario,"hora"=>$hora,"fecha"=>$fecha,"tabla"=>"documentoportafolio","accion"=>"se sumo un documento con id=".$iddocumentoportafolio,"url"=>$_SERVER['REQUEST_URI']));




			$this->db->trans_commit();
			return true;
		   }else{
			$this->db->trans_rollback();
			return false;
		   }
		 }else{
			$this->db->trans_rollback();
			return false;
	   }
	


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
