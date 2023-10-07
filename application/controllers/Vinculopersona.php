<?php

class Vinculopersona extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('vinculopersona_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('relacionpersona_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['vinculopersona']=$this->vinculopersona_model->lista_vinculopersonasA()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['relacionpersonas']= $this->relacionpersona_model->lista_relacionpersonas()->result();
			
		$data['title']="Lista de vinculopersonas";
		$this->load->view('template/page_header');
		$this->load->view('vinculopersona_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['vinculopersona'] = $this->vinculopersona_model->vinculopersona1($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['relacionpersonas']= $this->relacionpersona_model->lista_relacionpersonasA()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('vinculopersona_record',$data);
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


  	$data['relacionpersonas']= $this->relacionpersona_model->lista_relacionpersonasA()->result();
		$data['title']="Nueva Vinculopersona";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('vinculopersona_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idvinculopersona' => $this->input->post('idvinculopersona'),
		 	'fechadesde' => $this->input->post('fechahasta'),
		 	'fechahasta' => $this->input->post('fechahasta'),
			'idpersona' => $this->input->post('idpersona'),
			'idrelacionpersona' => $this->input->post('idrelacionpersona'),
	 	);
	 	$this->vinculopersona_model->save($array_item);
	 	//redirect('vinculopersona');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['vinculopersona'] = $this->vinculopersona_model->vinculopersona($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['relacionpersonas']= $this->relacionpersona_model->lista_relacionpersona()->result();
 	 	$data['title'] = "Actualizar Vinculopersona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('vinculopersona_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idvinculopersona');
	 	$array_item=array(
		 	
		 	'idvinculopersona' => $this->input->post('idvinculopersona'),
		 	'fechadesde' => $this->input->post('fechahasta'),
		 	'fechahasta' => $this->input->post('fechahasta'),
			'idpersona' => $this->input->post('idpersona'),
			'idrelacionpersona' => $this->input->post('idrelacionpersona'),
	 	);
	 	$this->vinculopersona_model->update($id,$array_item);
	 	//redirect('vinculopersona');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->vinculopersona_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('vinculopersona/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Vinculopersonas";
	$this->load->view('template/page_header');		
  $this->load->view('vinculopersona_list',$data);
	$this->load->view('template/page_footer');
}



function vinculopersona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->vinculopersona_model->lista_vinculopersonasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idvinculopersona,$r->idpersona,$r->lapersona1,$r->larelacion,$r->idpersona2,$r->lapersona,$r->fechadesde,$r->fechahasta,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('vinculopersona/actual').'"  data-idvinculopersona="'.$r->idvinculopersona.'">Ver</a>');
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
	$data['vinculopersona'] = $this->vinculopersona_model->elprimero();
  	$data['relacionpersonas']= $this->relacionpersona_model->lista_relacionpersona()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Vinculopersona";
    $this->load->view('template/page_header');		
    $this->load->view('vinculopersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['vinculopersona'] = $this->vinculopersona_model->elultimo();
  	$data['relacionpersonas']= $this->relacionpersona_model->lista_relacionpersona()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Vinculopersona";
  
    $this->load->view('template/page_header');		
    $this->load->view('vinculopersona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['vinculopersona_list']=$this->vinculopersona_model->lista_vinculopersona()->result();
	$data['vinculopersona'] = $this->vinculopersona_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['relacionpersonas']= $this->relacionpersona_model->lista_relacionpersona()->result();
  $data['title']="Vinculopersona";
	$this->load->view('template/page_header');		
  $this->load->view('vinculopersona_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['vinculopersona_list']=$this->vinculopersona_model->lista_vinculopersona()->result();
	$data['vinculopersona'] = $this->vinculopersona_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['relacionpersonas']= $this->relacionpersona_model->lista_relacionpersona()->result();
  $data['title']="Vinculopersona";
	$this->load->view('template/page_header');		
  $this->load->view('vinculopersona_record',$data);
	$this->load->view('template/page_footer');
}




}
