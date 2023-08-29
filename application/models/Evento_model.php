<?php
class Evento_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_eventos(){
		 $evento= $this->db->get('evento0');
		 return $evento;
	}


	function lista_eventos_open($idevento){
		if($idevento>0){
		$this->db->where("idevento",$idevento);  
		} else{
		$this->db->where("idevento_estado=2 or idevento_estado=3");  //SOLO ESTADO INSCRIPCION OR EN EJECUCION
		}
		 $evento= $this->db->get('evento0');
		 return $evento;
	}




	//Retorna todos los registros como un objeto
	function lista_eventosA($idevento_estado,$idpersona){
		if($idevento_estado>0)
		{
		$this->db->where('idevento_estado='.$idevento_estado);
		}


		if($idpersona>0)
		{


	$evento = $this->db->query('select * from evento1 where EXISTS (select idevento from participante0 where participante0.idevento=evento1.idevento and participante0.idpersona= "'.$idpersona.'") order by idevento');

		}

		 return $evento;	
	}





	function lista_eventosP($idpersona){

		$this->db->where("idevento_estado=2 or idevento_estado=3");  //SOLO ESTADO INSCRIPCION OR EN EJECUCION

	$evento = $this->db->query('select eve1.*, (select par1.nombres from participante1 par1 where par1.idevento=eve1.idevento and par1.idnivelparticipante=2 limit 1) as eltutor from evento1  eve1 where  EXISTS (select par0.idevento from participante0 par0 where par0.idevento=eve1.idevento and par0.idpersona= "'.$idpersona.'") order by eve1.idevento');

//	$evento = $this->db->query('select eve1.*, (select par1.nombres from participante1 par1 where par1.idevento=eve1.idevento and par1.idnivelparticipante=2 limit 1) as eltutor from evento1  eve1 where eve1.idevento_estado in (2,3) and  EXISTS (select par0.idevento from participante0 par0 where par0.idevento=eve1.idevento and par0.idpersona= "'.$idpersona.'") order by eve1.idevento');

		 return $evento;	
	}










	function lista_eventosTE($idevento_estado){
		$this->db->select('*');
		$this->db->where('idevento_estado='.$idevento_estado);
		$this->db->from('evento1');
		$evento = $this->db->get();

		 return $evento;	
	}





  //Retorna solamente un registro de un silabo
 	function eventosd($iddistributivodocente){
		$condition = "iddistributivodocente =" . $iddistributivodocente ;
		$this->db->select('*');
		$this->db->from('distributivodocente1');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
	//		print_r($query);
	//		die();
			$iddocente=$query->result()[0]->iddocente;
			$idperiodoacademico=$query->result()[0]->idperiodoacademico;
//		print_r($query);
	//		die();
				$evento = $this->db->query('select * from evento0 where idsilabo in (select idsilabo from silabo where iddocente="'. $iddocente.'" and idperiodoacademico="'.$idperiodoacademico.'") order by idevento');
 				return $evento;
			}else{
				return $query;
			}	

 	}




  //Retorna solamente un registro de un silabo
 	function eventoss($idsilabo){
	$evento = $this->db->query('select * from evento0 where idsilabo="'. $idsilabo.'" order by idevento');
 		return $evento;
 	}



  //Retorna solamente un registro de el id pasado como parame
 	function evento($id){
	$evento = $this->db->query('select * from evento0 where idevento="'. $id.'" order by idevento');
 		return $evento;
 	}















 




  //Retorna solamente un registro de el id pasado como parame
 	function lista_eventoP($id){

//		$this->db->where("idevento_estado=2 or idevento_estado=3");  //SOLO ESTADO INSCRIPCION OR EN EJECUCION
		$this->db->where("idevento",$id); 

		$evento=$this->db->order_by("elparticipante")->get('eventoP');
 		return $evento;
 	}









  // Para guardar un registro nuevo
	function save($array,$array2)
 	{

   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");

		$this->db->trans_begin();
		$this->db->insert("evento", $array);
		if($this->db->affected_rows()>0){
			$idevento=$this->db->insert_id();
			$array2['idevento']=$idevento;
			$this->db->insert("participante", $array2);

			$namefile1="evento-".sprintf("%d",$idevento) ;
			$namefile2="evento/detalle/".sprintf("%d",$idevento) ;
			$this->db->insert("pagina", array("nombre"=>$namefile1,"ruta"=>$namefile2));
			if($this->db->affected_rows()>0){
						$this->db->where('idevento',$idevento);
		$this->db->update('evento',array('idpagina'=>$this->db->insert_id()));
				}

		$this->db->insert("vitacora", array("idusuario"=>$this->session->userdata['logged_in']['idusuario'],"fecha"=>$fecha,"hora"=>$hora,"tabla"=>"evento","accion"=>"se creo un nuevo evento con id=".$idevento,"url"=>$_SERVER['REQUEST_URI']));
				$this->db->trans_commit();
				return true;
		}else{
			$this->db->trans_rollback();
			die("No se pudo grabar" );
			return false;
		}
 	}

	// Para actualiza un registro
 	function update($idevento,$array_item)
 	{
   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");

 		$this->db->where('idevento',$idevento);
		$this->db->update('evento',$array_item);

		$this->db->insert("vitacora", array("idusuario"=>$this->session->userdata['logged_in']['idusuario'],"fecha"=>$fecha,"hora"=>$hora,"tabla"=>"evento","accion"=>"se modifico el  evento con id=".$idevento,"url"=>$_SERVER['REQUEST_URI']));

	}



 	public function quitar($id)
	{
		$this->db->select('*');
		$this->db->from('participante0');
		$this->db->where('idevento',$id);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
				$result=false;
		}else
		{
				$this->db->where('idevento',$id);
				$this->db->update('evento',array('eliminado'=>1));
				if($this->db->affected_rows()==1)
					$result=true;
				else
					$result=false;
		}
	}





  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idevento")->get('evento0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();
	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idevento")->get('evento0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();
	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$evento = $this->db->select("idevento")->order_by("idevento")->get('evento0')->result_array();
		$arr=array("idevento"=>$id);
		$clave=array_search($arr,$evento);
	   if(array_key_exists($clave+1,$evento))
		 {

 		$evento = $this->db->query('select * from evento0 where idevento="'. $evento[$clave+1]["idevento"].'"');
		 }else{

 		$evento = $this->db->query('select * from evento0 where idevento="'. $id.'"');
		 }
		 	
 		return $evento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$evento = $this->db->select("idevento")->order_by("idevento")->get('evento0')->result_array();
		$arr=array("idevento"=>$id);
		$clave=array_search($arr,$evento);
	   if(array_key_exists($clave-1,$evento))
		 {

 		$evento = $this->db->query('select * from evento0 where idevento="'. $evento[$clave-1]["idevento"].'"');
		 }else{

 		$evento = $this->db->query('select * from evento0 where idevento="'. $id.'"');
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
 		$this->db->select('idcertificado,eldocumento');
		$this->db->where('idevento="'.$ideven.'"');
		$certificados=$this->db->get('certificado1');
		return $certificados;
	}



 
}
