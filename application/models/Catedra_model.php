<?php
class Catedra_model extends CI_model {

	//Retorna todos los registros como un objeto
	function lista_catedras(){
		 $catedra= $this->db->get('catedra');
		 return $catedra;
	}


	function lista_catedras_open(){
		$this->db->where("idcatedra_estado=2 or idcatedra_estado=3");  //SOLO ESTADO INSCRIPCION OR EN EJECUCION
		 $catedra= $this->db->get('catedra');
		 return $catedra;
	}




	//Retorna todos los registros como un objeto
	function lista_catedrasA($idcatedra_estado,$idpersona){
		if($idcatedra_estado>0)
		{
		$this->db->where('idcatedra_estado='.$idcatedra_estado);
		}


		if($idpersona>0)
		{


	$catedra = $this->db->query('select * from catedra1 where EXISTS (select idcatedra from participante where participante.idcatedra=catedra1.idcatedra and participante.idpersona= "'.$idpersona.'") order by idcatedra');

		}

		 return $catedra;	
	}





	function lista_catedrasP($idpersona){


	$catedra = $this->db->query('select * from catedra1 where EXISTS (select idcatedra from participante where participante.idcatedra=catedra1.idcatedra and participante.idpersona= "'.$idpersona.'") order by idcatedra');


		 return $catedra;	
	}










	function lista_catedrasTE($idcatedra_estado){
		$this->db->select('*');
		$this->db->where('idcatedra_estado='.$idcatedra_estado);
		$this->db->from('catedra1');
		$catedra = $this->db->get();

		 return $catedra;	
	}









  //Retorna solamente un registro de un silabo
 	function catedrass($idsilabo){
	$catedra = $this->db->query('select * from catedra where idsilabo="'. $idsilabo.'" order by idcatedra');
 		return $catedra;
 	}



  //Retorna solamente un registro de el id pasado como parame
 	function catedra($id){
	$catedra = $this->db->query('select * from catedra where idcatedra="'. $id.'" order by idcatedra');
 		return $catedra;
 	}




  //Retorna solamente un registro de el id pasado como parame
 	function lista_catedraP($id){
 		$catedra = $this->db->query('select * from catedraP where idcatedra="'. $id.'" order by elparticipante');
 		return $catedra;
 	}









  // Para guardar un registro nuevo
	function save($array)
 	{
		$this->db->trans_begin();
		$this->db->insert("catedra", $array);
		if($this->db->affected_rows()>0){
			$idcatedra=$this->db->insert_id();
			$namefile1="catedra-".sprintf("%d",$idcatedra) ;
			$namefile2="catedra/detalle/".sprintf("%d",$idcatedra) ;
			$this->db->insert("pagina", array("nombre"=>$namefile1,"ruta"=>$namefile2));
			if($this->db->affected_rows()>0){
						$this->db->where('idcatedra',$idcatedra);
						$this->db->update('catedra',array('idpagina'=>$this->db->insert_id()));
				}
				$this->db->trans_commit();
				die("Se guardo el catedra y se la pagina de detalle" );
				return true;
		}else{
			$this->db->trans_rollback();
			die("No de pudo grabar" );
			return false;
		}
 	}

	// Para actualiza un registro
 	function update($id,$array_item)
 	{
 		$this->db->where('idcatedra',$id);
 		$this->db->update('catedra',$array_item);	}



 	public function delete($id)
	{
		$this->db->select('*');
		$this->db->from('ascenso');
		$this->db->where('idcatedra',$id);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$this->db->where('idcatedra',$id);
			$this->db->delete('ascenso');
			if($this->db->affected_rows()==1){
				$this->db->where('idcatedra',$id);
				$this->db->delete('catedra');
				if($this->db->affected_rows()==1)
					$result=true;
				else
					$result=false;
			}
			else{
				$result=false;
			}
		}else
		{
				$this->db->where('idcatedra',$id);
				$this->db->delete('catedra');
				if($this->db->affected_rows()==1)
					$result=true;
				else
					$result=false;
		}
	}





  // Para ir al primero

	function elprimero()
	{
		$query=$this->db->order_by("idcatedra")->get('catedra');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();
	}

// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcatedra")->get('catedra');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();
	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$catedra = $this->db->select("idcatedra")->order_by("idcatedra")->get('catedra')->result_array();
		$arr=array("idcatedra"=>$id);
		$clave=array_search($arr,$catedra);
	   if(array_key_exists($clave+1,$catedra))
		 {

 		$catedra = $this->db->query('select * from catedra where idcatedra="'. $catedra[$clave+1]["idcatedra"].'"');
		 }else{

 		$catedra = $this->db->query('select * from catedra where idcatedra="'. $id.'"');
		 }
		 	
 		return $catedra;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$catedra = $this->db->select("idcatedra")->order_by("idcatedra")->get('catedra')->result_array();
		$arr=array("idcatedra"=>$id);
		$clave=array_search($arr,$catedra);
	   if(array_key_exists($clave-1,$catedra))
		 {

 		$catedra = $this->db->query('select * from catedra where idcatedra="'. $catedra[$clave-1]["idcatedra"].'"');
		 }else{

 		$catedra = $this->db->query('select * from catedra where idcatedra="'. $id.'"');
		 }
		 	
 		return $catedra;
 	}




	// Para moverse presentar  los emisores 
	function participantes( $ideven)
	{
 		$this->db->select('idpersona,nombres');
		$this->db->where('idcatedra="'.$ideven.'"');
		$emisores=$this->db->get('participante1');
		$emisores=$this->db->query('select idpersona,nombres from participante1 where idcatedra="'. $ideven.'"');
		return $emisores;
	}




	// Para moverse presentar  los emisores 
	function certificados($ideven)
	{
 		$this->db->select('idcertificado,asunto');
		$this->db->where('idcatedra="'.$ideven.'"');
		$certificados=$this->db->get('certificado1');
		return $certificados;
	}



 
}
