<?php
class Documentoexamencomplexivo_model extends CI_model {

	function lista_documentoexamencomplexivos(){
		 $documentoexamencomplexivo= $this-db->get('documentoexamencomplexivo');
		 return $documentoexamencomplexivo;
	}


	function lista_documentoexamencomplexivosA(){
		 $documentoexamencomplexivo= $this->db->get('documentoexamencomplexivo1');
		 return $documentoexamencomplexivo;
	}



 	function documentoexamencomplexivo( $id){
 		$documentoexamencomplexivo = $this->db->query('select * from documentoexamencomplexivo where iddocumentoexamencomplexivo="'. $id.'"');
 		return $documentoexamencomplexivo;
 	}


 	function documentoexamencomplexivospersona( $id){
 		$documentoexamencomplexivo = $this->db->query('select * from documentoexamencomplexivo where idpersona="'. $id.'"');
 		return $documentoexamencomplexivo;
 	}


 	function documentoexamencomplexivodocente( $iddocente,$idperiodoacademico){

 		$documentoexamencomplexivo = $this->db->query('select * from documentoexamencomplexivo2 where iddocente="'. $iddocente.'" and idperiodoacademico="'. $idperiodoacademico.' "  order by iddocente   ');
 		return $documentoexamencomplexivo;
 	}




 	function documentoexamencomplexivoalumno( $idalumno,$idperiodoacademico){

 		$documentoexamencomplexivo = $this->db->query('select * from documentoexamencomplexivo3 where idalumno="'. $idalumno.'" and idperiodoacademico="'. $idperiodoacademico.' "  order by idalumno  ');
 		return $documentoexamencomplexivo;
 	}



 	function save($array)
 	{
			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];
	   $this->db->trans_begin();
		$condition1 = "iddocumento =" . "'" . $array['iddocumento'] . "'";
		$condition2 = "idexamencomplexivo =" . "'" . $array['idexamencomplexivo'] . "'";
		$this->db->select('*');
		$this->db->from('documentoexamencomplexivo');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("documentoexamencomplexivo", $array);
		   if( $this->db->affected_rows()>0){
			$iddocumentoexamencomplexivo=$this->db->insert_id();
		   	$this->db->insert("vitacora", array("idusuario"=>$idusuario,"hora"=>$hora,"fecha"=>$fecha,"tabla"=>"documentoexamencomplexivo","accion"=>"se sumo un documento con id=".$iddocumentoexamencomplexivo,"url"=>$_SERVER['REQUEST_URI']));




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
 		$this->db->where('iddocumentoexamencomplexivo',$id);
 		$this->db->update('documentoexamencomplexivo',$array_item);
		   if( $this->db->affected_rows()>0){
			return true;
		 }else{
			return false;
	   }
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddocumentoexamencomplexivo',$id);
		$this->db->delete('documentoexamencomplexivo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocumentoexamencomplexivo")->get('documentoexamencomplexivo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocumentoexamencomplexivo")->get('documentoexamencomplexivo1');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$documentoexamencomplexivo = $this->db->select("iddocumentoexamencomplexivo")->order_by("iddocumentoexamencomplexivo")->get('documentoexamencomplexivo')->result_array();
		$arr=array("iddocumentoexamencomplexivo"=>$id);
		$clave=array_search($arr,$documentoexamencomplexivo);
	   if(array_key_exists($clave+1,$documentoexamencomplexivo))
		 {

 		$documentoexamencomplexivo = $this->db->query('select * from documentoexamencomplexivo where iddocumentoexamencomplexivo="'. $documentoexamencomplexivo[$clave+1]["iddocumentoexamencomplexivo"].'"');
		 }else{

 		$documentoexamencomplexivo = $this->db->query('select * from documentoexamencomplexivo where iddocumentoexamencomplexivo="'. $id.'"');
		 }
		 	
 		return $documentoexamencomplexivo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$documentoexamencomplexivo = $this->db->select("iddocumentoexamencomplexivo")->order_by("iddocumentoexamencomplexivo")->get('documentoexamencomplexivo')->result_array();
		$arr=array("iddocumentoexamencomplexivo"=>$id);
		$clave=array_search($arr,$documentoexamencomplexivo);
	   if(array_key_exists($clave-1,$documentoexamencomplexivo))
		 {

 		$documentoexamencomplexivo = $this->db->query('select * from documentoexamencomplexivo where iddocumentoexamencomplexivo="'. $documentoexamencomplexivo[$clave-1]["iddocumentoexamencomplexivo"].'"');
		 }else{

 		$documentoexamencomplexivo = $this->db->query('select * from documentoexamencomplexivo where iddocumentoexamencomplexivo="'. $id.'"');
		 }
		 	
 		return $documentoexamencomplexivo;
 	}






}
