<?php
echo "<ul class='commits'>";
        foreach($commits as $c){
            $date = $c->date; 
            //2010-06-10T16:30:34.53
            $str =  substr($date, 0,4)."-".substr($date, 5,2)."-".substr($date,8,2)." ".substr($date,11,8);
            $ts = strtotime($str);
            $date = "<strong>".date("n M Y", $ts)."</strong>, ".date("h:i:s", $ts);
            echo "<li>
            <div class='svninfo'>
                <span class='revision svninfo'>rev<br />$c->rev</span>
                <span class='author svninfo'><a href=\"".site_url().'About'."\">$c->author</a></span>
            </div>
            <span class='message'>$c->msg</span>
            <span class='date'>$date</span> 
            <div id='clear'> </div>
            </li>";
        }
echo '</ul>';