<?php
class Certificado_model extends CI_model {

	function lista_certificados(){
		 $certificado= $this->db->get('certificado');
		 return $certificado;
	}

	function lista_certificados1(){
		 $certificado= $this->db->get('certificado1');
		 return $certificado;
	}





 	function certificado( $id){
 		$certificado = $this->db->query('select * from certificado where idcertificado="'. $id.'"');
 		return $certificado;
 	}

 	function save($array)
 	{
		$this->db->insert("certificado", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcertificado',$id);
 		$this->db->update('certificado',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idcertificado',$id);
		$this->db->delete('certificado');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcertificado")->get('certificado');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcertificado")->get('certificado');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$certificado = $this->db->select("idcertificado")->order_by("idcertificado")->get('certificado')->result_array();
		$arr=array("idcertificado"=>$id);
		$clave=array_search($arr,$certificado);
	   if(array_key_exists($clave+1,$certificado))
		 {

 		$certificado = $this->db->query('select * from certificado where idcertificado="'. $certificado[$clave+1]["idcertificado"].'"');
		 }else{

 		$certificado = $this->db->query('select * from certificado where idcertificado="'. $id.'"');
		 }
		 	
 		return $certificado;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$certificado = $this->db->select("idcertificado")->order_by("idcertificado")->get('certificado')->result_array();
		$arr=array("idcertificado"=>$id);
		$clave=array_search($arr,$certificado);
	   if(array_key_exists($clave-1,$certificado))
		 {

 		$certificado = $this->db->query('select * from certificado where idcertificado="'. $certificado[$clave-1]["idcertificado"].'"');
		 }else{

 		$certificado = $this->db->query('select * from certificado where idcertificado="'. $id.'"');
		 }
		 	
 		return $certificado;
 	}






 

}
