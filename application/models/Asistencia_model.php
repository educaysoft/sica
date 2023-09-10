<?php
class Asistencia_model extends CI_model {



	function asistenciax($idevento,$idpersona){
 		$this->db->where('idevento',$idevento);
 		$this->db->where('idpersona',$idpersona);
		$asistencia= $this->db->get('asistencia1');
		 return $asistencia;
	}


	function AsistenciaxPersona($idevento){
		$this->db->select("asistencia1.idpersona,count(asistencia1.fecha) AS 'totalasistencia'");
		$this->db->where('idevento',$idevento);
		$this->db->where_in('idtipoasistencia',[1,2]);
		$this->db->from('asistencia1');
 		$this->db->group_by('idpersona');
		$asistencia= $this->db->get();
		 return $asistencia;
	}







	function listar_asistencia(){
		 $asistencia= $this->db->get('asistencia0');
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
	$asistencia = $this->db->query('select * from asistencia0 where idasistencia="'. $id.'"');
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
		$query=$this->db->get('asistencia0');
		if($query->num_rows()==0){
			$this->db->insert("asistencia", $array_item);
			if( $this->db->affected_rows()>0) {
				$idasistencia=$this->db->insert_id();
				return $idasistencia;
			}else{
				return 0; //FALSE;
			}	
		}else{

			    if($query->result()[0]->idtipoasistencia!=$array_item['idtipoasistencia'])
			    {
				$this->db->where('idpersona',$array_item['idpersona']);
				$this->db->where('fecha',$array_item['fecha']);
				$this->db->where('idevento',$array_item['idevento']);
				$this->db->update('asistencia',$array_item);
		      		return 1; //TRUE;
			 }else{
			        return 0; //FALSE;
			 }
			
		}
 	}



 	function saveall($array_item)
 	{
		$this->db->where('idevento',$array_item['idevento']);
		$participante=$this->db->get('participante0');
	
		if($participante->num_rows()>0){
		foreach($participante->result() as $row){

 		$this->db->where('idevento',$array_item['idevento']);
 		$this->db->where('idpersona',$row->idpersona);
 		$this->db->where('fecha',$array_item['fecha']);
		$query=$this->db->get('asistencia0');
		if($query->num_rows()==0){
			$array_item['idpersona']=$row->idpersona;
			$this->db->insert("asistencia", $array_item);
			if( $this->db->affected_rows()>0) {
				$idasistencia=$this->db->insert_id();
			}	
			
		}
		}
 	}

	}


	function restaurar($array_item)
 	{
		$this->db->trans_start();
	
 		$this->db->where('idevento',$array_item['idevento']);
 		$this->db->where('fecha',$array_item['fecha']);
 		$this->db->where('eliminado',1);
		$query=$this->db->get('asistencia');
		if($query->num_rows()>0){

			$this->db->where('idevento',$array_item['idevento']);
 			$this->db->where('fecha',$array_item['fecha']);
 			$this->db->where('eliminado',1);
			$this->db->update('asistencia', array('eliminado'=>0));
           	 	$this->db->trans_complete();
		   	$result=true;
		}else{
            		$this->db->trans_complete();
	      		$result=false;
		}	
		return $result;			
 	}









 	function quitar($array_item)
 	{
		$this->db->trans_start();
	
 		$this->db->where('idevento',$array_item['idevento']);
 		$this->db->where('fecha',$array_item['fecha']);
 		$this->db->where('eliminado',0);
		$query=$this->db->get('asistencia0');
		if($query->num_rows()>0){

			$this->db->where('idevento',$array_item['idevento']);
 			$this->db->where('fecha',$array_item['fecha']);
 			$this->db->where('eliminado',0);
			$this->db->update('asistencia', array('eliminado'=>1));
           	 	$this->db->trans_complete();
		   	$result=true;
		}else{
            		$this->db->trans_complete();
	      		$result=false;
		}	
		return $result;			
 	}

	













 	function update($id,$array_item)
 	{
 		$this->db->where('idasistencia',$id);
 		$this->db->update('asistencia',$array_item);
	}
 



   function delete($id)
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
		$query=$this->db->order_by("idasistencia")->get('asistencia0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idasistencia")->get('asistencia0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$asistencia = $this->db->select("idasistencia")->order_by("idasistencia")->get('asistencia0')->result_array();
		$arr=array("idasistencia"=>$id);
		$clave=array_search($arr,$asistencia);
	   if(array_key_exists($clave+1,$asistencia))
		 {

 		$asistencia = $this->db->query('select * from asistencia0 where idasistencia="'. $asistencia[$clave+1]["idasistencia"].'"');
		 }else{

 		$asistencia = $this->db->query('select * from asistencia0 where idasistencia="'. $id.'"');
		 }
		 	
 		return $asistencia;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$asistencia = $this->db->select("idasistencia")->order_by("idasistencia")->get('asistencia0')->result_array();
		$arr=array("idasistencia"=>$id);
		$clave=array_search($arr,$asistencia);
	   if(array_key_exists($clave-1,$asistencia))
		 {

 		$asistencia = $this->db->query('select * from asistencia0 where idasistencia="'. $asistencia[$clave-1]["idasistencia"].'"');
		 }else{

 		$asistencia = $this->db->query('select * from asistencia0 where idasistencia="'. $id.'"');
		 }
		 	
 		return $asistencia;
 	}














}
