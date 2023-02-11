<?php
class Ubicaciondocente_model extends CI_model {

	function listar_ubicaciondocente(){
		 $ubicaciondocente= $this->db->get('ubicaciondocente');
		 return $ubicaciondocente;
	}

	function listar_ubicaciondocente1(){
		 $ubicaciondocente= $this->db->get('ubicaciondocente1');
		 return $ubicaciondocente;
	}

 	function ubicaciondocente( $id){
 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente where idubicaciondocente="'. $id.'"');
 		return $ubicaciondocente;
 	}



 	function ubicaciondocentes( $id){
 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente where idarticulo="'. $id.'" order by fecha');
 		return $ubicaciondocente;
 	}


 	function ubicaciondocentesA( $id){
 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente1 where idarticulo="'. $id.'" ORDER BY date(fecha) ASC');
 		return $ubicaciondocente;
 	}



	function ubicaciondocente_activo($id){
 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $ubicaciondocente;
 	}


	function ubicaciondocente_activo2($id){
 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $ubicaciondocente;
 	}





	function ubicaciondocente_asistencia($id){
 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $ubicaciondocente;
 	}



	function ubicaciondocentes_AsisPart($idevento,$idpersona){
		$ubicaciondocente =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from ubicaciondocente fev where fev.idevento='.$idevento.' order by fecha');

 		return $ubicaciondocente;
 	}









 	function save($array)
	{	
		$condition ="idarticulo="."'". $array['idarticulo']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('ubicaciondocente');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("ubicaciondocente", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fecha',$array['fecha']);
			$this->db->where('idarticulo',$array['idarticulo']);
			$this->db->update('ubicaciondocente',$array);

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
 		$this->db->where('idubicaciondocente',$id);
 		$this->db->update('ubicaciondocente',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idubicaciondocente',$id);
		$this->db->delete('ubicaciondocente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idubicaciondocente")->get('ubicaciondocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idubicaciondocente")->get('ubicaciondocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ubicaciondocente = $this->db->select("idubicaciondocente")->order_by("idubicaciondocente")->get('ubicaciondocente')->result_array();
		$arr=array("idubicaciondocente"=>$id);
		$clave=array_search($arr,$ubicaciondocente);
	   if(array_key_exists($clave+1,$ubicaciondocente))
		 {

 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente where idubicaciondocente="'. $ubicaciondocente[$clave+1]["idubicaciondocente"].'"');
		 }else{

 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente where idubicaciondocente="'. $id.'"');
		 }
		 	
 		return $ubicaciondocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ubicaciondocente = $this->db->select("idubicaciondocente")->order_by("idubicaciondocente")->get('ubicaciondocente')->result_array();
		$arr=array("idubicaciondocente"=>$id);
		$clave=array_search($arr,$ubicaciondocente);
	   if(array_key_exists($clave-1,$ubicaciondocente))
		 {

 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente where idubicaciondocente="'. $ubicaciondocente[$clave-1]["idubicaciondocente"].'"');
		 }else{

 		$ubicaciondocente = $this->db->query('select * from ubicaciondocente where idubicaciondocente="'. $id.'"');
		 }
		 	
 		return $ubicaciondocente;
 	}














}
