<?php
class Gestion_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_gestions(){
		 $gestion= $this->db->get('gestion');
		 return $gestion;
	}


	function lista_gestions_open(){
		$this->db->where("idgestion_estado=2 or idgestion_estado=3");  //SOLO ESTADO INSCRIPCION OR EN EJECUCION
		 $gestion= $this->db->get('gestion');
		 return $gestion;
	}




	//Retorna todos los registros como un objeto
	function lista_gestionsA($idgestion_estado){
		if($idgestion_estado>0)
		{
		$this->db->where('idgestion_estado='.$idgestion_estado);
		}
	
		 $gestion= $this->db->order_by('idgestion_estado')->get('gestion1');
		 return $gestion;	
	}




  //Retorna solamente un registro de el id pasado como parame
 	function gestion($id){
 		$gestion = $this->db->query('select * from gestion where idgestion="'. $id.'" order by idgestion');
 		return $gestion;
 	}

  //Retorna solamente un registro de el id pasado como parame
 	function lista_gestionP($id){
 		$gestion = $this->db->query('select * from gestionP where idgestion="'. $id.'" order by elparticipante');
 		return $gestion;
 	}






  // Para guardar un registro nuevo
	function save($array)
 	{
		$this->db->trans_begin();
		$this->db->insert("gestion", $array);
		if($this->db->affected_rows()>0){
				$this->db->trans_commit();
				return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
 	}

	// Para actualiza un registro
 	function update($id,$array_item)
 	{
 		$this->db->where('idgestion',$id);
 		$this->db->update('gestion',$array_item);	}



 	public function delete($id)
	{
		$this->db->select('*');
		$this->db->from('ascenso');
		$this->db->where('idgestion',$id);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$this->db->where('idgestion',$id);
			$this->db->delete('ascenso');
			if($this->db->affected_rows()==1){
				$this->db->where('idgestion',$id);
				$this->db->delete('gestion');
				if($this->db->affected_rows()==1)
					$result=true;
				else
					$result=false;
			}
			else{
				$result=false;
			}
		}else
		{
				$this->db->where('idgestion',$id);
				$this->db->delete('gestion');
				if($this->db->affected_rows()==1)
					$result=true;
				else
					$result=false;
		}
	}





  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idgestion")->get('gestion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();
	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idgestion")->get('gestion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();
	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$gestion = $this->db->select("idgestion")->order_by("idgestion")->get('gestion')->result_array();
		$arr=array("idgestion"=>$id);
		$clave=array_search($arr,$gestion);
	   if(array_key_exists($clave+1,$gestion))
		 {

 		$gestion = $this->db->query('select * from gestion where idgestion="'. $gestion[$clave+1]["idgestion"].'"');
		 }else{

 		$gestion = $this->db->query('select * from gestion where idgestion="'. $id.'"');
		 }
		 	
 		return $gestion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$gestion = $this->db->select("idgestion")->order_by("idgestion")->get('gestion')->result_array();
		$arr=array("idgestion"=>$id);
		$clave=array_search($arr,$gestion);
	   if(array_key_exists($clave-1,$gestion))
		 {

 		$gestion = $this->db->query('select * from gestion where idgestion="'. $gestion[$clave-1]["idgestion"].'"');
		 }else{

 		$gestion = $this->db->query('select * from gestion where idgestion="'. $id.'"');
		 }
		 	
 		return $gestion;
 	}




	// Para moverse presentar  los emisores 
	function participantes( $ideven)
	{
 		$this->db->select('idpersona,nombres');
		$this->db->where('idgestion="'.$ideven.'"');
		$emisores=$this->db->get('participante1');
		$emisores=$this->db->query('select idpersona,nombres from participante1 where idgestion="'. $ideven.'"');
		return $emisores;
	}




 
}
