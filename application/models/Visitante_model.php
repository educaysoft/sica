<?php
class Visitante_model extends CI_model {

	function participacionx($idevento,$idpersona){
 		$this->db->where('idevento',$idevento);
 		$this->db->where('idpersona',$idpersona);
		 $participacion= $this->db->get('participacion');
		 return $participacion;
	}


	function visitantep($idpersona){
 		$this->db->where('idpersona',$idpersona);
		 $participacion= $this->db->get('visitante');
		 return $participacion;
	}

 	function esinstructor( $id,$idevento){
		if($id==8)  //Si es STALIN FRANCIS
		{
			return true;  
		}

 		$query = $this->db->query('select * from visitante where idevento="'.$idevento.'" and  idpersona="'. $id.'" and idnivelvisitante=2');
		if ($query->num_rows() == 0) //SI NO ES UN INSTRUCTOR DE LA CLASES. 
		{
			return false;
		   }else{
			return true;
		   }
 	}






	function listar_visitante(){
		 $visitante= $this->db->get('visitante');
		 return $visitante;
	}

	function listar_visitante1(){
		 $visitante= $this->db->get('visitante1');
		 return $visitante;
	}



	function listar_visitanteB($idevento){
		 if($idevento>0)
                {
                $this->db->where('idevento='.$idevento);
                }

		 $visitante= $this->db->get('visitante1');
		 return $visitante;
	}



	function instructor($idevento){
		 if($idevento>0)
                {
                $this->db->where('idevento='.$idevento);
                $this->db->where('idnivelvisitante=2'); // 2= instructor
                }

		 $visitante= $this->db->get('visitante1');
		 return $visitante;
	}






 	function visitante( $id){
 		$visitante = $this->db->query('select * from visitante where idvisitante="'. $id.'"');
 		return $visitante;
 	}



 	function visitantes( $id){
 		$visitante = $this->db->query('select * from visitante1 where idevento="'. $id.'"  order by nombres asc');
 		return $visitante;
 	}

	function asistencias($idevento,$fecha)
	{

      $sql="";
      $sql=$sql.'select p1.*, (select ta.nombre from asistencia p2,tipoasistencia ta where p2.idtipoasistencia=ta.idtipoasistencia and p2.idpersona=p1.idpersona and p2.fecha="'.$fecha.'"  and p2.idevento='.$idevento. ') as eltipoasistencia from visitante1 p1 where p1.idevento='.$idevento.' and p1.idpersona in (select p2.idpersona from asistencia p2 where p2.idevento=p1.idevento and p2.fecha="'.$fecha.'"  and p2.idevento='.$idevento.')';
$sql=$sql." union "; 
    $sql=$sql.'select p1.*, " " as eltipoasistencia from visitante1 p1 where idevento='.$idevento.' and p1.idpersona not in (select p2.idpersona from asistencia p2 where p2.idevento=p1.idevento and p2.fecha="'.$fecha.'" and p2.idevento='.$idevento.') order by nombres ;';
   $query= $this->db->query($sql);



	return $query;

	}






 	function visitantes1( $id){

   date_default_timezone_set('America/Guayaquil');
    $fecha = date("Y-m-d");
$visitante=$this->db->query('select pa.idvisitante,pa.idnivelvisitante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres,doc.archivopdf,pa.grupoletra,(select idtipoasistencia from asistencia asis where asis.fecha="'.$fecha.'" and asis.idpersona= pa.idpersona) as hoy    from visitante pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.iddocumento=doc.iddocumento UNION  select pa.idvisitante,pa.idnivelvisitante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres," " as archivopdf,pa.grupoletra ,(select idtipoasistencia from asistencia asis where asis.fecha="'.$fecha.'" and asis.idpersona= pa.idpersona) as hoy  from visitante pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.idevento=ev.idevento and  pa.iddocumento=0;');

return $visitante;
}







 	function save($array)
 	{

		$this->db->select('*');
		$this->db->from('visitante');
		$this->db->where('idevento',$array['idevento']);
		$this->db->where('idpersona',$array['idpersona']);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 0) {
		    	$this->db->insert("visitante", $array);
			if($this->db->affected_rows()>0){
				$result=true;
      			}else{
				$result=false;
      			}
    		}else{
			$result=false;
    		}	

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idvisitante',$id);
 		$this->db->update('visitante',$array_item);
    return true;
	}
 



  public function quitar($idp)
	{
		$this->db->trans_start();
		$condition = "idvisitante =" . $idp ;
		$this->db->select('*');
		$this->db->from('visitante');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idvisitante',$idp);
				$this->db->update('visitante', array('eliminado'=>1));
		    		//$this->db->delete('visitante');
           				 $this->db->trans_complete();
			      		$result=true;
      	}else{	

            $this->db->trans_complete();
			      $result=false;
   	}

	return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idvisitante")->get('visitante');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idvisitante")->get('visitante');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$visitante = $this->db->select("idvisitante")->order_by("idvisitante")->get('visitante')->result_array();
		$arr=array("idvisitante"=>$id);
		$clave=array_search($arr,$visitante);
	   if(array_key_exists($clave+1,$visitante))
		 {

 		$visitante = $this->db->query('select * from visitante where idvisitante="'. $visitante[$clave+1]["idvisitante"].'"');
		 }else{

 		$visitante = $this->db->query('select * from visitante where idvisitante="'. $id.'"');
		 }
		 	
 		return $visitante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$visitante = $this->db->select("idvisitante")->order_by("idvisitante")->get('visitante')->result_array();
		$arr=array("idvisitante"=>$id);
		$clave=array_search($arr,$visitante);
	   if(array_key_exists($clave-1,$visitante))
		 {

 		$visitante = $this->db->query('select * from visitante where idvisitante="'. $visitante[$clave-1]["idvisitante"].'"');
		 }else{

 		$visitante = $this->db->query('select * from visitante where idvisitante="'. $id.'"');
		 }
		 	
 		return $visitante;
 	}














}
