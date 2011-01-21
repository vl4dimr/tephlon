<?php 
$this->load->model('markup/markup');

// Prototyping
$text='
As your PHP project takes shape, your data types will get refactored many times.
And with them, the way you store them to DB. Soon you\'ll end up with:
<ul>
<li> Lots of time and focus lost to update your Object to Relational Mapping (ORM) code</li>
<li> A weak DB schema, visibly "retouched" many times </li>
</ul>
Tephlon provides a simple interface to store your data types <storng>as objects</strong>
 no matter of their structure.
Tephlon:
<ul>
<li>  And lets you delegate the DB and ORM design to the moment
 in which the data structure is definitive.</li>
<li>Fully functional website prototypes without a line of SQL</li>
</ul>
';
$m = new Media('prototyping',
               'Rapid Prototyping',
               'prototyping.jpg',
               $text              
                );

$mc = new MediaContainer('home_main_container');
$mc->setMediaAlign('alt');
$mc->addMedia($m);
$mc->toString();

$text = '

';
?>