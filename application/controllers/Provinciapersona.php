<?php

class Provinciapersona extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('provincia_model');
  	  $this->load->model('provinciapersona_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['provinciapersona']=$this->provinciapersona_model->lista_provinciapersonas()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['provincias']= $this->provincia_model->lista_provincias()->result();
  	$data['provinciapersonas']= $this->provinciapersona_model->lista_provinciapersonas()->result();
			
		$data['title']="Lista de provinciapersonas";
		$this->load->view('template/page_header');
		$this->load->view('provinciapersona_record',$data);
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
			$data['provincias']= $this->provincia_model->lista_provincias()->result();
			$data['title']="Nueva Provinciapersona";
			$this->load->view('template/page_header');		
			$this->load->view('provinciapersona_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'idprovinciapersona' => $this->input->post('idprovinciapersona'),
		'idpersona' => $this->input->post('idpersona'),
		'idprovincia' => $this->input->post('idprovincia'),
		'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->provinciapersona_model->save($array_item);
	 	redirect('provinciapersona');
 	}



	public function edit()
	{
			$data['provinciapersona'] = $this->provinciapersona_model->provinciapersona($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['provincias']= $this->provincia_model->lista_provincias()->result();
			$data['title'] = "Actualizar Provinciapersona";
			$this->load->view('template/page_header');		
			$this->load->view('provinciapersona_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idprovinciapersona');
	 	$array_item=array(
		 	
		 	'idprovinciapersona' => $this->input->post('idprovinciapersona'),
			'idpersona' => $this->input->post('idpersona'),
			'idprovincia' => $this->input->post('idprovincia'),
			'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->provinciapersona_model->update($id,$array_item);
	 	redirect('provinciapersona');
 	}


 	public function delete()
 	{
 		$data=$this->provinciapersona_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('provinciapersona/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Provinciapersonas";
		$this->load->view('template/page_header');		
		$this->load->view('provinciapersona_list',$data);
		$this->load->view('template/page_footer');
	}



function provinciapersona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->provinciapersona_model->lista_provinciapersonasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idprovinciapersona,$r->lapersona,$r->laprovincia,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('provinciapersona/actual').'"   data-idprovinciapersona="'.$r->idprovinciapersona.'">Ver</a>');
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
  	$data['provincias']= $this->provincia_model->lista_provincias()->result();


	$data['provinciapersona'] = $this->provinciapersona_model->provinciapersona($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Provinciapersona";
    $this->load->view('template/page_header');		
    $this->load->view('provinciapersona_record',$data);
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
  	$data['provincias']= $this->provincia_model->lista_provincias()->result();


	$data['provinciapersona'] = $this->provinciapersona_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Provinciapersona";
    $this->load->view('template/page_header');		
    $this->load->view('provinciapersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['provinciapersona'] = $this->provinciapersona_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['provincias']= $this->provincia_model->lista_provincias()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Provinciapersona";
  
    $this->load->view('template/page_header');		
    $this->load->view('provinciapersona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['provinciapersona_list']=$this->provinciapersona_model->lista_provinciapersona()->result();
	$data['provinciapersona'] = $this->provinciapersona_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['provincias']= $this->provincia_model->lista_provincias()->result();
  

$data['title']="Provinciapersona";
	$this->load->view('template/page_header');		
  $this->load->view('provinciapersona_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['provinciapersona_list']=$this->provinciapersona_model->lista_provinciapersona()->result();
	$data['provinciapersona'] = $this->provinciapersona_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['provincias']= $this->provincia_model->lista_provincias()->result();
  $data['title']="Provinciapersona";
	$this->load->view('template/page_header');		
  $this->load->view('provinciapersona_record',$data);
	$this->load->view('template/page_footer');
}




}
