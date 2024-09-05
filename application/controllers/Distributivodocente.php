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
  	  $this->load->model('categoriadocente_model');
  	  $this->load->model('relaciondependencia_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('malla_model');
  	  $this->load->model('silabo_model');
  	  $this->load->model('publicaciondocente_model');
  	  $this->load->model('docenteactividadacademica_model');
  	  $this->load->model('trabajointegracioncurricular_model');
  	  $this->load->model('documentoportafolio_model');

}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['distributivodocente']=$this->distributivodocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
  	$data['categoriadocentes']= $this->categoriadocente_model->lista_categoriadocentes()->result();
  	$data['relaciondependencias']= $this->relaciondependencia_model->lista_relaciondependencias()->result();
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
		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
  	$data['categoriadocentes']= $this->categoriadocente_model->lista_categoriadocentes()->result();
  	$data['relaciondependencias']= $this->relaciondependencia_model->lista_relaciondependencias()->result();
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
			'idcategoriadocente' => $this->input->post('idcategoriadocente'),
			'idrelaciondependencia' => $this->input->post('idrelaciondependencia'),
			'portafoliodrive' => $this->input->post('portafoliodrive'),
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
			$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
			$data['distributivos']= $this->distributivo_model->lista_distributivos1(0)->result();
			$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
			$data['categoriadocentes']= $this->categoriadocente_model->lista_categoriadocentes()->result();
			$data['relaciondependencias']= $this->relaciondependencia_model->lista_relaciondependencias()->result();
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
            'idcategoriadocente' => $this->input->post('idcategoriadocente'),
			'idrelaciondependencia' => $this->input->post('idrelaciondependencia'),
			'portafoliodrive' => $this->input->post('portafoliodrive'),
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
			$data[]=array($r->iddistributivodocente,$r->idasignaturadocente,$r->nivel,$r->laasignatura,$r->paralelo,round(($r->hpdo+$r->hpra)/16,1),$r->horas,$r->estado,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('asignaturadocente/actual').'"    data-idasignaturadocente="'.$r->idasignaturadocente.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_gesi"  data-retorno="'.site_url('silabo/save').'"     data-paralelo="'.$r->paralelo.'"  data-laasignatura="'.$r->laasignatura.'"   data-elperiodoacademico="'.$r->elperiodoacademico.'"  data-idperiodoacademico="'.$r->idperiodoacademico.'"  data-iddocente="'.$r->iddocente.'" data-idpersona="'.$r->idpersona.'"   data-idasignatura="'.$r->idasignatura.'" data-idasignaturadocente="'.$r->idasignaturadocente.'">GeSi</a>');
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
		$data['distributivodocente']=$this->distributivodocente_model->distributivodocente1($iddistributivodocente)->row_array();
		$data['docente']=$this->docente_model->docente1($data['distributivodocente']['iddocente'])->result();
		$data['title']="Evento";
		$this->load->view('distributivodocente_list_pdf',$data);
	}


	public function reportepdf2()
	{
		$iddistributivo=$this->uri->segment(3);
		$data['distributivodocente']=$this->distributivodocente_model->distributivodocentes1($iddistributivo)->result();
		$this->load->view('distributivodocente_list_pdf2',$data);
	}







public function genpagina()
{
	$iddistributivo=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
        
        $inicio = microtime(true);
        $data['inicio']=$inicio;
		$iddistributivo=$this->uri->segment(3);
	 	$data['asignaturadocentes']= $this->asignaturadocente_model->asignaturadocentexdistributivoweb($iddistributivo,$ordenrpt)->result();
        $fin = microtime(true);

// Calcular la diferencia en segundos
$tiempoEjecucion = $fin - $inicio;

// Mostrar el tiempo de ejecución
echo "El script tardó " . $tiempoEjecucion . " segundos en ejecutarse asignaturadocente.";

		$arreglo=array();
		$arreglo2=array();
		$i=0;
		foreach($data['asignaturadocentes'] as $row){
		$idasignaturadocente=$row->idasignaturadocente;

//		$arreglo2+=array($idasignaturadocente=>$this->silabo_model->silabo2($row->iddocente,$row->idasignatura,$row->idevento)->result_array());

//		$arreglo[$row->idasignaturadocente]=$this->jornadadocente_model->jornadadocentes($idasignaturadocente)->row_array();
//		$xx=array($this->jornadadocente_model->jornadadocentes($idasignaturadocente)->result_array());
//		if(count($xx[0]) > 0){
//		foreach($xx as $row2){
//			foreach($row2 as $row3)
//			 {
//				$arreglo+=array($i=>array($row->idasignaturadocente=>$row3));
//				$i=$i+1;
//			}
//			}
//		}
		}
		$data['jornadadocente']=array();
		$data['silabos']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['jornadadocente']=$arreglo; 
		$data['silabos']=$arreglo2;
		$data['asignatura']= $this->asignatura_model->asignaturas1($data['asignaturadocentes'][0]->idasignatura)->row_array();

		$data['malla']= $this->malla_model->mallaA($data['asignatura']['idmalla'])->result();

        $fin = microtime(true);

// Calcular la diferencia en segundos
$tiempoEjecucion = $fin - $inicio;

// Mostrar el tiempo de ejecución
echo "El script tardó " . $tiempoEjecucion . " segundos en ejecutarse toas las consultas.";

//die();


		if(!$this->input->get("orden")){
			$data['ordenrpt']=0;	
			$data['title']="Evento";
			$this->load->view('distributivodocente_genpagina',$data);
		}else{
			echo $this->input->get("orden"); 
		if($this->input->get("orden")==1){
		$data['ordenrpt']=1;	
		$ordenrpt=1;
	 	$data['asignaturadocentes']= $this->asignaturadocente_model->asignaturadocentexdistributivo2($iddistributivo,$ordenrpt)->result();
		$this->load->view('distributivodocente_genpagina',$data);
		}

		if($this->input->get("orden")==2){

		$data['ordenrpt']=2;	
		$ordenrpt=2;
	 	$data['asignaturadocentes']= $this->asignaturadocente_model->asignaturadocentexdistributivo2($iddistributivo,$ordenrpt)->result();
		$this->load->view('distributivodocente_genpagina',$data);
		}	
	}
	}
}







public function genpagina2()
{
	$iddistributivo=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$iddistributivo=$this->uri->segment(3);
	 	$data['distributivodocentes']= $this->distributivodocente_model->distributivodocentes1($iddistributivo)->result();
		$arreglo=array();
		$i=0;
		foreach($data['distributivodocentes'] as $row){
		$iddocente=$row->iddocente;

	//	$arreglo[$row->iddocente]=$this->publicaciondocente_model->publicaciondocentesA($iddocente)->row_array();
		$xx=array($this->publicaciondocente_model->publicaciondocentesA($iddocente)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->iddocente=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['publicaciondocente']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['publicaciondocente']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

//		print_r(	$data['publicaciondocente']);
//		die();

		$this->load->view('distributivodocente_genpagina2',$data);
	}
}





public function generaweb()
{
	$iddistributivo=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$iddistributivo=$this->uri->segment(3);
	 	$data['distributivodocentes']= $this->distributivodocente_model->distributivodocentes1($iddistributivo)->result();
		$arreglo=array();
		$i=0;
		foreach($data['distributivodocentes'] as $row){
		$iddocente=$row->iddocente;
		$iddistributivodocente=$row->iddistributivodocente;

	//	$xx=array($this->publicaciondocente_model->publicaciondocentesA($iddocente)->result_array());
		$xx=array($this->docenteactividadacademica_model->lista_docenteactividadacademicasA($iddistributivodocente)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->iddocente=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['docenteactividadacademica']=array();
		$data['docenteactividadacademica']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;
		$this->load->view('distributivodocente_genpagina3',$data);
	}
}









public function genpagina4()
{
	$iddistributivo=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$iddistributivo=$this->uri->segment(3);
	 	$data['distributivodocentes']= $this->distributivodocente_model->distributivodocentes1($iddistributivo)->result();
		$arreglo=array();
		$i=0;
		foreach($data['distributivodocentes'] as $row){
		$iddocente=$row->iddocente;

	//	$arreglo[$row->iddocente]=$this->trabajointegracioncurricular_model->trabajointegracioncurricularsA($iddocente)->row_array();
		$xx=array($this->trabajointegracioncurricular_model->trabajointegracioncurricularsA($iddocente)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->iddocente=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['trabajointegracioncurricular']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['trabajointegracioncurricular']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

//		print_r(	$data['trabajointegracioncurricular']);
//		die();

		$this->load->view('distributivodocente_genpagina4',$data);
	}
}






public function genpagina5()
{
	$iddistributivo=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$iddistributivo=$this->uri->segment(3);
	 	$data['distributivodocentes']= $this->distributivodocente_model->distributivodocentes1($iddistributivo)->result();
		$arreglo=array();
		$i=0;
		foreach($data['distributivodocentes'] as $row){
		$iddocente=$row->iddocente;

		$xx=array($this->documentoportafolio_model->documentoportafoliodocente($iddocente,$row->idperiodoacademico)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->iddocente=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['documentoportafolio']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['documentoportafolio']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;


		$this->load->view('distributivodocente_genpagina5',$data);
	}
}





public function genpagina6()
{
	$iddistributivo=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$iddistributivo=$this->uri->segment(3);
	 	$data['distributivodocentes']= $this->distributivodocente_model->distributivodocentes1($iddistributivo)->result();
		$arreglo=array();
		$i=0;
		foreach($data['distributivodocentes'] as $row){
		$iddocente=$row->iddocente;
		$iddistributivodocente=$row->iddistributivodocente;

		//$xx=array($this->docenteactividadacademica_model->lista_docenteactividadacademicasA($iddistributivodocente)->result_array());
		$xx=array($this->asignaturadeldocente_model->lista_asignaturadeldocenteA($idddocente)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->iddocente=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['asignaturadeldocente']=array();
		$data['asignaturadeldocente']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;
		$this->load->view('distributivodocente_genpagina6',$data);
	}
}












public function actual()
{
	$data['distributivodocente'] = $this->distributivodocente_model->distributivodocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['distributivo']= $this->distributivo_model->distributivo1($data['distributivodocente']['iddistributivo'])->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
  	$data['categoriadocentes']= $this->categoriadocente_model->lista_categoriadocentes()->result();
  	$data['relaciondependencias']= $this->relaciondependencia_model->lista_relaciondependencias()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	  if(!empty($data))
	  {
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
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
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
	$data['distributivodocente'] = $this->distributivodocente_model->elprimero();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
  	$data['categoriadocentes']= $this->categoriadocente_model->lista_categoriadocentes()->result();
  	$data['relaciondependencias']= $this->relaciondependencia_model->lista_relaciondependencias()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
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
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['distributivo']= $this->distributivo_model->lista_distributivos1(0)->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
  	$data['categoriadocentes']= $this->categoriadocente_model->lista_categoriadocentes()->result();
  	$data['relaciondependencias']= $this->relaciondependencia_model->lista_relaciondependencias()->result();
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
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['distributivo']= $this->distributivo_model->lista_distributivos1(0)->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
  	$data['categoriadocentes']= $this->categoriadocente_model->lista_categoriadocentes()->result();
  	$data['relaciondependencias']= $this->relaciondependencia_model->lista_relaciondependencias()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  

$data['title']="Distributivodocente";
	$this->load->view('template/page_header');		
  $this->load->view('distributivodocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['distributivodocente_list']=$this->distributivodocente_model->lista_distributivodocente()->result();
	$data['distributivodocente'] = $this->distributivodocente_model->anterior($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['tiempodedicacions']= $this->tiempodedicacion_model->lista_tiempodedicacions()->result();
  	$data['categoriadocentes']= $this->categoriadocente_model->lista_categoriadocentes()->result();
  	$data['relaciondependencias']= $this->relaciondependencia_model->lista_relaciondependencias()->result();
  	$data['distributivo']= $this->distributivo_model->lista_distributivos1(0)->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Distributivodocente";
	$this->load->view('template/page_header');		
  $this->load->view('distributivodocente_record',$data);
	$this->load->view('template/page_footer');
}









public function paginaweb()
{

	$periodoarea=$this->uri->segment(3);
    $this->load->view('web/distributivodocente-'.$periodoarea);

}






}
