<?php

class Criteriocalidad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('criteriocalidad_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['criteriocalidad'] = $this->criteriocalidad_model->elultimo();
            $data['title'] = "Criteriocalidad";
            $this->load->view('template/page_header');
            $this->load->view('criteriocalidad_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo criteriocalidad
    public function add() {
        $data['title'] = "Nuevo criteriocalidad";
        $this->load->view('template/page_header');
        $this->load->view('criteriocalidad_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo criteriocalidad
    public function save() {
        $array_item = array(
            'idcriteriocalidad' => $this->input->post('idcriteriocalidad'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->criteriocalidad_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Criteriocalidad ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de criteriocalidad
    public function edit() {
        $data['criteriocalidad'] = $this->criteriocalidad_model->criteriocalidad($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar criteriocalidad";
        $this->load->view('template/page_header');
        $this->load->view('criteriocalidad_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de criteriocalidad
    public function save_edit() {
        $id = $this->input->post('idcriteriocalidad');
        $array_item = array(
            'idcriteriocalidad' => $this->input->post('idcriteriocalidad'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->criteriocalidad_model->update($id, $array_item);
        redirect('criteriocalidad');
    }

    // Método para eliminar un criteriocalidad
    public function delete() {
        $data = $this->criteriocalidad_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('criteriocalidad/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->criteriocalidad_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El criteriocalidad no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los criteriocalidads
    public function listar() {
        $data['criteriocalidad_list'] = $this->criteriocalidad_model->lista_criteriocalidadsA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('criteriocalidad_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de criteriocalidad en formato JSON
    public function criteriocalidad_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->criteriocalidad_model->lista_criteriocalidadsA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idcriteriocalidad, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('criteriocalidad/actual').'"   data-idcriteriocalidad="' . $r->idcriteriocalidad . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de criteriocalidad
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['criteriocalidad'] = $this->criteriocalidad_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('criteriocalidad_record', $data);
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

    // Método para mostrar el último registro de criteriocalidad
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['criteriocalidad'] = $this->criteriocalidad_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('criteriocalidad_record', $data);
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

    // Método para mostrar el siguiente registro de criteriocalidad
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['criteriocalidad'] = $this->criteriocalidad_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('criteriocalidad_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  criteriocalidad
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['criteriocalidad'] = $this->criteriocalidad_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('criteriocalidad_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_criteriocalidad() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idcriteriocalidad')) {
        $this->db->select('*');
        $this->db->where(array('idcriteriocalidad' => $this->input->post('idcriteriocalidad')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
