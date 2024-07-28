<?php

class Documentotrabajointegracioncurricular extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('documento_model');
  	  $this->load->model('portafolio_model');
  	  $this->load->model('docente_model');
  	  $this->load->model('documentotrabajointegracioncurricular_model');
  	  $this->load->model('docenteactividadacademica_model');
  	  $this->load->model('distributivodocente_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['documentotrabajointegracioncurricular']=$this->documentotrabajointegracioncurricular_model->elultimo();
	$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
	$data['docente']= $this->docente_model->docentespersona($data['documentotrabajointegracioncurricular']['idpersona'])->row_array();
  	$data['portafolio']= $this->portafolio_model->lista_portafoliosA($data['documentotrabajointegracioncurricular']['idportafolio'])->row_array();
  	$data['portafolios']= $this->portafolio_model->lista_portafoliosA(0)->result();
	if(isset($data['docente']['iddocente']))
	{
	$data['distributivodocente']=$this->distributivodocente_model->distributivodocente_pado($data['portafolio']['idperiodoacademico'],$data['docente']['iddocente'])->row_array();
	$data['docenteactividadacademicas']=$this->docenteactividadacademica_model->lista_docenteactividadacademicasA($data['distributivodocente']['iddistributivodocente'])->result();
	}else{
	$data['docenteactividadacademicas']=$this->docenteactividadacademica_model->lista_docenteactividadacademicasA(0)->result();
	}
		$data['title']="Lista de documentotrabajointegracioncurriculars";
		$this->load->view('template/page_header');
		$this->load->view('documentotrabajointegracioncurricular_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{

		$idportafolio=0;
	if($this->uri->segment(3)){
		$idportafolio=$this->uri->segment(3);
	}

		$destinodocumento=1;  //portafolio
		$data['documentos']= $this->documento_model->lista_documentosxdestino($destinodocumento)->result();
  		$data['portafolios']= $this->portafolio_model->lista_portafoliosA($idportafolio)->result();
		$data['docenteactividadacademicas']=$this->docenteactividadacademica_model->lista_docenteactividadacademicasA(0)->result();
		$data['title']="Nueva Documentotrabajointegracioncurricular";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documentotrabajointegracioncurricular_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
			'iddocumento' => $this->input->post('iddocumento'),
			'idportafolio' => $this->input->post('idportafolio'),
			'iddocenteactividadacademica' => $this->input->post('iddocenteactividadacademica'),
			'minutosocupados' => $this->input->post('minutosocupados'),
	 	);
	 	$result=$this->documentotrabajointegracioncurricular_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Documento ya existe en este portafolio'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


	public function  save2()
	{
	 	$array_item=array(
			'iddocumento' => $this->input->post('iddocumento'),
			'idportafolio' => $this->input->post('idportafolio'),
			'iddocenteactividadacademica' => $this->input->post('iddocenteactividadacademica'),
			'minutosocupados' => $this->input->post('minutosocupados'),
	 	);
	 	$result=$this->documentotrabajointegracioncurricular_model->save($array_item);

	 	if($result == FALSE)
		{
            echo json_encode($result);
		}else{
            echo json_encode($result);
		}
 	}






public function edit()
{
	 	$data['documentotrabajointegracioncurricular'] = $this->documentotrabajointegracioncurricular_model->documentotrabajointegracioncurricular($this->uri->segment(3))->row_array();

		//$tipodocumento=17;  //portafolio
		//$data['documentos']= $this->documento_model->lista_documentosxtipo($tipodocumento,0)->result();

		$destinodocumento=1;  //portafolio
		$data['documentos']= $this->documento_model->lista_documentosxdestino($destinodocumento)->result();

		$data['docenteactividadacademicas']=$this->docenteactividadacademica_model->lista_docenteactividadacademicasA(0)->result();
  		$data['portafolios']= $this->portafolio_model->lista_portafoliosA(0)->result();
 	 	$data['title'] = "Actualizar Documentotrabajointegracioncurricular";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documentotrabajointegracioncurricular_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumentotrabajointegracioncurricular');
	 	$array_item=array(
		 	
		 	'iddocumentotrabajointegracioncurricular' => $this->input->post('iddocumentotrabajointegracioncurricular'),
			'iddocumento' => $this->input->post('iddocumento'),
			'idportafolio' => $this->input->post('idportafolio'),
			'iddocenteactividadacademica' => $this->input->post('iddocenteactividadacademica'),
			'minutosocupados' => $this->input->post('minutosocupados'),
	 	);
	$result =	$this->documentotrabajointegracioncurricular_model->update($id,$array_item);
	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Documento ya existe en este portafolio'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}



 	}


 	public function delete()
 	{
 		$data=$this->documentotrabajointegracioncurricular_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documentotrabajointegracioncurricular/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Documentotrabajointegracioncurriculars";
	$this->load->view('template/page_header');		
  $this->load->view('documentotrabajointegracioncurricular_list',$data);
	$this->load->view('template/page_footer');
}



function documentotrabajointegracioncurricular_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->documentotrabajointegracioncurricular_model->lista_documentotrabajointegracioncurricularsA(0);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocumentotrabajointegracioncurricular,$r->iddocumento,$r->asunto,$r->elperiodo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('documentotrabajointegracioncurricular/actual').'"  data-iddocumentotrabajointegracioncurricular="'.$r->iddocumentotrabajointegracioncurricular.'">Ver</a>');
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

			$iddocumentotrabajointegracioncurricular=$this->input->get('iddocumentotrabajointegracioncurricular');
			$data0 =$this->asignaturadocumento_model->lista_asignaturadocumentos($iddocumentotrabajointegracioncurricular);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentotrabajointegracioncurricular,$r->idasignaturadocumento,$r->laasignatura,$r->paralelo,
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
	$data['documentotrabajointegracioncurricular'] = $this->documentotrabajointegracioncurricular_model->documentotrabajointegracioncurricular($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
  	$data['portafolios']= $this->portafolio_model->lista_portafoliosA(0)->result();
	$data['docenteactividadacademicas']=$this->docenteactividadacademica_model->lista_docenteactividadacademicasA(0)->result();
	  if(!empty($data))
	  {
    $data['title']="Documentotrabajointegracioncurricular";
    $this->load->view('template/page_header');		
    $this->load->view('documentotrabajointegracioncurricular_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{
  	$data['portafolios']= $this->portafolio_model->lista_portafoliosA(0)->result();
  	$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
	$data['documentotrabajointegracioncurricular'] = $this->documentotrabajointegracioncurricular_model->elprimero();
	  if(!empty($data))
	  {
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
    $data['title']="Documentotrabajointegracioncurricular";
    $this->load->view('template/page_header');		
    $this->load->view('documentotrabajointegracioncurricular_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['documentotrabajointegracioncurricular'] = $this->documentotrabajointegracioncurricular_model->elultimo();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolios']= $this->portafolio_model->lista_portafoliosA(0)->result();
  if(!empty($data))
  {
    $data['title']="Documentotrabajointegracioncurricular";
  
    $this->load->view('template/page_header');		
    $this->load->view('documentotrabajointegracioncurricular_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['documentotrabajointegracioncurricular_list']=$this->documentotrabajointegracioncurricular_model->lista_documentotrabajointegracioncurricular()->result();
	$data['documentotrabajointegracioncurricular'] = $this->documentotrabajointegracioncurricular_model->siguiente($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolios']= $this->portafolio_model->lista_portafoliosA(0)->result();
  

$data['title']="Documentotrabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('documentotrabajointegracioncurricular_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['documentotrabajointegracioncurricular_list']=$this->documentotrabajointegracioncurricular_model->lista_documentotrabajointegracioncurricular()->result();
	$data['documentotrabajointegracioncurricular'] = $this->documentotrabajointegracioncurricular_model->anterior($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['portafolios']= $this->portafolio_model->lista_portafoliosA(0)->result();
  $data['title']="Documentotrabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('documentotrabajointegracioncurricular_record',$data);
	$this->load->view('template/page_footer');
}




}
