<?php

class Actividadacademica extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('actividadacademica_model');
  	  $this->load->model('tipoactividadacademica_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['actividadacademica']=$this->actividadacademica_model->lista_actividadacademicas()->row_array();
  		$data['tipoactividadacademicas']= $this->tipoactividadacademica_model->lista_tipoactividadacademicas()->result();
			
		$data['title']="Lista de actividadacademicas";
		$this->load->view('template/page_header');
		$this->load->view('actividadacademica_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['actividadacademica'] = $this->actividadacademica_model->actividadacademica($this->uri->segment(3))->row_array();
  	$data['tipoactividadacademicas']= $this->tipoactividadacademica_model->lista_tipoactividadacademicas()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('actividadacademica_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}






public function add()
{



  	$data['tipoactividadacademicas']= $this->tipoactividadacademica_model->lista_tipoactividadacademicas()->result();
		$data['title']="Nueva Actividadacademica";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('actividadacademica_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idactividadacademica' => $this->input->post('idactividadacademica'),
		 	'nombre' => $this->input->post('nombre'),
		 	'item' => $this->input->post('item'),
			'idtipoactividadacademica' => $this->input->post('idtipoactividadacademica'),
	 	);
	 	$this->actividadacademica_model->save($array_item);
	 	//redirect('actividadacademica');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['actividadacademica'] = $this->actividadacademica_model->actividadacademica($this->uri->segment(3))->row_array();
  		$data['tipoactividadacademicas']= $this->tipoactividadacademica_model->lista_tipoactividadacademicas()->result();
 	 	$data['title'] = "Actualizar Actividadacademica";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('actividadacademica_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idactividadacademica');
	 	$array_item=array(
		 	
		 	'idactividadacademica' => $this->input->post('idactividadacademica'),
		 	'nombre' => $this->input->post('nombre'),
		 	'item' => $this->input->post('item'),
			'idtipoactividadacademica' => $this->input->post('idtipoactividadacademica'),
	 	);
	 	$this->actividadacademica_model->update($id,$array_item);
	 	//redirect('actividadacademica');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->actividadacademica_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('actividadacademica/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Actividadacademicas";
	$this->load->view('template/page_header');		
  $this->load->view('actividadacademica_list',$data);
	$this->load->view('template/page_footer');
}



function actividadacademica_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
	 	$data0 = $this->actividadacademica_model->lista_actividadacademicasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idactividadacademica,$r->item,$r->tipoactividad,$r->nombreactividad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('actividadacademica/actual').'"  data-idactividadacademica="'.$r->idactividadacademica.'">Ver</a>');
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
	$data['actividadacademica'] = $this->actividadacademica_model->elprimero();
  	$data['tipoactividadacademicas']= $this->tipoactividadacademica_model->lista_tipoactividadacademicas()->result();
  if(!empty($data))
  {
    $data['title']="Actividadacademica";
    $this->load->view('template/page_header');		
    $this->load->view('actividadacademica_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['actividadacademica'] = $this->actividadacademica_model->elultimo();
  	$data['tipoactividadacademicas']= $this->tipoactividadacademica_model->lista_tipoactividadacademicas()->result();
  if(!empty($data))
  {
    $data['title']="Actividadacademica";
  
    $this->load->view('template/page_header');		
    $this->load->view('actividadacademica_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['actividadacademica_list']=$this->actividadacademica_model->lista_actividadacademica()->result();
	$data['actividadacademica'] = $this->actividadacademica_model->siguiente($this->uri->segment(3))->row_array();
  	$data['tipoactividadacademicas']= $this->tipoactividadacademica_model->lista_tipoactividadacademicas()->result();
  $data['title']="Actividadacademica";
	$this->load->view('template/page_header');		
  $this->load->view('actividadacademica_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['actividadacademica_list']=$this->actividadacademica_model->lista_actividadacademica()->result();
	$data['actividadacademica'] = $this->actividadacademica_model->anterior($this->uri->segment(3))->row_array();
  	$data['tipoactividadacademicas']= $this->tipoactividadacademica_model->lista_tipoactividadacademicas()->result();
  $data['title']="Actividadacademica";
	$this->load->view('template/page_header');		
  $this->load->view('actividadacademica_record',$data);
	$this->load->view('template/page_footer');
}




}
