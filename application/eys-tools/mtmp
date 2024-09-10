<?php
class Documentotrabajointegracioncurricular_model extends CI_model {

	function lista_documentotrabajointegracioncurriculars(){
		 $documentotrabajointegracioncurricular= $this-db->get('documentotrabajointegracioncurricular');
		 return $documentotrabajointegracioncurricular;
	}


	function lista_documentotrabajointegracioncurricularsA(){
		 $documentotrabajointegracioncurricular= $this->db->get('documentotrabajointegracioncurricular1');
		 return $documentotrabajointegracioncurricular;
	}



 	function documentotrabajointegracioncurricular( $id){
 		$documentotrabajointegracioncurricular = $this->db->query('select * from documentotrabajointegracioncurricular where iddocumentotrabajointegracioncurricular="'. $id.'"');
 		return $documentotrabajointegracioncurricular;
 	}


 	function documentotrabajointegracioncurricularspersona( $id){
 		$documentotrabajointegracioncurricular = $this->db->query('select * from documentotrabajointegracioncurricular where idpersona="'. $id.'"');
 		return $documentotrabajointegracioncurricular;
 	}


 	function documentotrabajointegracioncurriculardocente( $iddocente,$idperiodoacademico){

 		$documentotrabajointegracioncurricular = $this->db->query('select * from documentotrabajointegracioncurricular2 where iddocente="'. $iddocente.'" and idperiodoacademico="'. $idperiodoacademico.' "  order by iddocente   ');
 		return $documentotrabajointegracioncurricular;
 	}




 	function documentotrabajointegracioncurricularalumno( $idalumno,$idperiodoacademico){

 		$documentotrabajointegracioncurricular = $this->db->query('select * from documentotrabajointegracioncurricular3 where idalumno="'. $idalumno.'" and idperiodoacademico="'. $idperiodoacademico.' "  order by idalumno  ');
 		return $documentotrabajointegracioncurricular;
 	}



 	function save($array)
 	{
			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];
	   $this->db->trans_begin();
		$condition1 = "iddocumento =" . "'" . $array['iddocumento'] . "'";
		$condition2 = "idtrabajointegracioncurricular =" . "'" . $array['idtrabajointegracioncurricular'] . "'";
		$this->db->select('*');
		$this->db->from('documentotrabajointegracioncurricular');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("documentotrabajointegracioncurricular", $array);
		   if( $this->db->affected_rows()>0){
			$iddocumentotrabajointegracioncurricular=$this->db->insert_id();
		   	$this->db->insert("vitacora", array("idusuario"=>$idusuario,"hora"=>$hora,"fecha"=>$fecha,"tabla"=>"documentotrabajointegracioncurricular","accion"=>"se sumo un documento con id=".$iddocumentotrabajointegracioncurricular,"url"=>$_SERVER['REQUEST_URI']));




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
 		$this->db->where('iddocumentotrabajointegracioncurricular',$id);
 		$this->db->update('documentotrabajointegracioncurricular',$array_item);
		   if( $this->db->affected_rows()>0){
			return true;
		 }else{
			return false;
	   }
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddocumentotrabajointegracioncurricular',$id);
		$this->db->delete('documentotrabajointegracioncurricular');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddocumentotrabajointegracioncurricular")->get('documentotrabajointegracioncurricular');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocumentotrabajointegracioncurricular")->get('documentotrabajointegracioncurricular1');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$documentotrabajointegracioncurricular = $this->db->select("iddocumentotrabajointegracioncurricular")->order_by("iddocumentotrabajointegracioncurricular")->get('documentotrabajointegracioncurricular')->result_array();
		$arr=array("iddocumentotrabajointegracioncurricular"=>$id);
		$clave=array_search($arr,$documentotrabajointegracioncurricular);
	   if(array_key_exists($clave+1,$documentotrabajointegracioncurricular))
		 {

 		$documentotrabajointegracioncurricular = $this->db->query('select * from documentotrabajointegracioncurricular where iddocumentotrabajointegracioncurricular="'. $documentotrabajointegracioncurricular[$clave+1]["iddocumentotrabajointegracioncurricular"].'"');
		 }else{

 		$documentotrabajointegracioncurricular = $this->db->query('select * from documentotrabajointegracioncurricular where iddocumentotrabajointegracioncurricular="'. $id.'"');
		 }
		 	
 		return $documentotrabajointegracioncurricular;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$documentotrabajointegracioncurricular = $this->db->select("iddocumentotrabajointegracioncurricular")->order_by("iddocumentotrabajointegracioncurricular")->get('documentotrabajointegracioncurricular')->result_array();
		$arr=array("iddocumentotrabajointegracioncurricular"=>$id);
		$clave=array_search($arr,$documentotrabajointegracioncurricular);
	   if(array_key_exists($clave-1,$documentotrabajointegracioncurricular))
		 {

 		$documentotrabajointegracioncurricular = $this->db->query('select * from documentotrabajointegracioncurricular where iddocumentotrabajointegracioncurricular="'. $documentotrabajointegracioncurricular[$clave-1]["iddocumentotrabajointegracioncurricular"].'"');
		 }else{

 		$documentotrabajointegracioncurricular = $this->db->query('select * from documentotrabajointegracioncurricular where iddocumentotrabajointegracioncurricular="'. $id.'"');
		 }
		 	
 		return $documentotrabajointegracioncurricular;
 	}






}
