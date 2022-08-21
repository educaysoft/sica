<?php

class Silabo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('silabo_model');
      $this->load->model('unidadsilabo_model');
      $this->load->model('documentosilabo_model');
      $this->load->model('documento_model');
  	$this->load->model('asignatura_model');


//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/silabo
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['silabo']=$this->silabo_model->elultimo();
			$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
  		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
			$data['title']="Lista de silaboes";
			$this->load->view('template/page_header');
			$this->load->view('silabo_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
			$data['title']="Nueva silabo";
			$this->load->view('template/page_header');		
			$this->load->view('silabo_form',$data);
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
	 	$this->silabo_model->save($array_item);
	 	redirect('silabo');
 	}



	public function edit()
	{
			$data['silabo'] = $this->silabo_model->silabo($this->uri->segment(3))->row_array();
			$data['title'] = "Actualizar silabo";
			$this->load->view('template/page_header');		
			$this->load->view('silabo_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idsilabo');
	 	$array_item=array(
		 	
		 	'idsilabo' => $this->input->post('idsilabo'),
	 		'descripcion' => $this->input->post('descripcion'),
		 	'nombre' => $this->input->post('nombre'),
	 		'duracion' => $this->input->post('duracion'),
	 		'linkdetalle' => $this->input->post('linkdetalle'),
	 	);
	 	$this->silabo_model->update($id,$array_item);
	 	redirect('silabo/actual/'.$id);
 	}


 	public function delete()
 	{
 		$this->silabo_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('silabo/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
	  $data['title']="Silabo";
		$this->load->view('template/page_header');		
	  $this->load->view('silabo_list',$data);
		$this->load->view('template/page_footer');
	}



function silabo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->silabo_model->lista_silabos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idsilabo,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('silabo/actual').'"    data-idsilabo="'.$r->idsilabo.'">Ver</a>');
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
	
	$data['silabos'] = $this->silabo_model->lista_silabos()->result();
  	$data['title']="Silabo";
	$this->load->view('template/page_header');		
  	$this->load->view('silabos/silabos',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('idsilabo'=>$_GET['idsilabo'],'idevento'=>$_GET['idevento']);	
	$data['silabo'] = $this->silabo_model->silabo($_GET['idsilabo'])->row_array();
	$data['unidadsilabos'] = $this->unidadsilabo_model->lista_unidades($_GET['idsilabo'])->result();
  	$data['title']="Silabo";
	$this->load->view('template/page_header');		
 	$this->load->view('silabos/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}




public function actual()
{
	$data['silabo'] = $this->silabo_model->silabo($this->uri->segment(3))->row_array();
			$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
			$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Silabo";
    $this->load->view('template/page_header');		
    $this->load->view('silabo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }




public function elprimero()
{
	$data['silabo'] = $this->silabo_model->elprimero();
			$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Silabo";
    $this->load->view('template/page_header');		
    $this->load->view('silabo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['silabo'] = $this->silabo_model->elultimo();
			$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Silabo";
  
    $this->load->view('template/page_header');		
    $this->load->view('silabo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['silabo_list']=$this->silabo_model->lista_silabo()->result();
	$data['silabo'] = $this->silabo_model->siguiente($this->uri->segment(3))->row_array();
	$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['title']="Silabo";
	$this->load->view('template/page_header');		
  	$this->load->view('silabo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['silabo_list']=$this->silabo_model->lista_silabo()->result();
	$data['silabo'] = $this->silabo_model->anterior($this->uri->segment(3))->row_array();
	$data['documentosilabos']= $this->documentosilabo_model->listar_documentosilabo1($data['silabo']['idsilabo'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['title']="Silabo";
	$this->load->view('template/page_header');		
  	$this->load->view('silabo_record',$data);
	$this->load->view('template/page_footer');
}

}
