<?php

class Telefono extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('telefono_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('operadora_model');
  	  $this->load->model('telefono_estado_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['telefono'] = $this->telefono_model->elprimero();
  		$data['personas']= $this->persona_model->lista_persona()->result();
  		$data['operadoras']= $this->operadora_model->lista_operadoras()->result();
  		$data['telefono_estados']= $this->telefono_estado_model->lista_telefono_estado()->result();
			
		$data['title']="Lista de telefonoes";
		$this->load->view('template/page_header');
		$this->load->view('telefono_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }




public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['telefono'] = $this->telefono_model->telefono($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['operadoras']= $this->operadora_model->lista_operadoras()->result();
  	$data['telefono_estados']= $this->telefono_estado_model->lista_telefono_estado()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('telefono_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}






public function add()
{
		$data['personas']= $this->persona_model->lista_persona()->result();
  		$data['operadoras']= $this->operadora_model->lista_operadoras()->result();
  		$data['telefono_estados']= $this->telefono_estado_model->lista_telefono_estado()->result();
		$data['title']="Nueva Telefono";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('telefono_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'numero' => $this->input->post('numero'),
			'idpersona' => $this->input->post('idpersona'),
			'idoperadora' => $this->input->post('idoperadora'),
			'idtelefono_estado' => $this->input->post('idtelefono_estado'),
	 	);
	 	$this->telefono_model->save($array_item);
	 	redirect('telefono');
 	}



public function edit()
{
	 	$data['telefono'] = $this->telefono_model->telefono($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_persona()->result();
  		$data['operadoras']= $this->operadora_model->lista_operadoras()->result();
  		$data['telefono_estados']= $this->telefono_estado_model->lista_telefono_estado()->result();
 	 	$data['title'] = "Actualizar Telefono";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('telefono_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtelefono');
	 	$array_item=array(
		 	
		 	'idtelefono' => $this->input->post('idtelefono'),
		 	'numero' => $this->input->post('numero'),
			'idpersona' => $this->input->post('idpersona'),
			'idoperadora' => $this->input->post('idoperadora'),
			'idtelefono_estado' => $this->input->post('idtelefono_estado'),
	 	);
	 	$this->telefono_model->update($id,$array_item);
	 	redirect('telefono');
 	}


 	public function delete()
 	{
 		$data=$this->telefono_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('telefono/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Telefonos";
	$this->load->view('template/page_header');		
  $this->load->view('telefono_list',$data);
	$this->load->view('template/page_footer');
}



function telefono_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->telefono_model->lista_telefonosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtelefono,$r->lapersona,$r->numero,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtelefono="'.$r->idtelefono.'">Ver</a>');
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
	$data['telefono'] = $this->telefono_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['operadoras']= $this->operadora_model->lista_operadora()->result();
  	$data['telefono_estados']= $this->telefono_estado_model->lista_telefono_estado()->result();
    $data['title']="Telefono";
    $this->load->view('template/page_header');		
    $this->load->view('telefono_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['telefono'] = $this->telefono_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['operadoras']= $this->operadora_model->lista_operadora()->result();
  	$data['telefono_estados']= $this->telefono_estado_model->lista_telefono_estado()->result();
    $data['title']="Telefono";
  
    $this->load->view('template/page_header');		
    $this->load->view('telefono_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['telefono_list']=$this->telefono_model->lista_telefono()->result();
	$data['telefono'] = $this->telefono_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['operadoras']= $this->operadora_model->lista_operadora()->result();
  	$data['telefono_estados']= $this->telefono_estado_model->lista_telefono_estado()->result();
  $data['title']="Telefono";
	$this->load->view('template/page_header');		
  $this->load->view('telefono_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['telefono_list']=$this->telefono_model->lista_telefono()->result();
	$data['telefono'] = $this->telefono_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['operadoras']= $this->operadora_model->lista_operadora()->result();
  	$data['telefono_estados']= $this->telefono_estado_model->lista_telefono_estado()->result();
  $data['title']="Telefono";
	$this->load->view('template/page_header');		
  $this->load->view('telefono_record',$data);
	$this->load->view('template/page_footer');
}




}
