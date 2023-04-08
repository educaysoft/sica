<?php
class Visitante extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('visitante_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('visitanteestado_model');
      		$this->load->model('nivelvisitante_model');
      		$this->load->model('tipoparticipacion_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['visitanteestado']= $this->visitanteestado_model->lista_visitanteestados()->result();
  		$data['nivelvisitante']= $this->nivelvisitante_model->lista_nivelvisitantes()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['visitante'] = $this->visitante_model->elultimo();
		$data['evento'] = $this->evento_model->evento($data['visitante']['idevento'])->row_array();
  		$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();

 		// print_r($data['visitante_list']);
  		$data['title']="Lista de Visitantees";
		$this->load->view('template/page_header');		
  		$this->load->view('visitante_record',$data);
		$this->load->view('template/page_footer');
	}


public function actual(){
 if(isset($this->session->userdata['logged_in'])){
 
   	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
	$data['tipoparticipacion']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
  	$data['visitanteestado']= $this->visitanteestado_model->lista_visitanteestados()->result();
  	$data['nivelvisitante']= $this->nivelvisitante_model->lista_nivelvisitantes()->result();
	$data['personas']= $this->persona_model->lista_personas()->result();
 
 
   	$data['visitante']=$this->visitante_model->visitante($this->uri->segment(3))->row_array();
	$data['evento'] = $this->evento_model->evento($data['visitante']['idevento'])->row_array();
	$data['title']="Esta viendo el Visitante # :";
	$this->load->view('template/page_header');		
	$this->load->view('visitante_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}




	public function add()
	{

		if($this->uri->segment(3)){
			$data['eventos']= $this->evento_model->lista_eventos_open($this->uri->segment(3))->result();
		}else{
			$data['eventos']= $this->evento_model->lista_eventos_open(0)->result();
		}



		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['visitanteestado']= $this->visitanteestado_model->lista_visitanteestados()->result();
  		$data['nivelvisitante']= $this->nivelvisitante_model->lista_nivelvisitantes()->result();
		$data['title']="Nuevo Visitante";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('visitante_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'idvisitanteestado' => $this->input->post('idvisitanteestado'),
			'idnivelvisitante'=>$this->input->post('idnivelvisitante'),
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'grupoletra' => $this->input->post('grupoletra'),
	 	);
	 	$result=$this->visitante_model->save($array_item);
	 	if(!$result)
		{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> alert('Visitante ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
	 	$data['visitante'] = $this->visitante_model->visitante($this->uri->segment(3))->row_array();
  		$data['visitanteestado']= $this->visitanteestado_model->lista_visitanteestados()->result();
  		$data['nivelvisitante']= $this->nivelvisitante_model->lista_nivelvisitantes()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Visitante";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('visitante_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idvisitante');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idvisitanteestado' => $this->input->post('idvisitanteestado'),
			'idnivelvisitante'=>$this->input->post('idnivelvisitante'),
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'grupoletra' => $this->input->post('grupoletra'),
	 	);
	 	$result=$this->visitante_model->update($id,$array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Persona ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}

 	}

	public function  save_edit2()
	{
		$id=$this->input->post('idvisitante');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'grupoletra' => $this->input->post('grupoletra'),
	 	);
	 	echo $this->visitante_model->update($id,$array_item);
 	}



 	public function delete()
 	{
    $idvisitante=$_GET['idvisitante'];
    $idevento=$_GET['idevento'];

 		$data=$this->visitante_model->delete($idvisitante,$idevento);
 		echo json_encode($data);
	 	redirect('visitante/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


 	public function quitar()
 	{
	       $idvisitante=0;	
		if($this->uri->segment(3))
		{
   		 $idvisitante= $this->uri->segment(3);  
		}

 		$result=$this->visitante_model->quitar($idvisitante);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('No se eliminio'); </script>";
			echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}else{
			echo "<script language='JavaScript'> alert('Se quito con existo este visitante'); </script>";
				echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}
}








public function listar()
{
	
  $data['visitante'] = $this->visitante_model->listar_visitante1()->result();
  $data['title']="visitantes";
  $data['eventos']= $this->evento_model->lista_eventos()->result();
	$this->load->view('template/page_header');		
  $this->load->view('visitante_list',$data);
	$this->load->view('template/page_footer');
}



function visitante_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->visitante_model->listar_visitante1();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idvisitante,$r->elevento,$r->nombres,$r->grupoletra,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('visitante/actual').'"    data-idvisitante="'.$r->idvisitante.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}





public function listarxevento()
{
	
  $data['visitante'] = $this->visitante_model->listar_visitante1()->result();
  $data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="visitantes";
   $data['filtro']= $this->uri->segment(3);
	$this->load->view('template/page_header');		
  $this->load->view('visitante_listxevento',$data);
	$this->load->view('template/page_footer');
}



function visitante_dataxevento()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		$id=$this->input->get('idevento');


	 	$data0 = $this->visitante_model->listar_visitanteB($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idvisitante,$r->elevento,$r->nombres,$r->grupoletra,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('visitante/actual').'"    data-idvisitante="'.$r->idvisitante.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}










public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['visitanteestado']= $this->visitanteestado_model->lista_visitanteestados()->result();
  		$data['nivelvisitante']= $this->nivelvisitante_model->lista_nivelvisitantes()->result();
	$data['visitante'] = $this->visitante_model->elprimero();
	$data['evento'] = $this->evento_model->evento($data['visitante']['idevento'])->row_array();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Visitante del documento";
    $this->load->view('template/page_header');		
    $this->load->view('visitante_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['visitanteestado']= $this->visitanteestado_model->lista_visitanteestados()->result();
  		$data['nivelvisitante']= $this->nivelvisitante_model->lista_nivelvisitantes()->result();
	$data['visitante'] = $this->visitante_model->elultimo();
	$data['evento'] = $this->evento_model->evento($data['visitante']['idevento'])->row_array();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Visitante del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('visitante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['visitante_list']=$this->visitante_model->lista_visitante()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['visitanteestado']= $this->visitanteestado_model->lista_visitanteestados()->result();
  		$data['nivelvisitante']= $this->nivelvisitante_model->lista_nivelvisitantes()->result();
	$data['visitante'] = $this->visitante_model->siguiente($this->uri->segment(3))->row_array();
	$data['evento'] = $this->evento_model->evento($data['visitante']['idevento'])->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Visitante del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('visitante_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['visitante_list']=$this->visitante_model->lista_visitante()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['visitanteestado']= $this->visitanteestado_model->lista_visitanteestados()->result();
  		$data['nivelvisitante']= $this->nivelvisitante_model->lista_nivelvisitantes()->result();
	$data['visitante'] = $this->visitante_model->anterior($this->uri->segment(3))->row_array();
	$data['evento'] = $this->evento_model->evento($data['visitante']['idevento'])->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Visitante del documento";
	$this->load->view('template/page_header');		
  $this->load->view('visitante_record',$data);
	$this->load->view('template/page_footer');
}




public function get_visitante() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idpersona')) {
        $this->db->select('*');
        $this->db->where('idpersona',  $this->input->post('idpersona'));
        $this->db->where('idevento', $this->input->post('idevento'));
        $query = $this->db->get('visitante');
	$data=$query->result();
	echo json_encode($data);
	}
}












}
