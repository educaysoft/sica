<?php

class Tema extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tema_model');
      $this->load->model('unidadsilabo_model');
      $this->load->model('silabo_model');
      $this->load->model('videotutorial_model');
   $this->load->model('aula_model');
      $this->load->model('modoevaluacion_model');
      $this->load->model('documento_model');
      $this->load->model('metodoaprendizajetema_model');
}

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/tema
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$ti= microtime(true);
			$data['tema']=$this->tema_model->elultimo();
			$tf= microtime(true);
			$tc=$tf-$ti;
			echo "tipo de carga del tema: ".$tc;
			$ti= microtime(true);
  			$data['metodoaprendizajetemas']=$this->metodoaprendizajetema_model->metodoaprendizajetemas1($data['tema']['idtema'])->result();
			$tc=$tf-$ti;
			echo "tipo de carga del metodoaprendizaje: ".$tc;
			$ti= microtime(true);
			$data['unidadsilabos'] = $this->unidadsilabo_model->listar_unidadsilabo1()->result();
			$tc=$tf-$ti;
			echo "tipo de carga del unidadsilabo: ".$tc;
			$ti= microtime(true);
			$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
			$tc=$tf-$ti;
			echo "tipo de carga del modoevaluacion: ".$tc;
			$ti= microtime(true);
  			$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
			$tc=$tf-$ti;
			echo "tipo de carga del videoturtorales: ".$tc;
			$ti= microtime(true);
  			$data['aulas']= $this->aula_model->lista_aulas()->result();
			$tc=$tf-$ti;
			echo "tipo de carga del aula: ".$tc;
			die();
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
			$data['silabos'] = $this->silabo_model->lista_silabos()->result();
			$data['unidadsilabos'] = $this->unidadsilabo_model->listar_unidadsilabo()->result();
  		$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  		$data['aulas']= $this->aula_model->lista_aulas()->result();
			$this->load->view('template/page_header');		
			$this->load->view('tema_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
	 	'nombrecorto' => $this->input->post('nombrecorto'),
		'idvideotutorial' => $this->input->post('idvideotutorial'),
	 	'nombrelargo' => $this->input->post('nombrelargo'),
	 	'idunidadsilabo' => $this->input->post('idunidadsilabo'),
	 	'duracionminutos' => $this->input->post('duracionminutos'),
		'idaula' => $this->input->post('idaula'),
	 	'objetivoaprendizaje' => $this->input->post('objetivoaprendizaje'),
	 	'experiencia' => $this->input->post('experiencia'),
	 	'reflexion' => $this->input->post('reflexion'),
	 	'secuencia' => $this->input->post('secuencia'),
	 	'aprendizajeautonomo' => $this->input->post('aprendizajeautonomo'),
	 	'idmodoevaluacion' => $this->input->post('idmodoevaluacion'),
	 	'numerosesion' => $this->input->post('numerosesion'),
		'linkpresentacion' => $this->input->post('linkpresentacion'),
	 	);
	 	$this->tema_model->save($array_item);
	 	redirect('tema');
 	}



	public function edit()
	{
			$data['tema'] = $this->tema_model->tema($this->uri->segment(3))->row_array();
  			$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
			$data['unidadsilabo'] = $this->unidadsilabo_model->unidadsilabo($data['tema']['idunidadsilabo'])->result();
			$data['unidadsilabos'] = $this->unidadsilabo_model->unidadsilaboss($data['unidadsilabo'][0]->idsilabo)->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
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
		 	'nombrecorto' => $this->input->post('nombrecorto'),
		 	'nombrelargo' => $this->input->post('nombrelargo'),
	 		'idunidadsilabo' => $this->input->post('idunidadsilabo'),
	 		'duracionminutos' => $this->input->post('duracionminutos'),
		 	'idvideotutorial' => $this->input->post('idvideotutorial'),
	 		'objetivoaprendizaje' => $this->input->post('objetivoaprendizaje'),
	 		'experiencia' => $this->input->post('experiencia'),
	 		'reflexion' => $this->input->post('reflexion'),
	 		'secuencia' => $this->input->post('secuencia'),
		 	'idmodoevaluacion' => $this->input->post('idmodoevaluacion'),
	 		'aprendizajeautonomo' => $this->input->post('aprendizajeautonomo'),
		 	'numerosesion' => $this->input->post('numerosesion'),
			'idaula' => $this->input->post('idaula'),
		 	'linkpresentacion' => $this->input->post('linkpresentacion'),
	 	);
	 	$this->tema_model->update($id,$array_item);
	 	redirect('tema/actual/'.$id);
 	}


 	public function quitar()
 	{


// 		$this->tema_model->delete($this->uri->segment(3));
 		$this->tema_model->quitar($this->uri->segment(3));
		if(!$result)
		{
			echo "<script language='JavaScript'> alert('El tema no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}



 //		echo json_encode($data);
	 	redirect('tema/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
		$data['temas'] = $this->tema_model->lista_temas1(0)->result();
	  	$data['title']="Tema";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
	  	$this->load->view('tema_list',$data);
		$this->load->view('template/page_footer');
	}



function tema_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idunidadsilabo=$this->input->get('idunidadsilabo');

	 	$data0 = $this->tema_model->lista_temas1($idunidadsilabo);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->elsilabo,$r->launidadsilabo,$r->idtema,$r->nombrecorto,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('tema/actual').'"    data-idtema="'.$r->idtema.'">Ver1</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_update"    data-idtema="'.$r->idtema.'">Update</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}



function tema_silabo()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idsilabo=$this->input->get('idsilabo');

	 	$data0 = $this->tema_model->lista_temass($idsilabo);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->numerosesion,$r->unidad,$r->idtema,$r->nombrecorto,$r->nombrelargo,
				);
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}



function tema_silabo2()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idsilabo=$this->input->get('idsilabo');

	 	$data0 = $this->tema_model->lista_temass($idsilabo);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->numerosesion,$r->unidad,$r->idtema,$r->idmodoevaluacion,$r->nombrecorto,
				);
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
	$data['unidadsilabos'] = $this->unidadsilabo_model->lista_unidades($_GET['idtema'])->result();
  	$data['title']="Tema";
	$this->load->view('template/page_header');		
 	$this->load->view('temas/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}




	public function reportepdf()
	{
		$idtema=$this->uri->segment(3);
	 	$data['tema']= $this->tema_model->tema1($idtema)->result();
		$data['title']="Evento";
		$this->load->view('tema_list_pdf',$data);
	}







public function actual()
{
	$data['tema'] = $this->tema_model->tema($this->uri->segment(3))->row_array();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
	$data['unidadsilabos'] = $this->unidadsilabo_model->listar_unidadsilabo1()->result();
  	$data['metodoaprendizajetemas']=$this->metodoaprendizajetema_model->metodoaprendizajetemas1($data['tema']['idtema'])->result();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
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
	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['unidadsilabos'] = $this->unidadsilabo_model->listar_unidadsilabo1()->result();
	$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
  	$data['metodoaprendizajetemas']=$this->metodoaprendizajetema_model->metodoaprendizajetemas1($data['tema']['idtema'])->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
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
	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['unidadsilabos'] = $this->unidadsilabo_model->listar_unidadsilabo1()->result();
	$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
  	$data['metodoaprendizajetemas']=$this->metodoaprendizajetema_model->metodoaprendizajetemas1($data['tema']['idtema'])->result();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
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
	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['unidadsilabos'] = $this->unidadsilabo_model->listar_unidadsilabo1()->result();
  	$data['metodoaprendizajetemas']=$this->metodoaprendizajetema_model->metodoaprendizajetemas1($data['tema']['idtema'])->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
	
	$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
  	$data['title']="Tema";
	$this->load->view('template/page_header');		
  	$this->load->view('tema_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tema_list']=$this->tema_model->lista_tema()->result();
	$data['tema'] = $this->tema_model->anterior($this->uri->segment(3))->row_array();
		$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
	$data['unidadsilabos'] = $this->unidadsilabo_model->listar_unidadsilabo1()->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['metodoaprendizajetemas']=$this->metodoaprendizajetema_model->metodoaprendizajetemas1($data['tema']['idtema'])->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  	$data['aulas']= $this->aula_model->lista_aulas()->result();
  	$data['title']="Tema";
	$this->load->view('template/page_header');		
  	$this->load->view('tema_record',$data);
	$this->load->view('template/page_footer');
}

public function get_unidadsilabo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idsilabo')) {
        $this->db->select('*');
        $this->db->where(array('idsilabo' => $this->input->post('idsilabo')));
        $query = $this->db->get('unidadsilabo');
	$data=$query->result();
	echo json_encode($data);
	}

}





}
