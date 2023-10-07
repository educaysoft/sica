<?php

class Relacionpersona extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('relacionpersona_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('tiporelacionpersona_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['relacionpersona']=$this->relacionpersona_model->lista_relacionpersonas()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tiporelacionpersonas']= $this->tiporelacionpersona_model->lista_tiporelacionpersonas()->result();
			
		$data['title']="Lista de relacionpersonas";
		$this->load->view('template/page_header');
		$this->load->view('relacionpersona_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['relacionpersona'] = $this->relacionpersona_model->relacionpersona($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tiporelacionpersonas']= $this->tiporelacionpersona_model->lista_tiporelacionpersonas()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('relacionpersona_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}






public function add()
{

	if($this->uri->segment(3))
	{
		$data['personas']= $this->persona_model->persona($this->uri->segment(3))->result();

	}else{

		$data['personas']= $this->persona_model->lista_personas()->result();
	}


  	$data['tiporelacionpersonas']= $this->tiporelacionpersona_model->lista_tiporelacionpersonas()->result();
		$data['title']="Nueva Relacionpersona";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('relacionpersona_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idrelacionpersona' => $this->input->post('idrelacionpersona'),
			'idpersona' => $this->input->post('idpersona'),
			'idtiporelacionpersona' => $this->input->post('idtiporelacionpersona'),

	 	);
	 	$this->relacionpersona_model->save($array_item);
	 	//redirect('relacionpersona');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['relacionpersona'] = $this->relacionpersona_model->relacionpersona($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['tiporelacionpersonas']= $this->tiporelacionpersona_model->lista_tiporelacionpersonas()->result();
 	 	$data['title'] = "Actualizar Relacionpersona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('relacionpersona_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idrelacionpersona');
	 	$array_item=array(
		 	
		 	'idrelacionpersona' => $this->input->post('idrelacionpersona'),
			'idpersona' => $this->input->post('idpersona'),
			'idtiporelacionpersona' => $this->input->post('idtiporelacionpersona'),
	 	);
	 	$this->relacionpersona_model->update($id,$array_item);
	 	//redirect('relacionpersona');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->relacionpersona_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('relacionpersona/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Relacionpersonas";
	$this->load->view('template/page_header');		
  $this->load->view('relacionpersona_list',$data);
	$this->load->view('template/page_footer');
}



function relacionpersona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->relacionpersona_model->lista_relacionpersonasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idrelacionpersona,$r->lapersona,$r->elrelacionpersona,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('relacionpersona/actual').'"  data-idrelacionpersona="'.$r->idrelacionpersona.'">Ver</a>');
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
	$data['relacionpersona'] = $this->relacionpersona_model->elprimero();
  	$data['tiporelacionpersonas']= $this->tiporelacionpersona_model->lista_tiporelacionpersonas()->result();

  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Relacionpersona";
    $this->load->view('template/page_header');		
    $this->load->view('relacionpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['relacionpersona'] = $this->relacionpersona_model->elultimo();
  	$data['tiporelacionpersonas']= $this->tiporelacionpersona_model->lista_tiporelacionpersonas()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Relacionpersona";
  
    $this->load->view('template/page_header');		
    $this->load->view('relacionpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['relacionpersona_list']=$this->relacionpersona_model->lista_relacionpersona()->result();
	$data['relacionpersona'] = $this->relacionpersona_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tiporelacionpersonas']= $this->tiporelacionpersona_model->lista_tiporelacionpersonas()->result();
  $data['title']="Relacionpersona";
	$this->load->view('template/page_header');		
  $this->load->view('relacionpersona_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['relacionpersona_list']=$this->relacionpersona_model->lista_relacionpersona()->result();
	$data['relacionpersona'] = $this->relacionpersona_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tiporelacionpersonas']= $this->tiporelacionpersona_model->lista_tiporelacionpersonas()->result();
  $data['title']="Relacionpersona";
	$this->load->view('template/page_header');		
  $this->load->view('relacionpersona_record',$data);
	$this->load->view('template/page_footer');
}




}
