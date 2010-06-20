<?php

class Home extends Controller{
	function __construct(){
		parent::Controller();
		$this->data['title'] = "Home page";
       // $this->data['assets'] = js_asset('autofocus.js');
        $this->data['errors'] = array();
	}
	
	function index(){
		
		$this->load->view(get_class().'_view', $this->data);
	}
}