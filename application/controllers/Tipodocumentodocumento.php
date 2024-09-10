<?php

class Tipodocumentodocumento extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('documento_model');
  	  $this->load->model('tipodocumento_model');
  	  $this->load->model('tipodocumentodocumento_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['tipodocumentodocumento']=$this->tipodocumentodocumento_model->elultimo();
	$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
  	$data['tipodocumento']= $this->tipodocumento_model->lista_tipodocumentosA($data['tipodocumentodocumento']['idtipodocumento'])->row_array();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentosA(0)->result();
	
		$data['title']="Lista de tipodocumentodocumentos";
		$this->load->view('template/page_header');
		$this->load->view('tipodocumentodocumento_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{

		$idtipodocumento=0;
	if($this->uri->segment(3)){
		$idtipodocumento=$this->uri->segment(3);
	}

		$destinodocumento=1;  //tipodocumento
		$data['documentos']= $this->documento_model->lista_documentosxdestino($destinodocumento)->result();
  		$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentosA($idtipodocumento)->result();
		$data['title']="Nueva Tipodocumentodocumento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipodocumentodocumento_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
			'iddocumento' => $this->input->post('iddocumento'),
			'idtipodocumento' => $this->input->post('idtipodocumento'),
	 	);
	 	$result=$this->tipodocumentodocumento_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Documento ya existe en este tipodocumento'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


	public function  save2()
	{
	 	$array_item=array(
			'iddocumento' => $this->input->post('iddocumento'),
			'idtipodocumento' => $this->input->post('idtipodocumento'),
			'minutosocupados' => $this->input->post('minutosocupados'),
	 	);
	 	$result=$this->tipodocumentodocumento_model->save($array_item);

	 	if($result == FALSE)
		{
            echo json_encode($result);
		}else{
            echo json_encode($result);
		}
 	}






public function edit()
{
	 	$data['tipodocumentodocumento'] = $this->tipodocumentodocumento_model->tipodocumentodocumento($this->uri->segment(3))->row_array();

		//$tipodocumento=17;  //tipodocumento
		//$data['documentos']= $this->documento_model->lista_documentosxtipo($tipodocumento,0)->result();

		$destinodocumento=1;  //tipodocumento
		$data['documentos']= $this->documento_model->lista_documentosxdestino($destinodocumento)->result();

  		$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentosA(0)->result();
 	 	$data['title'] = "Actualizar Tipodocumentodocumento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipodocumentodocumento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipodocumentodocumento');
	 	$array_item=array(
		 	
		 	'idtipodocumentodocumento' => $this->input->post('idtipodocumentodocumento'),
			'iddocumento' => $this->input->post('iddocumento'),
			'idtipodocumento' => $this->input->post('idtipodocumento'),
	 	);
	$result =	$this->tipodocumentodocumento_model->update($id,$array_item);
	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Documento ya existe en este tipodocumento'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}



 	}


 	public function delete()
 	{
 		$data=$this->tipodocumentodocumento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipodocumentodocumento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tipodocumentodocumentos";
	$this->load->view('template/page_header');		
  $this->load->view('tipodocumentodocumento_list',$data);
	$this->load->view('template/page_footer');
}



function tipodocumentodocumento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipodocumentodocumento_model->lista_tipodocumentodocumentosA(0);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipodocumentodocumento,$r->iddocumento,$r->asunto,$r->elperiodo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tipodocumentodocumento/actual').'"  data-idtipodocumentodocumento="'.$r->idtipodocumentodocumento.'">Ver</a>');
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

			$idtipodocumentodocumento=$this->input->get('idtipodocumentodocumento');
			$data0 =$this->asignaturadocumento_model->lista_asignaturadocumentos($idtipodocumentodocumento);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idtipodocumentodocumento,$r->idasignaturadocumento,$r->laasignatura,$r->paralelo,
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
	$data['tipodocumentodocumento'] = $this->tipodocumentodocumento_model->tipodocumentodocumento($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentosA(0)->result();
	  if(!empty($data))
	  {
    $data['title']="Tipodocumentodocumento";
    $this->load->view('template/page_header');		
    $this->load->view('tipodocumentodocumento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentosA(0)->result();
  	$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
	$data['tipodocumentodocumento'] = $this->tipodocumentodocumento_model->elprimero();
	  if(!empty($data))
	  {
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
    $data['title']="Tipodocumentodocumento";
    $this->load->view('template/page_header');		
    $this->load->view('tipodocumentodocumento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipodocumentodocumento'] = $this->tipodocumentodocumento_model->elultimo();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentosA(0)->result();
  if(!empty($data))
  {
    $data['title']="Tipodocumentodocumento";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipodocumentodocumento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipodocumentodocumento_list']=$this->tipodocumentodocumento_model->lista_tipodocumentodocumento()->result();
	$data['tipodocumentodocumento'] = $this->tipodocumentodocumento_model->siguiente($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentosA(0)->result();
  

$data['title']="Tipodocumentodocumento";
	$this->load->view('template/page_header');		
  $this->load->view('tipodocumentodocumento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipodocumentodocumento_list']=$this->tipodocumentodocumento_model->lista_tipodocumentodocumento()->result();
	$data['tipodocumentodocumento'] = $this->tipodocumentodocumento_model->anterior($this->uri->segment(3))->row_array();
  	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentosA(0)->result();
  $data['title']="Tipodocumentodocumento";
	$this->load->view('template/page_header');		
  $this->load->view('tipodocumentodocumento_record',$data);
	$this->load->view('template/page_footer');
}




}
