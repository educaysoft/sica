<?php
class Documentosilabo extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('documentosilabo_model');
      		$this->load->model('tipodocu_model');
      		$this->load->model('documento_model');
      		$this->load->model('silabo_model');
      		$this->load->model('documento_model');
	}

	public function index(){
  		$data['silabos']= $this->silabo_model->lista_silabos()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['documentosilabo'] = $this->documentosilabo_model->elultimo();

		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
 		// print_r($data['documentosilabo_list']);
  		$data['title']="Lista de Documentosilaboes";
		$this->load->view('template/page_header');		
  		$this->load->view('documentosilabo_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{

		if($this->uri->segment(3))
		{
			$data['silabos']= $this->silabo_model->silabo($this->uri->segment(3))->result();
		}else{
			$data['silabos']= $this->silabo_model->lista_silabos()->result();
		}
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentosilabo'] = $this->documentosilabo_model->elultimo();
		$data['title']="Nuevo documento para el silabo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documentosilabo_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'iddocumento' => $this->input->post('iddocumento'),
		 	'idsilabo' => $this->input->post('idsilabo'),
		 	'idtipodocu' => $this->input->post('idtipodocu'),
	 	);
	 	$result=$this->documentosilabo_model->save($array_item);

	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Docente ya ha sido asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


 	}



	public function edit()
	{
	 	$data['documentosilabo'] = $this->documentosilabo_model->documentosilabo($this->uri->segment(3))->row_array();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['silabos']= $this->silabo_model->lista_silabos()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Documentosilabo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documentosilabo_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumentosilabo');
	 	$array_item=array(
		 	'idsilabo' => $this->input->post('idsilabo'),
		 	'iddocumento' => $this->input->post('iddocumento'),
			'idtipodocu' => $this->input->post('idtipodocu'),
	 	);
	 	$this->documentosilabo_model->update($id,$array_item);
	 	redirect('documentosilabo');
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('iddocumentosilabo');
	 	$array_item=array(
		 	'idsilabo' => $this->input->post('idsilabo'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	echo $this->documentosilabo_model->update($id,$array_item);
 	}



 	public function delete()
 	{
 		$data=$this->documentosilabo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documentosilabo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Unidades del silabo";
		$this->load->view('template/page_header');		
		$this->load->view('documentosilabo_list',$data);
		$this->load->view('template/page_footer');
	}



	function documentosilabo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$idsilabo=$this->input->get('idsilabo');
			$data0 = $this->documentosilabo_model->listar_documentosilabo1($idsilabo);
			$data=array();
			foreach($data0->result() as $r){
			$data[]=array($r->iddocumentosilabo,$r->elsilabo,$r->eldocumento,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('documentosilabo/actual').'"  data-iddocumentosilabo="'.$r->iddocumentosilabo.'">Ver</a>');
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
		$data['documentosilabo'] = $this->documentosilabo_model->documentosilabo($this->uri->segment(3))->row_array();

    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	  if(!empty($data))
	  {
		    $data['silabos']= $this->silabo_model->lista_silabos()->result();
		    $data['documentos']= $this->documento_model->lista_documentos()->result();
		    $data['title']="Documentosilabo del documento";
		    $this->load->view('template/page_header');		
		    $this->load->view('documentosilabo_record',$data);
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
		$data['documentosilabo'] = $this->documentosilabo_model->elprimero();

    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	  if(!empty($data))
	  {
		    $data['silabos']= $this->silabo_model->lista_silabos()->result();
		    $data['documentos']= $this->documento_model->lista_documentos()->result();
		    $data['title']="Documentosilabo del documento";
		    $this->load->view('template/page_header');		
		    $this->load->view('documentosilabo_record',$data);
		    $this->load->view('template/page_footer');
	  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
	  }
	}

	public function elultimo()
	{
		$data['documentosilabo'] = $this->documentosilabo_model->elultimo();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
	  if(!empty($data))
	  {
			$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
	    $data['title']="Documentosilabo del documento";
	  
	    $this->load->view('template/page_header');		
	    $this->load->view('documentosilabo_record',$data);
	    $this->load->view('template/page_footer');
	  }else{

	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function siguiente(){
	 // $data['documentosilabo_list']=$this->documentosilabo_model->lista_documentosilabo()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentosilabo'] = $this->documentosilabo_model->siguiente($this->uri->segment(3))->row_array();
		$data['silabos']= $this->silabo_model->lista_silabos()->result();
	    $data['title']="Documentosilabo del documento";
	 // $data['title']="Correo";
		$this->load->view('template/page_header');		
	  $this->load->view('documentosilabo_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
	 // $data['documentosilabo_list']=$this->documentosilabo_model->lista_documentosilabo()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
    		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentosilabo'] = $this->documentosilabo_model->anterior($this->uri->segment(3))->row_array();
		$data['silabos']= $this->silabo_model->lista_silabos()->result();
	 // $data['title']="Correo";
	    $data['title']="Documentosilabo del documento";
		$this->load->view('template/page_header');		
	  $this->load->view('documentosilabo_record',$data);
		$this->load->view('template/page_footer');
	}


}
