<?php
class Indicadoracademico_model extends CI_model {

	function lista_indicadoracademicos(){
		 $indicadoracademico= $this->db->get('indicadoracademico');
		 return $indicadoracademico;
	}

 	function indicadoracademico( $id){
 		$indicadoracademico = $this->db->query('select * from indicadoracademico where idindicadoracademico="'. $id.'"');
 		return $indicadoracademico;
 	}

 	function save($array)
 	{
		$this->db->insert("indicadoracademico", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idindicadoracademico',$id);
 		$this->db->update('indicadoracademico',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idindicadoracademico',$id);
		$this->db->delete('indicadoracademico');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idindicadoracademico")->get('indicadoracademico');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idindicadoracademico")->get('indicadoracademico');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	function indicador1($iddistributivo)
	{


 		$indicadoracademico = $this->db->query('select distinct dido.eldocente, (select distinct estu.idnivelestudio from estudio estu,pertinencia pert where  estu.idnivelestudio=4 and estu.idpersona=doce.idpersona and pert.idestudio=estu.idestudio and pert.iddepartamento=1 limit 1) as nivel  ,(select distinct estu.titulo from estudio estu, pertinencia pert where estu.idnivelestudio=4 and estu.idpersona=doce.idpersona and pert.idestudio=estu.idestudio and pert.iddepartamento=1 limit 1) as titulo ,(select distinct estu.fecharegistro from estudio estu, pertinencia pert where estu.idnivelestudio=4 and estu.idpersona=doce.idpersona and pert.idestudio=estu.idestudio and pert.iddepartamento=1 limit 1) as fecha  from docente0 doce,distributivodocente1 dido where doce.iddocente=dido.iddocente and dido.iddistributivo='.$iddistributivo);
	
		 return $indicadoracademico;


	}



	// Para moverse al siguiente registro
 	function siguiente($id){
 		$indicadoracademico = $this->db->select("idindicadoracademico")->order_by("idindicadoracademico")->get('indicadoracademico')->result_array();
		$arr=array("idindicadoracademico"=>$id);
		$clave=array_search($arr,$indicadoracademico);
	   if(array_key_exists($clave+1,$indicadoracademico))
		 {

 		$indicadoracademico = $this->db->query('select * from indicadoracademico where idindicadoracademico="'. $indicadoracademico[$clave+1]["idindicadoracademico"].'"');
		 }else{

 		$indicadoracademico = $this->db->query('select * from indicadoracademico where idindicadoracademico="'. $id.'"');
		 }
		 	
 		return $indicadoracademico;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$indicadoracademico = $this->db->select("idindicadoracademico")->order_by("idindicadoracademico")->get('indicadoracademico')->result_array();
		$arr=array("idindicadoracademico"=>$id);
		$clave=array_search($arr,$indicadoracademico);
	   if(array_key_exists($clave-1,$indicadoracademico))
		 {

 		$indicadoracademico = $this->db->query('select * from indicadoracademico where idindicadoracademico="'. $indicadoracademico[$clave-1]["idindicadoracademico"].'"');
		 }else{

 		$indicadoracademico = $this->db->query('select * from indicadoracademico where idindicadoracademico="'. $id.'"');
		 }
		 	
 		return $indicadoracademico;
 	}






}
