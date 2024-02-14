<?php
class Documentoevento extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('documentoevento_model');
      		$this->load->model('tipodocu_model');
      		$this->load->model('documento_model');
      		$this->load->model('evento_model');
      		$this->load->model('documento_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['documentoevento'] = $this->documentoevento_model->elultimo();

		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
 		// print_r($data['documentoevento_list']);
  		$data['title']="Lista de Documentoeventoes";
		$this->load->view('template/page_header');		
  		$this->load->view('documentoevento_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{

		if($this->uri->segment(3))
		{
			$data['eventos']= $this->evento_model->evento($this->uri->segment(3))->result();
		}else{
			$data['eventos']= $this->evento_model->lista_eventos()->result();
		}
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentoevento'] = $this->documentoevento_model->elultimo();
		$data['title']="Nuevo documento para el evento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documentoevento_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'idevento' => $this->input->post('idevento'),
		 	'idtipodocu' => $this->input->post('idtipodocu'),
	 	);
	 $result=$this->documentoevento_model->save($array_item);

	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert(' ya ha sido asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
	 	$data['documentoevento'] = $this->documentoevento_model->documentoevento($this->uri->segment(3))->row_array();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Documentoevento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documentoevento_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumentoevento');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'iddocumento' => $this->input->post('iddocumento'),
			'idtipodocu' => $this->input->post('idtipodocu'),
	 	);
	 	$this->documentoevento_model->update($id,$array_item);
	 	redirect('documentoevento');
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('iddocumentoevento');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	echo $this->documentoevento_model->update($id,$array_item);
 	}



 	public function delete()
 	{
 		$data=$this->documentoevento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documentoevento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Unidades del evento";
		$this->load->view('template/page_header');		
		$this->load->view('documentoevento_list',$data);
		$this->load->view('template/page_footer');
	}



	function documentoevento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->documentoevento_model->listar_documentoevento1(0);
			$data=array();
			foreach($data0->result() as $r){
			$data[]=array($r->iddocumentoevento,$r->elevento,$r->eldocumento,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('documentoevento/actual').'"  data-iddocumentoevento="'.$r->iddocumentoevento.'">Ver</a>');
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
		$data['documentoevento'] = $this->documentoevento_model->documentoevento($this->uri->segment(3))->row_array();

    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	  if(!empty($data))
	  {
		    $data['eventos']= $this->evento_model->lista_eventos()->result();
		    $data['documentos']= $this->documento_model->lista_documentos()->result();
		    $data['title']="Documentoevento del documento";
		    $this->load->view('template/page_header');		
		    $this->load->view('documentoevento_record',$data);
		    $this->load->view('template/page_footer');
	  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
	  }
	}






//===========================================================
	//Devuelve el primer registro de la tabla
	//===========================================================

	public function elprimero()
	{
		$data['documentoevento'] = $this->documentoevento_model->elprimero();

    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	  if(!empty($data))
	  {
		    $data['eventos']= $this->evento_model->lista_eventos()->result();
		    $data['documentos']= $this->documento_model->lista_documentos()->result();
		    $data['title']="Documentoevento del documento";
		    $this->load->view('template/page_header');		
		    $this->load->view('documentoevento_record',$data);
		    $this->load->view('template/page_footer');
	  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
	  }
	}

	public function elultimo()
	{
		$data['documentoevento'] = $this->documentoevento_model->elultimo();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	  if(!empty($data))
	  {
			$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
	    $data['title']="Documentoevento del documento";
	  
	    $this->load->view('template/page_header');		
	    $this->load->view('documentoevento_record',$data);
	    $this->load->view('template/page_footer');
	  }else{

	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function siguiente(){
	 // $data['documentoevento_list']=$this->documentoevento_model->lista_documentoevento()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentoevento'] = $this->documentoevento_model->siguiente($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
	    $data['title']="Documentoevento del documento";
	 // $data['title']="Correo";
		$this->load->view('template/page_header');		
	  $this->load->view('documentoevento_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
	 // $data['documentoevento_list']=$this->documentoevento_model->lista_documentoevento()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentoevento'] = $this->documentoevento_model->anterior($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
	 // $data['title']="Correo";
	    $data['title']="Documentoevento del documento";
		$this->load->view('template/page_header');		
	  $this->load->view('documentoevento_record',$data);
		$this->load->view('template/page_footer');
	}


}
