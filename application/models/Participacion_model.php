<?php
class Participacion_model extends CI_model {


	function participacionx($idevento,$idpersona){
		 $this->db->order_by("fecha asc");
 		$this->db->where('idevento',$idevento);
 		$this->db->where('idpersona',$idpersona);
		 $participacion= $this->db->get('participacion');
		 return $participacion;
	}



	function ParticipacionxPersonaPositiva($idevento){
		$this->db->select("idpersona,count(fecha) AS 'totalparticipacion'");
		$this->db->where('idevento',$idevento);
		$this->db->where('idmodoevaluacion',1);
		$this->db->where('porcentaje','>0');
		$this->db->from('participacion2');
 		$this->db->group_by('idpersona');
		$asistencia= $this->db->get();
		 return $asistencia;
	}

	function ParticipacionxPersonaNegativa($idevento){
		$this->db->select("idpersona,count(fecha) AS 'totalparticipacion'");
		$this->db->where('idevento',$idevento);
		$this->db->where('idmodoevaluacion',1);
		$this->db->where('porcentaje','<0');
		$this->db->from('participacion2');
 		$this->db->group_by('idpersona');
		$asistencia= $this->db->get();
		 return $asistencia;
	}




	function ParticipacionxPersonaA1($idevento){
		$this->db->select("idpersona, porcentaje");
		$this->db->where('idevento',$idevento);
		$this->db->where('idmodoevaluacion',2);
		$this->db->from('participacion2');
 		$this->db->group_by('idpersona');
		$asistencia= $this->db->get();
		 return $asistencia;
	}

	function ParticipacionxPersonaB1($idevento){
		$this->db->select("idpersona, porcentaje");
		$this->db->where('idevento',$idevento);
		$this->db->where('idmodoevaluacion',3);
		$this->db->from('participacion2');
 		$this->db->group_by('idpersona');
		$asistencia= $this->db->get();
		 return $asistencia;
	}


	function ParticipacionxPersonaC1($idevento){
		$this->db->select("idpersona, porcentaje");
		$this->db->where('idevento',$idevento);
		$this->db->where('idmodoevaluacion',4);
		$this->db->from('participacion2');
 		$this->db->group_by('idpersona');
		$asistencia= $this->db->get();
		 return $asistencia;
	}











	function listar_participacion(){
		 $participacion= $this->db->get('participacion');
		 return $participacion;
	}

	function listar_participacion1($idevento){
    if($idevento>0)
    {
		 $this->db->order_by("idevento asc,nombres asc");
 		$this->db->where('idevento',$idevento);
		 $participacion= $this->db->get('participacion2');
   }else{
  
		 $this->db->order_by("idevento asc,nombres asc");
		 $participacion= $this->db->get('participacion2');
  
   }
     return $participacion;
	}




 	function participacion( $id){
 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $id.'"');
 		return $participacion;
 	}



 	function participacions( $id){
 		$participacion = $this->db->query('select * from participacion1 where idevento="'. $id.'"');
 		return $participacion;
 	}

 	function save($array_item)
 	{
 		$this->db->where('idevento',$array_item['idevento']);
 		$this->db->where('idpersona',$array_item['idpersona']);
 		$this->db->where('fecha',$array_item['fecha']);
		$query=$this->db->get('participacion');
		if($query->num_rows()==0){
			$this->db->insert("participacion", $array_item);
		      return TRUE;
		 }else{
			    if($query->result()[0]->porcentaje!=$array_item['porcentaje'] || $query->result()[0]->ayuda!=$array_item['ayuda']  )
			    {
				$this->db->where('idpersona',$array_item['idpersona']);
				$this->db->where('fecha',$array_item['fecha']);
				$this->db->where('idevento',$array_item['idevento']);
				$this->db->update('participacion',$array_item);
		      		return TRUE;
			 }else{
			        return FALSE;
			 }
		    }
 	}

 	function update($array_item)
 	{
 		$this->db->where('idpersona',$array_item['idpersona']);
 		$this->db->where('fecha',$array_item['fecha']);
 		$this->db->where('idevento',$array_item['idevento']);
 		$this->db->update('participacion',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idparticipacion',$id);
		$this->db->delete('participacion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idparticipacion")->get('participacion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idparticipacion")->get('participacion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$participacion = $this->db->select("idparticipacion")->order_by("idparticipacion")->get('participacion')->result_array();
		$arr=array("idparticipacion"=>$id);
		$clave=array_search($arr,$participacion);
	   if(array_key_exists($clave+1,$participacion))
		 {

 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $participacion[$clave+1]["idparticipacion"].'"');
		 }else{

 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $id.'"');
		 }
		 	
 		return $participacion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$participacion = $this->db->select("idparticipacion")->order_by("idparticipacion")->get('participacion')->result_array();
		$arr=array("idparticipacion"=>$id);
		$clave=array_search($arr,$participacion);
	   if(array_key_exists($clave-1,$participacion))
		 {

 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $participacion[$clave-1]["idparticipacion"].'"');
		 }else{

 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $id.'"');
		 }
		 	
 		return $participacion;
 	}














}
