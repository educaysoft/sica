<?php

class Asignaturadeldocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('docente_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('asignaturadeldocente_model');
  	  $this->load->model('documento_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['asignaturadeldocente']=$this->asignaturadeldocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignatura']= $this->asignatura_model->asignaturas1(0)->result();
			
		$data['title']="Lista de asignaturadeldocentes";
		$this->load->view('template/page_header');
		$this->load->view('asignaturadeldocente_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{
	$idasignatura=0;
	if($this->uri->segment(3))
	{
		$idasignatura=$this->uri->segment(3);
	}

  		$data['asignaturas']= $this->asignatura_model->asignaturas1($idasignatura)->result();
		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['title']="Nueva Asignaturadeldocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('asignaturadeldocente_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'iddocente' => $this->input->post('iddocente'),
			'idasignatura' => $this->input->post('idasignatura'),
			'iddocumento' => $this->input->post('iddocumento'),
			'fechadesde' => $this->input->post('fechadesde'),
			'fechahasta' => $this->input->post('fechahasta'),

	 	);
	 	$result=$this->asignaturadeldocente_model->save($array_item);
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Docente ya ha sido asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


	 	redirect('asignaturadeldocente');
 	}



	public function edit()
	{
			$data['asignaturadeldocente'] = $this->asignaturadeldocente_model->asignaturadeldocente($this->uri->segment(3))->row_array();
			$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
			$data['asignaturas']= $this->asignatura_model->lista_asignaturas1(0)->result();
			$data['documentos']= $this->documento_model->lista_documentos()->result();
			$data['title'] = "Actualizar Asignaturadeldocente";
			$this->load->view('template/page_header');		
			$this->load->view('asignaturadeldocente_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idasignaturadeldocente');
	 	$array_item=array(
		 	
		 	'idasignaturadeldocente' => $this->input->post('idasignaturadeldocente'),
			'iddocente' => $this->input->post('iddocente'),
			'idasignatura' => $this->input->post('idasignatura'),
			'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->asignaturadeldocente_model->update($id,$array_item);
	 	redirect('asignaturadeldocente/actual/'.$id);
 	}


 	public function quitar()
 	{
 		$data=$this->asignaturadeldocente_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('Este docente no ha podida salir de este asignatura'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 //		echo json_encode($data);
//	 	redirect('asignaturadeldocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Asignaturadeldocentes";
	$this->load->view('template/page_header');		
  $this->load->view('asignaturadeldocente_list',$data);
	$this->load->view('template/page_footer');
}



function asignaturadeldocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		if($this->input->get('iddocente')){
		$iddocente=$this->input->get('iddocente');
	 	$data0 = $this->asignaturadeldocente_model->lista_asignaturadeldocentesA($iddocente);
		}else{
	 	$data0 = $this->asignaturadeldocente_model->lista_asignaturadeldocentesA(0);
		}

		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idasignaturadeldocente,$r->eldocente,$r->laasignatura,$r->archivopdf,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('asignaturadeldocente/actual').'"  data-idasignaturadeldocente="'.$r->idasignaturadeldocente.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



	function asignaturadocente_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idasignaturadeldocente=$this->input->get('idasignaturadeldocente');
		$data0 =$this->asignaturadocente_model->lista_asignaturadocentesA($idasignaturadeldocente);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idasignaturadeldocente,$r->idasignaturadocente,$r->nivel,$r->laasignatura,$r->paralelo,$r->horas,$r->estado,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('asignaturadocente/actual').'"    data-idasignaturadocente="'.$r->idasignaturadocente.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_gesi"  data-retorno="'.site_url('silabo/save').'"     data-paralelo="'.$r->paralelo.'"  data-laasignatura="'.$r->laasignatura.'"   data-elperiodoacademico="'.$r->elperiodoacademico.'"  data-idperiodoacademico="'.$r->idperiodoacademico.'"  data-iddocente="'.$r->iddocente.'" data-idpersona="'.$r->idpersona.'"   data-idasignatura="'.$r->idasignatura.'">GeSi</a>');
			}	
		$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
		echo json_encode($output);
		exit();
	}




	function evento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idasignaturadeldocente=$this->input->get('idasignaturadeldocente');
			$data0 =$this->evento_model->eventosd($idasignaturadeldocente);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idsilabo,$r->idevento,$r->titulo,$r->codigoclassroom,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('evento/actual').'"    data-idevento="'.$r->idevento.'">Ver</a>');
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
		$idasignaturadeldocente=$this->uri->segment(3);
		$data['jornadadocente'] = $this->jornadadocente_model->jornadadocentexdido($idasignaturadeldocente)->result();
		$data['asignaturadeldocente']=$this->asignaturadeldocente_model->asignaturadeldocente($idasignaturadeldocente)->row_array();
		$data['docente']=$this->docente_model->docente1($data['asignaturadeldocente']['iddocente'])->result();
		$data['title']="Evento";
		$this->load->view('asignaturadeldocente_list_pdf',$data);
	}


public function genpagina()
{
	$idasignatura=0;
	$ordenrpt=1;
	if($this->uri->segment(3))
	{
		$idasignatura=$this->uri->segment(3);

	 	$data['asignaturadocentes']= $this->asignaturadocente_model->asignaturadocentexasignatura2($idasignatura,$ordenrpt)->result();
		$arreglo=array();
		$i=0;
		foreach($data['asignaturadocentes'] as $row){
		$idasignaturadocente=$row->idasignaturadocente;
//		$arreglo[$row->idasignaturadocente]=$this->jornadadocente_model->jornadadocentes($idasignaturadocente)->row_array();
		$xx=array($this->jornadadocente_model->jornadadocentes($idasignaturadocente)->result_array());	
		if(count($xx[0]) > 0){
//		print_r($xx);
//echo "<br><br>arrego individual<br><br>";
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->idasignaturadocente=>$row3));
				$i=$i+1;

			}
//				 print_r($arreglo); echo "<br>";
			}
		}
		}
$data['jornadadocente']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['jornadadocente']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;
//		print_r($data['jornadadocente']);
//		die();
	$data['asignatura']= $this->asignatura_model->asignaturas1($data['asignaturadocentes'][0]->idasignatura)->row_array();

	$data['malla']= $this->malla_model->mallaA($data['asignatura']['idmalla'])->result();

		$data['title']="Evento";
		$this->load->view('asignaturadeldocente_genpagina',$data);

	}
}














public function actual()
{
	$data['asignaturadeldocente'] = $this->asignaturadeldocente_model->asignaturadeldocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['asignatura']= $this->asignatura_model->lista_asignaturas1($data['asignaturadeldocente']['idasignatura'])->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
	  if(!empty($data))
	  {
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
    		$data['title']="Asignaturadeldocente";
    		$this->load->view('template/page_header');		
    		$this->load->view('asignaturadeldocente_record',$data);
    		$this->load->view('template/page_footer');
  	}else{
    		$this->load->view('template/page_header');		
    		$this->load->view('registro_vacio');
    		$this->load->view('template/page_footer');
  	}
 }










public function elprimero()
{
  	$data['asignatura']= $this->asignatura_model->lista_asignaturas1(0)->result();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
	$data['asignaturadeldocente'] = $this->asignaturadeldocente_model->elprimero();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
    $data['title']="Asignaturadeldocente";
    $this->load->view('template/page_header');		
    $this->load->view('asignaturadeldocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['asignaturadeldocente'] = $this->asignaturadeldocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['asignatura']= $this->asignatura_model->lista_asignaturas1(0)->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Asignaturadeldocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('asignaturadeldocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['asignaturadeldocente_list']=$this->asignaturadeldocente_model->lista_asignaturadeldocente()->result();
	$data['asignaturadeldocente'] = $this->asignaturadeldocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['asignatura']= $this->asignatura_model->lista_asignaturas1(0)->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  

$data['title']="Asignaturadeldocente";
	$this->load->view('template/page_header');		
  $this->load->view('asignaturadeldocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['asignaturadeldocente_list']=$this->asignaturadeldocente_model->lista_asignaturadeldocente()->result();
	$data['asignaturadeldocente'] = $this->asignaturadeldocente_model->anterior($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['asignatura']= $this->asignatura_model->lista_asignaturas1(0)->result();
  $data['title']="Asignaturadeldocente";
	$this->load->view('template/page_header');		
  $this->load->view('asignaturadeldocente_record',$data);
	$this->load->view('template/page_footer');
}




}
