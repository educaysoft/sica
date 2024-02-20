<?php
class Trabajointegracioncurricular_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurriculars(){
		 $trabajointegracioncurricular= $this->db->get('trabajointegracioncurricular');
		 return $trabajointegracioncurricular;
	}



	function lista_trabajointegracioncurricularsxdestino($iddestinotrabajointegracioncurricular){
		
		if($iddestinotrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('iddestinotrabajointegracioncurricular='.$iddestinotrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}





	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsxtipo($idtipotrabajointegracioncurricular,$idpersona){

		
		if($idpersona>0){
			$this->db->where('idpersona='.$idpersona);
		}
			

		if($idtipotrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("autor")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idtipodocu='.$idtipotrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("autor")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}



	//Retorna todos los registros como un objeto
	function trabajointegracioncurricularsxtipo($idtipotrabajointegracioncurricular){
		
		if($idtipotrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("autor")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idtipodocu='.$idtipotrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("autor")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}







	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsA($idtrabajointegracioncurricular){
		
		if($idtrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idtrabajointegracioncurricular='.$idtrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}


	function lista_facturas($idtipotrabajointegracioncurricular){
		
		if($idtipotrabajointegracioncurricular==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idtipodocu='.$idtipotrabajointegracioncurricular);
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}








	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsC($idpersona){
		
		if($idpersona==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}else{

		$this->db->where('idpersona='.$idpersona);
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricular1');
		}
		 return $trabajointegracioncurricular;
	}



	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsreci($idpersona){
		
		if($idpersona==0)
		{
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricularreci');
		}else{

		$this->db->where('idpersona='.$idpersona);
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricularreci');
		}
		 return $trabajointegracioncurricular;
	}






	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsD($idpersona,$idportafolio){
		if($idportafolio==0){
		$this->db->where('idpersona',$idpersona);
		}else{
		$this->db->where('idportafolio',$idportafolio);
		}
		$trabajointegracioncurricular=$this->db->order_by("fechaelaboracion")->get('trabajointegracioncurricularportafolio1');
		 return $trabajointegracioncurricular;
	}






	function delete($id)
	{
			$this->db->trans_start();
			$this->db->where("idtrabajointegracioncurricular",$id);
		    	$query=$this->db->get('participante');
			if($query->num_rows()>0)
			{
				$arr=array('idtrabajointegracioncurricular'=>null);
				$this->db->where("idtrabajointegracioncurricular",$id);
				$this->db->update("participante",$arr);	
			}	

			$this->db->where("idtrabajointegracioncurricular",$id);
		    	$query=$this->db->get('egresado');
			if($query->num_rows()>0)
			{
				$this->db->where("idtrabajointegracioncurricular",$id);
				$this->db->delete("egresado");	
			}	

			$this->db->where('idtrabajointegracioncurricular',$id);
			$this->db->update('trabajointegracioncurricular',array('eliminado'=>1));
			if($this->db->affected_rows()==1)
			{
				$this->db->trans_complete();
				$result=true;
			}else{
				$result=false;
			}

	}

	//Retorna todos los registros como un objeto
	function lista_trabajointegracioncurricularsB($idtipodocu){
		if($idtipodocu>0)
		{
		$this->db->where('idtipodocu='.$idtipodocu);
		}
		$trabajointegracioncurricular= $this->db->get('trabajointegracioncurricular1');
		 return $trabajointegracioncurricular;
	}


  	//Retorna solamente un registro de el id pasado como parame
 	function trabajointegracioncurricular($id){
 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $id.'" order by idtrabajointegracioncurricular');
 		return $trabajointegracioncurricular;
 	}

 	function trabajointegracioncurricularA($id){
 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular1 where idtrabajointegracioncurricular="'. $id.'" order by idtrabajointegracioncurricular');
 		return $trabajointegracioncurricular;
 	}




 	function parametros_trabajointegracioncurricular($idtrabajointegracioncurricular){
 		$evento = $this->db->query('select * from eventoP where idtrabajointegracioncurricular2="'. $idtrabajointegracioncurricular.'" order by elparticipante');

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
		$this->db->insert("trabajointegracioncurricular", $array);
		if( $this->db->affected_rows()>0) {
			$idtrabajointegracioncurricular=$this->db->insert_id();
			//Graba nombre de trabajointegracioncurricular


			$array_creador['idtrabajointegracioncurricular']=$idtrabajointegracioncurricular;
			$this->db->insert('egresado',$array_creador);
			if($this->db->affected_rows()>0){
				$this->db->trans_complete();
			
 			$this->db->where('idpersona',$array_creador['idpersona']);
			$arp=$this->db->get("persona")->result_array();
			
			$egresado1=$arp[0]['apellidos']." ".$arp[0]['nombres'];
			$egresado2=explode(" ",$egresado1);
			$iniciales="";
			foreach($egresado2 as $palabra)
			{
				$iniciales=$iniciales.strtoupper(substr($palabra,0,1));

			}			
			$filename=$array['fechaelaboracion'].'-'.$iniciales.'-'.sprintf("%05d",$idtrabajointegracioncurricular).".pdf";
			$arr=array('archivopdf'=>$filename);
 			$this->db->where('idtrabajointegracioncurricular',$idtrabajointegracioncurricular);
			$this->db->update("trabajointegracioncurricular",$arr);
				
			echo json_encode(json_decode('{"idtrabajointegracioncurricular":'.$idtrabajointegracioncurricular.',"archivopdf":"'.$filename.'"}'),JSON_PRETTY_PRINT);	

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
 		$this->db->where('idtrabajointegracioncurricular',$id);
 		$this->db->update('trabajointegracioncurricular',$array_item);
	}
 
  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$trabajointegracioncurricular = $this->db->select("idtrabajointegracioncurricular")->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular')->result_array();
		$arr=array("idtrabajointegracioncurricular"=>$id);
		$clave=array_search($arr,$trabajointegracioncurricular);
	  	 if(array_key_exists($clave+1,$trabajointegracioncurricular))
		 {

 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $trabajointegracioncurricular[$clave+1]["idtrabajointegracioncurricular"].'"');
		 }else{

 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $id.'"');
		 }
		 	
 		return $trabajointegracioncurricular;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$trabajointegracioncurricular = $this->db->select("idtrabajointegracioncurricular")->order_by("idtrabajointegracioncurricular")->get('trabajointegracioncurricular')->result_array();
		$arr=array("idtrabajointegracioncurricular"=>$id);
		$clave=array_search($arr,$trabajointegracioncurricular);
	   if(array_key_exists($clave-1,$trabajointegracioncurricular))
		 {

 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $trabajointegracioncurricular[$clave-1]["idtrabajointegracioncurricular"].'"');
		 }else{

 		$trabajointegracioncurricular = $this->db->query('select * from trabajointegracioncurricular where idtrabajointegracioncurricular="'. $id.'"');
		 }
		 	
 		return $trabajointegracioncurricular;
 	}




	// Para moverse presentar  los egresados 
	function egresados( $iddocu)
	{
 		$this->db->select('idpersona,elegresado');
		$this->db->where('idtrabajointegracioncurricular="'.$iddocu.'"');
		$egresados=$this->db->get('egresado1');
		$egresados=$this->db->query('select idpersona,elegresado from egresado1 where idtrabajointegracioncurricular="'. $iddocu.'"');
		return $egresados;
	}


  // Para presentar los destinatarios
	function destinatarios( $iddocu)
	{
		$destinatarios=$this->db->query('select idpersona,eldestinatario from destinatario1 where idtrabajointegracioncurricular="'. $iddocu.'"');
		return $destinatarios;
	}



 
}
