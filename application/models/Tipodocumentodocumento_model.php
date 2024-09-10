<?php
class Tipodocumentodocumento_model extends CI_model {

	function lista_tipodocumentodocumentos(){
		 $tipodocumentodocumento= $this-db->get('tipodocumentodocumento');
		 return $tipodocumentodocumento;
	}


	function lista_tipodocumentodocumentosA(){
		 $tipodocumentodocumento= $this->db->get('tipodocumentodocumento1');
		 return $tipodocumentodocumento;
	}



 	function tipodocumentodocumento( $id){
 		$tipodocumentodocumento = $this->db->query('select * from tipodocumentodocumento where idtipodocumentodocumento="'. $id.'"');
 		return $tipodocumentodocumento;
 	}

    function tipodocumentodocumento1( $id){
 		$tipodocumentodocumento = $this->db->query('select * from tipodocumentodocumento1 where idtipodocumentodocumento="'. $id.'"');
 		return $tipodocumentodocumento;
 	}





 	function tipodocumentodocumentoxdocu( $id){
 		$tipodocumentodocumento = $this->db->query('select * from tipodocumentodocumento1 where iddocumento="'. $id.'"');
 		return $tipodocumentodocumento;
 	}


 	function tipodocumentodocumentodocente( $iddocente,$idperiodoacademico){

 		$tipodocumentodocumento = $this->db->query('select * from tipodocumentodocumento2 where iddocente="'. $iddocente.'" and idperiodoacademico="'. $idperiodoacademico.' "  order by iddocente   ');
 		return $tipodocumentodocumento;
 	}




 	function tipodocumentodocumentoalumno( $idalumno,$idperiodoacademico){

 		$tipodocumentodocumento = $this->db->query('select * from tipodocumentodocumento3 where idalumno="'. $idalumno.'" and idperiodoacademico="'. $idperiodoacademico.' "  order by idalumno  ');
 		return $tipodocumentodocumento;
 	}



 	function save($array)
 	{
			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];
	   $this->db->trans_begin();
		$condition1 = "iddocumento =" . "'" . $array['iddocumento'] . "'";
		$condition2 = "idtipodocumento =" . "'" . $array['idtipodocumento'] . "'";
		$this->db->select('*');
		$this->db->from('tipodocumentodocumento');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("tipodocumentodocumento", $array);
		   if( $this->db->affected_rows()>0){
			$idtipodocumentodocumento=$this->db->insert_id();
		   	$this->db->insert("vitacora", array("idusuario"=>$idusuario,"hora"=>$hora,"fecha"=>$fecha,"tabla"=>"tipodocumentodocumento","accion"=>"se sumo un documento con id=".$idtipodocumentodocumento,"url"=>$_SERVER['REQUEST_URI']));




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
 		$this->db->where('idtipodocumentodocumento',$id);
 		$this->db->update('tipodocumentodocumento',$array_item);
		   if( $this->db->affected_rows()>0){
			return true;
		 }else{
			return false;
	   }
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipodocumentodocumento',$id);
		$this->db->delete('tipodocumentodocumento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipodocumentodocumento")->get('tipodocumentodocumento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipodocumentodocumento")->get('tipodocumentodocumento1');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipodocumentodocumento = $this->db->select("idtipodocumentodocumento")->order_by("idtipodocumentodocumento")->get('tipodocumentodocumento')->result_array();
		$arr=array("idtipodocumentodocumento"=>$id);
		$clave=array_search($arr,$tipodocumentodocumento);
	   if(array_key_exists($clave+1,$tipodocumentodocumento))
		 {

 		$tipodocumentodocumento = $this->db->query('select * from tipodocumentodocumento where idtipodocumentodocumento="'. $tipodocumentodocumento[$clave+1]["idtipodocumentodocumento"].'"');
		 }else{

 		$tipodocumentodocumento = $this->db->query('select * from tipodocumentodocumento where idtipodocumentodocumento="'. $id.'"');
		 }
		 	
 		return $tipodocumentodocumento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipodocumentodocumento = $this->db->select("idtipodocumentodocumento")->order_by("idtipodocumentodocumento")->get('tipodocumentodocumento')->result_array();
		$arr=array("idtipodocumentodocumento"=>$id);
		$clave=array_search($arr,$tipodocumentodocumento);
	   if(array_key_exists($clave-1,$tipodocumentodocumento))
		 {

 		$tipodocumentodocumento = $this->db->query('select * from tipodocumentodocumento where idtipodocumentodocumento="'. $tipodocumentodocumento[$clave-1]["idtipodocumentodocumento"].'"');
		 }else{

 		$tipodocumentodocumento = $this->db->query('select * from tipodocumentodocumento where idtipodocumentodocumento="'. $id.'"');
		 }
		 	
 		return $tipodocumentodocumento;
 	}






}
