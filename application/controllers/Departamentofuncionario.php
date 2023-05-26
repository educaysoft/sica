<?php

class Departamentofuncionario extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('pais_model');
  	  $this->load->model('departamentofuncionario_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['departamentofuncionario']=$this->departamentofuncionario_model->lista_departamentofuncionarios()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  	$data['departamentofuncionarios']= $this->departamentofuncionario_model->lista_departamentofuncionarios()->result();
			
		$data['title']="Lista de departamentofuncionarios";
		$this->load->view('template/page_header');
		$this->load->view('departamentofuncionario_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


	public function add()
	{
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['paises']= $this->pais_model->lista_paises()->result();
			$data['title']="Nueva Departamentofuncionario";
			$this->load->view('template/page_header');		
			$this->load->view('departamentofuncionario_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'iddepartamentofuncionario' => $this->input->post('iddepartamentofuncionario'),
		'idpersona' => $this->input->post('idpersona'),
		'idpais' => $this->input->post('idpais'),
		'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->departamentofuncionario_model->save($array_item);
	 	redirect('departamentofuncionario');
 	}



	public function edit()
	{
			$data['departamentofuncionario'] = $this->departamentofuncionario_model->departamentofuncionario($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['paises']= $this->pais_model->lista_paises()->result();
			$data['title'] = "Actualizar Departamentofuncionario";
			$this->load->view('template/page_header');		
			$this->load->view('departamentofuncionario_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddepartamentofuncionario');
	 	$array_item=array(
		 	
		 	'iddepartamentofuncionario' => $this->input->post('iddepartamentofuncionario'),
			'idpersona' => $this->input->post('idpersona'),
			'idpais' => $this->input->post('idpais'),
			'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->departamentofuncionario_model->update($id,$array_item);
	 	redirect('departamentofuncionario');
 	}


 	public function delete()
 	{
 		$data=$this->departamentofuncionario_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('departamentofuncionario/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Departamentofuncionarios";
		$this->load->view('template/page_header');		
		$this->load->view('departamentofuncionario_list',$data);
		$this->load->view('template/page_footer');
	}



function departamentofuncionario_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->departamentofuncionario_model->lista_departamentofuncionariosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddepartamentofuncionario,$r->lapersona,$r->lapais,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('departamentofuncionario/actual').'"   data-iddepartamentofuncionario="'.$r->iddepartamentofuncionario.'">Ver</a>');
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


  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();


	$data['departamentofuncionario'] = $this->departamentofuncionario_model->departamentofuncionario($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Departamentofuncionario";
    $this->load->view('template/page_header');		
    $this->load->view('departamentofuncionario_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{


  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();


	$data['departamentofuncionario'] = $this->departamentofuncionario_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Departamentofuncionario";
    $this->load->view('template/page_header');		
    $this->load->view('departamentofuncionario_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['departamentofuncionario'] = $this->departamentofuncionario_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Departamentofuncionario";
  
    $this->load->view('template/page_header');		
    $this->load->view('departamentofuncionario_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['departamentofuncionario_list']=$this->departamentofuncionario_model->lista_departamentofuncionario()->result();
	$data['departamentofuncionario'] = $this->departamentofuncionario_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  

$data['title']="Departamentofuncionario";
	$this->load->view('template/page_header');		
  $this->load->view('departamentofuncionario_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['departamentofuncionario_list']=$this->departamentofuncionario_model->lista_departamentofuncionario()->result();
	$data['departamentofuncionario'] = $this->departamentofuncionario_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  $data['title']="Departamentofuncionario";
	$this->load->view('template/page_header');		
  $this->load->view('departamentofuncionario_record',$data);
	$this->load->view('template/page_footer');
}




}
