<?php
class Ubicacionfuncionario_model extends CI_model {

	function listar_ubicacionfuncionario(){
		 $ubicacionfuncionario= $this->db->get('ubicacionfuncionario');
		 return $ubicacionfuncionario;
	}

	function listar_ubicacionfuncionario1(){
		 $ubicacionfuncionario= $this->db->get('ubicacionfuncionario1');
		 return $ubicacionfuncionario;
	}

 	function ubicacionfuncionario( $id){
 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario where idubicacionfuncionario="'. $id.'"');
 		return $ubicacionfuncionario;
 	}



 	function ubicacionfuncionarios( $id){
 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario where idarticulo="'. $id.'" order by fecha');
 		return $ubicacionfuncionario;
 	}


 	function ubicacionfuncionariosA( $id){
 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario1 where idarticulo="'. $id.'" ORDER BY date(fecha) ASC');
 		return $ubicacionfuncionario;
 	}



	function ubicacionfuncionario_activo($id){
 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion=1) order by fecha');
 		return $ubicacionfuncionario;
 	}


	function ubicacionfuncionario_activo2($id){
 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario where idevento='. $id.' and fecha in (select fecha from participacion p where  p.idevento='.$id.' and p.idtipoparticipacion!=1) order by fecha');
 		return $ubicacionfuncionario;
 	}





	function ubicacionfuncionario_asistencia($id){
 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario where idevento='. $id.' and fecha in (select fecha from asistencia a where  a.idevento='.$id.') order by fecha');
 		return $ubicacionfuncionario;
 	}



	function ubicacionfuncionarios_AsisPart($idevento,$idpersona){
		$ubicacionfuncionario =$this->db->query('select fev.idevento,fev.fecha,fev.temacorto,fev.tema,(select idtipoasistencia from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1  ) as asistencia, (select longitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as longitud,  (select latitud from asistencia asi where asi.fecha=fev.fecha and  asi.idpersona='.$idpersona.' limit 1 ) as latitud, (select porcentaje from participacion par where par.fecha=fev.fecha and par.idpersona='.$idpersona.' limit 1  ) as participacion, (select valor from pagoevento pev where pev.fecha=fev.fecha and pev.idpersona='.$idpersona.' limit 1) as pagos   from ubicacionfuncionario fev where fev.idevento='.$idevento.' order by fecha');

 		return $ubicacionfuncionario;
 	}









 	function save($array)
	{	
		$condition ="idarticulo="."'". $array['idarticulo']."' and  fecha=". "'".$array['fecha']."'";
		$this->db->select('*');
		$this->db->from('ubicacionfuncionario');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==0)
		{	
			$this->db->insert("ubicacionfuncionario", $array);
			if($this->db->affected_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('fecha',$array['fecha']);
			$this->db->where('idarticulo',$array['idarticulo']);
			$this->db->update('ubicacionfuncionario',$array);

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
 		$this->db->where('idubicacionfuncionario',$id);
 		$this->db->update('ubicacionfuncionario',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idubicacionfuncionario',$id);
		$this->db->delete('ubicacionfuncionario');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idubicacionfuncionario")->get('ubicacionfuncionario');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idubicacionfuncionario")->get('ubicacionfuncionario');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$ubicacionfuncionario = $this->db->select("idubicacionfuncionario")->order_by("idubicacionfuncionario")->get('ubicacionfuncionario')->result_array();
		$arr=array("idubicacionfuncionario"=>$id);
		$clave=array_search($arr,$ubicacionfuncionario);
	   if(array_key_exists($clave+1,$ubicacionfuncionario))
		 {

 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario where idubicacionfuncionario="'. $ubicacionfuncionario[$clave+1]["idubicacionfuncionario"].'"');
		 }else{

 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario where idubicacionfuncionario="'. $id.'"');
		 }
		 	
 		return $ubicacionfuncionario;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$ubicacionfuncionario = $this->db->select("idubicacionfuncionario")->order_by("idubicacionfuncionario")->get('ubicacionfuncionario')->result_array();
		$arr=array("idubicacionfuncionario"=>$id);
		$clave=array_search($arr,$ubicacionfuncionario);
	   if(array_key_exists($clave-1,$ubicacionfuncionario))
		 {

 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario where idubicacionfuncionario="'. $ubicacionfuncionario[$clave-1]["idubicacionfuncionario"].'"');
		 }else{

 		$ubicacionfuncionario = $this->db->query('select * from ubicacionfuncionario where idubicacionfuncionario="'. $id.'"');
		 }
		 	
 		return $ubicacionfuncionario;
 	}














}
