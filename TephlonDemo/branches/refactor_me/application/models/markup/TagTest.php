<?php
require_once dirname(__FILE__).'/../../simpletest/autorun.php';
require_once 'mediacontainer.php';
require_once 'media.php';

class TagTest extends UnitTestCase {
	function testBasicFunctionality(){
		$t = new Tag('h1');
		$ret = $t->setID('main');
		$this->assertTrue($ret, "setID returned false, something went wrong?");
		$ret = $t->appendClass('class1');
		$this->assertTrue($ret, "appendClass returned false, something went wrong?");
		$ret = $t->appendContent('hello');
		$this->assertTrue($ret, "appendContent returned false, something went wrong?");

		$ret = $t->toString(true);
		$this->assertEqual($ret,
		                   '<h1 id="main" class="class1">hello</h1>',
		                    "Error serializing toString: ".$ret);
		unset ($t);
	}
	function testSameClass(){
		$t = new Tag('h1');
		$t->appendClass('class1');
		$t->appendClass('class1');
		$t->appendContent('hello');
		$r = $t->toString(true);
		$this->assertEqual($r, '<h1 class="class1">hello</h1>',
          "Strange output if I specify twice SAME class: ".$r);
		unset($t);
	}
	function testManyClasses(){
		$t = new Tag('h1');
		$t->appendClass('class1');
		$t->appendClass('class2');
		$t->appendContent('hello');
		$r = $t->toString(true);
		$this->assertEqual($r, '<h1 class="class1 class2">hello</h1>',
          "Strange output if I specify 2 classes: ".$r);
		unset($t);
	}
	function testWithoutID(){
		$t = new Tag('h1');
		$t->appendClass('class1');
		$t->appendContent('hello');
		$r = $t->toString(true);
		$this->assertEqual($r, '<h1 class="class1">hello</h1>',
		  "Strange output if I dont specify the id: ".$r);
		unset($t);
	}
	function testWithoutClasses(){
		$t = new Tag('h1');
		$t->setID('main');
		$r = $t->toString(true);
		$this->assertEqual($r, '<h1 id="main"/>',
		  "Strange output if I dont specify any class: ".$r);
		unset($t);
	}
	function testAttribAlone(){
		$t = new Tag('img');
        $t->setAttrib('src', '/assets/asd.bmp');
        $r = $t->toString(true);
        $this->assertEqual($r, '<img src="/assets/asd.bmp"/>',
          "Strange output for 1 attrib: ".$r);
        unset($t);
	}
	function testManyAttrib(){
		$t = new Tag('img');
        $t->setAttrib('src', '/assets/asd.bmp');
        $t->setAttrib('alt', 'asd');
        $r = $t->toString(true);
        $this->assertEqual($r, '<img src="/assets/asd.bmp" alt="asd"/>',
          "Strange output for 2 attribs: ".$r);
        unset($t);
	}

}