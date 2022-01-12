<?php
class Mensaje_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_mensajes(){
		 $mensaje= $this->db->get('mensaje');
		 return $mensaje;
	}

  //Retorna solamente un registro de el id pasado como parame
 	function mensaje($id){
 		$mensaje = $this->db->query('select * from mensaje where idmensaje="'. $id.'" order by idmensaje');
 		return $mensaje;
 	}

  // Para guardar un registro nuevo
	function save($array)
 	{
		$this->db->insert("mensaje", $array);
 	}

	// Para actualiza un registro
 	function update($id,$array_item)
 	{
 		$this->db->where('idmensaje',$id);
 		$this->db->update('mensaje',$array_item);
	}
 
  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idmensaje")->get('mensaje');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmensaje")->get('mensaje');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$mensaje = $this->db->select("idmensaje")->order_by("idmensaje")->get('mensaje')->result_array();
		$arr=array("idmensaje"=>$id);
		$clave=array_search($arr,$mensaje);
	   if(array_key_exists($clave+1,$mensaje))
		 {

 		$mensaje = $this->db->query('select * from mensaje where idmensaje="'. $mensaje[$clave+1]["idmensaje"].'"');
		 }else{

 		$mensaje = $this->db->query('select * from mensaje where idmensaje="'. $id.'"');
		 }
		 	
 		return $mensaje;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$mensaje = $this->db->select("idmensaje")->order_by("idmensaje")->get('mensaje')->result_array();
		$arr=array("idmensaje"=>$id);
		$clave=array_search($arr,$mensaje);
	   if(array_key_exists($clave-1,$mensaje))
		 {

 		$mensaje = $this->db->query('select * from mensaje where idmensaje="'. $mensaje[$clave-1]["idmensaje"].'"');
		 }else{

 		$mensaje = $this->db->query('select * from mensaje where idmensaje="'. $id.'"');
		 }
		 	
 		return $mensaje;
 	}




	// Para moverse presentar  los emisores 
	function emisores( $iddocu)
	{
 		$this->db->select('idpersona,nombres');
		$this->db->where('idmensaje="'.$iddocu.'"');
		$emisores=$this->db->get('emisor1');
		$emisores=$this->db->query('select idpersona,nombres from emisor1 where idmensaje="'. $iddocu.'"');
		return $emisores;
	}


  // Para presentar los destinatarios
	function destinatarios( $iddocu)
	{
		$destinatarios=$this->db->query('select idpersona,nombres from destinatario1 where idmensaje="'. $iddocu.'"');
		return $destinatarios;
	}



 
}
