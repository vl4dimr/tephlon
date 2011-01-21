<?php
/**
 *
 */
require_once 'tag.php';

class MediaContainer extends Tag {
	protected $medias = array();
	protected $align = "center";

	public function __construct($id){
		parent::__construct('div');
		$this->appendClass("mediaContainer");
		$success = $this->setID($id);
		if(!$success){
			return false;
		}
	}

	public function addMedia($m){
		if(! $m instanceof Media){
			return false;
		}
		$this->medias[]=$m;
	}

	public function toString(){
		$n = count($this->medias);
		$c = true;
		foreach($this->medias as $m){
			// Alternate align left/right support
			if($this->align == "alt"){
                if($c){
                	$m->appendClass('left');
                }
                else {
                	$m->appendClass('right');
                }
                $c=!$c;
			}
			// Static alignment
			else{
				$m->appendClass($this->align);
			}
			$this->appendContent($m->toString(true));
		}
		parent::toString();
	}
	public function setMediaAlign($align="alt"){
		if($sides = "alt" ||
		$sides = "left" ||
		$sides = "right" ||
		$sides = "center"
		){
			$this->align= $align;
			return true;
		}
		return false;
	}

}