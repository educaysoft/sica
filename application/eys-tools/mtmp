<?php
class Asistencia_model extends CI_model {



	function asistenciax($idevento,$idpersona){
 		$this->db->where('idevento',$idevento);
 		$this->db->where('idpersona',$idpersona);
		 $asistencia= $this->db->get('asistencia1');
		 return $asistencia;
	}



	function listar_asistencia(){
		 $asistencia= $this->db->get('asistencia');
		 return $asistencia;
	}

	function listar_asistencia1(){
		 $this->db->order_by("idevento","fecha");
		 $asistencia= $this->db->get('asistencia1');
		 return $asistencia;
	}




	function listar_asistencia_reporte($idevento){
    if($idevento>0)
    {
		 $this->db->order_by("idevento asc,lapersona asc");
 		$this->db->where('idevento',$idevento);
		 $asistencia= $this->db->get('asistencia1');
   }else{
  
		 $this->db->order_by("idevento asc,lapersona asc");
		 $asistencia= $this->db->get('asistencia1');
  
   }
     return $asistencia;
	}






 	function asistencia( $id){
	$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $id.'"');
 		return $asistencia;
 	}



 	function asistencias( $id){
 		$asistencia = $this->db->query('select * from asistencia1 where idevento="'. $id.'"');
 		return $asistencia;
 	}

 	function save($array_item)
 	{
 		$this->db->where('idevento',$array_item['idevento']);
 		$this->db->where('idpersona',$array_item['idpersona']);
 		$this->db->where('fecha',$array_item['fecha']);
		$query=$this->db->get('asistencia');
		if($query->num_rows()==0){
			$this->db->insert("asistencia", $array_item);
			return TRUE;
		}else{

			    if($query->result()[0]->idtipoasistencia!=$array_item['idtipoasistencia'])
			    {
				$this->db->where('idpersona',$array_item['idpersona']);
				$this->db->where('fecha',$array_item['fecha']);
				$this->db->where('idevento',$array_item['idevento']);
				$this->db->update('asistencia',$array_item);
		      		return TRUE;
			 }else{
			        return FALSE;
			 }
			
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idasistencia',$id);
 		$this->db->update('asistencia',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idasistencia',$id);
		$this->db->delete('asistencia');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idasistencia")->get('asistencia');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idasistencia")->get('asistencia');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$asistencia = $this->db->select("idasistencia")->order_by("idasistencia")->get('asistencia')->result_array();
		$arr=array("idasistencia"=>$id);
		$clave=array_search($arr,$asistencia);
	   if(array_key_exists($clave+1,$asistencia))
		 {

 		$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $asistencia[$clave+1]["idasistencia"].'"');
		 }else{

 		$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $id.'"');
		 }
		 	
 		return $asistencia;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$asistencia = $this->db->select("idasistencia")->order_by("idasistencia")->get('asistencia')->result_array();
		$arr=array("idasistencia"=>$id);
		$clave=array_search($arr,$asistencia);
	   if(array_key_exists($clave-1,$asistencia))
		 {

 		$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $asistencia[$clave-1]["idasistencia"].'"');
		 }else{

 		$asistencia = $this->db->query('select * from asistencia where idasistencia="'. $id.'"');
		 }
		 	
 		return $asistencia;
 	}














}
