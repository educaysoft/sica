<?php
class Tema_model extends CI_model {

	function lista_temas(){
		 $tema= $this->db->get('tema0');
		 return $tema;
	}

	function tema1($idtema){
		$this->db->where('idtema='.$idtema);
		 $tema= $this->db->get('tema1');
		 return $tema;
	}


function lista_temas1($idunidadsilabo){
	if($idunidadsilabo>0)
	{
	$this->db->where('idunidadsilabo='.$idunidadsilabo);
	}
	$query=$this->db->order_by("idsilabo","idunidadsilabo","idtema")->get('tema1');
	 return $query;
	}


function lista_temas2($idunidadsilabo){
	if($idunidadsilabo>0)
	{
	$this->db->where('idunidadsilabo='.$idunidadsilabo);
	}
	$query=$this->db->order_by("idsilabo","idunidadsilabo","idtema")->get('tema2');
	 return $query;
	}






function lista_temass($idsilabo){
	if($idsilabo>0)
	{
	$this->db->where('idsilabo='.$idsilabo);

	}
	$query=$this->db->order_by("numerosesion asc","unidad asc")->get('tema1');
	 return $query;
	}



function lista_temassexport($idsilabo){
	if($idsilabo>0)
	{
	$this->db->where('idsilabo='.$idsilabo);
	}
	$this->db->select("idtema,numerosesion,nombrecorto,nombrelargo"); 
	$query=$this->db->order_by("numerosesion asc","unidad asc")->get('tema1');
	 return $query;
	}








 	function temase( $idevento){
 		$tema = $this->db->query('select tema1.*,evento.idevento from tema1,evento where tema1.idsilabo=evento.idsilabo and evento.idevento="'. $idevento.'" order by numerosesion');
 		return $tema;
 	}






 	function temas( $idunidadsilabo){
 		$tema = $this->db->query('select * from tema where idunidadsilabo="'. $idunidadsilabo.'" order by numerosesion');
 		return $tema;
 	}



 	function temas1( $idunidadsilabo){
 		$tema = $this->db->query('select * from tema1 where idunidadsilabo="'. $idunidadsilabo.'" order by numerosesion');
 		return $tema;
 	}
 	function temas2( $idunidadsilabo){
 		$tema = $this->db->query('select * from tema2 where idunidadsilabo="'. $idunidadsilabo.'" order by numerosesion');
 		return $tema;
 	}




 	function tema( $id){
 		$tema = $this->db->query('select * from tema0 where idtema="'. $id.'"');
 		return $tema;
 	}

 	function save($array)
 	{


		$condition ="idunidadsilabo="."'". $array['idunidadsilabo']."'";
		$this->db->select('*');
		$this->db->from('unidadsilabo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{	
			$condition ="idsilabo="."'". $query->result()[0]->idsilabo."' and  numerosesion=". "'".$array['numerosesion']."'";
			$this->db->select('*');
			$this->db->from('tema1');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if($query->num_rows()==0)
			{	
				$this->db->insert("tema", $array);
				if($this->db->affected_rows()>0)
				{
					return $this->db->insert_id();
				}else{
					return 0;
				}
			}else{
					return $query->result()[0]->idtema;;
				}
		}else{
			return 0;
		}
	

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtema',$id);
 		$this->db->update('tema',$array_item);
		return $id;
	}
 


 	public function quitar($id)
	{
 	//	$this->db->where('idtema',$id);
	//	$this->db->delete('tema');
    	//	if($this->db->affected_rows()==1)
	//		$result=true;
	//	else
	//		$result=false;


		$this->db->trans_start();
		$condition = "idtema =" . $id ;
		$this->db->select('*');
		$this->db->from('tema0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
	 		  	$this->db->where('idtema',$id);
				$this->db->update('tema', array('eliminado'=>1));
		    		//$this->db->delete('participante');
           				 $this->db->trans_complete();
			      		$result=true;
      	}else{	

            $this->db->trans_complete();
			      $result=false;
   	}





		return $result;
 	}


public function get_tema($id){
	$condition = "idtema =" .  $id ;
	$this->db->select('*');
	$this->db->from('tema');
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
		$query=$this->db->order_by("idtema")->get('tema');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtema")->get('tema0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tema = $this->db->select("idtema")->order_by("idtema")->get('tema0')->result_array();
		$arr=array("idtema"=>$id);
		$clave=array_search($arr,$tema);
	   if(array_key_exists($clave+1,$tema))
		 {

 		$tema = $this->db->query('select * from tema where idtema="'. $tema[$clave+1]["idtema"].'"');
		 }else{

 		$tema = $this->db->query('select * from tema where idtema="'. $id.'"');
		 }
		 	
 		return $tema;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tema = $this->db->select("idtema")->order_by("idtema")->get('tema0')->result_array();
		$arr=array("idtema"=>$id);
		$clave=array_search($arr,$tema);
	   if(array_key_exists($clave-1,$tema))
		 {

 		$tema = $this->db->query('select * from tema0 where idtema="'. $tema[$clave-1]["idtema"].'"');
		 }else{

 		$tema = $this->db->query('select * from tema0 where idtema="'. $id.'"');
		 }
		 	
 		return $tema;
 	}



	function lista_temaes_con_inscripciones(){
		 $this->db->select('tema.*');
		 $this->db->from('tema0,evento');
		 $this->db->where('evento.idtema=tema.idtema and evento.idevento_estado=2');
		 $tema= $this->db->get();
		 return $tema;
	}




}
