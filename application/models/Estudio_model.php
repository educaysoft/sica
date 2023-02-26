<?php
class Estudio_model extends CI_model {

	function lista_estudios(){
		 $estudio= $this->db->get('estudio');
		 return $estudio;
	}


	function lista_estudios1($idpersona){

 		$this->db->where('idpersona',$idpersona);
		 $estudio= $this->db->get('estudio1');
		 return $estudio;
	}




	function lista_estudiosA(){
		 $estudio= $this->db->get('estudio1');
		 return $estudio;
	}



 	function estudio( $id){
 		$estudio = $this->db->query('select * from estudio where idestudio="'. $id.'"');
 		return $estudio;
 	}



 	function estudios( $idpersona){
 		$estudio = $this->db->query('select * from estudio1 where idpersona="'. $idpersona.'"');
 		return $estudio;
 	}


 	function estudiospersona( $id){
 		$estudio = $this->db->query('select * from estudio where idpersona="'. $id.'"');
 		return $estudio;
 	}



 	function save($array)
 	{
   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");
		$idusuario=$this->session->userdata['logged_in']['idusuario'];

		$condition1 = "idpersona =" . "'" . $array['idpersona'] . "'";
		$condition2 = "idinstitucion =" . "'" . $array['idinstitucion'] . "'";
		$condition3 = "idnivel =" . "'" . $array['idnivel'] . "'";
		$this->db->select('*');
		$this->db->from('estudio');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->where($condition3);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("estudio", $array);
			$idestudio=$this->db->insert_id();
		$this->db->insert("vitacora", array("idusuario"=>$idusuario,"fecha"=>$fecha,"tabla"=>"estudio","accion"=>"se creo el estuod(titulo)( con id=".$idestudio,"url"=>$_SERVER['REQUEST_URI'],"hora"=>$hora));
			return true;
		   }else{
			return false;
		   }
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idestudio',$id);
 		$this->db->update('estudio',$array_item);
	}
 


 	public function delete($id)
	{
		$idusuario=$this->session->userdata['logged_in']['idusuario'];
		if($idusuario==413) //SOLO PUEDE STALIN FRANCIS educaysoft@hotmail.com
		{	
 			$this->db->where('idestudio',$id);
			$this->db->delete('estudio');
    			if($this->db->affected_rows()==1)
			{
				$result=true;
			}else{
				$result=false;
			}
		}else{
			$result=FALSE;
		}
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idestudio")->get('estudio');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idestudio")->get('estudio');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$estudio = $this->db->select("idestudio")->order_by("idestudio")->get('estudio')->result_array();
		$arr=array("idestudio"=>$id);
		$clave=array_search($arr,$estudio);
	   if(array_key_exists($clave+1,$estudio))
		 {

 		$estudio = $this->db->query('select * from estudio where idestudio="'. $estudio[$clave+1]["idestudio"].'"');
		 }else{

 		$estudio = $this->db->query('select * from estudio where idestudio="'. $id.'"');
		 }
		 	
 		return $estudio;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$estudio = $this->db->select("idestudio")->order_by("idestudio")->get('estudio')->result_array();
		$arr=array("idestudio"=>$id);
		$clave=array_search($arr,$estudio);
	   if(array_key_exists($clave-1,$estudio))
		 {

 		$estudio = $this->db->query('select * from estudio where idestudio="'. $estudio[$clave-1]["idestudio"].'"');
		 }else{

 		$estudio = $this->db->query('select * from estudio where idestudio="'. $id.'"');
		 }
		 	
 		return $estudio;
 	}






}
