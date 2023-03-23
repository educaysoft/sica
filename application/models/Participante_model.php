<?php
class Participante_model extends CI_model {

	function participacionx($idevento,$idpersona){
 		$this->db->where('idevento',$idevento);
 		$this->db->where('idpersona',$idpersona);
		 $participacion= $this->db->get('participacion');
		 return $participacion;
	}


	function participantep($idpersona){
 		$this->db->where('idpersona',$idpersona);
		 $participacion= $this->db->get('participante');
		 return $participacion;
	}


	function listar_participante(){
		 $participante= $this->db->get('participante');
		 return $participante;
	}

	function listar_participante1(){
		 $participante= $this->db->get('participante1');
		 return $participante;
	}



	function listar_participanteB($idevento){
		 if($idevento>0)
                {
                $this->db->where('idevento='.$idevento);
                }

		 $participante= $this->db->get('participante1');
		 return $participante;
	}



	function instructor($idevento){
		 if($idevento>0)
                {
                $this->db->where('idevento='.$idevento);
                $this->db->where('idnivelparticipante=2'); // 2= instructor
                }

		 $participante= $this->db->get('participante1');
		 return $participante;
	}






 	function participante( $id){
 		$participante = $this->db->query('select * from participante where idparticipante="'. $id.'"');
 		return $participante;
 	}



 	function participantes( $id){
 		$participante = $this->db->query('select * from participante1 where idevento="'. $id.'"  order by nombres asc');
 		return $participante;
 	}


 	function participantes1( $id){

   date_default_timezone_set('America/Guayaquil');
    $fecha = date("Y-m-d");
$participante=$this->db->query('select pa.idparticipante,pa.idnivelparticipante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres,doc.archivopdf,pa.grupoletra,(select idtipoasistencia from asistencia asis where asis.fecha="'.$fecha.'" and asis.idpersona= pa.idpersona) as hoy    from participante pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.iddocumento=doc.iddocumento UNION  select pa.idparticipante,pa.idnivelparticipante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres," " as archivopdf,pa.grupoletra ,(select idtipoasistencia from asistencia asis where asis.fecha="'.$fecha.'" and asis.idpersona= pa.idpersona) as hoy  from participante pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.idevento=ev.idevento and  pa.iddocumento=0;');

return $participante;
}







 	function save($array)
 	{

		$this->db->select('*');
		$this->db->from('participante');
		$this->db->where('idevento',$array['idevento']);
		$this->db->where('idpersona',$array['idpersona']);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 0) {
		    	$this->db->insert("participante", $array);
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
 		$this->db->where('idparticipante',$id);
 		$this->db->update('participante',$array_item);
    return true;
	}
 



  public function quitar($idp)
	{
		$this->db->trans_start();
		$condition = "idparticipante =" . $idp ;
		$this->db->select('*');
		$this->db->from('participante0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {

			$js="<script> 
			confirm(\"Los datos se eliminaran ¿esta seguro?\")
			</script>";


			echo"$js";
			if($js==true)
			{

	 		  	$this->db->where('idparticipante',$idp);
			//	$this->db->update('participante', array('eliminado'=>1));
		    		//$this->db->delete('participante');
           				 $this->db->trans_complete();
			      		$result=true;
			}
            			$this->db->trans_complete();
			      $result=false;

      	}else{	

            $this->db->trans_complete();
			      $result=false;
   	}

	return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idparticipante")->get('participante0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idparticipante")->get('participante0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$participante = $this->db->select("idparticipante")->order_by("idparticipante")->get('participante0')->result_array();
		$arr=array("idparticipante"=>$id);
		$clave=array_search($arr,$participante);
	   if(array_key_exists($clave+1,$participante))
		 {

 		$participante = $this->db->query('select * from participante0 where idparticipante="'. $participante[$clave+1]["idparticipante"].'"');
		 }else{

 		$participante = $this->db->query('select * from participante0 where idparticipante="'. $id.'"');
		 }
		 	
 		return $participante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$participante = $this->db->select("idparticipante")->order_by("idparticipante")->get('participante0')->result_array();
		$arr=array("idparticipante"=>$id);
		$clave=array_search($arr,$participante);
	   if(array_key_exists($clave-1,$participante))
		 {

 		$participante = $this->db->query('select * from participante0 where idparticipante="'. $participante[$clave-1]["idparticipante"].'"');
		 }else{

 		$participante = $this->db->query('select * from participante0 where idparticipante="'. $id.'"');
		 }
		 	
 		return $participante;
 	}














}
