<?php

class Wiki extends Controller{
	public function __construct(){
		parent::Controller();
	}
	public function _remap($method){
		$this->data['title'] = $method;
		$this->data['assets'] = js_asset('prettify.js');
		$this->data['assets'].= css_asset('prettify.css');
		$this->load->model('WikiScraper');
        $this->data['content'] = $this->WikiScraper->getWiki('http://code.google.com/p/tephlon/wiki/'.$method);
        $this->load->view('main', $this->data);
	}
}