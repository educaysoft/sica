<?php

class Portafolioestudiante extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('portafolioestudiante_model');
      $this->load->model('tipodocu_model');
      $this->load->model('estudiante_model');
      $this->load->model('persona_model');
      $this->load->model('portafoliomodelo_model');
      $this->load->model('ordenador_model');
      $this->load->model('directorio_model');
      $this->load->model('documento_model');
  	 $this->load->model('estado_portafolio_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['portafolioestudiante'] = $this->portafolioestudiante_model->elprimero();
  		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  		$data['estado_portafolios']= $this->estado_portafolio_model->lista_estado_portafolio()->result();
			
		$data['title']="Lista de portafolioestudiantees";
		$this->load->view('template/page_header');
		$this->load->view('portafolioestudiante_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }




public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['portafolioestudiante'] = $this->portafolioestudiante_model->portafolioestudiante($this->uri->segment(3))->row_array();
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['estado_portafolios']= $this->estado_portafolio_model->lista_estado_portafolio()->result();
	$data['title']="Modulo de Portafolioestudiantes";
	$this->load->view('template/page_header');		
	$this->load->view('portafolioestudiante_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}






public function add()
{
		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  		$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  		$data['estado_portafolios']= $this->estado_portafolio_model->lista_estado_portafolio()->result();
		$data['title']="Nueva Portafolioestudiante";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('portafolioestudiante_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idestudiante' => $this->input->post('idestudiante'),
			'idportafoliomodelo' => $this->input->post('idportafoliomodelo'),
			'idestado_portafolio' => $this->input->post('idestado_portafolio'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->portafolioestudiante_model->save($array_item);
	 	redirect('portafolioestudiante');
 	}



public function edit()
{
	 	$data['portafolioestudiante'] = $this->portafolioestudiante_model->portafolioestudiante($this->uri->segment(3))->row_array();
		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  		$data['estado_portafolios']= $this->estado_portafolio_model->lista_estado_portafolio()->result();
 	 	$data['title'] = "Actualizar Portafolioestudiante";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('portafolioestudiante_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idportafolioestudiante');
	 	$array_item=array(
		 	
		 	'idportafolioestudiante' => $this->input->post('idportafolioestudiante'),
		 	'numero' => $this->input->post('numero'),
			'idestudiante' => $this->input->post('idestudiante'),
			'idportafoliomodelo' => $this->input->post('idportafoliomodelo'),
			'idestado_portafolio' => $this->input->post('idestado_portafolio'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->portafolioestudiante_model->update($id,$array_item);
	 	redirect('portafolioestudiante');
 	}





	public function  save_edit2()
	{	
		$id=$this->input->post('idportafolioestudiante');
	 	$array_item=array(
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	echo $this->portafolioestudiante_model->update($id,$array_item);
 	}





 	public function delete()
 	{
 		$data=$this->portafolioestudiante_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('portafolioestudiante/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
	  $data['title']="Portafolioestudiantes";
		$this->load->view('template/page_header');		
	  $this->load->view('portafolioestudiante_list',$data);
		$this->load->view('template/page_footer');
	}


	function portafolioestudiante_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->portafolioestudiante_model->lista_portafolioestudiantesA();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idportafolioestudiante,$r->elestudiante,$r->eldocumento,$r->elestado,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('portafolioestudiante/actual').'"  data-idportafolioestudiante="'.$r->idportafolioestudiante.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();

	}



	public function listar_estu()
	{
		

		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
		$data['personas']= $this->persona_model->lista_personasA()->result();
	  $data['title']="Portafolioestudiantes";
		$this->load->view('template/page_header');		
		$data['personas']= $this->persona_model->lista_personasA()->result();
	  $this->load->view('portafolioestudiante_estu',$data);
		$this->load->view('template/page_footer');
	}


	function portafolioestudiante_data_estu()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->portafolioestudiante_model->lista_portafolioestudiantesA();
			$data=array();
			foreach($data0->result() as $r){

				if($r->iddocumento==null){	
				$data[]=array($r->idportafolioestudiante,$r->elestudiante,$r->eldocumento,$r->archivopdf,$r->elestado,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_cargar"  data-idportafolioestudiante="'.$r->idportafolioestudiante.'"     data-idpersona="'.$r->idpersona.'"   data-elestudiante="'.$r->elestudiante.'"  data-eldocumento="'.$r->eldocumento.'">Cargar</a>');
				}else{
				$data[]=array($r->idportafolioestudiante,$r->elestudiante,$r->eldocumento,$r->archivopdf,$r->elestado,	$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">download</a>');
	



				}
				
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();

	}




















public function reportepdf()
{
	
	 $data['portafolioestudiante'] = $this->portafolioestudiante_model->lista_portafolioestudiantesA()->result();
	$this->load->view('template/page_header');		
  $this->load->view('portafolioestudiante_reportepdf',$data);
	$this->load->view('template/page_footer');
}






public function elprimero()
{
	$data['portafolioestudiante'] = $this->portafolioestudiante_model->elprimero();
  if(!empty($data))
  {
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['estado_portafolios']= $this->estado_portafolio_model->lista_estado_portafolio()->result();
    $data['title']="Portafolioestudiante";
    $this->load->view('template/page_header');		
    $this->load->view('portafolioestudiante_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['portafolioestudiante'] = $this->portafolioestudiante_model->elultimo();
  if(!empty($data))
  {
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  	$data['estado_portafolios']= $this->estado_portafolio_model->lista_estado_portafolio()->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
    $data['title']="Portafolioestudiante";
  
    $this->load->view('template/page_header');		
    $this->load->view('portafolioestudiante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['portafolioestudiante_list']=$this->portafolioestudiante_model->lista_portafolioestudiante()->result();
	$data['portafolioestudiante'] = $this->portafolioestudiante_model->siguiente($this->uri->segment(3))->row_array();
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['estado_portafolios']= $this->estado_portafolio_model->lista_estado_portafolio()->result();
  $data['title']="Portafolioestudiante";
	$this->load->view('template/page_header');		
  $this->load->view('portafolioestudiante_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['portafolioestudiante_list']=$this->portafolioestudiante_model->lista_portafolioestudiante()->result();
	$data['portafolioestudiante'] = $this->portafolioestudiante_model->anterior($this->uri->segment(3))->row_array();
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  	$data['estado_portafolios']= $this->estado_portafolio_model->lista_estado_portafolio()->result();
  $data['title']="Portafolioestudiante";
	$this->load->view('template/page_header');		
  $this->load->view('portafolioestudiante_record',$data);
	$this->load->view('template/page_footer');
}




}
