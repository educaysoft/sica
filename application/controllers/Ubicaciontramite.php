<?php
class Ubicaciontramite extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('ubicaciontramite_model');
      		$this->load->model('departamento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('tramite_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['ubicaciontramite'] = $this->ubicaciontramite_model->elultimo();
		$data['tramites']= $this->tramite_model->lista_tramites()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();

 		// print_r($data['ubicaciontramite_list']);
  		$data['title']="Lista de Ubicaciontramitees";
		$this->load->view('template/page_header');		
  		$this->load->view('ubicaciontramite_record',$data);
		$this->load->view('template/page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['ubicaciontramite'] = $this->ubicaciontramite_model->ubicaciontramite($this->uri->segment(3))->row_array();


		$data['tramites']= $this->tramite_model->lista_tramites()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Ubicaciontramite del departamento";
	 
		$data['title']="Modulo ubicación del artículo: ";
		$this->load->view('template/page_header');		
		$this->load->view('ubicaciontramite_record',$data);
		$this->load->view('template/page_footer');
	   }else{
		$this->load->view('template/page_header.php');
		$this->load->view('login_form');
		$this->load->view('template/page_footer.php');
	   }
	}




	public function add()
	{

		$data['tramites']= $this->tramite_model->lista_tramites()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$data['title']="Nueva ubicación de artículo: ";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('ubicaciontramite_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idtramite' => $this->input->post('idtramite'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fecha' => $this->input->post('fecha'),
		 	'hora' => $this->input->post('hora'),
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$result=$this->ubicaciontramite_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Fecha para este evento ya fue asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 
 	}



	public function edit()
	{
	 	$data['ubicaciontramite'] = $this->ubicaciontramite_model->ubicaciontramite($this->uri->segment(3))->row_array();
		$data['tramites']= $this->tramite_model->lista_tramites()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Ubicaciontramite";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ubicaciontramite_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idubicaciontramite');
	 	$array_item=array(
		 	'idubicaciontramite' => $this->input->post('idubicaciontramite'),

		 	'idtramite' => $this->input->post('idtramite'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fecha' => $this->input->post('fecha'),
		 	'hora' => $this->input->post('hora'),
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$this->ubicaciontramite_model->update($id,$array_item);
	 	redirect('ubicaciontramite/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->ubicaciontramite_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ubicaciontramite/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('template/page_header');		
  $this->load->view('ubicaciontramite_list',$data);
	$this->load->view('template/page_footer');
}



function ubicaciontramite_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		if($this->uri->segment(3))
		{
			$idevento=$this->uri->segment(3);
		}else{
			$idevento=$this->input->get('idevento');
		}

	 	$data0 = $this->ubicaciontramite_model->ubicaciontramitesA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idubicaciontramite,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('ubicaciontramite/actual').'"   data-idubicaciontramite="'.$r->idubicaciontramite.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();

}




	public function reportepdf()
	{
		

	 	$data['ubicaciontramites']= $this->ubicaciontramite_model->ubicaciontramitesA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('template/page_header');		
		$this->load->view('ubicaciontramite_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}





public function elprimero()
{
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['ubicaciontramite'] = $this->ubicaciontramite_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicaciontramite del departamento";
    $this->load->view('template/page_header');		
    $this->load->view('ubicaciontramite_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['ubicaciontramite'] = $this->ubicaciontramite_model->elultimo();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicaciontramite del departamento";
  
    $this->load->view('template/page_header');		
    $this->load->view('ubicaciontramite_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['ubicaciontramite_list']=$this->ubicaciontramite_model->lista_ubicaciontramite()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['ubicaciontramite'] = $this->ubicaciontramite_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Ubicaciontramite del departamento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('ubicaciontramite_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['ubicaciontramite_list']=$this->ubicaciontramite_model->lista_ubicaciontramite()->result();
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['ubicaciontramite'] = $this->ubicaciontramite_model->anterior($this->uri->segment(3))->row_array();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Ubicaciontramite del departamento";
	$this->load->view('template/page_header');		
  $this->load->view('ubicaciontramite_record',$data);
	$this->load->view('template/page_footer');
}







public function get_ubicaciontramite() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idubicaciontramite')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idubicaciontramite' => $this->input->get('idubicaciontramite')));
        $query = $this->db->get('ubicaciontramite');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
