<?php
class Seguimientosilabo extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('seguimientosilabo_model');
      		$this->load->model('persona_model');
      		$this->load->model('silabo_model');
      		$this->load->model('tema_model');
	}

	public function index(){
  		$data['silabos']= $this->silabo_model->lista_silabos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['seguimientosilabo'] = $this->seguimientosilabo_model->elultimo();

 		// print_r($data['seguimientosilabo_list']);
  		$data['title']="Lista de Seguimientosilaboes";
		$this->load->view('template/page_header');		
  		$this->load->view('seguimientosilabo_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['silabos']= $this->silabo_model->silabo($this->uri->segment(3))->result();
		$data['seguimientosilabo'] = $this->seguimientosilabo_model->seguimientosilaboss($this->uri->segment(3));
		$data['title']="Nueva unidades del silabo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('seguimientosilabo_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idsilabo' => $this->input->post('idsilabo'),
		 	'nombre' => $this->input->post('nombre'),
		 	'unidad' => $this->input->post('unidad'),
	 	);
	 	$this->seguimientosilabo_model->save($array_item);
	 	redirect('seguimientosilabo');
 	}



	public function edit()
	{
	 	$data['seguimientosilabo'] = $this->seguimientosilabo_model->seguimientosilabo($this->uri->segment(3))->row_array();
		$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Seguimientosilabo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('seguimientosilabo_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idseguimientosilabo');
	 	$array_item=array(
		 	'nombre' => $this->input->post('nombre'),
		 	'unidad' => $this->input->post('unidad'),
		 	'idsilabo' => $this->input->post('idsilabo'),
	 	);
	 	$this->seguimientosilabo_model->update($id,$array_item);
	 	redirect('seguimientosilabo/actual/'.$id);
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('idseguimientosilabo');
	 	$array_item=array(
		 	'idsilabo' => $this->input->post('idsilabo'),
		 	'idpersona' => $this->input->post('idpersona'),
	 	);
	 	echo $this->seguimientosilabo_model->update($id,$array_item);
 	}



 	public function delete()
 	{
 		$data=$this->seguimientosilabo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('seguimientosilabo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Unidades del silabo";
		$this->load->view('template/page_header');		
		$this->load->view('seguimientosilabo_list',$data);
		$this->load->view('template/page_footer');
	}



	function seguimientosilabo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->seguimientosilabo_model->listar_seguimientosilabo1();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idseguimientosilabo,$r->idsilabo,$r->unidad,$r->launidad,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idsilabo="'.$r->idseguimientosilabo.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}





	function tema_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idseguimientosilabo=$this->input->get('idseguimientosilabo');
			$data0 =$this->tema_model->temas2($idseguimientosilabo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idseguimientosilabo,$r->idtema,$r->unidad,$r->numerosesion,$r->nombrecorto,$r->duracionminutos,$r->idvideotutorial,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('tema/actual').'"    data-idtema="'.$r->idtema.'">Ver</a>');
			}	
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
		$data['seguimientosilabo'] = $this->seguimientosilabo_model->seguimientosilabo($this->uri->segment(3))->row_array();
	  if(!empty($data))
	  {
			$data['silabos']= $this->silabo_model->lista_silabos()->result();

		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Seguimientosilabo del videotutorial";
	    $this->load->view('template/page_header');		
	    $this->load->view('seguimientosilabo_record',$data);
	    $this->load->view('template/page_footer');
	  }else{
	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}







	public function elprimero()
	{
		$data['seguimientosilabo'] = $this->seguimientosilabo_model->elprimero();
	  if(!empty($data))
	  {
			$data['silabos']= $this->silabo_model->lista_silabos()->result();

		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Seguimientosilabo del videotutorial";
	    $this->load->view('template/page_header');		
	    $this->load->view('seguimientosilabo_record',$data);
	    $this->load->view('template/page_footer');
	  }else{
	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function elultimo()
	{
		$data['seguimientosilabo'] = $this->seguimientosilabo_model->elultimo();
	  if(!empty($data))
	  {
			$data['silabos']= $this->silabo_model->lista_silabos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Seguimientosilabo del videotutorial";
	  
	    $this->load->view('template/page_header');		
	    $this->load->view('seguimientosilabo_record',$data);
	    $this->load->view('template/page_footer');
	  }else{

	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function siguiente(){
	 // $data['seguimientosilabo_list']=$this->seguimientosilabo_model->lista_seguimientosilabo()->result();
		$data['seguimientosilabo'] = $this->seguimientosilabo_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['silabos']= $this->silabo_model->lista_silabos()->result();
	    $data['title']="Seguimientosilabo del videotutorial";
	 // $data['title']="Correo";
		$this->load->view('template/page_header');		
	  $this->load->view('seguimientosilabo_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
	 // $data['seguimientosilabo_list']=$this->seguimientosilabo_model->lista_seguimientosilabo()->result();
	$data['seguimientosilabo'] = $this->seguimientosilabo_model->anterior($this->uri->segment(3))->row_array();
	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['silabos']= $this->silabo_model->lista_silabos()->result();
	 // $data['title']="Correo";
	    $data['title']="Seguimientosilabo del videotutorial";
		$this->load->view('template/page_header');		
	  $this->load->view('seguimientosilabo_record',$data);
		$this->load->view('template/page_footer');
	}


}
