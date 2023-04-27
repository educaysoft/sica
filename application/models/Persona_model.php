<?php
class Persona_model extends CI_model {

	function lista_personas(){
		 $this->db->order_by("apellidos","asc");
		 $persona= $this->db->get('persona0');
		 return $persona;
	}


	function lista_personasA(){
		 $this->db->order_by("lapersona","asc");
		 $persona= $this->db->get('persona2');
		 return $persona;
	}



	function persona2(){
		 $this->db->order_by("lapersona","asc");
		 $persona= $this->db->get('persona2');
		 return $persona;
	}




	function persona( $id){
		$persona = $this->db->query('select * from persona0 where idpersona="'. $id.'"');
		return $persona;
	}

	function existe( $cedula){
		$condition = "cedula =" . "'" . $cedula . "'";
		$this->db->select('*');
		$this->db->from('persona0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
				return false;
		}else{
				return true;
		}
	}





	function save($array_persona,$array_correo,$array_telefono)
	{

   			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];

	   $this->db->trans_begin();
		$condition = "cedula =" . "'" . $array_persona['cedula'] . "'";
		$this->db->select('*');
		$this->db->from('persona0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("persona", $array_persona);
		   if( $this->db->affected_rows()>0){
			$idpersona=$this->db->insert_id();
			if($array_correo['nombre']!=""){
				$array_correo['idpersona']=$idpersona;
				$this->db->insert('correo',$array_correo);
			}		
			if($array_telefono['numero']!=""){
				$array_telefono['idpersona']=$idpersona;
				$this->db->insert('telefono',$array_telefono);
			}


		   	$this->db->insert("vitacora", array("idusuario"=>$idusuario,"hora"=>$hora,"fecha"=>$array_persona['fechacreacion'],"tabla"=>"persona","accion"=>"se creoo la persona con id=".$idpersona,"url"=>$_SERVER['REQUEST_URI']));

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

	function update($idpersona,$array_item)
	{
   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");
		$idusuario=$this->session->userdata['logged_in']['idusuario'];

		$this->db->where('idpersona',$idpersona);
		$this->db->update('persona',$array_item);
		$this->db->insert("vitacora", array("idusuario"=>$idusuario,"fecha"=>$fecha,"tabla"=>"persona","accion"=>"se modifico la persona con id=".$idpersona,"url"=>$_SERVER['REQUEST_URI'],"hora"=>$hora));
   }

	function getCSV() {
    $sql = "SELECT * FROM persona";
    return $this->db->query($sql);
	}



 public function quitar($id)
	{
		$this->db->trans_start();
		$condition = "idpersona =" . $id ;
		$this->db->select('*');
		$this->db->from('persona0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idpersona',$id);
				$this->db->update('persona', array('eliminado'=>1));
		    		//$this->db->delete('participante');
           				 $this->db->trans_complete();
			      		$result=true;
      	}else{	

            $this->db->trans_complete();
			      $result=false;
   	}

	return $result;
 	}









 	public function borrar($id)
	{
		$idusuario=$this->session->userdata['logged_in']['idusuario'];
		if($idusuario==413) //SOLO PUEDE STALIN FRANCIS educaysoft@hotmail.com
		{	
		$condition = "idpersona =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('correo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
			if ($query->num_rows() != 0) {
			$this->db->where('idpersona',$id);
			$this->db->delete('correo');
			if($this->db->affected_rows()==1)
				$result=true;
			else
				$result=false;
		}


		$condition = "idpersona =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('telefono');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			$this->db->where('idpersona',$id);
			$this->db->delete('telefono');
			if($this->db->affected_rows()==1)
				$result=true;
			else
				$result=false;
		}


		$condition = "idpersona =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('persona0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			$this->db->where('idpersona',$id);
			$this->db->delete('persona');
			if($this->db->affected_rows()==1)
				$result=true;
			else
				$result=false;
		}


		}else{
			$result=FALSE;
		}
		return $result;
 	}











	function elprimero()
	{
		$query=$this->db->order_by("idpersona")->get('persona');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpersona")->get('persona');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$persona = $this->db->select("idpersona")->order_by("idpersona")->get('persona')->result_array();
		$arr=array("idpersona"=>$id);
		$clave=array_search($arr,$persona);
	   if(array_key_exists($clave+1,$persona))
		 {

 		$persona = $this->db->query('select * from persona0 where idpersona="'. $persona[$clave+1]["idpersona"].'"');
		 }else{

 		$persona = $this->db->query('select * from persona0 where idpersona="'. $id.'"');
		 }
		 	
 		return $persona;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$persona = $this->db->select("idpersona")->order_by("idpersona")->get('persona0')->result_array();
		$arr=array("idpersona"=>$id);
		$clave=array_search($arr,$persona);
	   if(array_key_exists($clave-1,$persona))
		 {

 		$persona = $this->db->query('select * from persona0 where idpersona="'. $persona[$clave-1]["idpersona"].'"');
		 }else{

 		$persona = $this->db->query('select * from persona0 where idpersona="'. $id.'"');
		 }
		 	
 		return $persona;
 	}










}
