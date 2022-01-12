<?php

class Facae extends CI_Controller{


function __construct()
{
	parent:: __construct();
	$this->load->model('facae_model');
}


function index()

{
	$data= $this->facae_model->consultar()->result();

//    print_r($data);

	$this->load->view("facae_form");
}



























}
