<?php
// Helper functions
function getChat($lines){
    $chat ="";
    for($i = 0; $i < count($lines); $i++){
        $line =  '<span class="lineNum">'.($i+1)."</span> ".date("h:i:s",$lines[$i]->time). " ".
                         '<span class="nick">&lt;'.$lines[$i]->nick."&gt;</span> ". $lines[$i]->text . "\n";

        $chat.= '<div class="line">'.$line.'</div>';
    }
    return $chat;
}

// Fill the data array

$data['title'] = $title;
$data['assets'] = $assets;
$data['errors'] = $errors;


// Full width top 'description' div
$data['top'] = <<< EOF
<div class="description">
<h2>A chat engine using the data structure TBuffer_FIFO</h2>
<p><b>TBuffer_FIFO</b> is a data structure in which we can simply add objects (in this example
each text line is an object) until we reach the configured buffer size (in this case 25).
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
$data['code'] = highlight_file(dirname(__FILE__)."/../../models/ChatStream.php", true);

   
// Right block, 'window' div
$data['window'] = '<div id="chat">'.getChat($lines).'</div>'.
                  '<div id="typein">'.$form.'</div>';

// Invoke main view
$this->load->view('main', $data);