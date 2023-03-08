<?php
class Ubicacionproceso_model extends CI_model {

	function listar_ubicacionproceso(){
		 $ubicacionproceso= $this->db->get('ubicacionproceso');
		 return $ubicacionproceso;
	}

	function listar_ubicacionproceso1(){
		 $ubicacionproceso= $this->db->get('ubicacionproceso1');
		 return $ubicacionproceso;
	}

 	function ubicacionproceso( $id){
 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso where idubicacionproceso="'. $id.'"');
 		return $ubicacionproceso;
 	}



 	function ubicacionprocesos( $id){
 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso where idproceso="'. $id.'" order by fecha');
 		return $ubicacionproceso;
 	}


 	function ubicacionprocesosA( $id){
 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso1 where idproceso="'. $id.'" ORDER BY date(fecha) ASC');
 		return $ubicacionproceso;
 	}



	function ubicacionproceso_activo($id){
 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $ubicacionproceso;
 	}


	function ubicacionproceso_activo2($id){
 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $ubicacionproceso;
 	}





	function ubicacionproceso_asistencia($id){
 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $ubicacionproceso;
 	}



	function ubicacionprocesos_AsisPart($idevento,$idpersona){
		$ubicacionproceso =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from ubicacionproceso fev where fev.idevento='.$idevento.' order by fecha');

 		return $ubicacionproceso;
 	}









 	function save($array)
	{	
		$condition ="idproceso="."'". $array['idproceso']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('ubicacionproceso');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("ubicacionproceso", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fecha',$array['fecha']);
			$this->db->where('idproceso',$array['idproceso']);
			$this->db->update('ubicacionproceso',$array);

			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idubicacionproceso',$id);
 		$this->db->update('ubicacionproceso',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idubicacionproceso',$id);
		$this->db->delete('ubicacionproceso');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idubicacionproceso")->get('ubicacionproceso');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idubicacionproceso")->get('ubicacionproceso');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ubicacionproceso = $this->db->select("idubicacionproceso")->order_by("idubicacionproceso")->get('ubicacionproceso')->result_array();
		$arr=array("idubicacionproceso"=>$id);
		$clave=array_search($arr,$ubicacionproceso);
	   if(array_key_exists($clave+1,$ubicacionproceso))
		 {

 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso where idubicacionproceso="'. $ubicacionproceso[$clave+1]["idubicacionproceso"].'"');
		 }else{

 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso where idubicacionproceso="'. $id.'"');
		 }
		 	
 		return $ubicacionproceso;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ubicacionproceso = $this->db->select("idubicacionproceso")->order_by("idubicacionproceso")->get('ubicacionproceso')->result_array();
		$arr=array("idubicacionproceso"=>$id);
		$clave=array_search($arr,$ubicacionproceso);
	   if(array_key_exists($clave-1,$ubicacionproceso))
		 {

 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso where idubicacionproceso="'. $ubicacionproceso[$clave-1]["idubicacionproceso"].'"');
		 }else{

 		$ubicacionproceso = $this->db->query('select * from ubicacionproceso where idubicacionproceso="'. $id.'"');
		 }
		 	
 		return $ubicacionproceso;
 	}














}
