<?php
class Ubicacionproceso extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('ubicacionproceso_model');
      		$this->load->model('departamento_model');
      		$this->load->model('persona_model');
      		$this->load->model('estadoproceso_model');
      		$this->load->model('evento_model');
      		$this->load->model('proceso_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['ubicacionproceso'] = $this->ubicacionproceso_model->elultimo();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['estadoprocesos']= $this->estadoproceso_model->lista_estadoprocesos()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();

 		// print_r($data['ubicacionproceso_list']);
  		$data['title']="Lista de Ubicacionprocesoes";
		$this->load->view('template/page_header');		
  		$this->load->view('ubicacionproceso_record',$data);
		$this->load->view('template/page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['ubicacionproceso'] = $this->ubicacionproceso_model->ubicacionproceso($this->uri->segment(3))->row_array();


		$data['procesos']= $this->proceso_model->lista_procesos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estadoprocesos']= $this->estadoproceso_model->lista_estadoprocesos()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Ubicacionproceso del departamento";
	 
		$data['title']="Modulo ubicación del artículo: ";
		$this->load->view('template/page_header');		
		$this->load->view('ubicacionproceso_record',$data);
		$this->load->view('template/page_footer');
	   }else{
		$this->load->view('template/page_header.php');
		$this->load->view('login_form');
		$this->load->view('template/page_footer.php');
	   }
	}




	public function add()
	{

		$data['procesos']= $this->proceso_model->lista_procesos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estadoprocesos']= $this->estadoproceso_model->lista_estadoprocesos()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$data['title']="Nueva ubicación de artículo: ";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('ubicacionproceso_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idproceso' => $this->input->post('idproceso'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idestadoproceso' => $this->input->post('idestadoproceso'),
		 	'fecha' => $this->input->post('fecha'),
		 	'hora' => $this->input->post('hora'),
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$result=$this->ubicacionproceso_model->save($array_item);
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
	 	$data['ubicacionproceso'] = $this->ubicacionproceso_model->ubicacionproceso($this->uri->segment(3))->row_array();
		$data['procesos']= $this->proceso_model->lista_procesos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estadoprocesos']= $this->estadoproceso_model->lista_estadoprocesos()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 	 	$data['title'] = "Actualizar Ubicacionproceso";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ubicacionproceso_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idubicacionproceso');
	 	$array_item=array(
		 	'idubicacionproceso' => $this->input->post('idubicacionproceso'),

		 	'idproceso' => $this->input->post('idproceso'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idestadoproceso' => $this->input->post('idestadoproceso'),
		 	'fecha' => $this->input->post('fecha'),
		 	'hora' => $this->input->post('hora'),
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'detalle' => $this->input->post('detalle'),
	 	);
	 	$this->ubicacionproceso_model->update($id,$array_item);
	 	redirect('ubicacionproceso/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->ubicacionproceso_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ubicacionproceso/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionproceso_list',$data);
	$this->load->view('template/page_footer');
}



function ubicacionproceso_data()
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

	 	$data0 = $this->ubicacionproceso_model->ubicacionprocesosA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idubicacionproceso,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('ubicacionproceso/actual').'"   data-idubicacionproceso="'.$r->idubicacionproceso.'">Ver</a>');
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
		

	 	$data['ubicacionprocesos']= $this->ubicacionproceso_model->ubicacionprocesosA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('template/page_header');		
		$this->load->view('ubicacionproceso_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}





public function elprimero()
{
	$data['ubicacionproceso'] = $this->ubicacionproceso_model->elprimero();
  if(!empty($data))
  {

		$data['procesos']= $this->proceso_model->lista_procesos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['estasoproceso']= $this->estadoproceso_model->lista_estadoprocesos()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estadoprocesos']= $this->estadoproceso_model->lista_estadoprocesos()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
    $data['title']="Ubicacionproceso del departamento";
    $this->load->view('template/page_header');		
    $this->load->view('ubicacionproceso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{

	$data['ubicacionproceso'] = $this->ubicacionproceso_model->elultimo();
  if(!empty($data))
  {

	$data['procesos']= $this->proceso_model->lista_procesos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['estadoprocesos']= $this->estadoproceso_model->lista_estadoprocesos()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();

    $data['title']="Ubicacionproceso del proceso";
  
    $this->load->view('template/page_header');		
    $this->load->view('ubicacionproceso_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['ubicacionproceso_list']=$this->ubicacionproceso_model->lista_ubicacionproceso()->result();
	$data['ubicacionproceso'] = $this->ubicacionproceso_model->siguiente($this->uri->segment(3))->row_array();

	$data['procesos']= $this->proceso_model->lista_procesos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['estadoprocesos']= $this->estadoproceso_model->lista_estadoprocesos()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();

    $data['title']="Ubicacionproceso del departamento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionproceso_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['ubicacionproceso_list']=$this->ubicacionproceso_model->lista_ubicacionproceso()->result();
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['ubicacionproceso'] = $this->ubicacionproceso_model->anterior($this->uri->segment(3))->row_array();


	$data['procesos']= $this->proceso_model->lista_procesos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['estadoprocesos']= $this->estadoproceso_model->lista_estadoprocesos()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();

	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 // $data['title']="Correo";
    $data['title']="Ubicacionproceso del departamento";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionproceso_record',$data);
	$this->load->view('template/page_footer');
}







public function get_ubicacionproceso() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idubicacionproceso')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idubicacionproceso' => $this->input->get('idubicacionproceso')));
        $query = $this->db->get('ubicacionproceso');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
