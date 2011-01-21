<?php
/**
 * Formatting the chat flow div.
 * We need $lines to be passed..
 */

$chat ='<div id="chat">';
for($i = 0; $i < count($lines); $i++){
	$line =  '<span class="lineNum">'.($i+1)."</span> ".date("h:i:s",$lines[$i]->time). " ".
                         '<span class="nick">&lt;'.$lines[$i]->nick."&gt;</span> ". $lines[$i]->text . "\n";

	$chat.= '<div class="line">'.$line.'</div>';
}
echo $chat.'</div>';
