<?php
class Line extends Model {
	
	public function __construct($text = null){
		parent::Model();
		$this->time = time();
		$this->text = $text;
	}
	public $time;
    public $text;
    public $nick = "Anonymous";
}