<?php

class Docenteactividadacademica extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('docenteactividadacademica_model');
  	  $this->load->model('distributivodocente_model');
  	  $this->load->model('actividadacademica_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['docenteactividadacademica']=$this->docenteactividadacademica_model->lista_docenteactividadacademicas()->row_array();
  		$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
  		$data['actividadacademicas']= $this->actividadacademica_model->lista_actividadacademicas()->result();
			
		$data['title']="Lista de docenteactividadacademicas";
		$this->load->view('template/page_header');
		$this->load->view('docenteactividadacademica_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['docenteactividadacademica'] = $this->docenteactividadacademica_model->docenteactividadacademica($this->uri->segment(3))->row_array();
  	$data['distributivodocentes']= $this->distributivodocente_model->lista_distributivodocentesA()->result();
  	$data['actividadacademicas']= $this->actividadacademica_model->lista_actividadacademicas()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('docenteactividadacademica_record',$data);
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
		$iddistributivodocente=$this->uri->segment(3);
		$data['distributivodocentes']= $this->distributivodocente_model->distributivodocentes2($iddistributivodocente)->result();

	}else{

		$data['distributivodocentes']= $this->distributivodocente_model->lista_distributivodocentesA()->result();
	}


  	$data['actividadacademicas']= $this->actividadacademica_model->lista_actividadacademicas()->result();
		$data['title']="Nueva Docenteactividadacademica";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('docenteactividadacademica_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'iddocenteactividadacademica' => $this->input->post('iddocenteactividadacademica'),
		 	'numerohoras' => $this->input->post('numerohoras'),
		 	'detalle' => $this->input->post('detalle'),
			'iddistributivodocente' => $this->input->post('iddistributivodocente'),
			'idactividadacademica' => $this->input->post('idactividadacademica'),
	 	);
	 	$this->docenteactividadacademica_model->save($array_item);
	 	//redirect('docenteactividadacademica');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['docenteactividadacademica'] = $this->docenteactividadacademica_model->docenteactividadacademica($this->uri->segment(3))->row_array();
		$data['distributivodocentes']= $this->distributivodocente_model->lista_distributivodocentesA(0)->result();
  		$data['actividadacademicas']= $this->actividadacademica_model->lista_actividadacademicas()->result();
 	 	$data['title'] = "Actualizar Docenteactividadacademica";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('docenteactividadacademica_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddocenteactividadacademica');
	 	$array_item=array(
		 	
		 	'iddocenteactividadacademica' => $this->input->post('iddocenteactividadacademica'),
		 	'numerohoras' => $this->input->post('numerohoras'),
		 	'detalle' => $this->input->post('detalle'),
			'iddistributivodocente' => $this->input->post('iddistributivodocente'),
			'idactividadacademica' => $this->input->post('idactividadacademica'),
	 	);
	 	$this->docenteactividadacademica_model->update($id,$array_item);
	 	//redirect('docenteactividadacademica');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->docenteactividadacademica_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('docenteactividadacademica/elprimero');
 	}


public function listar()
{
	
  	$data['title']="Docenteactividadacademicas";
	$this->load->view('template/page_header');		
  	$this->load->view('docenteactividadacademica_list',$data);
	$this->load->view('template/page_footer');
}



function docenteactividadacademica_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		if($this->input->get('iddistributivodocente'))
		{
			$iddistributivodocente=$this->input->get('iddistributivodocente');
		}else{
			$iddistributivodocente=0; 
		}
	 	$data0 = $this->docenteactividadacademica_model->lista_docenteactividadacademicasA($iddistributivodocente);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocenteactividadacademica,$r->eldistributivodocente,$r->item,$r->tipoactividad,$r->nombreactividad,$r->numerohoras,$r->horasocupadas,
			$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('docenteactividadacademica/actual').'"  data-iddocenteactividadacademica="'.$r->iddocenteactividadacademica.'">Ver</a>');
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
		$data['docenteactividadacademicas']=$this->docenteactividadacademica_model->lista_docenteactividadacademicasA($iddistributivodocente)->result();
		$data['distributivodocente']=$this->distributivodocente_model->distributivodocentes2($iddistributivodocente)->row_array();
		$data['title']="Evento";
		$this->load->view('docenteactividadacademica_pdf',$data);
	}


public function clonar()
{
        $iddistributivodocente=$this->uri->segment(3);

	    $data['distributivodocente'] = $this->distributivodocente_model->distributivodocente($iddistributivodocente)->row_array();

       // print_r($data['distributivodocente']); echo "<br><br>";
	    $data['distributivodocente1'] = $this->distributivodocente_model->penultimodistributivodocente($data['distributivodocente']['iddocente'],$iddistributivodocente)->row_array();

        //print_r($data['distributivodocente1']); echo "<br><br>";
        $iddistributivodocente0=$data['distributivodocente1']['iddistributivodocente'];
	 	$data0 = $this->docenteactividadacademica_model->docenteactividadacademicaxdistdoce($iddistributivodocente0);
		foreach($data0->result() as $r){
	 	$array_item=array(
		 	
		 	'numerohoras' => $r->numerohoras,
		 	'detalle' => $r->detalle,
			'iddistributivodocente' => $iddistributivodocente,
			'idactividadacademica' => $r->idactividadacademica,
	 	);

	 	$this->docenteactividadacademica_model->save($array_item);
        }

}






public function elprimero()
{
	$data['docenteactividadacademica'] = $this->docenteactividadacademica_model->elprimero();
  if(!empty($data))
  {
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
  	$data['actividadacademicas']= $this->actividadacademica_model->lista_actividadacademicas()->result();
    	$data['title']="Docenteactividadacademica";
    	$this->load->view('template/page_header');		
    	$this->load->view('docenteactividadacademica_record',$data);
    	$this->load->view('template/page_footer');
  }else{
    	$this->load->view('template/page_header');		
    	$this->load->view('registro_vacio');
    	$this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['docenteactividadacademica'] = $this->docenteactividadacademica_model->elultimo();
  if(!empty($data))
  {
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
  	$data['actividadacademicas']= $this->actividadacademica_model->lista_actividadacademicas()->result();
    	$data['title']="Docenteactividadacademica";
    	$this->load->view('template/page_header');		
    	$this->load->view('docenteactividadacademica_record',$data);
   	$this->load->view('template/page_footer');
  }else{
    	$this->load->view('template/page_header');		
    	$this->load->view('registro_vacio');
    	$this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['docenteactividadacademica_list']=$this->docenteactividadacademica_model->lista_docenteactividadacademica()->result();
	$data['docenteactividadacademica'] = $this->docenteactividadacademica_model->siguiente($this->uri->segment(3))->row_array();
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
  	$data['actividadacademicas']= $this->actividadacademica_model->lista_actividadacademicas()->result();
  	$data['title']="Docenteactividadacademica";
	$this->load->view('template/page_header');		
  	$this->load->view('docenteactividadacademica_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['docenteactividadacademica_list']=$this->docenteactividadacademica_model->lista_docenteactividadacademica()->result();
	$data['docenteactividadacademica'] = $this->docenteactividadacademica_model->anterior($this->uri->segment(3))->row_array();
  	$data['distributivodocentes']=$this->distributivodocente_model->lista_distributivodocentesA()->result();
  	$data['actividadacademicas']= $this->actividadacademica_model->lista_actividadacademicas()->result();
  	$data['title']="Docenteactividadacademica";
	$this->load->view('template/page_header');		
  	$this->load->view('docenteactividadacademica_record',$data);
	$this->load->view('template/page_footer');
}




}
