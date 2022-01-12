<?php

Class Canvas extends CI_Controller{

	public function __construct(){
		parent::__contruct();
}

public function index(){
	$this->load->view('template/page_header');
	$this->load->view('canvas');
	$this->laod->view('template/page_footer');
}
}
