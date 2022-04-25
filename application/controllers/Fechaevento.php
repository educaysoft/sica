<?php
class Fechaevento extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('fechaevento_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['fechaevento'] = $this->fechaevento_model->elultimo();

 		// print_r($data['fechaevento_list']);
  		$data['title']="Lista de Fechaeventoes";
		$this->load->view('template/page_header');		
  		$this->load->view('fechaevento_record',$data);
		$this->load->view('template/page_footer');
	}



public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['fechaevento'] = $this->fechaevento_model->fechaevento($this->uri->segment(3))->row_array();

	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['title']="Fechaevento del documento";
 
	$data['title']="Modulo de Personas";
	$this->load->view('template/page_header');		
	$this->load->view('fechaevento_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}




	public function add()
	{



	     $idevento=$this->uri->segment(3);

	    if(!isset($idevento)){
	      $idevento=0;
	    }else{
	     $data["idevento"]=$idevento;
	   }

		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['title']="Nuevo Fechaevento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('fechaevento_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'tema' => $this->input->post('tema'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idevento' => $this->input->post('idevento'),
	 	);
	 	$result=$this->fechaevento_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Fecha para este evento ya fue asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 
 	}



	public function edit()
	{
	 	$data['fechaevento'] = $this->fechaevento_model->fechaevento($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Fechaevento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('fechaevento_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idfechaevento');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->fechaevento_model->update($id,$array_item);
	 	redirect('fechaevento');
 	}



 	public function delete()
 	{
 		$data=$this->fechaevento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('fechaevento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
  $data['title']="Fecha de evento";
	$this->load->view('template/page_header');		
  $this->load->view('fechaevento_list',$data);
	$this->load->view('template/page_footer');
}



function fechaevento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->fechaevento_model->listar_fechaevento1();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idfechaevento,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('fechaevento/actual').'"   data-iddirectorio="'.$r->idfechaevento.'">Ver</a>');
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
	$data['fechaevento'] = $this->fechaevento_model->elprimero();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Fechaevento del documento";
    $this->load->view('template/page_header');		
    $this->load->view('fechaevento_record',$data);
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
	$data['fechaevento'] = $this->fechaevento_model->elultimo();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Fechaevento del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('fechaevento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['fechaevento_list']=$this->fechaevento_model->lista_fechaevento()->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['fechaevento'] = $this->fechaevento_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Fechaevento del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('fechaevento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['fechaevento_list']=$this->fechaevento_model->lista_fechaevento()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['fechaevento'] = $this->fechaevento_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Fechaevento del documento";
	$this->load->view('template/page_header');		
  $this->load->view('fechaevento_record',$data);
	$this->load->view('template/page_footer');
}

















}
