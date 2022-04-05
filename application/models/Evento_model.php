<?php
class Evento_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_eventos(){
		 $evento= $this->db->get('evento');
		 return $evento;
	}

	//Retorna todos los registros como un objeto
	function lista_eventosA(){
		 $evento= $this->db->get('evento1');
		 return $evento;
	}




  //Retorna solamente un registro de el id pasado como parame
 	function evento($id){
 		$evento = $this->db->query('select * from evento where idevento="'. $id.'" order by idevento');
 		return $evento;
 	}

  //Retorna solamente un registro de el id pasado como parame
 	function lista_eventoP($id){
 		$evento = $this->db->query('select * from eventoP where idevento="'. $id.'" order by elparticipante');
 		return $evento;
 	}






  // Para guardar un registro nuevo
	function save($array)
 	{
		$this->db->trans_begin();
		$this->db->insert("evento", $array);
		if($this->db->affected_rows()>0){
			$idevento=$this->db->insert_id();
			$namefile1="evento-".sprintf("%d",$idevento) ;
			$namefile2="evento/detalle/".sprintf("%d",$idevento) ;
			$this->db->insert("pagina", array("nombre"=>$namefile1,"ruta"=>$namefile2));
			if($this->db->affected_rows()>0){
						$this->db->where('idevento',$idevento);
						$this->db->update('evento',array('idpagina'=>$this->db->insert_id()));
				}
				$this->db->trans_commit();
				die("Se guardo el evento y se la pagina de detalle" );
				return true;
		}else{
			$this->db->trans_rollback();
			die("No de pudo grabar" );
			return false;
		}
 	}

	// Para actualiza un registro
 	function update($id,$array_item)
 	{
 		$this->db->where('idevento',$id);
 		$this->db->update('evento',$array_item);
	}
 
  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idevento")->get('evento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();
	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idevento")->get('evento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();
	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$evento = $this->db->select("idevento")->order_by("idevento")->get('evento')->result_array();
		$arr=array("idevento"=>$id);
		$clave=array_search($arr,$evento);
	   if(array_key_exists($clave+1,$evento))
		 {

 		$evento = $this->db->query('select * from evento where idevento="'. $evento[$clave+1]["idevento"].'"');
		 }else{

 		$evento = $this->db->query('select * from evento where idevento="'. $id.'"');
		 }
		 	
 		return $evento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$evento = $this->db->select("idevento")->order_by("idevento")->get('evento')->result_array();
		$arr=array("idevento"=>$id);
		$clave=array_search($arr,$evento);
	   if(array_key_exists($clave-1,$evento))
		 {

 		$evento = $this->db->query('select * from evento where idevento="'. $evento[$clave-1]["idevento"].'"');
		 }else{

 		$evento = $this->db->query('select * from evento where idevento="'. $id.'"');
		 }
		 	
 		return $evento;
 	}




	// Para moverse presentar  los emisores 
	function participantes( $ideven)
	{
 		$this->db->select('idpersona,nombres');
		$this->db->where('idevento="'.$ideven.'"');
		$emisores=$this->db->get('participante1');
		$emisores=$this->db->query('select idpersona,nombres from participante1 where idevento="'. $ideven.'"');
		return $emisores;
	}




	// Para moverse presentar  los emisores 
	function certificados($ideven)
	{
 		$this->db->select('idcertificado,asunto');
		$this->db->where('idevento="'.$ideven.'"');
		$certificados=$this->db->get('certificado1');
		return $certificados;
	}



 
}
