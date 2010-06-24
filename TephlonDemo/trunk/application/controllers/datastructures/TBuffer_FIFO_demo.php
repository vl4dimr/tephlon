<?php

class TBuffer_FIFO_demo extends Controller {
	public $data = array();
	function __construct()	{
		//print_r($_COOKIE);
		parent::Controller();
		$this->load->model('ChatStream');
		$this->load->model('Line');
		$this->load->library('session');
		$this->data['title'] = "Tephlon TBuffer_FIFO Demo";
		$this->data['assets'] = js_asset('autofocus.js');
		$this->data['errors'] = array();
	}

	function index(){
		$this->data['lines'] = $this->ChatStream->getLines();
		$nick = $this->_getNick();
		// Generating form
		if($nick){
			$f = form_open('datastructures/TBuffer_FIFO_demo/putLine');
			$name = "line";
			$label = '<label class="nick">&lt;'.anchor('/datastructures/TBuffer_FIFO_demo/resetNick',$nick).'&gt;</label>';
		}
		else { // nickname not yet set
			$f = form_open('datastructures/TBuffer_FIFO_demo/putNick');
			$name = "nick";
			$label = "<label>Enter nickname</label>";
		}
		$f .= $label;
		$f .= form_input( array(
              'name'        => $name,
              'maxlength'   => '100',
              'autocomplete'=> 'off',
              'class'       =>  'autofocus typeform'
              ));
              $f .= form_close();
              $this->data['form'] = $f;
              $this->data['errors'] = $this->_getErrors();
        // Form is ready, let's delegate view.
        $this->load->view('datastructures/'.get_class().'_view', $this->data);
	}
	function _getErrors(){
		$err = $this->session->flashdata('errors');
		return is_array($err) ? $err : array();
	}
	function _getNick(){
		// Try first to catch nick from GET or POST
		$nick = isset($_REQUEST['nick']) && strlen($_REQUEST['nick']) > 3 ? $_REQUEST['nick'] : false;
		if(!$nick){
			// If no result, search for nick in the cookie
			$nick = isset($_COOKIE['nick']) && strlen($_COOKIE['nick']) > 3 ? $_COOKIE['nick'] : false;
		}
		if($nick){
			// If you found the nick in a way or in the other, save it to cookie.
			//setcookie('nick', $nick);
			return $nick;
		}
		else{
			// Could not find nick anywhere
			return false;
		}
	}
	function resetNick(){
		setcookie('nick', '');
		$this->_redirectToIndex();
	}
	function putLine(){
		$line = strip_tags($this->input->post('line'));

		if( !is_null($line) && strlen($line) > 0 ){
			$l = new Line($line);
			$l->nick = $this->_getNick();
			// Found a valid submission, push it to Tephlon TBuffer_FIFO
			$this->ChatStream->addLine($l);
		}
		else {
			$this->_addError('Your text was too short.');
		}
		// Redirect browser to the main page (avoids accidental resubmission on refresh)
		$this->_redirectToIndex();
	}
	function _redirectToIndex(){
		redirect('datastructures/'.get_class().'/index', 'refresh');
	}
    function _addError($str){
        $fd = $this->session->flashdata('errors');
    	if($fd){
    	   $fd[] = $str;
    	}
    	else{
    		$fd = array($str);
    	}
    	$this->session->set_flashdata('errors',$fd); 		
    }
	function putNick(){
		$nick = strip_tags($this->input->post('nick'));
		if( !is_null($nick)){
			$len = strlen($nick);
			if( $len > 3 && $len < 10){
				//echo "setting cookie $nick";
				setcookie('nick', $nick);
			}
			else{
				$this->_addError('insert a nick between 3 and 9 letters long.');
			}
		}
		else{
			$this->_addError('you must insert a nick.');
		}
		$this->_redirectToIndex();
	}
}