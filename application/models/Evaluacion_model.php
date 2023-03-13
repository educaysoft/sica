<?php
class Evaluacion_model extends CI_model {

	function lista_evaluaciones(){
		 $evaluacion= $this->db->get('evaluacion');
		 return $evaluacion;
	}


	function lista_evaluacionsA(){
		 $evaluacion= $this->db->get('evaluacion1');
		 return $evaluacion;
	}



 	function evaluacion( $id){
 		$evaluacion = $this->db->query('select * from evaluacion where idevaluacion="'. $id.'"');
 		return $evaluacion;
 	}


 	function evaluacionspersona( $id){
 		$evaluacion = $this->db->query('select * from evaluacion where idpersona="'. $id.'"');
 		return $evaluacion;
 	}



 	function save($arraevalpers,$arraeval)
 	{
		$this->db->where(array('idpersona'=>$arraevalpers['idpersona']));
		$this->db->where(array('fecha'=>$arraevalpers['fecha']));
		$this->db->where(array('idreactivo'=>$arraevalpers['idreactivo']));
		$query=$this->db->get('evaluacionpersona');
		if($query->num_rows()==0){
			$this->db->insert("evaluacionpersona", $arraevalpers);
			if($this->db->affected_rows()>0){
				$id=$this->db->insert_id();
			
			}else{
				return array("idevaluacionpersona"=>0);;
			}
		}else{
			$id=$query->result()[0]->idevaluacionpersona;
		}

	
				$arraeval['idevaluacionpersona']=$id;
				$this->db->where(array('idevaluacionpersona'=>$arraeval['idevaluacionpersona']));
				$this->db->where(array('idrespuesta'=>$arraeval['idrespuesta']));
				$this->db->where(array('idpregunta'=>$arraeval['idpregunta']));
				$query=$this->db->get('evaluacion');
				if($query->num_rows()==0){
					$this->db->insert("evaluacion", $arraeval);
					if($this->db->affected_rows()>0){

						$this->db->where(array('idevaluacionpersona'=>$id));
						$query=$this->db->get('evaluado');
						if($query->num_rows()!=0){
							if($query->result()[0]->totapreg==$query->result()[0]->totapreg2)
							{
								$porcentaje=round(($query->result()[0]->totaacie/$query->result()[0]->totapreg)*100,0);
								return array("idevaluacionpersona"=>$id,"porcentaje"=>$porcentaje);
							}else{
								return array("idevaluacionpersona"=>0);;
							}
					}else{
						return array("idevaluacionpersona"=>0);;
					}
				}else{
						return array("idevaluacionpersona"=>0);;
				}
				}else{
						return array("idevaluacionpersona"=>0);;
				}

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idevaluacion',$id);
 		$this->db->update('evaluacion',$array_item);
	}
 


 	function delete($id)
	{
 		$this->db->where('idevaluacion',$id);
		$this->db->delete('evaluacion');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idevaluacion")->get('evaluacion');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idevaluacion")->get('evaluacion');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$evaluacion = $this->db->select("idevaluacion")->order_by("idevaluacion")->get('evaluacion')->result_array();
		$arr=array("idevaluacion"=>$id);
		$clave=array_search($arr,$evaluacion);
	   if(array_key_exists($clave+1,$evaluacion))
		 {

 		$evaluacion = $this->db->query('select * from evaluacion where idevaluacion="'. $evaluacion[$clave+1]["idevaluacion"].'"');
		 }else{

 		$evaluacion = $this->db->query('select * from evaluacion where idevaluacion="'. $id.'"');
		 }
		 	
 		return $evaluacion;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$evaluacion = $this->db->select("idevaluacion")->order_by("idevaluacion")->get('evaluacion')->result_array();
		$arr=array("idevaluacion"=>$id);
		$clave=array_search($arr,$evaluacion);
	   if(array_key_exists($clave-1,$evaluacion))
		 {

 		$evaluacion = $this->db->query('select * from evaluacion where idevaluacion="'. $evaluacion[$clave-1]["idevaluacion"].'"');
		 }else{

 		$evaluacion = $this->db->query('select * from evaluacion where idevaluacion="'. $id.'"');
		 }
		 	
 		return $evaluacion;
 	}






}
