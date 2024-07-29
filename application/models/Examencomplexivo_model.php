<?php
class Examencomplexivo_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_examencomplexivos(){
		 $examencomplexivo= $this->db->get('examencomplexivo');
		 return $examencomplexivo;
	}



	function lista_examencomplexivosxdestino($iddestinoexamencomplexivo){
		
		if($iddestinoexamencomplexivo==0)
		{
		$examencomplexivo=$this->db->order_by("fechaelaboracion")->get('examencomplexivo1');
		}else{

		$this->db->where('iddestinoexamencomplexivo='.$iddestinoexamencomplexivo);
		$examencomplexivo=$this->db->order_by("idexamencomplexivo")->get('examencomplexivo1');
		}
		 return $examencomplexivo;
	}





	//Retorna todos los registros como un objeto
	function lista_examencomplexivosxtipo($idtipoexamencomplexivo,$idpersona){

		
		if($idpersona>0){
			$this->db->where('idpersona='.$idpersona);
		}
			

		if($idtipoexamencomplexivo==0)
		{
		$examencomplexivo=$this->db->order_by("autor")->get('examencomplexivo1');
		}else{

		$this->db->where('idtipodocu='.$idtipoexamencomplexivo);
		$examencomplexivo=$this->db->order_by("autor")->get('examencomplexivo1');
		}
		 return $examencomplexivo;
	}



	//Retorna todos los registros como un objeto
	function examencomplexivosxtipo($idestadoexamencomplexivo){
		
		if($idestadoexamencomplexivo==0)
		{
		$examencomplexivo=$this->db->order_by("eltutorexamencomplexivo")->get('examencomplexivo1');
		}else{

		$this->db->where('idestadoexamencomplexivo='.$idestadoexamencomplexivo);
		$examencomplexivo=$this->db->order_by("eltutorexamencomplexivo")->get('examencomplexivo1');
		}
		 return $examencomplexivo;
	}







	//Retorna todos los registros como un objeto
	function lista_examencomplexivosA($idexamencomplexivo){
		
		if($idexamencomplexivo==0)
		{
		$examencomplexivo=$this->db->order_by("idexamencomplexivo")->get('examencomplexivo1');
		}else{

		$this->db->where('idexamencomplexivo='.$idexamencomplexivo);
		$examencomplexivo=$this->db->order_by("idexamencomplexivo")->get('examencomplexivo1');
		}
		 return $examencomplexivo;
	}



	//Retorna todos los registros como un objeto
	function examencomplexivosA($iddocente){
		
		if($iddocente==0)
		{
		$examencomplexivo=$this->db->order_by("idexamencomplexivo")->get('examencomplexivo2');
		}else{

		$this->db->where('iddocente='.$iddocente);
		$examencomplexivo=$this->db->order_by("iddocente")->get('examencomplexivo2');
		}
		 return $examencomplexivo;
	}




	function examencomplexivosB($idegresado){
		
		if($idegresado==0)
		{
		$examencomplexivo=$this->db->order_by("idexamencomplexivo")->get('examencomplexivo2');
		}else{

		$this->db->where('idegresado='.$idegresado);
		$examencomplexivo=$this->db->order_by("idegresado")->get('examencomplexivo2');
		}
		 return $examencomplexivo;
	}








	function lista_facturas($idtipoexamencomplexivo){
		
		if($idtipoexamencomplexivo==0)
		{
		$examencomplexivo=$this->db->order_by("fechaelaboracion")->get('examencomplexivo1');
		}else{

		$this->db->where('idtipodocu='.$idtipoexamencomplexivo);
		$examencomplexivo=$this->db->order_by("fechaelaboracion")->get('examencomplexivo1');
		}
		 return $examencomplexivo;
	}








	//Retorna todos los registros como un objeto
	function lista_examencomplexivosC($idpersona){
		
		if($idpersona==0)
		{
		$examencomplexivo=$this->db->order_by("fechaelaboracion")->get('examencomplexivo1');
		}else{

		$this->db->where('idpersona='.$idpersona);
		$examencomplexivo=$this->db->order_by("fechaelaboracion")->get('examencomplexivo1');
		}
		 return $examencomplexivo;
	}



	//Retorna todos los registros como un objeto
	function lista_examencomplexivosreci($idpersona){
		
		if($idpersona==0)
		{
		$examencomplexivo=$this->db->order_by("fechaelaboracion")->get('examencomplexivoreci');
		}else{

		$this->db->where('idpersona='.$idpersona);
		$examencomplexivo=$this->db->order_by("fechaelaboracion")->get('examencomplexivoreci');
		}
		 return $examencomplexivo;
	}






	//Retorna todos los registros como un objeto
	function lista_examencomplexivosD($idpersona,$idportafolio){
		if($idportafolio==0){
		$this->db->where('idpersona',$idpersona);
		}else{
		$this->db->where('idportafolio',$idportafolio);
		}
		$examencomplexivo=$this->db->order_by("fechaelaboracion")->get('examencomplexivoportafolio1');
		 return $examencomplexivo;
	}






	function delete($id)
	{
			$this->db->trans_start();
			$this->db->where("idexamencomplexivo",$id);
		    	$query=$this->db->get('participante');
			if($query->num_rows()>0)
			{
				$arr=array('idexamencomplexivo'=>null);
				$this->db->where("idexamencomplexivo",$id);
				$this->db->update("participante",$arr);	
			}	

			$this->db->where("idexamencomplexivo",$id);
		    	$query=$this->db->get('egresado');
			if($query->num_rows()>0)
			{
				$this->db->where("idexamencomplexivo",$id);
				$this->db->delete("egresado");	
			}	

			$this->db->where('idexamencomplexivo',$id);
			$this->db->update('examencomplexivo',array('eliminado'=>1));
			if($this->db->affected_rows()==1)
			{
				$this->db->trans_complete();
				$result=true;
			}else{
				$result=false;
			}

	}

	//Retorna todos los registros como un objeto
	function lista_examencomplexivosB($idtipodocu){
		if($idtipodocu>0)
		{
		$this->db->where('idtipodocu='.$idtipodocu);
		}
		$examencomplexivo= $this->db->get('examencomplexivo1');
		 return $examencomplexivo;
	}


  	//Retorna solamente un registro de el id pasado como parame
 	function examencomplexivo($id){
 		$examencomplexivo = $this->db->query('select * from examencomplexivo where idexamencomplexivo="'. $id.'" order by idexamencomplexivo');
 		return $examencomplexivo;
 	}

 	function examencomplexivoA($id){
 		$examencomplexivo = $this->db->query('select * from examencomplexivo1 where idexamencomplexivo="'. $id.'" order by idexamencomplexivo');
 		return $examencomplexivo;
 	}


	function lista_examencomplexivo3($idexamencomplexivo){
		if($idexamencomplexivo>0){
		  $this->db->where('idexamencomplexivo',$idexamencomplexivo);
		}


		 $examencomplexivo= $this->db->order_by("idexamencomplexivo")->get('examencomplexivo3');
		 return $examencomplexivo;
	}







 	function parametros_examencomplexivo($idexamencomplexivo){
 		$evento = $this->db->query('select * from eventoP where idexamencomplexivo2="'. $idexamencomplexivo.'" order by elparticipante');

		if($evento->num_rows()>0)
		{

 		return $evento->first_row('array');
		}else{

 		return array();
		}
 	}








  // Para guardar un registro nuevo
	function save($array)
 	{
		$this->db->insert("examencomplexivo", $array);
		if( $this->db->affected_rows()>0) {
			$idexamencomplexivo=$this->db->insert_id();
			//Graba nombre de examencomplexivo
				return true;
		}else{
			return false;
		}
 	}

	// Para actualiza un registro
 	function update($id,$array_item)
 	{
 		$this->db->where('idexamencomplexivo',$id);
 		$this->db->update('examencomplexivo',$array_item);
	}
 
  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idexamencomplexivo")->get('examencomplexivo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idexamencomplexivo")->get('examencomplexivo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$examencomplexivo = $this->db->select("idexamencomplexivo")->order_by("idexamencomplexivo")->get('examencomplexivo')->result_array();
		$arr=array("idexamencomplexivo"=>$id);
		$clave=array_search($arr,$examencomplexivo);
	  	 if(array_key_exists($clave+1,$examencomplexivo))
		 {

 		$examencomplexivo = $this->db->query('select * from examencomplexivo where idexamencomplexivo="'. $examencomplexivo[$clave+1]["idexamencomplexivo"].'"');
		 }else{

 		$examencomplexivo = $this->db->query('select * from examencomplexivo where idexamencomplexivo="'. $id.'"');
		 }
		 	
 		return $examencomplexivo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$examencomplexivo = $this->db->select("idexamencomplexivo")->order_by("idexamencomplexivo")->get('examencomplexivo')->result_array();
		$arr=array("idexamencomplexivo"=>$id);
		$clave=array_search($arr,$examencomplexivo);
	   if(array_key_exists($clave-1,$examencomplexivo))
		 {

 		$examencomplexivo = $this->db->query('select * from examencomplexivo where idexamencomplexivo="'. $examencomplexivo[$clave-1]["idexamencomplexivo"].'"');
		 }else{

 		$examencomplexivo = $this->db->query('select * from examencomplexivo where idexamencomplexivo="'. $id.'"');
		 }
		 	
 		return $examencomplexivo;
 	}




	// Para moverse presentar  los egresados 
	function egresados( $iddocu)
	{
        if($iddocu>0){
		$this->db->where('idexamencomplexivo="'.$iddocu.'"');
        }
		$egresados=$this->db->get('egresado2');
		return $egresados;
	}


  // Para presentar los tutorexamencomplexivoes
	function tutorexamencomplexivoes( $iddocu)
	{

        if($iddocu>0){

		$tutorexamencomplexivoes=$this->db->query('select idpersona,eltutorexamencomplexivo from tutorexamencomplexivo1 where idexamencomplexivo="'. $iddocu.'"');
        }else{

		$tutorexamencomplexivoes=$this->db->query('select idpersona,eltutorexamencomplexivo from tutorexamencomplexivo1');

        }
		return $tutorexamencomplexivoes;
	}



 
}
