/*
     Ajax implementation of TBuffer_FIFO chat engine demo
*/

// LIBRARY FUNCTIONS
function validateNick(n){
    var nl = n.length;
    if(nl > 3 && nl < 9){
        return true;
    }
    putError('Enter a nickname between 4 and 8 chars');
    return false;
}
function validateLine(n){
    var nl = n.length;
    if(nl > 0 && nl < 100){
        return true;
    }
    putError('Enter a line between 1 and 100 chars');
    return false;
}
function putError(s){
    $("#the_errors").children().remove();
    $("#the_errors").html('<div class="error">'+s+'</div>').show().fadeOut(2000);
}
String.prototype.endsWith = function(str) 
{return (this.match(str+"$")==str)}
String.prototype.startsWith = function(str) 
{return (this.match("^"+str)==str)}
String.prototype.trim = function(){return 
(this.replace(/^[\s\xA0]+/, "").replace(/[\s\xA0]+$/, ""))}


function isSendingNick(){
    if($("#typein label a").text() == "Enter nickname"){
        return true;
    }
    return false;
}
// END LIBRARY FUNCTIONS

$(document).ready(function() {
// Before typing in field
$(".typeform").focus();
$("#typein form label.nick a").click(function(event) {
  event.preventDefault();
  $(this)
   .text("Enter nickname");
});

$('input.typeform').keypress(function(event) {
    if (event.keyCode == '13') { 
        // Hit Enter
        event.preventDefault();
        
        var action = null;
        var url = window.location.pathname;
        
        while(url.endsWith('/')){
            url = url.substr(0, url.length - 1);
        }
        if(url.endsWith('index') || url.endsWith()){
            url = url.substr(0, url.length - 5);
        }
        var form_data = null;
        if (isSendingNick()) {
            action = url+'putNick';
            //alert('is sending nick, action = '+action);
            var the_nick = $('.typeform').val();
            if(!validateNick(the_nick)){
                 return false;
            }
            form_data = {
            nick : the_nick,
            ajax: '1'       
            };
        }
        else{
            action = url+'putLine';
            //alert('is sending line, action ='+action);
            the_line = $('.typeform').val();
            if(!validateLine(the_line)){
                return false;
            }
            form_data = {
            line : the_line,
            ajax: '1'       
            };
        }
    
        $.ajax({
            url: action,
            type: 'POST',
            data: form_data,
            success: function(msg) {
            // HERE SYNCH HOOK 
            var status = "failure";
            if(msg.substr(0, 16).indexOf('chat') > 0){
                        status = "success";
            }
           
            // Handling of ajax output
            if(status == "success"){
                // Generic success: update chat view
                $('#chat').replaceWith(msg);
                
                if(action.endsWith('putLine'))
                { // Successful Line insert
                    // alert('successful putline');
                }
                else { // Successful Nick insert
                     $("#typein form label.nick").hide().html( '<a href="#">&lt;'+$('.typeform').val()+'&gt;</a>' ).fadeIn(1200);
                     $("#typein form label.nick a").click(function(event) {
                      event.preventDefault();
                      $(this)
                       .text("Enter nickname");
                    });
                }
            }
            else { // Generic failure, print errors
                 alert('Fail');
            }
             
            // Reset field in any case
            $('input.typeform').val('');
            // END SYNCH
            }
        });
        
       
       
    }
    return true;
    });
}); 
