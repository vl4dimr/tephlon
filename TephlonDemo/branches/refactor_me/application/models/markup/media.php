<?php
/**
 *
 */
require_once 'tag.php';

class Media extends Tag {
	/**
	 * A media (article with id, title, picture, text)
	 * 
	 * @param unknown_type $p_css_id
	 * @param unknown_type $p_title
	 * @param unknown_type $p_image
	 * @param unknown_type $p_text
	 */
	public function __construct($p_css_id=null, $p_title=null, $p_image=null, $p_text=null){
		parent::__construct('div');
		parent::appendClass('media');
        $this->setID($p_css_id);
		$title = new Tag('h1');
		$title->appendContent($p_title);
		$this->content .= $title->toString(true);
		if(!is_null($p_image)){
			$frame = new Tag('div');
	        $frame->appendClass('img_frame');
	        $frame->appendContent(image_asset($p_image));
		}
		$text = new Tag('p');
		$this->content .= $frame->toString(true);
		$text->appendContent($p_text);
		$this->content .= $text->toString(true);
	}

}