<?php
class Documento_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_documentos(){
		 $documento= $this->db->get('documento');
		 return $documento;
	}



	//Retorna todos los registros como un objeto
	function lista_documentosxtipo($idtipodocumento){
		
		if($idtipodocumento==0)
		{
		$documento=$this->db->order_by("fechaelaboracion")->get('documento1');
		}else{

		$this->db->where('idtipodocu='.$idtipodocumento);
		$documento=$this->db->order_by("fechaelaboracion")->get('documento1');
		}
		 return $documento;
	}




	//Retorna todos los registros como un objeto
	function lista_documentosA($iddocumento){
		
		if($iddocumento==0)
		{
		$documento=$this->db->order_by("fechaelaboracion")->get('documento1');
		}else{

		$this->db->where('iddocumento='.$iddocumento);
		$documento=$this->db->order_by("fechaelaboracion")->get('documento1');
		}
		 return $documento;
	}




	//Retorna todos los registros como un objeto
	function lista_documentosC($idpersona){
		
		if($idpersona==0)
		{
		$documento=$this->db->order_by("fechaelaboracion")->get('documento1');
		}else{

		$this->db->where('idpersona='.$idpersona);
		$documento=$this->db->order_by("fechaelaboracion")->get('documento1');
		}
		 return $documento;
	}


	//Retorna todos los registros como un objeto
	function lista_documentosD($idpersona,$idportafolio){
		
	//	$this->db->where('idpersona',$idpersona);
		$this->db->where('idportafolio',$idportafolio);
		$documento=$this->db->order_by("fechaelaboracion")->get('documentoportafolio1');
		 return $documento;
	}






	function delete($id)
	{
			$this->db->trans_start();
			$this->db->where("iddocumento",$id);
		    	$query=$this->db->get('participante');
			if($query->num_rows()>0)
			{
				$arr=array('iddocumento'=>null);
				$this->db->where("iddocumento",$id);
				$this->db->update("participante",$arr);	
			}	


			$this->db->where("iddocumento",$id);
		    	$query=$this->db->get('emisor');
			if($query->num_rows()>0)
			{
				$this->db->where("iddocumento",$id);
				$this->db->delete("emisor");	
			}	



			$this->db->where('iddocumento',$id);
			$this->db->delete('documento');
			if($this->db->affected_rows()==1)
			{
				//Se elimina el id de la  tabla participante

				$this->db->trans_complete();

				$result=true;
			}else{
				$result=false;
			}

	}

	//Retorna todos los registros como un objeto
	function lista_documentosB($idtipodocu){
		if($idtipodocu>0)
		{
		$this->db->where('idtipodocu='.$idtipodocu);
		}
		$documento= $this->db->get('documento1');
		 return $documento;
	}


  //Retorna solamente un registro de el id pasado como parame
 	function documento($id){
 		$documento = $this->db->query('select * from documento where iddocumento="'. $id.'" order by iddocumento');
 		return $documento;
 	}

 	function documentoA($id){
 		$documento = $this->db->query('select * from documento1 where iddocumento="'. $id.'" order by iddocumento');
 		return $documento;
 	}




 	function parametros_documento($iddocumento){
 		$evento = $this->db->query('select * from eventoP where iddocumento2="'. $iddocumento.'" order by elparticipante');

		if($evento->num_rows()>0)
		{

 		return $evento->first_row('array');
		}else{

 		return array();
		}
 	}








  // Para guardar un registro nuevo
	function save($array,$array_creador)
 	{
		$this->db->trans_start();
		$this->db->insert("documento", $array);
		if( $this->db->affected_rows()>0) {
			$iddocumento=$this->db->insert_id();
			//Graba nombre de documento


			$array_creador['iddocumento']=$iddocumento;
			$this->db->insert('emisor',$array_creador);
			if($this->db->affected_rows()>0){
				$this->db->trans_complete();
			
 			$this->db->where('idpersona',$array_creador['idpersona']);
			$arp=$this->db->get("persona")->result_array();
			
			$emisor1=$arp[0]['apellidos']." ".$arp[0]['nombres'];
			$emisor2=explode(" ",$emisor1);
			$iniciales="";
			foreach($emisor2 as $palabra)
			{
				$iniciales=$iniciales.strtoupper(substr($palabra,0,1));

			}			
			$filename=$array['fechaelaboracion'].'-'.$iniciales.'-'.sprintf("%05d",$iddocumento).".pdf";
			$arr=array('archivopdf'=>$filename);
 			$this->db->where('iddocumento',$iddocumento);
			$this->db->update("documento",$arr);
				
			echo json_encode(json_decode('{"iddocumento":'.$iddocumento.',"archivopdf":"'.$filename.'"}'),JSON_PRETTY_PRINT);	

		//		return true;
			}else{

				$this->db->trans_complete();
				return false;
			}
		}else{
			return false;
		}
 	}

	// Para actualiza un registro
 	function update($id,$array_item)
 	{
 		$this->db->where('iddocumento',$id);
 		$this->db->update('documento',$array_item);
	}
 
  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("iddocumento")->get('documento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddocumento")->get('documento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$documento = $this->db->select("iddocumento")->order_by("iddocumento")->get('documento')->result_array();
		$arr=array("iddocumento"=>$id);
		$clave=array_search($arr,$documento);
	  	 if(array_key_exists($clave+1,$documento))
		 {

 		$documento = $this->db->query('select * from documento where iddocumento="'. $documento[$clave+1]["iddocumento"].'"');
		 }else{

 		$documento = $this->db->query('select * from documento where iddocumento="'. $id.'"');
		 }
		 	
 		return $documento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$documento = $this->db->select("iddocumento")->order_by("iddocumento")->get('documento')->result_array();
		$arr=array("iddocumento"=>$id);
		$clave=array_search($arr,$documento);
	   if(array_key_exists($clave-1,$documento))
		 {

 		$documento = $this->db->query('select * from documento where iddocumento="'. $documento[$clave-1]["iddocumento"].'"');
		 }else{

 		$documento = $this->db->query('select * from documento where iddocumento="'. $id.'"');
		 }
		 	
 		return $documento;
 	}




	// Para moverse presentar  los emisores 
	function emisores( $iddocu)
	{
 		$this->db->select('idpersona,elemisor');
		$this->db->where('iddocumento="'.$iddocu.'"');
		$emisores=$this->db->get('emisor1');
		$emisores=$this->db->query('select idpersona,elemisor from emisor1 where iddocumento="'. $iddocu.'"');
		return $emisores;
	}


  // Para presentar los destinatarios
	function destinatarios( $iddocu)
	{
		$destinatarios=$this->db->query('select idpersona,eldestinatario from destinatario1 where iddocumento="'. $iddocu.'"');
		return $destinatarios;
	}



 
}
