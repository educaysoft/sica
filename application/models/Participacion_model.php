<?php
class Participacion_model extends CI_model {

	function listar_participacion(){
		 $participacion= $this->db->get('participacion');
		 return $participacion;
	}

	function listar_participacion1(){
		 $this->db->order_by("idevento","fecha");
		 $participacion= $this->db->get('participacion1');
		 return $participacion;
	}

 	function participacion( $id){
 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $id.'"');
 		return $participacion;
 	}



 	function participacions( $id){
 		$participacion = $this->db->query('select * from participacion1 where idevento="'. $id.'"');
 		return $participacion;
 	}

 	function save($array)
 	{
 		$this->db->where('idevento',$array['idevento']);
 		$this->db->where('idpersona',$array['idpersona']);
 		$this->db->where('fecha',$array['fecha']);
		$query=$this->db->get('participacion');
		if($query->num_rows()==0){
			$this->db->insert("participacion", $array);
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idparticipacion',$id);
 		$this->db->update('participacion',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idparticipacion',$id);
		$this->db->delete('participacion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idparticipacion")->get('participacion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idparticipacion")->get('participacion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$participacion = $this->db->select("idparticipacion")->order_by("idparticipacion")->get('participacion')->result_array();
		$arr=array("idparticipacion"=>$id);
		$clave=array_search($arr,$participacion);
	   if(array_key_exists($clave+1,$participacion))
		 {

 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $participacion[$clave+1]["idparticipacion"].'"');
		 }else{

 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $id.'"');
		 }
		 	
 		return $participacion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$participacion = $this->db->select("idparticipacion")->order_by("idparticipacion")->get('participacion')->result_array();
		$arr=array("idparticipacion"=>$id);
		$clave=array_search($arr,$participacion);
	   if(array_key_exists($clave-1,$participacion))
		 {

 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $participacion[$clave-1]["idparticipacion"].'"');
		 }else{

 		$participacion = $this->db->query('select * from participacion where idparticipacion="'. $id.'"');
		 }
		 	
 		return $participacion;
 	}














}
