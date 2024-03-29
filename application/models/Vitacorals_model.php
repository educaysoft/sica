<?php
class Ubicacionarticulo_model extends CI_model {

	function listar_ubicacionarticulo(){
		 $ubicacionarticulo= $this->db->get('ubicacionarticulo');
		 return $ubicacionarticulo;
	}

	function listar_ubicacionarticulo1(){
		 $ubicacionarticulo= $this->db->get('ubicacionarticulo1');
		 return $ubicacionarticulo;
	}

 	function ubicacionarticulo( $id){
 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo where idubicacionarticulo="'. $id.'"');
 		return $ubicacionarticulo;
 	}



 	function ubicacionarticulos( $id){
 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo where idarticulo="'. $id.'" order by fecha');
 		return $ubicacionarticulo;
 	}


 	function ubicacionarticulosA( $id){
 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo1 where idarticulo="'. $id.'" ORDER BY date(fecha) ASC');
 		return $ubicacionarticulo;
 	}



	function ubicacionarticulo_activo($id){
 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $ubicacionarticulo;
 	}


	function ubicacionarticulo_activo2($id){
 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $ubicacionarticulo;
 	}





	function ubicacionarticulo_asistencia($id){
 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $ubicacionarticulo;
 	}



	function ubicacionarticulos_AsisPart($idevento,$idpersona){
		$ubicacionarticulo =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from ubicacionarticulo fev where fev.idevento='.$idevento.' order by fecha');

 		return $ubicacionarticulo;
 	}









 	function save($array)
	{	
		$condition ="idarticulo="."'". $array['idarticulo']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('ubicacionarticulo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("ubicacionarticulo", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fecha',$array['fecha']);
			$this->db->where('idarticulo',$array['idarticulo']);
			$this->db->update('ubicacionarticulo',$array);

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
 		$this->db->where('idubicacionarticulo',$id);
 		$this->db->update('ubicacionarticulo',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idubicacionarticulo',$id);
		$this->db->delete('ubicacionarticulo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idubicacionarticulo")->get('ubicacionarticulo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idubicacionarticulo")->get('ubicacionarticulo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ubicacionarticulo = $this->db->select("idubicacionarticulo")->order_by("idubicacionarticulo")->get('ubicacionarticulo')->result_array();
		$arr=array("idubicacionarticulo"=>$id);
		$clave=array_search($arr,$ubicacionarticulo);
	   if(array_key_exists($clave+1,$ubicacionarticulo))
		 {

 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo where idubicacionarticulo="'. $ubicacionarticulo[$clave+1]["idubicacionarticulo"].'"');
		 }else{

 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo where idubicacionarticulo="'. $id.'"');
		 }
		 	
 		return $ubicacionarticulo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ubicacionarticulo = $this->db->select("idubicacionarticulo")->order_by("idubicacionarticulo")->get('ubicacionarticulo')->result_array();
		$arr=array("idubicacionarticulo"=>$id);
		$clave=array_search($arr,$ubicacionarticulo);
	   if(array_key_exists($clave-1,$ubicacionarticulo))
		 {

 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo where idubicacionarticulo="'. $ubicacionarticulo[$clave-1]["idubicacionarticulo"].'"');
		 }else{

 		$ubicacionarticulo = $this->db->query('select * from ubicacionarticulo where idubicacionarticulo="'. $id.'"');
		 }
		 	
 		return $ubicacionarticulo;
 	}














}
