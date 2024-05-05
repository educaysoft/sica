<?php

class Sexo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('sexo_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['sexo'] = $this->sexo_model->elultimo();
            $data['title'] = "Sexo";
            $this->load->view('template/page_header');
            $this->load->view('sexo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo sexo
    public function add() {
        $data['title'] = "Nuevo sexo";
        $this->load->view('template/page_header');
        $this->load->view('sexo_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo sexo
    public function save() {
        $array_item = array(
            'idsexo' => $this->input->post('idsexo'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->sexo_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Sexo ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de sexo
    public function edit() {
        $data['sexo'] = $this->sexo_model->sexo($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar sexo";
        $this->load->view('template/page_header');
        $this->load->view('sexo_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de sexo
    public function save_edit() {
        $id = $this->input->post('idsexo');
        $array_item = array(
            'idsexo' => $this->input->post('idsexo'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->sexo_model->update($id, $array_item);
        redirect('sexo');
    }

    // Método para eliminar un sexo
    public function delete() {
        $data = $this->sexo_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('sexo/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->sexo_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El sexo no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los sexos
    public function listar() {
        $data['sexo_list'] = $this->sexo_model->lista_sexosA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('sexo_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de sexo en formato JSON
    public function sexo_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->sexo_model->lista_sexosA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idsexo, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('sexo/actual').'"   data-idsexo="' . $r->idsexo . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de sexo
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['sexo'] = $this->sexo_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('sexo_record', $data);
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

    // Método para mostrar el último registro de sexo
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['sexo'] = $this->sexo_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('sexo_record', $data);
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

    // Método para mostrar el siguiente registro de sexo
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['sexo'] = $this->sexo_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('sexo_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  sexo
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['sexo'] = $this->sexo_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('sexo_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_sexo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idsexo')) {
        $this->db->select('*');
        $this->db->where(array('idsexo' => $this->input->post('idsexo')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
