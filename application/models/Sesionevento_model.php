<?php
class Sesionevento_model extends CI_model {

	function listar_sesionevento(){
		 $sesionevento= $this->db->get('sesionevento');
		 return $sesionevento;
	}

	function listar_sesionevento1(){
		 $sesionevento= $this->db->get('sesionevento1');
		 return $sesionevento;
	}

 	function sesionevento( $id){
 		$sesionevento = $this->db->query('select * from sesionevento where idsesionevento="'. $id.'"');
 		return $sesionevento;
 	}



 	function sesioneventos( $id){
 		$sesionevento = $this->db->query('select * from sesionevento where idevento="'. $id.'" order by fecha');
 		return $sesionevento;
 	}



 	function sesioneventos1( $id){
 		$sesionevento = $this->db->query('select * from sesionevento1 where idevento="'. $id.'" order by fecha');
 		return $sesionevento;
 	}


 	function sesioneventosA( $id){
		$condition="idevento=".$id;
		$this->db->where($condition);
		$sesionevento =$this->db->order_by("fecha",'asc')->get('sesionevento1');
 //		$sesionevento = $this->db->query('select * from sesionevento1 where idevento="'. $id.'" order by numerosesion');
 		return $sesionevento;
 	}



	function sesionevento_activo($id){
 		//$sesionevento = $this->db->query('select * from sesionevento where idevento='. $id.' and idmodoevaluacion>1 and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		$sesionevento = $this->db->query('select * from sesionevento1 where idevento='. $id.' and idmodoevaluacion>1 and fecha in (select fecha from participacion p where  p.idevento='.$id.') order by fecha');
 		return $sesionevento;
 	}


	function sesionevento_activo2($id){
 		$sesionevento = $this->db->query('select * from sesionevento where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' ) order by fecha');
 		return $sesionevento;
 	}





	function sesionevento_asistencia($id){
 		$sesionevento = $this->db->query('select * from sesionevento1 where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $sesionevento;
 	}



	function sesioneventos_AsisPart($idevento,$idpersona){
		$sesionevento =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from sesionevento fev where fev.idevento='.$idevento.' order by fecha');

 		return $sesionevento;
 	}



	function sesionevento_sesiones($idevento){
        $sesiones=$this->db->query('select * from sesionevento where idevento='.$idevento.';');

	return $sesiones;
}





 	function save($array)
	{	
   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");

		$condition ="idevento="."'". $array['idevento']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('sesionevento');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("sesionevento", $array);
			if($this->db->affected_rows()>0)
			{
			$idsesionevento=$this->db->insert_id();
		$this->db->insert("vitacora", array("idusuario"=>$this->session->userdata['logged_in']['idusuario'],"fecha"=>$fecha,"hora"=>$hora,"tabla"=>"sesionevento","accion"=>"se creo una nueva sesion de evento con id=".$idsesionevento,"url"=>$_SERVER['REQUEST_URI']));
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fecha',$array['fecha']);
			$this->db->where('idevento',$array['idevento']);
			$this->db->update('sesionevento',$array);

			if($this->db->affected_rows()>0)
			{
		$this->db->insert("vitacora", array("idusuario"=>$this->session->userdata['logged_in']['idusuario'],"fecha"=>$fecha,"hora"=>$hora,"tabla"=>"sesionevento","accion"=>"se modifico la sesion evento con id=".$array['idsesionevento'],"url"=>$_SERVER['REQUEST_URI']));

				return true;
			}else{
				return false;
			}
		}
 	}

 	function update($id,$array_item)
 	{
   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");

 		$this->db->where('idsesionevento',$id);
 		$this->db->update('sesionevento',$array_item);
		if($this->db->affected_rows()>0)
		{
		$this->db->insert("vitacora", array("idusuario"=>$this->session->userdata['logged_in']['idusuario'],"fecha"=>$fecha,"hora"=>$hora,"tabla"=>"sesionevento","accion"=>"se modifico la sesion evento con id=".$id,"url"=>$_SERVER['REQUEST_URI']));
			return true;
		}else{
			return false;
		}
	}
 



  public function delete($id)
	{
 		$this->db->where('idsesionevento',$id);
		$this->db->delete('sesionevento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idsesionevento")->get('sesionevento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idsesionevento")->get('sesionevento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$sesionevento = $this->db->select("idsesionevento")->order_by("idsesionevento")->get('sesionevento')->result_array();
		$arr=array("idsesionevento"=>$id);
		$clave=array_search($arr,$sesionevento);
	   if(array_key_exists($clave+1,$sesionevento))
		 {

 		$sesionevento = $this->db->query('select * from sesionevento where idsesionevento="'. $sesionevento[$clave+1]["idsesionevento"].'"');
		 }else{

 		$sesionevento = $this->db->query('select * from sesionevento where idsesionevento="'. $id.'"');
		 }
		 	
 		return $sesionevento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$sesionevento = $this->db->select("idsesionevento")->order_by("idsesionevento")->get('sesionevento')->result_array();
		$arr=array("idsesionevento"=>$id);
		$clave=array_search($arr,$sesionevento);
	   if(array_key_exists($clave-1,$sesionevento))
		 {

 		$sesionevento = $this->db->query('select * from sesionevento where idsesionevento="'. $sesionevento[$clave-1]["idsesionevento"].'"');
		 }else{

 		$sesionevento = $this->db->query('select * from sesionevento where idsesionevento="'. $id.'"');
		 }
		 	
 		return $sesionevento;
 	}














}
