<?php

class Tema extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tema_model');
      $this->load->model('unidadtema_model');
      $this->load->model('cursodocumento_model');
      $this->load->model('documento_model');
}

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/tema
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['tema']=$this->tema_model->elultimo();
			$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['tema']['idtema'])->result();
			$data['title']="Lista de temaes";
			$this->load->view('template/page_header');
			$this->load->view('tema_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
			$data['title']="Nueva tema";
			$this->load->view('template/page_header');		
			$this->load->view('tema_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	'descripcion' => $this->input->post('descripcion'),
	 	'duracion' => $this->input->post('duracion'),
	 	'linkdetalle' => $this->input->post('linkdetalle'),
	 	);
	 	$this->tema_model->save($array_item);
	 	redirect('tema');
 	}



	public function edit()
	{
			$data['tema'] = $this->tema_model->tema($this->uri->segment(3))->row_array();
			$data['title'] = "Actualizar tema";
			$this->load->view('template/page_header');		
			$this->load->view('tema_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idtema');
	 	$array_item=array(
		 	
		 	'idtema' => $this->input->post('idtema'),
	 		'descripcion' => $this->input->post('descripcion'),
		 	'nombre' => $this->input->post('nombre'),
	 		'duracion' => $this->input->post('duracion'),
	 		'linkdetalle' => $this->input->post('linkdetalle'),
	 	);
	 	$this->tema_model->update($id,$array_item);
	 	redirect('tema/actual/'.$id);
 	}


 	public function delete()
 	{
 		$this->tema_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('tema/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
	  $data['title']="Tema";
		$this->load->view('template/page_header');		
	  $this->load->view('tema_list',$data);
		$this->load->view('template/page_footer');
	}



function tema_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tema_model->lista_temas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtema,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('tema/actual').'"    data-idtema="'.$r->idtema.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



public function panel()
{
	
	$data['temas'] = $this->tema_model->lista_temas()->result();
  	$data['title']="Tema";
	$this->load->view('template/page_header');		
  	$this->load->view('temas/temas',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('idtema'=>$_GET['idtema'],'idevento'=>$_GET['idevento']);	
	$data['tema'] = $this->tema_model->tema($_GET['idtema'])->row_array();
	$data['unidadtemas'] = $this->unidadtema_model->lista_unidades($_GET['idtema'])->result();
  	$data['title']="Tema";
	$this->load->view('template/page_header');		
 	$this->load->view('temas/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}




public function actual()
{
	$data['tema'] = $this->tema_model->tema($this->uri->segment(3))->row_array();
			$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['tema']['idtema'])->result();
			$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Tema";
    $this->load->view('template/page_header');		
    $this->load->view('tema_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }




public function elprimero()
{
	$data['tema'] = $this->tema_model->elprimero();
			$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['tema']['idtema'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Tema";
    $this->load->view('template/page_header');		
    $this->load->view('tema_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['tema'] = $this->tema_model->elultimo();
			$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['tema']['idtema'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Tema";
  
    $this->load->view('template/page_header');		
    $this->load->view('tema_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tema_list']=$this->tema_model->lista_tema()->result();
	$data['tema'] = $this->tema_model->siguiente($this->uri->segment(3))->row_array();
	$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['tema']['idtema'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['title']="Tema";
	$this->load->view('template/page_header');		
  	$this->load->view('tema_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tema_list']=$this->tema_model->lista_tema()->result();
	$data['tema'] = $this->tema_model->anterior($this->uri->segment(3))->row_array();
	$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['tema']['idtema'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['title']="Tema";
	$this->load->view('template/page_header');		
  	$this->load->view('tema_record',$data);
	$this->load->view('template/page_footer');
}

}
