<?php
class Usoaula_model extends CI_model {

	function listar_usoaula(){
		 $usoaula= $this->db->get('usoaula');
		 return $usoaula;
	}

	function listar_usoaula1(){
		 $usoaula= $this->db->get('usoaula1');
		 return $usoaula;
	}

 	function usoaula( $id){
 		$usoaula = $this->db->query('select * from usoaula where idusoaula="'. $id.'"');
 		return $usoaula;
 	}



 	function usoaulas( $id){
 		$usoaula = $this->db->query('select * from usoaula where idarticulo="'. $id.'" order by fechaprestamo');
 		return $usoaula;
 	}


 	function usoaulasA( $id){
 		$usoaula = $this->db->query('select * from usoaula1 where idarticulo="'. $id.'" ORDER BY date(fechaprestamo) ASC');
 		return $usoaula;
 	}



	function usoaula_activo($id){
 		$usoaula = $this->db->query('select * from usoaula where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $usoaula;
 	}


	function usoaula_activo2($id){
 		$usoaula = $this->db->query('select * from usoaula where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $usoaula;
 	}





	function usoaula_asistencia($id){
 		$usoaula = $this->db->query('select * from usoaula where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $usoaula;
 	}



	function usoaulas_AsisPart($idevento,$idpersona){
		$usoaula =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from usoaula fev where fev.idevento='.$idevento.' order by fecha');

 		return $usoaula;
 	}









 	function save($array)
	{	
		$condition ="idarticulo="."'". $array['idarticulo']."' and  fechaprestamo=". "'".$array['fechaprestamo']."' and  horaprestamo=". "'".$array['horaprestamo']."'";
		$this->db->select('*');
		$this->db->from('usoaula');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("usoaula", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fechaprestamo',$array['fechaprestamo']);
			$this->db->where('horaprestamo',$array['horaprestamo']);
			$this->db->where('idarticulo',$array['idarticulo']);
			$this->db->update('usoaula',$array);

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
 		$this->db->where('idusoaula',$id);
 		$this->db->update('usoaula',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idusoaula',$id);
		$this->db->delete('usoaula');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idusoaula")->get('usoaula');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idusoaula")->get('usoaula');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$usoaula = $this->db->select("idusoaula")->order_by("idusoaula")->get('usoaula')->result_array();
		$arr=array("idusoaula"=>$id);
		$clave=array_search($arr,$usoaula);
	   if(array_key_exists($clave+1,$usoaula))
		 {

 		$usoaula = $this->db->query('select * from usoaula where idusoaula="'. $usoaula[$clave+1]["idusoaula"].'"');
		 }else{

 		$usoaula = $this->db->query('select * from usoaula where idusoaula="'. $id.'"');
		 }
		 	
 		return $usoaula;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$usoaula = $this->db->select("idusoaula")->order_by("idusoaula")->get('usoaula')->result_array();
		$arr=array("idusoaula"=>$id);
		$clave=array_search($arr,$usoaula);
	   if(array_key_exists($clave-1,$usoaula))
		 {

 		$usoaula = $this->db->query('select * from usoaula where idusoaula="'. $usoaula[$clave-1]["idusoaula"].'"');
		 }else{

 		$usoaula = $this->db->query('select * from usoaula where idusoaula="'. $id.'"');
		 }
		 	
 		return $usoaula;
 	}














}
