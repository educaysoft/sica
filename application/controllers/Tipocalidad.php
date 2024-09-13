<?php

class Tipocalidad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tipocalidad_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipocalidad'] = $this->tipocalidad_model->elultimo();
            $data['title'] = "Tipocalidad";
            $this->load->view('template/page_header');
            $this->load->view('tipocalidad_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo tipocalidad
    public function add() {
        $data['title'] = "Nuevo tipocalidad";
        $this->load->view('template/page_header');
        $this->load->view('tipocalidad_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo tipocalidad
    public function save() {
        $array_item = array(
            'idtipocalidad' => $this->input->post('idtipocalidad'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->tipocalidad_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Tipocalidad ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de tipocalidad
    public function edit() {
        $data['tipocalidad'] = $this->tipocalidad_model->tipocalidad($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar tipocalidad";
        $this->load->view('template/page_header');
        $this->load->view('tipocalidad_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de tipocalidad
    public function save_edit() {
        $id = $this->input->post('idtipocalidad');
        $array_item = array(
            'idtipocalidad' => $this->input->post('idtipocalidad'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->tipocalidad_model->update($id, $array_item);
        redirect('tipocalidad');
    }

    // Método para eliminar un tipocalidad
    public function delete() {
        $data = $this->tipocalidad_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('tipocalidad/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->tipocalidad_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El tipocalidad no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los tipocalidads
    public function listar() {
        $data['tipocalidad_list'] = $this->tipocalidad_model->lista_tipocalidadsA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('tipocalidad_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de tipocalidad en formato JSON
    public function tipocalidad_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->tipocalidad_model->lista_tipocalidadsA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idtipocalidad, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tipocalidad/actual').'"   data-idtipocalidad="' . $r->idtipocalidad . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de tipocalidad
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipocalidad'] = $this->tipocalidad_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('tipocalidad_record', $data);
                $this->load->view('template/page_footer');
            } else {
                $this->load->view('template/page_header');
                $this->load->view('registro_vacio');
                $this->load->view('template/page_footer');
            }
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el último registro de tipocalidad
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipocalidad'] = $this->tipocalidad_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('tipocalidad_record', $data);
                $this->load->view('template/page_footer');
            } else {
                $this->load->view('template/page_header');
                $this->load->view('registro_vacio');
                $this->load->view('template/page_footer');
            }
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el siguiente registro de tipocalidad
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipocalidad'] = $this->tipocalidad_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('tipocalidad_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  tipocalidad
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['tipocalidad'] = $this->tipocalidad_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('tipocalidad_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_tipocalidad() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipocalidad')) {
        $this->db->select('*');
        $this->db->where(array('idtipocalidad' => $this->input->post('idtipocalidad')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
