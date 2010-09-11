<?php

class wiki extends Controller{
	public function __construct(){
		parent::Controller();
	}
	public function _remap($method){
		$method = ucfirst(strtolower($method));
		$this->data['title'] = $method;
		$this->data['assets'] = js_asset('prettify.js');
		$this->data['assets'].= js_asset('wiki.js');
		$this->data['assets'].= css_asset('prettify.css');
		$this->data['css_file'] = 'wiki';
		$this->load->model('WikiScraper');
        $this->data['content'] = $this->WikiScraper->getWiki('http://code.google.com/p/tephlon/wiki/'.$method);
        $this->data['content']  = '<div id="wiki">'.$this->data['content'].'</div>';
        
        $this->load->view('main', $this->data);
	}
}