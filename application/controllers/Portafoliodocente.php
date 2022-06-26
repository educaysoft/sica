<?php

class Portafoliodocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('portafoliodocente_model');
      $this->load->model('tipodocu_model');
      $this->load->model('docente_model');
      $this->load->model('persona_model');
      $this->load->model('portafoliomodelo_model');
      $this->load->model('ordenador_model');
      $this->load->model('directorio_model');
      $this->load->model('documento_model');
  	 $this->load->model('portafolioestado_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['portafoliodocente'] = $this->portafoliodocente_model->elprimero();
  		$data['docentes']= $this->docente_model->lista_docentesA()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  		$data['portafolioestados']= $this->portafolioestado_model->lista_portafolioestado()->result();
			
		$data['title']="Lista de portafoliodocentees";
		$this->load->view('template/page_header');
		$this->load->view('portafoliodocente_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }




public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['portafoliodocente'] = $this->portafoliodocente_model->portafoliodocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolioestados']= $this->portafolioestado_model->lista_portafolioestado()->result();
	$data['title']="Modulo de Portafoliodocentes";
	$this->load->view('template/page_header');		
	$this->load->view('portafoliodocente_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}






public function add()
{
		$data['docentes']= $this->docente_model->lista_docentesA()->result();
  		$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  		$data['portafolioestados']= $this->portafolioestado_model->lista_portafolioestado()->result();
		$data['title']="Nueva Portafoliodocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('portafoliodocente_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'iddocente' => $this->input->post('iddocente'),
			'idportafoliomodelo' => $this->input->post('idportafoliomodelo'),
			'idportafolioestado' => $this->input->post('idportafolioestado'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->portafoliodocente_model->save($array_item);
	 	redirect('portafoliodocente');
 	}



public function edit()
{
	 	$data['portafoliodocente'] = $this->portafoliodocente_model->portafoliodocente($this->uri->segment(3))->row_array();
		$data['docentes']= $this->docente_model->lista_docentesA()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  		$data['portafolioestados']= $this->portafolioestado_model->lista_portafolioestado()->result();
 	 	$data['title'] = "Actualizar Portafoliodocente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('portafoliodocente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idportafoliodocente');
	 	$array_item=array(
		 	
		 	'idportafoliodocente' => $this->input->post('idportafoliodocente'),
		 	'numero' => $this->input->post('numero'),
			'iddocente' => $this->input->post('iddocente'),
			'idportafoliomodelo' => $this->input->post('idportafoliomodelo'),
			'idportafolioestado' => $this->input->post('idportafolioestado'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->portafoliodocente_model->update($id,$array_item);
	 	redirect('portafoliodocente');
 	}





	public function  save_edit2()
	{	
		$id=$this->input->post('idportafoliodocente');
	 	$array_item=array(
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	echo $this->portafoliodocente_model->update($id,$array_item);
 	}





 	public function delete()
 	{
 		$data=$this->portafoliodocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('portafoliodocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
	  $data['title']="Portafoliodocentes";
		$this->load->view('template/page_header');		
	  $this->load->view('portafoliodocente_list',$data);
		$this->load->view('template/page_footer');
	}


	function portafoliodocente_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->portafoliodocente_model->lista_portafoliodocentesA();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idportafoliodocente,$r->eldocente,$r->eldocumento,$r->elestado,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('portafoliodocente/actual').'"  data-idportafoliodocente="'.$r->idportafoliodocente.'">Ver</a>');
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
	  $data['title']="Portafoliodocentes";
		$this->load->view('template/page_header');		
		$data['personas']= $this->persona_model->lista_personasA()->result();
	  $this->load->view('portafoliodocente_estu',$data);
		$this->load->view('template/page_footer');
	}


	function portafoliodocente_data_estu()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->portafoliodocente_model->lista_portafoliodocentesA();
			$data=array();
			foreach($data0->result() as $r){

				if($r->iddocumento==null){	
				$data[]=array($r->idportafoliodocente,$r->eldocente,$r->eldocumento,$r->archivopdf,$r->elestado,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_cargar"  data-idportafoliodocente="'.$r->idportafoliodocente.'"     data-idpersona="'.$r->idpersona.'"   data-eldocente="'.$r->eldocente.'"  data-eldocumento="'.$r->eldocumento.'">Cargar</a>');
				}else{
				$data[]=array($r->idportafoliodocente,$r->eldocente,$r->eldocumento,$r->archivopdf,$r->elestado,	$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">download</a>');
	



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
	
	 $data['portafoliodocente'] = $this->portafoliodocente_model->lista_portafoliodocentesA()->result();
	$this->load->view('template/page_header');		
  $this->load->view('portafoliodocente_reportepdf',$data);
	$this->load->view('template/page_footer');
}






public function elprimero()
{
	$data['portafoliodocente'] = $this->portafoliodocente_model->elprimero();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolioestados']= $this->portafolioestado_model->lista_portafolioestado()->result();
    $data['title']="Portafoliodocente";
    $this->load->view('template/page_header');		
    $this->load->view('portafoliodocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['portafoliodocente'] = $this->portafoliodocente_model->elultimo();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  	$data['portafolioestados']= $this->portafolioestado_model->lista_portafolioestado()->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
    $data['title']="Portafoliodocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('portafoliodocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['portafoliodocente_list']=$this->portafoliodocente_model->lista_portafoliodocente()->result();
	$data['portafoliodocente'] = $this->portafoliodocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolioestados']= $this->portafolioestado_model->lista_portafolioestado()->result();
  $data['title']="Portafoliodocente";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliodocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['portafoliodocente_list']=$this->portafoliodocente_model->lista_portafoliodocente()->result();
	$data['portafoliodocente'] = $this->portafoliodocente_model->anterior($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafoliomodelos']= $this->portafoliomodelo_model->lista_portafoliomodelos()->result();
  	$data['portafolioestados']= $this->portafolioestado_model->lista_portafolioestado()->result();
  $data['title']="Portafoliodocente";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliodocente_record',$data);
	$this->load->view('template/page_footer');
}




}
