<?php
class Seguimiento_model extends CI_model {



	function seguimientox($idevento,$idpersona){
 		$this->db->where('idevento',$idevento);
 		$this->db->where('idpersona',$idpersona);
		 $seguimiento= $this->db->get('seguimiento1');
		 return $seguimiento;
	}



	function listar_seguimiento(){
		 $seguimiento= $this->db->get('seguimiento');
		 return $seguimiento;
	}

	function listar_seguimiento1(){
		 $this->db->order_by("idevento","fecha");
		 $seguimiento= $this->db->get('seguimiento1');
		 return $seguimiento;
	}




	function listar_seguimiento_reporte($idevento){
    if($idevento>0)
    {
		 $this->db->order_by("idevento asc,lapersona asc");
 		$this->db->where('idevento',$idevento);
		 $seguimiento= $this->db->get('seguimiento1');
   }else{
  
		 $this->db->order_by("idevento asc,lapersona asc");
		 $seguimiento= $this->db->get('seguimiento1');
  
   }
     return $seguimiento;
	}






 	function seguimiento( $id){
	$seguimiento = $this->db->query('select * from seguimiento where idseguimiento="'. $id.'"');
 		return $seguimiento;
 	}



 	function seguimientos( $id){
 		$seguimiento = $this->db->query('select * from seguimiento1 where idevento="'. $id.'"');
 		return $seguimiento;
 	}

 	function save($array_item)
 	{
 		$this->db->where('idevento',$array_item['idevento']);
 		$this->db->where('idpersona',$array_item['idpersona']);
 		$this->db->where('fecha',$array_item['fecha']);
		$query=$this->db->get('seguimiento');
		if($query->num_rows()==0){
			$this->db->insert("seguimiento", $array_item);
			return TRUE;
		}else{

			    if($query->result()[0]->idtiposeguimiento!=$array_item['idtiposeguimiento'])
			    {
				$this->db->where('idpersona',$array_item['idpersona']);
				$this->db->where('fecha',$array_item['fecha']);
				$this->db->where('idevento',$array_item['idevento']);
				$this->db->update('seguimiento',$array_item);
		      		return TRUE;
			 }else{
			        return FALSE;
			 }
			
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idseguimiento',$id);
 		$this->db->update('seguimiento',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idseguimiento',$id);
		$this->db->delete('seguimiento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idseguimiento")->get('seguimiento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idseguimiento")->get('seguimiento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$seguimiento = $this->db->select("idseguimiento")->order_by("idseguimiento")->get('seguimiento')->result_array();
		$arr=array("idseguimiento"=>$id);
		$clave=array_search($arr,$seguimiento);
	   if(array_key_exists($clave+1,$seguimiento))
		 {

 		$seguimiento = $this->db->query('select * from seguimiento where idseguimiento="'. $seguimiento[$clave+1]["idseguimiento"].'"');
		 }else{

 		$seguimiento = $this->db->query('select * from seguimiento where idseguimiento="'. $id.'"');
		 }
		 	
 		return $seguimiento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$seguimiento = $this->db->select("idseguimiento")->order_by("idseguimiento")->get('seguimiento')->result_array();
		$arr=array("idseguimiento"=>$id);
		$clave=array_search($arr,$seguimiento);
	   if(array_key_exists($clave-1,$seguimiento))
		 {

 		$seguimiento = $this->db->query('select * from seguimiento where idseguimiento="'. $seguimiento[$clave-1]["idseguimiento"].'"');
		 }else{

 		$seguimiento = $this->db->query('select * from seguimiento where idseguimiento="'. $id.'"');
		 }
		 	
 		return $seguimiento;
 	}














}
