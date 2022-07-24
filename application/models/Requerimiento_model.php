<?php
class Requerimiento_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_requerimientos(){
		 $requerimiento= $this->db->get('requerimiento');
		 return $requerimiento;
	}


	function lista_requerimientos_open(){
		$this->db->where("idrequerimiento_estado=2 or idrequerimiento_estado=3");  //SOLO ESTADO INSCRIPCION OR EN EJECUCION
		 $requerimiento= $this->db->get('requerimiento');
		 return $requerimiento;
	}




	//Retorna todos los registros como un objeto
	function lista_requerimientosA($idrequerimiento_estado){
		if($idrequerimiento_estado>0)
		{
		$this->db->where('idrequerimiento_estado='.$idrequerimiento_estado);
		}
	
		 $requerimiento= $this->db->order_by('idrequerimiento_estado')->get('requerimiento1');
		 return $requerimiento;	
	}




  //Retorna solamente un registro de el id pasado como parame
 	function requerimiento($id){
 		$requerimiento = $this->db->query('select * from requerimiento where idrequerimiento="'. $id.'" order by idrequerimiento');
 		return $requerimiento;
 	}

  //Retorna solamente un registro de el id pasado como parame
 	function lista_requerimientoP($id){
 		$requerimiento = $this->db->query('select * from requerimientoP where idrequerimiento="'. $id.'" order by elparticipante');
 		return $requerimiento;
 	}






  // Para guardar un registro nuevo
	function save($array)
 	{
		$this->db->trans_begin();
		$this->db->insert("requerimiento", $array);
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
 		$this->db->where('idrequerimiento',$id);
 		$this->db->update('requerimiento',$array_item);	}



 	public function delete($id)
	{
		$this->db->select('*');
		$this->db->from('ascenso');
		$this->db->where('idrequerimiento',$id);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$this->db->where('idrequerimiento',$id);
			$this->db->delete('ascenso');
			if($this->db->affected_rows()==1){
				$this->db->where('idrequerimiento',$id);
				$this->db->delete('requerimiento');
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
				$this->db->where('idrequerimiento',$id);
				$this->db->delete('requerimiento');
				if($this->db->affected_rows()==1)
					$result=true;
				else
					$result=false;
		}
	}





  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idrequerimiento")->get('requerimiento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();
	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idrequerimiento")->get('requerimiento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();
	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$requerimiento = $this->db->select("idrequerimiento")->order_by("idrequerimiento")->get('requerimiento')->result_array();
		$arr=array("idrequerimiento"=>$id);
		$clave=array_search($arr,$requerimiento);
	   if(array_key_exists($clave+1,$requerimiento))
		 {

 		$requerimiento = $this->db->query('select * from requerimiento where idrequerimiento="'. $requerimiento[$clave+1]["idrequerimiento"].'"');
		 }else{

 		$requerimiento = $this->db->query('select * from requerimiento where idrequerimiento="'. $id.'"');
		 }
		 	
 		return $requerimiento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$requerimiento = $this->db->select("idrequerimiento")->order_by("idrequerimiento")->get('requerimiento')->result_array();
		$arr=array("idrequerimiento"=>$id);
		$clave=array_search($arr,$requerimiento);
	   if(array_key_exists($clave-1,$requerimiento))
		 {

 		$requerimiento = $this->db->query('select * from requerimiento where idrequerimiento="'. $requerimiento[$clave-1]["idrequerimiento"].'"');
		 }else{

 		$requerimiento = $this->db->query('select * from requerimiento where idrequerimiento="'. $id.'"');
		 }
		 	
 		return $requerimiento;
 	}




	// Para moverse presentar  los emisores 
	function participantes( $ideven)
	{
 		$this->db->select('idpersona,nombres');
		$this->db->where('idrequerimiento="'.$ideven.'"');
		$emisores=$this->db->get('participante1');
		$emisores=$this->db->query('select idpersona,nombres from participante1 where idrequerimiento="'. $ideven.'"');
		return $emisores;
	}




	// Para moverse presentar  los emisores 
	function certificados($ideven)
	{
 		$this->db->select('idcertificado,asunto');
		$this->db->where('idrequerimiento="'.$ideven.'"');
		$certificados=$this->db->get('certificado1');
		return $certificados;
	}



 
}
