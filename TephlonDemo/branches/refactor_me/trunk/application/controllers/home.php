<?php
/**
 *       1      2
 *   .==============.
 * A |       |      |
 *   |--------------|
 * B |       |      |
 *   *==============*
 * @author Simone
 *
 */
class Home extends Controller{
	function __construct(){
		parent::Controller();
		$this->data['title'] = "Home page";
       // $this->data['assets'] = js_asset('autofocus.js');
        $this->data['errors'] = array();
	}
	
	function index(){
        // s12a = headline          
        $d['s12a'] = 
        '<h1 class="headline">A simple NoSQL for the masses written in PHP.</h1>'; 
        
		// s2b = commits
		$this->load->model('WikiScraper');
        $d['s2b'] = $this->load->view('elements/commits_view', 
                    array('commits' => $this->WikiScraper->getCommits()), true);
    
        // ??
        $d['s1b'] = $this->load->view('home_view', array(), true);
        
        $this->data['content'] = $this->load->view('splittings/s12a_s1b_s2b_view',$d, true);
        $this->data['css_file'] = 'home';
		$this->load->view('main', $this->data);	
	}
}