<?php

class Distributivodocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('docente_model');
  	  $this->load->model('distributivo_model');
  	  $this->load->model('distributivodocente_model');
  	  $this->load->model('asignaturadocente_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('evento_model');
  	  $this->load->model('jornadadocente_model');
  	  $this->load->model('tiempodedicacion_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('malla_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['distributivodocente']=$this->distributivodocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
  	$data['distributivo']= $this->distributivo_model->lista_distributivos1(0)->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			
		$data['title']="Lista de distributivodocentes";
		$this->load->view('template/page_header');
		$this->load->view('distributivodocente_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{
	$iddistributivo=0;
	if($this->uri->segment(3))
	{
		$iddistributivo=$this->uri->segment(3);
	}

  		$data['distributivos']= $this->distributivo_model->distributivo1($iddistributivo)->result();
		$data['docentes']= $this->docente_model->lista_docentesA()->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
		$data['title']="Nueva Distributivodocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('distributivodocente_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'iddocente' => $this->input->post('iddocente'),
			'iddistributivo' => $this->input->post('iddistributivo'),
			'idtiempodedicacion' => $this->input->post('idtiempodedicacion'),
	 	);
	 	$result=$this->distributivodocente_model->save($array_item);
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Docente ya ha sido asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


	 	redirect('distributivodocente');
 	}



	public function edit()
	{
			$data['distributivodocente'] = $this->distributivodocente_model->distributivodocente($this->uri->segment(3))->row_array();
			$data['docentes']= $this->docente_model->lista_docentesA()->result();
			$data['distributivos']= $this->distributivo_model->lista_distributivos1(0)->result();
			$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
			$data['title'] = "Actualizar Distributivodocente";
			$this->load->view('template/page_header');		
			$this->load->view('distributivodocente_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddistributivodocente');
	 	$array_item=array(
		 	
		 	'iddistributivodocente' => $this->input->post('iddistributivodocente'),
			'iddocente' => $this->input->post('iddocente'),
			'iddistributivo' => $this->input->post('iddistributivo'),
			'idtiempodedicacion' => $this->input->post('idtiempodedicacion'),
	 	);
	 	$this->distributivodocente_model->update($id,$array_item);
	 	redirect('distributivodocente/actual/'.$id);
 	}


 	public function quitar()
 	{
 		$data=$this->distributivodocente_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('Este docente no ha podida salir de este distributivo'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 //		echo json_encode($data);
//	 	redirect('distributivodocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Distributivodocentes";
	$this->load->view('template/page_header');		
  $this->load->view('distributivodocente_list',$data);
	$this->load->view('template/page_footer');
}



function distributivodocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->distributivodocente_model->lista_distributivodocentesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddistributivodocente,$r->eldistributivodocente,$r->numeasig,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('distributivodocente/actual').'"  data-iddistributivodocente="'.$r->iddistributivodocente.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



	function asignaturadocente_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$iddistributivodocente=$this->input->get('iddistributivodocente');
		$data0 =$this->asignaturadocente_model->lista_asignaturadocentesA($iddistributivodocente);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddistributivodocente,$r->idasignaturadocente,$r->nivel,$r->laasignatura,$r->paralelo,$r->horas,$r->estado,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('asignaturadocente/actual').'"    data-idasignaturadocente="'.$r->idasignaturadocente.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_gesi"  data-retorno="'.site_url('silabo/save').'"     data-paralelo="'.$r->paralelo.'"  data-laasignatura="'.$r->laasignatura.'"   data-elperiodoacademico="'.$r->elperiodoacademico.'"  data-idperiodoacademico="'.$r->idperiodoacademico.'"  data-iddocente="'.$r->iddocente.'" data-idpersona="'.$r->idpersona.'"   data-idasignatura="'.$r->idasignatura.'">GeSi</a>');
			}	
		$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
		echo json_encode($output);
		exit();
	}




	function evento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$iddistributivodocente=$this->input->get('iddistributivodocente');
			$data0 =$this->evento_model->eventosd($iddistributivodocente);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idsilabo,$r->idevento,$r->titulo,$r->codigoclassroom,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('evento/actual').'"    data-idevento="'.$r->idevento.'">Ver</a>');
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
		$iddistributivodocente=$this->uri->segment(3);
		$data['jornadadocente'] = $this->jornadadocente_model->jornadadocentexdido($iddistributivodocente)->result();
		$data['distributivodocente']=$this->distributivodocente_model->distributivodocente($iddistributivodocente)->row_array();
		$data['docente']=$this->docente_model->docente1($data['distributivodocente']['iddocente'])->result();
		$data['title']="Evento";
		$this->load->view('distributivodocente_list_pdf',$data);
	}


public function genpagina()
{
	$iddistributivo=0;
	$ordenrpt=1;
	if($this->uri->segment(3))
	{
		$iddistributivo=$this->uri->segment(3);

	 	$data['asignaturadocentes']= $this->asignaturadocente_model->asignaturadocentexdistributivo2($iddistributivo,$ordenrpt)->result();
		$arreglo=array();
		foreach($data['asignaturadocentes'] as $row){
		$idasignaturadocente=$row->idasignaturadocente;
//		$arreglo[$row->idasignaturadocente]=$this->jornadadocente_model->jornadadocentes($idasignaturadocente)->row_array();
		$xx=array($this->jornadadocente_model->jornadadocentes($idasignaturadocente)->result_array());	
		print_r($xx);
echo "<br><br>arrego individual<br><br>";

		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				 print_r($row3); echo "<br>";
				$arreglo+=[$row->idasignaturadocente=>$row3];
		}
		}
		}
$data['jornadadocente']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['jornadadocente']=$arreglo; 
		echo "<br><br>" ;
		print_r($data['jornadadocente']);
//		die();
	$data['asignatura']= $this->asignatura_model->asignaturas1($data['asignaturadocentes'][0]->idasignatura)->row_array();

	$data['malla']= $this->malla_model->mallaA($data['asignatura']['idmalla'])->result();

		$data['title']="Evento";
		$this->load->view('distributivodocente_genpagina',$data);

	}
}














public function actual()
{
	$data['distributivodocente'] = $this->distributivodocente_model->distributivodocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['distributivo']= $this->distributivo_model->distributivo1($data['distributivodocente']['iddistributivo'])->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	  if(!empty($data))
	  {
  		$data['docentes']= $this->docente_model->lista_docentesA()->result();
    		$data['title']="Distributivodocente";
    		$this->load->view('template/page_header');		
    		$this->load->view('distributivodocente_record',$data);
    		$this->load->view('template/page_footer');
  	}else{
    		$this->load->view('template/page_header');		
    		$this->load->view('registro_vacio');
    		$this->load->view('template/page_footer');
  	}
 }










public function elprimero()
{
  	$data['distributivo']= $this->distributivo_model->lista_distributivos1(0)->result();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
	$data['distributivodocente'] = $this->distributivodocente_model->elprimero();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Distributivodocente";
    $this->load->view('template/page_header');		
    $this->load->view('distributivodocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['distributivodocente'] = $this->distributivodocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['distributivo']= $this->distributivo_model->lista_distributivos1(0)->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
    $data['title']="Distributivodocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('distributivodocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['distributivodocente_list']=$this->distributivodocente_model->lista_distributivodocente()->result();
	$data['distributivodocente'] = $this->distributivodocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['distributivo']= $this->distributivo_model->lista_distributivos1(0)->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  

$data['title']="Distributivodocente";
	$this->load->view('template/page_header');		
  $this->load->view('distributivodocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['distributivodocente_list']=$this->distributivodocente_model->lista_distributivodocente()->result();
	$data['distributivodocente'] = $this->distributivodocente_model->anterior($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
  	$data['distributivo']= $this->distributivo_model->lista_distributivos1(0)->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Distributivodocente";
	$this->load->view('template/page_header');		
  $this->load->view('distributivodocente_record',$data);
	$this->load->view('template/page_footer');
}




}
