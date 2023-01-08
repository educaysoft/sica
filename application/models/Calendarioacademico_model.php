<?php
class Calendarioacademico_model extends CI_model {

	function lista_calendarioacademicos(){
		 $calendarioacademico= $this->db->get('calendarioacademico');
		 return $calendarioacademico;
	}


function lista_calendarioacademicos1($idperiodoacademico){
	if($idperiodoacademico>0)
	{
	$this->db->where('idperiodoacademico='.$idperiodoacademico);
	}
	$query=$this->db->order_by("idperiodoacademico","idcalendarioacademico")->get('calendarioacademico1');
	 return $query;
	}


	function fechasdecorte($idsilabo)
	{

		echo $idsilabo;
		$fechadecorte=array();
				$condition = "idsilabo =" . $idsilabo ;
				$this->db->select('*');
				$this->db->from('silabo');
				$this->db->where($condition);
				$this->db->limit(1);
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
						$idperiodoacademico=$query->result()[0]->idperiodoacademico;
	

 		$fechasdecorte = $this->db->query('select fechacalendario from fechacalendario1 where idperiodoacademico='.$idperiodoacademico.' and  actividad like "%SUMATORIA%"   order by fechacalendario');
				}
 		return $fechadecorte;
		
	
	}


 	function calendarioacademicos( $idperiodoacademico){
 		$calendarioacademico = $this->db->query('select * from calendarioacademico where idperiodoacademico="'. $idperiodoacademico.'" order by fechaimpartida');
 		return $calendarioacademico;
 	}


 	function calendarioacademico( $id){
 		$calendarioacademico = $this->db->query('select * from calendarioacademico where idcalendarioacademico="'. $id.'"');
 		return $calendarioacademico;
 	}

 	function save($array)
 	{
		$this->db->insert("calendarioacademico", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcalendarioacademico',$id);
 		$this->db->update('calendarioacademico',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcalendarioacademico',$id);
		$this->db->delete('calendarioacademico');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_calendarioacademico($id){
	$condition = "idcalendarioacademico =" .  $id ;
	$this->db->select('*');
	$this->db->from('calendarioacademico');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}





	function elprimero()
	{
		$query=$this->db->order_by("idcalendarioacademico")->get('calendarioacademico');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcalendarioacademico")->get('calendarioacademico');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$calendarioacademico = $this->db->select("idcalendarioacademico")->order_by("idcalendarioacademico")->get('calendarioacademico')->result_array();
		$arr=array("idcalendarioacademico"=>$id);
		$clave=array_search($arr,$calendarioacademico);
	   if(array_key_exists($clave+1,$calendarioacademico))
		 {

 		$calendarioacademico = $this->db->query('select * from calendarioacademico where idcalendarioacademico="'. $calendarioacademico[$clave+1]["idcalendarioacademico"].'"');
		 }else{

 		$calendarioacademico = $this->db->query('select * from calendarioacademico where idcalendarioacademico="'. $id.'"');
		 }
		 	
 		return $calendarioacademico;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$calendarioacademico = $this->db->select("idcalendarioacademico")->order_by("idcalendarioacademico")->get('calendarioacademico')->result_array();
		$arr=array("idcalendarioacademico"=>$id);
		$clave=array_search($arr,$calendarioacademico);
	   if(array_key_exists($clave-1,$calendarioacademico))
		 {

 		$calendarioacademico = $this->db->query('select * from calendarioacademico where idcalendarioacademico="'. $calendarioacademico[$clave-1]["idcalendarioacademico"].'"');
		 }else{

 		$calendarioacademico = $this->db->query('select * from calendarioacademico where idcalendarioacademico="'. $id.'"');
		 }
		 	
 		return $calendarioacademico;
 	}



	function lista_calendarioacademicoes_con_inscripciones(){
		 $this->db->select('calendarioacademico.*');
		 $this->db->from('calendarioacademico,evento');
		 $this->db->where('evento.idcalendarioacademico=calendarioacademico.idcalendarioacademico and evento.idevento_estado=2');
		 $calendarioacademico= $this->db->get();
		 return $calendarioacademico;
	}




}
