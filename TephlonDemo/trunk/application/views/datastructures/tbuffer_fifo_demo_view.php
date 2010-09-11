<?php
// Helper functions

$the_errors='';
if(count($errors) > 0){
    foreach($errors as $e){
        $the_errors.= '<div class="error">'.$e.'</div>';
    }
}

// Fill the data array

$data['title'] = $title;
$data['assets'] = js_asset('ajax.chat.demo.js');
$data['css_file'] = 'tbuffer_fifo';
//$data['errors'] = $errors;


// Full width top 'description' div
$top = <<< EOF
<div class="description">
<h2>A chat engine using the data structure TBuffer_FIFO</h2>
<p><b>TBuffer_FIFO</b> is a data structure in which we can simply add objects (in this example
each text line is an object) until we reach the configured buffer size (in this case 20).
TBuffer_FIFO will automatically delete the oldest objects either when:
</p>

<ul>
<li>Buffer is full and we added a new object (line)</li>
<li>We reduce the buffer size (in any moment)</li>
</ul>

<p>In addition to this, the <b>TBuffer</b> is able to provide a chronologically sorted 
non-associative array containing all the objects inside of it (method <b>getAll()</b>).</p>
</div>
EOF;

// Left block, 'code' div
$code = highlight_file(dirname(__FILE__)."/../../models/chatstream.php", true);
$code = '<div id="code">'.$code.'</div>';

   
// Right block, 'window' div
$window =   $this->load->view('datastructures/tbuffer_fifo_demo_chat_view',array('lines' => $lines),true).
            '<div id="typein">'.$form.'</div>'.
            "<div id='the_errors'>$the_errors</div>";
$window = '<div id="window">'.$window.'</div>';

$d['s12a'] = $top;
$d['s1b'] = $code;
$d['s2b'] = $window;

$data['content'] = $this->load->view("splittings/s12a_s1b_s2b_view", $d, true);

// Invoke main view
$this->load->view('main', $data);