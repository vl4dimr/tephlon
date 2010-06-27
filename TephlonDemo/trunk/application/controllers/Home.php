<?php

class Home extends Controller{
	function __construct(){
		parent::Controller();
		$this->data['title'] = "Home page";
       // $this->data['assets'] = js_asset('autofocus.js');
        $this->data['errors'] = array();
	}
	
	function index(){
		$this->load->model('WikiScraper');
		$commits = $this->WikiScraper->getCommits();
        $this->data['content'] = $this->load->view('Commits_view', array('commits' => $commits), true);
       
		$this->load->view('main', $this->data);
	}
}