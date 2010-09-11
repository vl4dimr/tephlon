<?php
/**
 * This class grabs the div#wikicontent element of the DOM of Tephlon web pages
 * in the Google Code wiki.
 *
 * @author Simone
 *
 */

class WikiScraper extends Model{

	private $map = null;

	public function __construct(){
		parent::Model();
		$this->load->model('simplehtmldom/simple_html_dom');
		$this->map = new TMap('CI_'.get_class());
	}



	public function getWiki($url){
		$label = md5($url);
		$r = $this->map->get($label);
		if($r){
			//return $r;
		}
		$html = file_get_html($url);
		$wiki = $html->find('td[id=wikimaincol]',0);
		//$html->clear();
		$html = new simple_html_dom();
		$html->load($wiki->outertext);
		// Register the callback function with it's function name
		$imgs = $html->find('img');
		foreach($imgs as $img){
			$alt = $img->getAttribute('alt');
			if(isset($alt)){
				$alt = "<p>$alt</p>";
			}
			$img->outertext = '<div class="description_image">'.$img->outertext.$alt.'</div>';
		}
		$as = $html->find('a');
		foreach($as as $a){
		  $a->setAttribute("href", basename($a->getAttribute("href")));
		}
		$author = $html->find("tr td a", 0);
		$author->setAttribute("href", site_url().'About');
		
		$h2as = $html->find('h1 a, h2 a');
        foreach($h2as as $h2a){
          $h2a->outertext = substr($h2a->innertext, 0, strlen($h2a->innertext)-6);
        }
        
		$tds = $html->find('td');
		foreach($tds as $td){
		  $td->outertext = $td->innertext;
		}
		
		$this->map->put($label, $html->save());
		$html->clear();
		unset($html);
		return $this->map->get($label);
	}
    
	public function getWikiList(){
		$url="http://code.google.com/p/tephlon/w/list";
		$label = md5($url);
        $r = $this->map->get($label);
        if($r){
            //return $r;
        }
        $html = file_get_html($url);
        $list = $html->find('td.col_0');
        $r = array();
        foreach($list as $el){
        	$l = $el->first_child();
        	$l->innertext = trim($l->innertext);
        	$l->href=site_url().'wiki/'.basename($l->href);
        	$r[] = $l->outertext;
        }
        $this->map->put($label, $html->save());
        $html->clear();
        unset($html);
        return $r;
		
	}

	public function reset($url=null){
		if(!$url){
			$this->map->clear();
		}
		$this->map->remove(md5($url));
	}
	
	 
	public function getCommits(){
		$commits = null;
		$xml = file_get_html('http://tephlon.codesigner.eu/assets/xml/commits.xml'); 
		$entries = $xml->find('logentry'); 
		foreach($entries as $e){
			$revision = $e->getAttribute('revision');
			$date = $e->getElementByTagName('date')->innertext;
			$author = $e->getElementByTagName('author')->innertext;
			$msg = $e->getElementByTagName('msg')->innertext;
			$commits[]= new Commit($revision, $date, $author, $msg);
		}
		$text = $xml->save();
		$xml->clear();
		unset($xml);
		return $commits;
	}

}
class Commit {
        public function __construct($rev, $date, $author, $msg){
            $this->rev = $rev;
            $this->date = $date;
            $this->author = $author;
            $this->msg = $msg;
        }
    }