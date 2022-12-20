<?php
class Pagoevento_model extends CI_model {


	function pagoeventox($idevento,$idpersona){
		 $this->db->order_by("fecha asc");
 		$this->db->where('idevento',$idevento);
 		$this->db->where('idpersona',$idpersona);
		 $pagoevento= $this->db->get('pagoevento');
		 return $pagoevento;
	}


	function listar_pagoevento(){
		 $pagoevento= $this->db->get('pagoevento');
		 return $pagoevento;
	}

	function listar_pagoevento1($idevento){
    if($idevento>0)
    {
		 $this->db->order_by("idevento asc,nombres asc");
 		$this->db->where('idevento',$idevento);
		 $pagoevento= $this->db->get('pagoevento2');
   }else{
  
		 $this->db->order_by("idevento asc,nombres asc");
		 $pagoevento= $this->db->get('pagoevento2');
  
   }
     return $pagoevento;
	}




 	function pagoevento( $id){
 		$pagoevento = $this->db->query('select * from pagoevento where idpagoevento="'. $id.'"');
 		return $pagoevento;
 	}



 	function pagoeventos( $id){
 		$pagoevento = $this->db->query('select * from pagoevento1 where idevento="'. $id.'"');
 		return $pagoevento;
 	}

 	function save($array_item)
 	{
 		$this->db->where('idevento',$array_item['idevento']);
 		$this->db->where('idpersona',$array_item['idpersona']);
 		$this->db->where('fecha',$array_item['fecha']);
		$query=$this->db->get('pagoevento');
		if($query->num_rows()==0){
			$this->db->insert("pagoevento", $array_item);
		      return TRUE;
		 }else{
			    if($query->result()[0]->porcentaje!=$array_item['porcentaje'] || $query->result()[0]->ayuda!=$array_item['ayuda']  )
			    {
				$this->db->where('idpersona',$array_item['idpersona']);
				$this->db->where('fecha',$array_item['fecha']);
				$this->db->where('idevento',$array_item['idevento']);
				$this->db->update('pagoevento',$array_item);
		      		return TRUE;
			 }else{
			        return FALSE;
			 }
		    }
 	}

 	function update($array_item)
 	{
 		$this->db->where('idpersona',$array_item['idpersona']);
 		$this->db->where('fecha',$array_item['fecha']);
 		$this->db->where('idevento',$array_item['idevento']);
 		$this->db->update('pagoevento',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idpagoevento',$id);
		$this->db->delete('pagoevento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idpagoevento")->get('pagoevento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idpagoevento")->get('pagoevento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$pagoevento = $this->db->select("idpagoevento")->order_by("idpagoevento")->get('pagoevento')->result_array();
		$arr=array("idpagoevento"=>$id);
		$clave=array_search($arr,$pagoevento);
	   if(array_key_exists($clave+1,$pagoevento))
		 {

 		$pagoevento = $this->db->query('select * from pagoevento where idpagoevento="'. $pagoevento[$clave+1]["idpagoevento"].'"');
		 }else{

 		$pagoevento = $this->db->query('select * from pagoevento where idpagoevento="'. $id.'"');
		 }
		 	
 		return $pagoevento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$pagoevento = $this->db->select("idpagoevento")->order_by("idpagoevento")->get('pagoevento')->result_array();
		$arr=array("idpagoevento"=>$id);
		$clave=array_search($arr,$pagoevento);
	   if(array_key_exists($clave-1,$pagoevento))
		 {

 		$pagoevento = $this->db->query('select * from pagoevento where idpagoevento="'. $pagoevento[$clave-1]["idpagoevento"].'"');
		 }else{

 		$pagoevento = $this->db->query('select * from pagoevento where idpagoevento="'. $id.'"');
		 }
		 	
 		return $pagoevento;
 	}














}
