<?php
class Cursodocumento extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('cursodocumento_model');
      		$this->load->model('videotutorial_model');
      		$this->load->model('persona_model');
      		$this->load->model('curso_model');
	}

	public function index(){
  		$data['cursos']= $this->curso_model->lista_cursos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
		$data['cursodocumento'] = $this->cursodocumento_model->elultimo();

 		// print_r($data['cursodocumento_list']);
  		$data['title']="Lista de Cursodocumentoes";
		$this->load->view('template/page_header');		
  		$this->load->view('cursodocumento_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['cursos']= $this->curso_model->lista_cursos()->result();
  		$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
		$data['cursodocumento'] = $this->cursodocumento_model->elultimo();
		$data['title']="Nueva unidades del curso";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('cursodocumento_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idvideotutorial' => $this->input->post('idvideotutorial'),
		 	'idcurso' => $this->input->post('idcurso'),
		 	'nombre' => $this->input->post('nombre'),
		 	'unidad' => $this->input->post('unidad'),
	 	);
	 	$this->cursodocumento_model->save($array_item);
	 	redirect('cursodocumento');
 	}



	public function edit()
	{
	 	$data['cursodocumento'] = $this->cursodocumento_model->cursodocumento($this->uri->segment(3))->row_array();
		$data['cursos']= $this->curso_model->lista_cursos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['videotutorials']= $this->videotutorial_model->lista_videotutorials()->result();
 	 	$data['title'] = "Actualizar Cursodocumento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('cursodocumento_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idcursodocumento');
	 	$array_item=array(
		 	'nombre' => $this->input->post('nombre'),
		 	'unidad' => $this->input->post('unidad'),
		 	'idcurso' => $this->input->post('idcurso'),
		 	'idvideotutorial' => $this->input->post('idvideotutorial'),
	 	);
	 	$this->cursodocumento_model->update($id,$array_item);
	 	redirect('cursodocumento');
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('idcursodocumento');
	 	$array_item=array(
		 	'idcurso' => $this->input->post('idcurso'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idvideotutorial' => $this->input->post('idvideotutorial'),
	 	);
	 	echo $this->cursodocumento_model->update($id,$array_item);
 	}



 	public function delete()
 	{
 		$data=$this->cursodocumento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('cursodocumento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Unidades del curso";
		$this->load->view('template/page_header');		
		$this->load->view('cursodocumento_list',$data);
		$this->load->view('template/page_footer');
	}



	function cursodocumento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->cursodocumento_model->listar_cursodocumento1();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idcursodocumento,$r->idcurso,$r->unidad,$r->launidad,$r->elvideo,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcurso="'.$r->idcursodocumento.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}



	public function elprimero()
	{
		$data['cursodocumento'] = $this->cursodocumento_model->elprimero();
	  if(!empty($data))
	  {
			$data['cursos']= $this->curso_model->lista_cursos()->result();

		$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Cursodocumento del videotutorial";
	    $this->load->view('template/page_header');		
	    $this->load->view('cursodocumento_record',$data);
	    $this->load->view('template/page_footer');
	  }else{
	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function elultimo()
	{
		$data['cursodocumento'] = $this->cursodocumento_model->elultimo();
	  if(!empty($data))
	  {
			$data['cursos']= $this->curso_model->lista_cursos()->result();
		$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Cursodocumento del videotutorial";
	  
	    $this->load->view('template/page_header');		
	    $this->load->view('cursodocumento_record',$data);
	    $this->load->view('template/page_footer');
	  }else{

	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function siguiente(){
	 // $data['cursodocumento_list']=$this->cursodocumento_model->lista_cursodocumento()->result();
		$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
		$data['cursodocumento'] = $this->cursodocumento_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['cursos']= $this->curso_model->lista_cursos()->result();
	    $data['title']="Cursodocumento del videotutorial";
	 // $data['title']="Correo";
		$this->load->view('template/page_header');		
	  $this->load->view('cursodocumento_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
	 // $data['cursodocumento_list']=$this->cursodocumento_model->lista_cursodocumento()->result();
		$data['videotutoriales']= $this->videotutorial_model->lista_videotutorials()->result();
		$data['cursodocumento'] = $this->cursodocumento_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
			$data['cursos']= $this->curso_model->lista_cursos()->result();
	 // $data['title']="Correo";
	    $data['title']="Cursodocumento del videotutorial";
		$this->load->view('template/page_header');		
	  $this->load->view('cursodocumento_record',$data);
		$this->load->view('template/page_footer');
	}


}
