<?php
class Silabo_model extends CI_model {

	function lista_silabos(){
		 $silabo= $this->db->get('silabo');
		 return $silabo;
	}

 	function silabo( $id){
 		$silabo = $this->db->query('select * from silabo where idsilabo="'. $id.'"');
 		return $silabo;
 	}


 	function silaboss( $iddocente){
 		$silabo = $this->db->query('select * from silabo1 where iddocente="'. $iddocente.'"');
 		return $silabo;
 	}



 	function silabosp( $idperiodoacademico){
 		$silabo = $this->db->query('select * from silabo1 where idperiodoacademico="'. $idperiodoacademico.'"');
 		return $silabo;
 	}



 	function silabosa( $idasignatura){
 		$silabo = $this->db->query('select * from silabo1 where idasignatura="'. $idasignatura.'"');
 		return $silabo;
 	}




 	function save($array)
 	{
	   $this->db->trans_begin();
		$condition1 = "idasignatura =" . "'" . $array['idasignatura'] . "'";
		$condition2 = "idperiodoacademico =" . "'" . $array['idperiodoacademico'] . "'";
		$condition3 = "iddocente =" . "'" . $array['iddocente'] . "'";
		$this->db->select('*');
		$this->db->from('silabo');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->where($condition3);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("silabo", $array);
  			if( $this->db->affected_rows()>0){
				$idsilabo=$this->db->insert_id();
				// Se crea las unidades del silabo
				for($i=1;$i<=4;$i++){
					$arrayunidad=array();
					$arrayunidad['idsilabo']=$idsilabo;
					$arrayunidad['unidad']=$i;
					$arrayunidad['nombre']="Unidad #".$i ;
					$this->db->insert('unidadsilabo',$arrayunidad);
				}	
				//Se busca la asignacion del docente a esta asignatura



		$condition1 = "idperiodoacademico =" . $array['idperiodoacademico'] ;
		$this->db->select('*');
		$this->db->from('periodoacademico');
		$this->db->where($condition1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$fechainicio=$query->result()[0]->fechainicio;
			$fechafin=$query->result()[0]->fechafin;
		}else{
			$fechainicio="";
			$fechafin="";
		}






		$condition1 = "idperiodoacademico =" . $array['idperiodoacademico'] ;
		$this->db->select('*');
		$this->db->from('calendarioacademico');
		$this->db->where($condition1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$idcalendarioacademico=$query->result()[0]->idcalendarioacademico;
		}else{
			$idcalendarioacademico=0;
		}

		$condition1 = "idperiodoacademico =" .  $array['idperiodoacademico'] ;
		$this->db->select('*');
		$this->db->from('distributivo');
		$this->db->where($condition1);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$iddistributivo=$query->result()[0]->iddistributivo;
		}else{
			$iddistributivo=0;
		}

		$condition1 = "iddistributivo =" . $iddistributivo ;
		$condition2 = "iddocente =" . $array['iddocente'] ;
		$this->db->select('*');
		$this->db->from('distributivodocente');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$iddistributivodocente=$query->result()[0]->iddistributivodocente;
		}else{
			$iddistributivodocente=0;
		}	

		$condition1 = "iddistributivodocente =" .  $iddistributivodocente ;
		$condition2 = "idasignatura =" .  $array['idasignatura'] ;
		$this->db->select('*');
		$this->db->from('asignaturadocente');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query= $this->db->get();
		if ($query->num_rows() > 0) {
			$idasignaturadocente=$query->result()[0]->idasignaturadocente;
		}else{
			$idasignaturadocente=0;
		}

 

			$this->db->trans_commit();
	//	return $query->first_row('array');
		$data = array("idsilabo"=>$idsilabo,"idcalendarioacademico"=>$idcalendarioacademico,"idasignaturadocente"=>$idasignaturadocente,"fechainicio"=>$fechainicio,"fechafin"=>$fechafin);

		return $data;

//,"idcalendarioacademico"=>$idcalendarioacademico,"idasignaturadocente"=>$idasignaturadocente);	
	//		return array("idsilabo"=>1,"idcalendarioacademico"=>1,"idasignaturadocente"=>1);	
		//	return true;
		   }else{
			$this->db->trans_rollback();
			return false;
		   }
		}else{
			$this->db->trans_rollback();
			return false;
 	}
 	}













 	function update($id,$array_item)
 	{
 		$this->db->where('idsilabo',$id);
 		$this->db->update('silabo',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idsilabo',$id);
		$this->db->delete('silabo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_silabo($id){
	$condition = "idsilabo =" .  $id ;
	$this->db->select('*');
	$this->db->from('silabo');
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
		$query=$this->db->order_by("idsilabo")->get('silabo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idsilabo")->get('silabo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$silabo = $this->db->select("idsilabo")->order_by("idsilabo")->get('silabo')->result_array();
		$arr=array("idsilabo"=>$id);
		$clave=array_search($arr,$silabo);
	   if(array_key_exists($clave+1,$silabo))
		 {

 		$silabo = $this->db->query('select * from silabo where idsilabo="'. $silabo[$clave+1]["idsilabo"].'"');
		 }else{

 		$silabo = $this->db->query('select * from silabo where idsilabo="'. $id.'"');
		 }
		 	
 		return $silabo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$silabo = $this->db->select("idsilabo")->order_by("idsilabo")->get('silabo')->result_array();
		$arr=array("idsilabo"=>$id);
		$clave=array_search($arr,$silabo);
	   if(array_key_exists($clave-1,$silabo))
		 {

 		$silabo = $this->db->query('select * from silabo where idsilabo="'. $silabo[$clave-1]["idsilabo"].'"');
		 }else{

 		$silabo = $this->db->query('select * from silabo where idsilabo="'. $id.'"');
		 }
		 	
 		return $silabo;
 	}



	function lista_silaboes_con_inscripciones(){
		 $this->db->select('silabo.*');
		 $this->db->from('silabo,evento');
		 $this->db->where('evento.idsilabo=silabo.idsilabo and evento.idevento_estado=2');
		 $silabo= $this->db->get();
		 return $silabo;
	}




}
