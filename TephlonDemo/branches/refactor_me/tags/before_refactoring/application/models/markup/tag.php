<?php
/**
 *
 */

class Tag {
	protected $css_classes = array();
	protected $css_id = null;
	protected $tagName = null;
	protected $attrib = array();
	protected $content = "";

	public function __construct($tag){
		$this->tagName = $tag;
	}
	public function appendContent($str){
		if($this->validateString($str)){
			$this->content=$str;
			return true;
		}
		return false;
	}
	public function appendClass($class){
		if($this->validateString($class) && !in_array($class,$this->css_classes)){
			$this->css_classes[]=$class;
			return true;
		}
		return false;
	}

	public function setID($id){
		if($this->validateString($id)){
			$this->css_id=$id;
			return true;
		}
		return false;
	}
	public function setAttrib($name, $value){
		if(
		$this->validateString($name) &&
		$this->validateString($value)
		)
		{
			$this->attrib[$name]=$value;
			return true;
		}
		return false;
	}

	private function validateString($str){
		return (!is_null($str) && strlen(trim($str)) > 0);
	}

	public function toString($return_as_value = false){
		// The opening tag: <div id="id" class="a b c">
		$r = '<'.$this->tagName;
		if(!is_null($this->css_id)){
			$r.=' id="'.$this->css_id.'"';
		}
		if(count($this->css_classes) > 0){
			$r .= ' class="';
			foreach($this->css_classes as $c){
				$r.="$c ";
			}
			$r = substr($r, 0, strlen($r)-1);
			$r .='"';
		}
		if(count($this->attrib) > 0){
			$r.=" ";
			foreach($this->attrib as $key => $value){
				$r.= "$key=\"$value\" ";
			}
			$r = substr($r, 0, strlen($r)-1);
		}
		

		// Add the content
		if(strlen($this->content) > 0){
			$r .= '>';
			$r .= $this->content;
			// Close the tag </div>
			$r .= "</$this->tagName>";
		}
		else{
            $r.="/>";				
		}


		// Output
		if($return_as_value){
			return $r;
		}
		echo $r;
	}
}