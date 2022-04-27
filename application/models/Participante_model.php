<?php
class Participante_model extends CI_model {

	function participacionx($idevento,$idpersona){
 		$this->db->where('idevento',$idevento);
 		$this->db->where('idpersona',$idpersona);
		 $participacion= $this->db->get('participacion');
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

 	function participante( $id){
 		$participante = $this->db->query('select * from participante where idparticipante="'. $id.'"');
 		return $participante;
 	}



 	function participantes( $id){
 		$participante = $this->db->query('select * from participante1 where idevento="'. $id.'"');
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
		if ($query->num_rows() == 0) {
		    $this->db->insert("participante", $array);
			if($this->db->affected_rows()==1){
				$result=TRUE;
      }else{
				$result=FALSE;
      }
    }else{
				$result=FALSE;
    }

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idparticipante',$id);
 		$this->db->update('participante',$array_item);
    return true;
	}
 



  public function delete($idp,$ide)
	{
		$this->db->trans_start();
		$condition = "idparticipante =" . $idp ;
		$this->db->select('*');
		$this->db->from('participante');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		$idpersona=$query->result()[0]->idpersona;
		  $condition = "idpersona =" . $idpersona ;
		  $this->db->select('*');
		  $this->db->from('usuario');
		  $this->db->where($condition);
		  $this->db->limit(1);
		  $query = $this->db->get();
		  if ($query->num_rows() != 0) {
	 		  $idusuario=$query->result()[0]->idusuario;
 		    $this->db->where('idusuario',$idusuario);
 		    $this->db->where('idevento',$ide);
 		    $this->db->where('onoff',1);
		    $this->db->delete('password');

	 		  $this->db->where('idparticipante',$idp);
		    $this->db->delete('participante');
        if($this->db->affected_rows()==1)
        {
            $this->db->trans_complete();
			      $result=true;
        }else{
            $this->db->trans_complete();
			      $result=false;
        }
     }else{	
            $this->db->trans_complete();
			      $result=false;
     }
   
      }else{	

            $this->db->trans_complete();
			      $result=false;
   }

	return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idparticipante")->get('participante');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idparticipante")->get('participante');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$participante = $this->db->select("idparticipante")->order_by("idparticipante")->get('participante')->result_array();
		$arr=array("idparticipante"=>$id);
		$clave=array_search($arr,$participante);
	   if(array_key_exists($clave+1,$participante))
		 {

 		$participante = $this->db->query('select * from participante where idparticipante="'. $participante[$clave+1]["idparticipante"].'"');
		 }else{

 		$participante = $this->db->query('select * from participante where idparticipante="'. $id.'"');
		 }
		 	
 		return $participante;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$participante = $this->db->select("idparticipante")->order_by("idparticipante")->get('participante')->result_array();
		$arr=array("idparticipante"=>$id);
		$clave=array_search($arr,$participante);
	   if(array_key_exists($clave-1,$participante))
		 {

 		$participante = $this->db->query('select * from participante where idparticipante="'. $participante[$clave-1]["idparticipante"].'"');
		 }else{

 		$participante = $this->db->query('select * from participante where idparticipante="'. $id.'"');
		 }
		 	
 		return $participante;
 	}














}
