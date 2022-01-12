<?php
class Maestria extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('maestria_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['maestria']=$this->maestria_model->maestria(1)->row_array();
		$data['title']="Lista de maestriaes";
		$this->load->view('template/page_header');
		$this->load->view('maestria_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva maestria";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('maestria_form',$data);
	 	$this->load->view('template/page_footer');
}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idmaestria' => $this->input->post('idmaestria'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->maestria_model->save($array_item);
	 	redirect('maestria');
 	}



public function edit()
{
	 	$data['maestria'] = $this->maestria_model->maestria($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar maestria";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('maestria_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmaestria');
	 	$array_item=array(
		 	
		 	'idmaestria' => $this->input->post('idmaestria'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->maestria_model->update($id,$array_item);
	 	redirect('maestria');
 	}


 	public function delete()
 	{
 		$data=$this->maestria_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('maestria/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['maestria'] = $this->maestria_model->lista_maestriaes()->result();
  $data['title']="Maestria";
	$this->load->view('template/page_header');		
  $this->load->view('maestria_list',$data);
	$this->load->view('template/page_footer');
}



function maestria_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->maestria_model->lista_maestriaes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmaestria,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idmaestria="'.$r->idmaestria.'">Ver</a>');
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

	$data['maestria'] = $this->maestria_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Maestria";
  
    $this->load->view('template/page_header');		
    $this->load->view('maestria_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }


public function elultimo()
{

	$data['maestria'] = $this->maestria_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Maestria";
  
    $this->load->view('template/page_header');		
    $this->load->view('maestria_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }









public function siguiente(){
 // $data['maestria_list']=$this->maestria_model->lista_maestria()->result();
	$data['maestria'] = $this->maestria_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Maestria";
	$this->load->view('template/page_header');		
  $this->load->view('maestria_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['maestria_list']=$this->maestria_model->lista_maestria()->result();
	$data['maestria'] = $this->maestria_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Maestria";
	$this->load->view('template/page_header');		
  $this->load->view('maestria_record',$data);
	$this->load->view('template/page_footer');
}







}
