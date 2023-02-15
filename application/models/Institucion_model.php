<?php
class Institucion_model extends CI_model {

	function lista_instituciones(){
		 $institucion= $this->db->order_by("nombre")->get('institucion');
		 return $institucion;
	}

 	function institucion( $id){
 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $id.'"');
		 
 		return $institucion;
 	}

 	function save($array)
 	{
   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");
		$idusuario=$this->session->userdata['logged_in']['idusuario'];

		$this->db->insert("institucion", $array);
		  if( $this->db->affected_rows()>0){
			$idinstitucion=$this->db->insert_id();
		$this->db->insert("vitacora", array("idusuario"=>$idusuario,"fecha"=>$fecha,"tabla"=>"institucion","accion"=>"se creo la institucion con id=".$idinstitucion,"url"=>$_SERVER['REQUEST_URI'],"hora"=>$hora));

			return true;
		   }else{
			return false;
		   }

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idinstitucion',$id);
 		$this->db->update('institucion',$array_item);
	}
 


 	public function delete($id)
	{
		$idusuario=$this->session->userdata['logged_in']['idusuario'];
		if($idusuario==413) //SOLO PUEDE STALIN FRANCIS educaysoft@hotmail.com
		{	
 			$this->db->where('idinstitucion',$id);
			$this->db->delete('institucion');
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


public function get_institucion($id){
	$condition = "idinstitucion =" .  $id ;
	$this->db->select('*');
	$this->db->from('institucion');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}





	function elprimero()
	{
		$query=$this->db->order_by("idinstitucion")->get('institucion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idinstitucion")->get('institucion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$institucion = $this->db->select("idinstitucion")->order_by("idinstitucion")->get('institucion')->result_array();
		$arr=array("idinstitucion"=>$id);
		$clave=array_search($arr,$institucion);
	   if(array_key_exists($clave+1,$institucion))
		 {

 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $institucion[$clave+1]["idinstitucion"].'"');
		 }else{

 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $id.'"');
		 }
		 	
 		return $institucion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$institucion = $this->db->select("idinstitucion")->order_by("idinstitucion")->get('institucion')->result_array();
		$arr=array("idinstitucion"=>$id);
		$clave=array_search($arr,$institucion);
	   if(array_key_exists($clave-1,$institucion))
		 {

 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $institucion[$clave-1]["idinstitucion"].'"');
		 }else{

 		$institucion = $this->db->query('select * from institucion where idinstitucion="'. $id.'"');
		 }
		 	
 		return $institucion;
 	}



	function lista_instituciones_con_inscripciones(){
		 $this->db->select('institucion.*');
		 $this->db->from('institucion,evento');
		 $this->db->where('evento.idinstitucion=institucion.idinstitucion and evento.idevento_estado=2');
		 $institucion= $this->db->get();
		 return $institucion;
	}




}
