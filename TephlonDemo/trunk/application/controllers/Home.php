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
        $d['s2b'] = $this->load->view('elements/Commits_view', array('commits' => $commits), true);
        $d['s12a'] = '<h1 class="headline">The Key-Value NoSQL for the masses, all PHP goodness.</h1>';
        $d['s1b'] = '';
        $this->data['content'] = $this->load->view('splittings/s12a_s1b_s2b_view',$d, true);
        $this->data['css_file'] = 'home';
		$this->load->view('main', $this->data);	
	}
}