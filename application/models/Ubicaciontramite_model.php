<?php
class Ubicaciontramite_model extends CI_model {

	function listar_ubicaciontramite(){
		 $ubicaciontramite= $this->db->get('ubicaciontramite');
		 return $ubicaciontramite;
	}

	function listar_ubicaciontramite1(){
		 $ubicaciontramite= $this->db->get('ubicaciontramite1');
		 return $ubicaciontramite;
	}

 	function ubicaciontramite( $id){
 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite where idubicaciontramite="'. $id.'"');
 		return $ubicaciontramite;
 	}



 	function ubicaciontramites( $id){
 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite where idarticulo="'. $id.'" order by fecha');
 		return $ubicaciontramite;
 	}


 	function ubicaciontramitesA( $id){
 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite1 where idarticulo="'. $id.'" ORDER BY date(fecha) ASC');
 		return $ubicaciontramite;
 	}



	function ubicaciontramite_activo($id){
 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $ubicaciontramite;
 	}


	function ubicaciontramite_activo2($id){
 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $ubicaciontramite;
 	}





	function ubicaciontramite_asistencia($id){
 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $ubicaciontramite;
 	}



	function ubicaciontramites_AsisPart($idevento,$idpersona){
		$ubicaciontramite =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from ubicaciontramite fev where fev.idevento='.$idevento.' order by fecha');

 		return $ubicaciontramite;
 	}









 	function save($array)
	{	
		$condition ="idarticulo="."'". $array['idarticulo']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('ubicaciontramite');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("ubicaciontramite", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fecha',$array['fecha']);
			$this->db->where('idarticulo',$array['idarticulo']);
			$this->db->update('ubicaciontramite',$array);

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
 		$this->db->where('idubicaciontramite',$id);
 		$this->db->update('ubicaciontramite',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idubicaciontramite',$id);
		$this->db->delete('ubicaciontramite');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idubicaciontramite")->get('ubicaciontramite');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idubicaciontramite")->get('ubicaciontramite');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ubicaciontramite = $this->db->select("idubicaciontramite")->order_by("idubicaciontramite")->get('ubicaciontramite')->result_array();
		$arr=array("idubicaciontramite"=>$id);
		$clave=array_search($arr,$ubicaciontramite);
	   if(array_key_exists($clave+1,$ubicaciontramite))
		 {

 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite where idubicaciontramite="'. $ubicaciontramite[$clave+1]["idubicaciontramite"].'"');
		 }else{

 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite where idubicaciontramite="'. $id.'"');
		 }
		 	
 		return $ubicaciontramite;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ubicaciontramite = $this->db->select("idubicaciontramite")->order_by("idubicaciontramite")->get('ubicaciontramite')->result_array();
		$arr=array("idubicaciontramite"=>$id);
		$clave=array_search($arr,$ubicaciontramite);
	   if(array_key_exists($clave-1,$ubicaciontramite))
		 {

 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite where idubicaciontramite="'. $ubicaciontramite[$clave-1]["idubicaciontramite"].'"');
		 }else{

 		$ubicaciontramite = $this->db->query('select * from ubicaciontramite where idubicaciontramite="'. $id.'"');
		 }
		 	
 		return $ubicaciontramite;
 	}














}
