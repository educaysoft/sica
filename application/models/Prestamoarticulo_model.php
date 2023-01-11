<?php
class Prestamoarticulo_model extends CI_model {

	function listar_prestamoarticulo(){
		 $prestamoarticulo= $this->db->get('prestamoarticulo');
		 return $prestamoarticulo;
	}

	function listar_prestamoarticulo1(){
		 $prestamoarticulo= $this->db->get('prestamoarticulo1');
		 return $prestamoarticulo;
	}

 	function prestamoarticulo( $id){
 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo where idprestamoarticulo="'. $id.'"');
 		return $prestamoarticulo;
 	}



 	function prestamoarticulos( $id){
 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo where idevento="'. $id.'" order by fecha');
 		return $prestamoarticulo;
 	}


 	function prestamoarticulosA( $id){
 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo1 where idevento="'. $id.'" ORDER BY date(fecha) ASC');
 		return $prestamoarticulo;
 	}



	function prestamoarticulo_activo($id){
 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $prestamoarticulo;
 	}


	function prestamoarticulo_activo2($id){
 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $prestamoarticulo;
 	}





	function prestamoarticulo_asistencia($id){
 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $prestamoarticulo;
 	}



	function prestamoarticulos_AsisPart($idevento,$idpersona){
		$prestamoarticulo =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from prestamoarticulo fev where fev.idevento='.$idevento.' order by fecha');

 		return $prestamoarticulo;
 	}









 	function save($array)
	{	
		$condition ="idevento="."'". $array['idevento']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('prestamoarticulo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("prestamoarticulo", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fecha',$array['fecha']);
			$this->db->where('idevento',$array['idevento']);
			$this->db->update('prestamoarticulo',$array);

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
 		$this->db->where('idprestamoarticulo',$id);
 		$this->db->update('prestamoarticulo',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idprestamoarticulo',$id);
		$this->db->delete('prestamoarticulo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idprestamoarticulo")->get('prestamoarticulo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idprestamoarticulo")->get('prestamoarticulo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$prestamoarticulo = $this->db->select("idprestamoarticulo")->order_by("idprestamoarticulo")->get('prestamoarticulo')->result_array();
		$arr=array("idprestamoarticulo"=>$id);
		$clave=array_search($arr,$prestamoarticulo);
	   if(array_key_exists($clave+1,$prestamoarticulo))
		 {

 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo where idprestamoarticulo="'. $prestamoarticulo[$clave+1]["idprestamoarticulo"].'"');
		 }else{

 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo where idprestamoarticulo="'. $id.'"');
		 }
		 	
 		return $prestamoarticulo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$prestamoarticulo = $this->db->select("idprestamoarticulo")->order_by("idprestamoarticulo")->get('prestamoarticulo')->result_array();
		$arr=array("idprestamoarticulo"=>$id);
		$clave=array_search($arr,$prestamoarticulo);
	   if(array_key_exists($clave-1,$prestamoarticulo))
		 {

 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo where idprestamoarticulo="'. $prestamoarticulo[$clave-1]["idprestamoarticulo"].'"');
		 }else{

 		$prestamoarticulo = $this->db->query('select * from prestamoarticulo where idprestamoarticulo="'. $id.'"');
		 }
		 	
 		return $prestamoarticulo;
 	}














}
