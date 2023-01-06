<?php

class Distributivo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('distributivo_model');
      $this->load->model('distributivodocente_model');
      $this->load->model('periodoacademico_model');
      $this->load->model('institucion_model');
}

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/distributivo
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['distributivo']=$this->distributivo_model->elultimo();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$data['title']="Lista de distributivoes";
			$this->load->view('template/page_header');
			$this->load->view('distributivo_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
			$data['title']="Nueva distributivo";
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$this->load->view('template/page_header');		
			$this->load->view('distributivo_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		'idinstitucion' => $this->input->post('idinstitucion'),
	 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->distributivo_model->save($array_item);
	 	redirect('distributivo');
 	}



	public function edit()
	{
			$data['distributivo'] = $this->distributivo_model->distributivo($this->uri->segment(3))->row_array();
  			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['title'] = "Actualizar distributivo";
			$this->load->view('template/page_header');		
			$this->load->view('distributivo_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddistributivo');
	 	$array_item=array(
		 	
		 	'iddistributivo' => $this->input->post('iddistributivo'),
	 		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
		 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->distributivo_model->update($id,$array_item);
	 	redirect('distributivo/actual/'.$id);
 	}


 	public function delete()
 	{
 		$this->distributivo_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('distributivo/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
		$data['distributivos'] = $this->distributivo_model->lista_distributivos1(0)->result();
	  	$data['title']="Distributivo";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
	  	$this->load->view('distributivo_list',$data);
		$this->load->view('template/page_footer');
	}



function distributivo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idperiodoacademico=$this->input->get('idperiodoacademico');

	 	$data0 = $this->distributivo_model->lista_distributivos1($idperiodoacademico);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->elperiodoacademico,$r->iddistributivo,$r->distributivo,$r->actividad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('distributivo/actual').'"    data-iddistributivo="'.$r->iddistributivo.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



public function panel()
{
	
	$data['distributivos'] = $this->distributivo_model->lista_distributivos()->result();
  	$data['title']="Distributivo";
	$this->load->view('template/page_header');		
  	$this->load->view('distributivos/distributivos',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('iddistributivo'=>$_GET['iddistributivo'],'idevento'=>$_GET['idevento']);	
	$data['distributivo'] = $this->distributivo_model->distributivo($_GET['iddistributivo'])->row_array();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_unidades($_GET['iddistributivo'])->result();
  	$data['title']="Distributivo";
	$this->load->view('template/page_header');		
 	$this->load->view('distributivos/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}



	function docente_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$iddistributivo=$this->input->get('iddistributivo');
			$data0 =$this->distributivodocente_model->distributivodocentes1($iddistributivo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddistributivo,$r->iddistributivodocente,$r->iddocente,$r->eldocente,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('fechacalendario/actual').'"    data-idfechacalendario="'.$r->idfechacalendario.'">Ver</a>');
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
		$idperiodoacademico=$this->uri->segment(3);
	 	$data['fechacalendarios']= $this->fechacalendario_model->lista_fechacalendarios1($idperiodoacademico)->result();

		$data['title']="Evento";
		$this->load->view('distributivo_list_pdf',$data);
	}






public function actual()
{
	$data['distributivo'] = $this->distributivo_model->distributivo($this->uri->segment(3))->row_array();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Distributivo";
    $this->load->view('template/page_header');		
    $this->load->view('distributivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }




public function elprimero()
{
	$data['distributivo'] = $this->distributivo_model->elprimero();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Distributivo";
    $this->load->view('template/page_header');		
    $this->load->view('distributivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['distributivo'] = $this->distributivo_model->elultimo();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Distributivo";
  
    $this->load->view('template/page_header');		
    $this->load->view('distributivo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['distributivo_list']=$this->distributivo_model->lista_distributivo()->result();
	$data['distributivo'] = $this->distributivo_model->siguiente($this->uri->segment(3))->row_array();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['title']="Distributivo";
	$this->load->view('template/page_header');		
  	$this->load->view('distributivo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['distributivo_list']=$this->distributivo_model->lista_distributivo()->result();
	$data['distributivo'] = $this->distributivo_model->anterior($this->uri->segment(3))->row_array();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['title']="Distributivo";
	$this->load->view('template/page_header');		
  	$this->load->view('distributivo_record',$data);
	$this->load->view('template/page_footer');
}

public function get_periodoacademico() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idsilabo')) {
        $this->db->select('*');
        $this->db->where(array('idsilabo' => $this->input->post('idsilabo')));
        $query = $this->db->get('periodoacademico');
	$data=$query->result();
	echo json_encode($data);
	}

}





}
