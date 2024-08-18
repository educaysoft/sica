<?php

class Portafolio extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	$this->load->model('persona_model');
  	$this->load->model('documento_model');
  	$this->load->model('periodoacademico_model');
  	$this->load->model('portafolio_model');
      	$this->load->model('ordenador_model');
      	$this->load->model('directorio_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['portafolio']=$this->portafolio_model->elultimo();
  		$data['personas']= $this->persona_model->lista_personasA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
		$data['directorios'] = $this->directorio_model->lista_directorios()->result();
			
		$data['title']="Lista de portafolios";
		$this->load->view('template/page_header');
		$this->load->view('portafolio_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


	public function add()
	{
			$data['personas']= $this->persona_model->lista_personasA()->result();
			$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
			$data['title']="Nueva Portafolio";
			$this->load->view('template/page_header');		
			$this->load->view('portafolio_form',$data);
			$this->load->view('template/page_footer');


	}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idpersona' => $this->input->post('idpersona'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
			'idordenador' => $this->input->post('idordenador'),
			'iddirectorio' => $this->input->post('iddirectorio'),
	 	);
	 	$this->portafolio_model->save($array_item);
	 	redirect('portafolio');
 	}



public function edit()
{
	 	$data['portafolio'] = $this->portafolio_model->portafolio($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personasA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['ordenadores']=  $this->ordenador_model->lista_ordenadores()->result();
		$data['directorios'] = $this->directorio_model->lista_directoriosxordenador($data['portafolio']['idordenador'])->result();
 	 	$data['title'] = "Actualizar Portafolio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('portafolio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idportafolio');
	 	$array_item=array(
		 	
		 	'idportafolio' => $this->input->post('idportafolio'),
			'idpersona' => $this->input->post('idpersona'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
			'idordenador' => $this->input->post('idordenador'),
			'iddirectorio' => $this->input->post('iddirectorio'),
	 	);
	 	$this->portafolio_model->update($id,$array_item);
	 	redirect('portafolio');
 	}


 	public function xdelete()
 	{
 		$data=$this->portafolio_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('portafolio/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
  	$data['title']="Portafolios";
  	$data['idpersona']=$this->uri->segment(3);
	$this->load->view('template/page_header');		
  	$this->load->view('portafolio_list',$data);
	$this->load->view('template/page_footer');
}



function portafolio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		
		$idpersona = $this->input->get("idpersona");
	 	$data0 = $this->portafolio_model->lista_portafoliosxpersona($idpersona);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idportafolio,$r->idperiodoacademico,$r->idpersona,$r->elperiodo,$r->lapersona,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('portafolio/actual').'"  data-idportafolio="'.$r->idportafolio.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}







	function asignaturapersona_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idportafolio=$this->input->get('idportafolio');
			$data0 =$this->asignaturapersona_model->lista_asignaturapersonasA($idportafolio);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idportafolio,$r->idasignaturapersona,$r->laasignatura,$r->paralelo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('asignaturapersona/actual').'"    data-idasignaturapersona="'.$r->idasignaturapersona.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}





	function documento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idpersona=$this->input->get('idpersona');
			$idperiodoacademico=$this->input->get('idperiodoacademico');
			//$data0 =$this->documento_model->lista_documentosD($idpersona,$idportafolio);
			$data0 =$this->portafolio_model->lista_portafolio2($idpersona,$idperiodoacademico);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumento,$r->eltipodocumento,$r->asunto,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm docu_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">pdf</a> ');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}



	function documento2_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idpersona=$this->input->get('idpersona');
			$idperiodoacademico=$this->input->get('idperiodoacademico');
			//$data0 =$this->documento_model->lista_documentosD($idpersona,$idportafolio);
			$data0 =$this->portafolio_model->lista_portafolio2($idpersona,$idperiodoacademico);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentoportafolio,$r->iddocumento,$r->eltipodocumento,$r->asunto,$r->fechaelaboracion,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno1="'.site_url('documentoportafolio/actual').'"    data-iddocumentoportafolio="'.$r->iddocumentoportafolio.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_doc"  data-retorno2="'.site_url('documento/actual').'"    data-iddocumento="'.$r->iddocumento.'">doc</a><a href="javascript:void(0);" class="btn btn-info btn-sm docu_ver"  data-iddocumento="'.$r->iddocumento.'" data-ordenador="'.$r->elordenador.'"  data-ubicacion="'.$r->ruta.'"  data-archivo="'.$r->archivopdf.'">pdf</a>'.$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_enviar" data-idtipodocu="'.$r->idtipodocu.'"    data-idordenador="'.$r->idordenador.'"  data-ordenador="'.$r->elordenador.'"    data-iddirectorio="'.$r->iddirectorio.'"  data-lapersona="'.$r->lapersona.'"      data-idpersona="'.$r->idpersona.'"  data-elordenador="'.$r->elordenador.'"   data-iddocumento="'.$r->iddocumento.'"    data-ruta="'.$r->ruta.'"   data-archivopdf="'.$r->archivopdf.'"   data-asunto="'.$r->asunto.'"          data-subject="'.$r->subject.'"    data-head="'.$r->head.'"    data-foot="'.$r->foot.'">enviar</a>');}	
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
	$data['portafolio'] = $this->portafolio_model->portafolio($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	  if(!empty($data))
	  {
  	$data['personas']= $this->persona_model->lista_personasA()->result();
    $data['title']="Portafolio";
    $this->load->view('template/page_header');		
    $this->load->view('portafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['personas']= $this->persona_model->lista_personasA()->result();
	$data['portafolio'] = $this->portafolio_model->elprimero();
	$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
	  if(!empty($data))
	  {
  	$data['personas']= $this->persona_model->lista_personasA()->result();
    $data['title']="Portafolio";
    $this->load->view('template/page_header');		
    $this->load->view('portafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['portafolio'] = $this->portafolio_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personasA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
		$data['directorios'] = $this->directorio_model->lista_directorios()->result();
  if(!empty($data))
  {
    $data['title']="Portafolio";
  
    $this->load->view('template/page_header');		
    $this->load->view('portafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['portafolio_list']=$this->portafolio_model->lista_portafolio()->result();
	$data['portafolio'] = $this->portafolio_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personasA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
		$data['directorios'] = $this->directorio_model->lista_directorios()->result();
  

$data['title']="Portafolio";
	$this->load->view('template/page_header');		
  $this->load->view('portafolio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['portafolio_list']=$this->portafolio_model->lista_portafolio()->result();
	$data['portafolio'] = $this->portafolio_model->anterior($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personasA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	$data['ordenadores'] = $this->ordenador_model->lista_ordenadores()->result();
	$data['directorios'] = $this->directorio_model->lista_directorios()->result();
  	$data['title']="Portafolio";
	$this->load->view('template/page_header');		
  	$this->load->view('portafolio_record',$data);
	$this->load->view('template/page_footer');
}



	public function portafolio_2023_1S_1()
	{
	  $this->load->view('cursos/portafolio-2023-1S-1');
	}


	public function portafolio_2023_2S_1()
	{
	  $this->load->view('cursos/portafolio-2023-2S-1');
	}


public function get_portafolio() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('iddocumento')) 
    {
        $this->db->select('*');
        $this->db->where('iddocumento',$this->input->get('iddocumento'));
        $this->db->where('idpersona' ,$this->input->get('idpersona'));
        $query = $this->db->get('documentoportafolio1');

	if ($query->num_rows() > 0) {
		$data=$query->result();
		echo json_encode($data);
	}else{

        $this->db->select('*');
        $this->db->where('idpersona' ,$this->input->get('idpersona'));
        $query = $this->db->get('portafolio1');
	    if ($query->num_rows() > 0) {
		    $data=$query->result();
	    	echo json_encode($data);
	    }else{
		    $data=$query->result();
		    echo json_encode($data);
       }
	}


    }
}








}
