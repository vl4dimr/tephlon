<?php
echo "<ul>";
        foreach($commits as $c){
            $date = substr($c->date,0, strlen($c->date)-5); 
            echo "<li>
            <span class='revision'>r$c->rev</span>
            <span class='author'><a href=\"".site_url().'About'."\">$c->author</a></span>: 
            $c->msg <span class='date'>$date</span> 
            </li>";
        }
echo '</ul>';