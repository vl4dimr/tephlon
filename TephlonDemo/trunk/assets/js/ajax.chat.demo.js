// Ajax implementation of TBuffer_FIFO chat engine demo
alert('cazzo');
$(document).ready(function() { 

$('input.typeform')
    .bind('pressedEnter', function(){
    
    var action;
    
    if (isSendingNick()) {
        alert('is sending nick, action = datastructures/TBuffer_FIFO_demo/resetNick');
        action = 'datastructures/TBuffer_FIFO_demo/putLine';
    }
    else{
        alert("is sending line, action = datastructures/TBuffer_FIFO_demo/putLine");
        action = 'datastructures/TBuffer_FIFO_demo/putLine';
    }
    
    var form_data = {
        $var: $('.typeform').val(),
        ajax: '1'       
    };
    
    $.ajax({
        url: action,
        type: 'POST',
        data: form_data,
        success: function(msg) {
            $('#main_content').html(msg);
        }
    });
    
    return false;
});

}); 

function isSendingNick(){
    if($("#typein").val() == "Enter your nickname"){
        return true;
    }
    return false;
}