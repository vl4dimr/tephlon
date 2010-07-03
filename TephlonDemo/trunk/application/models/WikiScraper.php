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
		$author = $html->find("tr td a", 0);
		$author->setAttribute("href", site_url().'About');
		$tds = $html->find('td');
		foreach($tds as $td){
		  $td->outertext = $td->innertext;
		}
		$this->map->put($label, $html->save());
		$html->clear();
		unset($html);
		return $this->map->get($label);
	}


	public function reset($url=null){
		if(!$url){
			$this->map->clear();
		}
		$this->map->remove(md5($url));
	}
	
	 
	public function getCommits(){
		$commits = null;
		$xml = file_get_html('http://codesigner.eu/tephlon/data/commits.xml'); 
		$entries = $xml->find('logentry'); 
		foreach($entries as $e){
			$revision = $e->getAttribute('revision');
			$date = $e->getElementByTagName('date')->innertext;
			$author = $e->getElementByTagName('author')->innertext;
			$msg = $e->getElementByTagName('msg')->innertext;
			$commits[]= new Commit($revision, $date, $author, $msg);
		}
//		$xml->clear();
//		unset($xml);
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