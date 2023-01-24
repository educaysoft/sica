<?php

class Documentoportafolio extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('documento_model');
  	  $this->load->model('portafolio_model');
  	  $this->load->model('documentoportafolio_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['documentoportafolio']=$this->documentoportafolio_model->lista_documentoportafolios()->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolios']= $this->portafolio_model->lista_portafoliosA()->result();
			
		$data['title']="Lista de documentoportafolios";
		$this->load->view('template/page_header');
		$this->load->view('documentoportafolio_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{
		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['portafolios']= $this->portafolio_model->lista_portafoliosA()->result();
		$data['title']="Nueva Documentoportafolio";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documentoportafolio_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'iddocumento' => $this->input->post('iddocumento'),
			'idportafolio' => $this->input->post('idportafolio'),
	 	);
	 	$this->documentoportafolio_model->save($array_item);
	 	redirect('documentoportafolio');
 	}



public function edit()
{
	 	$data['documentoportafolio'] = $this->documentoportafolio_model->documentoportafolio($this->uri->segment(3))->row_array();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['portafolios']= $this->portafolio_model->lista_portafolios()->result();
 	 	$data['title'] = "Actualizar Documentoportafolio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documentoportafolio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumentoportafolio');
	 	$array_item=array(
		 	
		 	'iddocumentoportafolio' => $this->input->post('iddocumentoportafolio'),
			'iddocumento' => $this->input->post('iddocumento'),
			'idportafolio' => $this->input->post('idportafolio'),
	 	);
	 	$this->documentoportafolio_model->update($id,$array_item);
	 	redirect('documentoportafolio');
 	}


 	public function delete()
 	{
 		$data=$this->documentoportafolio_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documentoportafolio/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Documentoportafolios";
	$this->load->view('template/page_header');		
  $this->load->view('documentoportafolio_list',$data);
	$this->load->view('template/page_footer');
}



function documentoportafolio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->documentoportafolio_model->lista_documentoportafoliosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocumentoportafolio,$r->iddocumento,$r->asunto,$r->fechaelaboracion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('documentoportafolio/actual').'"  data-iddocumentoportafolio="'.$r->iddocumentoportafolio.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



	function asignaturadocumento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$iddocumentoportafolio=$this->input->get('iddocumentoportafolio');
			$data0 =$this->asignaturadocumento_model->lista_asignaturadocumentos($iddocumentoportafolio);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentoportafolio,$r->idasignaturadocumento,$r->laasignatura,$r->paralelo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('asignaturadocumento/actual').'"    data-idasignaturadocumento="'.$r->idasignaturadocumento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}





	function documento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idpersona=$this->input->get('idpersona');
			$data0 =$this->documento_model->lista_documentosC($idpersona);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumento,$r->idpersona,$r->asunto,$r->fechaelaboracion,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('documento/actual').'"    data-iddocumento="'.$r->iddocumento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}






public function actual()
{
	$data['documentoportafolio'] = $this->documentoportafolio_model->documentoportafolio($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolios']= $this->portafolio_model->lista_portafolios()->result();
	  if(!empty($data))
	  {
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
    $data['title']="Documentoportafolio";
    $this->load->view('template/page_header');		
    $this->load->view('documentoportafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{
  	$data['portafolios']= $this->portafolio_model->lista_portafolios()->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['documentoportafolio'] = $this->documentoportafolio_model->elprimero();
	  if(!empty($data))
	  {
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
    $data['title']="Documentoportafolio";
    $this->load->view('template/page_header');		
    $this->load->view('documentoportafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['documentoportafolio'] = $this->documentoportafolio_model->elultimo();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolios']= $this->portafolio_model->lista_portafolios()->result();
  if(!empty($data))
  {
    $data['title']="Documentoportafolio";
  
    $this->load->view('template/page_header');		
    $this->load->view('documentoportafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['documentoportafolio_list']=$this->documentoportafolio_model->lista_documentoportafolio()->result();
	$data['documentoportafolio'] = $this->documentoportafolio_model->siguiente($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolios']= $this->portafolio_model->lista_portafolios()->result();
  

$data['title']="Documentoportafolio";
	$this->load->view('template/page_header');		
  $this->load->view('documentoportafolio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['documentoportafolio_list']=$this->documentoportafolio_model->lista_documentoportafolio()->result();
	$data['documentoportafolio'] = $this->documentoportafolio_model->anterior($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolios']= $this->portafolio_model->lista_portafolios()->result();
  $data['title']="Documentoportafolio";
	$this->load->view('template/page_header');		
  $this->load->view('documentoportafolio_record',$data);
	$this->load->view('template/page_footer');
}




}
