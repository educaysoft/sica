<?php

class Curso extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('silabo_model');
      $this->load->model('unidadsilabo_model');
      $this->load->model('cursodocumento_model');
      $this->load->model('documento_model');
      $this->load->model('tema_model');
      $this->load->model('pregunta_model');
      $this->load->model('respuesta_model');
      $this->load->model('videotutorial_model');
}

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/curso
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['curso']=$this->curso_model->elultimo();
			$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['curso']['idcurso'])->result();
			$data['title']="Lista de cursoes";
			$this->load->view('template/page_header');
			$this->load->view('curso_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
			$data['title']="Nueva curso";
			$this->load->view('template/page_header');		
			$this->load->view('curso_form',$data);
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
	 	$this->curso_model->save($array_item);
	 	redirect('curso');
 	}



	public function edit()
	{
			$data['curso'] = $this->curso_model->curso($this->uri->segment(3))->row_array();
			$data['title'] = "Actualizar curso";
			$this->load->view('template/page_header');		
			$this->load->view('curso_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idcurso');
	 	$array_item=array(
		 	
		 	'idcurso' => $this->input->post('idcurso'),
	 		'descripcion' => $this->input->post('descripcion'),
		 	'nombre' => $this->input->post('nombre'),
	 		'duracion' => $this->input->post('duracion'),
	 		'linkdetalle' => $this->input->post('linkdetalle'),
	 	);
	 	$this->curso_model->update($id,$array_item);
	 	redirect('curso/actual/'.$id);
 	}


 	public function delete()
 	{
 		$this->curso_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('curso/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
	  $data['title']="Curso";
		$this->load->view('template/page_header');		
	  $this->load->view('curso_list',$data);
		$this->load->view('template/page_footer');
	}



function curso_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->curso_model->lista_cursos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcurso,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('curso/actual').'"    data-idcurso="'.$r->idcurso.'">Ver</a>');
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
	
	$data['cursos'] = $this->curso_model->lista_cursos()->result();
  	$data['title']="Curso";
	$this->load->view('template/page_header');		
  	$this->load->view('cursos/cursos',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('idsilabo'=>$_GET['idsilabo'],'idevento'=>$_GET['idevento']);	
	$data['silabo'] = $this->silabo_model->silabo($_GET['idsilabo'])->row_array();
	$data['unidadsilabo'] = $this->unidadsilabo_model->lista_unidades($_GET['idsilabo'])->result();
  	$data['title']="Curso";
	$this->load->view('template/page_header');		
 	$this->load->view('cursos/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}



public function evaluar()
{
  	$data['evento']=array('idsilabo'=>$_GET['idsilabo'],'idevento'=>$_GET['idevento'],'idtema'=>$_GET['idtema']);	
	$data['silabo'] = $this->silabo_model->silabo($_GET['idsilabo'])->row_array();
	$data['unidadsilabo'] = $this->unidadsilabo_model->lista_unidades($_GET['idsilabo'])->result();
	$data['tema'] = $this->tema_model->tema1($_GET['idtema'])->row_array();
	$data['videotutorial'] = $this->videotutorial_model->videotutorial1($data['tema']['idreactivo'])->result();
	$data['preguntas']=$this->pregunta_model->preguntasxevaluacion($data['tema']['idreactivo'])->result();
	$data['respuestas']=$this->respuesta_model->respuestasxevaluacion($data['tema']['idreactivo'])->result();
  	$data['title']="Curso";
	$this->load->view('template/page_header');		
 	$this->load->view('cursos/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}





public function actual()
{
	$data['curso'] = $this->curso_model->curso($this->uri->segment(3))->row_array();
			$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['curso']['idcurso'])->result();
			$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Curso";
    $this->load->view('template/page_header');		
    $this->load->view('curso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }




public function elprimero()
{
	$data['curso'] = $this->curso_model->elprimero();
			$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['curso']['idcurso'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Curso";
    $this->load->view('template/page_header');		
    $this->load->view('curso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['curso'] = $this->curso_model->elultimo();
			$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['curso']['idcurso'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Curso";
  
    $this->load->view('template/page_header');		
    $this->load->view('curso_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['curso_list']=$this->curso_model->lista_curso()->result();
	$data['curso'] = $this->curso_model->siguiente($this->uri->segment(3))->row_array();
	$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['curso']['idcurso'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['title']="Curso";
	$this->load->view('template/page_header');		
  	$this->load->view('curso_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['curso_list']=$this->curso_model->lista_curso()->result();
	$data['curso'] = $this->curso_model->anterior($this->uri->segment(3))->row_array();
	$data['cursodocumentos']= $this->cursodocumento_model->listar_cursodocumento1($data['curso']['idcurso'])->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['title']="Curso";
	$this->load->view('template/page_header');		
  	$this->load->view('curso_record',$data);
	$this->load->view('template/page_footer');
}

}
