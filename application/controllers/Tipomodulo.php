<?php

class Tipomodulo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tipomodulo_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipomodulo'] = $this->tipomodulo_model->elultimo();
            $data['title'] = "Tipomodulo";
            $this->load->view('template/page_header');
            $this->load->view('tipomodulo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo tipomodulo
    public function add() {
        $data['title'] = "Nuevo tipomodulo";
        $this->load->view('template/page_header');
        $this->load->view('tipomodulo_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo tipomodulo
    public function save() {
        $array_item = array(
            'idtipomodulo' => $this->input->post('idtipomodulo'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->tipomodulo_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Tipomodulo ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de tipomodulo
    public function edit() {
        $data['tipomodulo'] = $this->tipomodulo_model->tipomodulo($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar tipomodulo";
        $this->load->view('template/page_header');
        $this->load->view('tipomodulo_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de tipomodulo
    public function save_edit() {
        $id = $this->input->post('idtipomodulo');
        $array_item = array(
            'idtipomodulo' => $this->input->post('idtipomodulo'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->tipomodulo_model->update($id, $array_item);
        redirect('tipomodulo');
    }

    // Método para eliminar un tipomodulo
    public function delete() {
        $data = $this->tipomodulo_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('tipomodulo/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->tipomodulo_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El tipomodulo no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los tipomodulos
    public function listar() {
        $data['tipomodulo_list'] = $this->tipomodulo_model->lista_tipomodulosA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('tipomodulo_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de tipomodulo en formato JSON
    public function tipomodulo_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->tipomodulo_model->lista_tipomodulosA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idtipomodulo, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tipomodulo/actual').'"   data-idtipomodulo="' . $r->idtipomodulo . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de tipomodulo
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipomodulo'] = $this->tipomodulo_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('tipomodulo_record', $data);
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

    // Método para mostrar el último registro de tipomodulo
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipomodulo'] = $this->tipomodulo_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('tipomodulo_record', $data);
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

    // Método para mostrar el siguiente registro de tipomodulo
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['tipomodulo'] = $this->tipomodulo_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('tipomodulo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  tipomodulo
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['tipomodulo'] = $this->tipomodulo_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('tipomodulo_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_tipomodulo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipomodulo')) {
        $this->db->select('*');
        $this->db->where(array('idtipomodulo' => $this->input->post('idtipomodulo')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
