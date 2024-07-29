<?php

class Documentoexamencomplexivo extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('documento_model');
  	  $this->load->model('examencomplexivo_model');
  	  $this->load->model('documentoexamencomplexivo_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['documentoexamencomplexivo']=$this->documentoexamencomplexivo_model->elultimo();
	$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
  	$data['examencomplexivo']= $this->examencomplexivo_model->lista_examencomplexivosA($data['documentoexamencomplexivo']['idexamencomplexivo'])->row_array();
  	$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA(0)->result();
	
		$data['title']="Lista de documentoexamencomplexivos";
		$this->load->view('template/page_header');
		$this->load->view('documentoexamencomplexivo_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{

		$idexamencomplexivo=0;
	if($this->uri->segment(3)){
		$idexamencomplexivo=$this->uri->segment(3);
	}

		$destinodocumento=1;  //examencomplexivo
		$data['documentos']= $this->documento_model->lista_documentosxdestino($destinodocumento)->result();
  		$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA($idexamencomplexivo)->result();
		$data['title']="Nueva Documentoexamencomplexivo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documentoexamencomplexivo_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
			'iddocumento' => $this->input->post('iddocumento'),
			'idexamencomplexivo' => $this->input->post('idexamencomplexivo'),
	 	);
	 	$result=$this->documentoexamencomplexivo_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Documento ya existe en este examencomplexivo'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


	public function  save2()
	{
	 	$array_item=array(
			'iddocumento' => $this->input->post('iddocumento'),
			'idexamencomplexivo' => $this->input->post('idexamencomplexivo'),
			'minutosocupados' => $this->input->post('minutosocupados'),
	 	);
	 	$result=$this->documentoexamencomplexivo_model->save($array_item);

	 	if($result == FALSE)
		{
            echo json_encode($result);
		}else{
            echo json_encode($result);
		}
 	}






public function edit()
{
	 	$data['documentoexamencomplexivo'] = $this->documentoexamencomplexivo_model->documentoexamencomplexivo($this->uri->segment(3))->row_array();

		//$tipodocumento=17;  //examencomplexivo
		//$data['documentos']= $this->documento_model->lista_documentosxtipo($tipodocumento,0)->result();

		$destinodocumento=1;  //examencomplexivo
		$data['documentos']= $this->documento_model->lista_documentosxdestino($destinodocumento)->result();

  		$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA(0)->result();
 	 	$data['title'] = "Actualizar Documentoexamencomplexivo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documentoexamencomplexivo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumentoexamencomplexivo');
	 	$array_item=array(
		 	
		 	'iddocumentoexamencomplexivo' => $this->input->post('iddocumentoexamencomplexivo'),
			'iddocumento' => $this->input->post('iddocumento'),
			'idexamencomplexivo' => $this->input->post('idexamencomplexivo'),
	 	);
	$result =	$this->documentoexamencomplexivo_model->update($id,$array_item);
	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Documento ya existe en este examencomplexivo'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}



 	}


 	public function delete()
 	{
 		$data=$this->documentoexamencomplexivo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documentoexamencomplexivo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Documentoexamencomplexivos";
	$this->load->view('template/page_header');		
  $this->load->view('documentoexamencomplexivo_list',$data);
	$this->load->view('template/page_footer');
}



function documentoexamencomplexivo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->documentoexamencomplexivo_model->lista_documentoexamencomplexivosA(0);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocumentoexamencomplexivo,$r->iddocumento,$r->asunto,$r->elperiodo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('documentoexamencomplexivo/actual').'"  data-iddocumentoexamencomplexivo="'.$r->iddocumentoexamencomplexivo.'">Ver</a>');
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

			$iddocumentoexamencomplexivo=$this->input->get('iddocumentoexamencomplexivo');
			$data0 =$this->asignaturadocumento_model->lista_asignaturadocumentos($iddocumentoexamencomplexivo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentoexamencomplexivo,$r->idasignaturadocumento,$r->laasignatura,$r->paralelo,
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
	$data['documentoexamencomplexivo'] = $this->documentoexamencomplexivo_model->documentoexamencomplexivo($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
  	$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA(0)->result();
	  if(!empty($data))
	  {
    $data['title']="Documentoexamencomplexivo";
    $this->load->view('template/page_header');		
    $this->load->view('documentoexamencomplexivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{
  	$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA(0)->result();
  	$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
	$data['documentoexamencomplexivo'] = $this->documentoexamencomplexivo_model->elprimero();
	  if(!empty($data))
	  {
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
    $data['title']="Documentoexamencomplexivo";
    $this->load->view('template/page_header');		
    $this->load->view('documentoexamencomplexivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['documentoexamencomplexivo'] = $this->documentoexamencomplexivo_model->elultimo();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA(0)->result();
  if(!empty($data))
  {
    $data['title']="Documentoexamencomplexivo";
  
    $this->load->view('template/page_header');		
    $this->load->view('documentoexamencomplexivo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['documentoexamencomplexivo_list']=$this->documentoexamencomplexivo_model->lista_documentoexamencomplexivo()->result();
	$data['documentoexamencomplexivo'] = $this->documentoexamencomplexivo_model->siguiente($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA(0)->result();
  

$data['title']="Documentoexamencomplexivo";
	$this->load->view('template/page_header');		
  $this->load->view('documentoexamencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['documentoexamencomplexivo_list']=$this->documentoexamencomplexivo_model->lista_documentoexamencomplexivo()->result();
	$data['documentoexamencomplexivo'] = $this->documentoexamencomplexivo_model->anterior($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['examencomplexivos']= $this->examencomplexivo_model->lista_examencomplexivosA(0)->result();
  $data['title']="Documentoexamencomplexivo";
	$this->load->view('template/page_header');		
  $this->load->view('documentoexamencomplexivo_record',$data);
	$this->load->view('template/page_footer');
}




}
