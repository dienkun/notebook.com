
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://localhost/notebook.com/public/css/app.v2.css" type="text/css" />
<link rel="stylesheet" href="http://localhost/notebook.com/public/css/bootstrap-combined.min.css" type="text/css" />
<link rel="stylesheet" href="http://localhost/notebook.com/public/css/bootstrap-editable.css" type="text/css" />
<!--
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
<script src="http://vitalets.github.com/x-editable/assets/mockjax/jquery.mockjax.js"></script>
<script src="http://vitalets.github.com/x-editable/assets/x-editable/bootstrap-editable/js/bootstrap-editable.js"></script>

<script src="http://vitalets.github.com/x-editable/assets/x-editable/bootstrap-editable/js/bootstrap-editable.js"></script>
<link rel="stylesheet" href="http://localhost/notebook.com/public/css/font.css" type="text/css" cache="false" />
-->


<script src="http://localhost/notebook.com/public/js/jquery-1.8.2.min.js"></script>
<script src="http://localhost/notebook.com/public/js/bootstrap.min.js"></script>
<script src="http://localhost/notebook.com/public/js/jquery.mockjax.js"></script>
<script src="http://localhost/notebook.com/public/js/bootstrap-editable.js"></script>



</head>
<body>

<p>X-editable: process JSON response. Try to submit empty field.</p>
<div style="margin: 150px">
    <a href="#" id="username">awesome</a>
</div>
<p>X-editable: create editable column in table.<br>
 As pk is unique in each row, you should put it in data-pk attribute.  
</p>
<div style="margin: 150px">
    <table id="users" class="table table-bordered table-condensed" id="class-table">
        <tr><th>#</th><th>name</th><th>age</th></tr>
        <tr id="1">
            <td>1</td>
            <td><a href="#" class="name">Mike</a></td>
            <td>21</td>       
        </tr>
        
        <tr id="2">
            <td>2</td>
            <td><a href="#" class="name">John</a></td>
            <td>28</td>       
        </tr>        
        
        <tr id="3">
            <td>3</td>
            <td><a href="#" class="name">Mary</a></td>
            <td>24</td>       
        </tr>        
        
    </table>    
</div>

<script>

$('#username').editable({
    type: 'text',
    url: 'http://localhost/notebook.com/index.php/ajax/index',    
    pk: 1,    
    title: 'Enter username',
    ajaxOptions: {
        dataType: 'json'
    },    
      
    success: function(response, newValue) {
        if(!response) {
            return "Unknown error!";
        }          
        
        if(response.success === false) {
             return response.msg;
        }
    }        
});
/*
$("#class-table .name").editable({
                if (confirm("Are you sure?")) {
                    tr = $(this).closest('tr');
                    tr_id=tr.attr('id'); 
                    type: 'text',
                    url: 'http://localhost/notebook.com/index.php/ajax/index',    
                    pk: tr_id,    
                    title: 'Enter username',
                    ajaxOptions: {
                        dataType: 'json'
                    },    
                    success: function(response, newValue) {
                        if(!response) {
                            return "Unknown error!";
                        }          
                        
                        if(response.success === false) {
                             return response.msg;
                        }
                    }  
                    var tr = $(this).closest('tr');
                    tr_id=tr.attr('id');                    
                    $.ajax({
                      data: {
                        class_id: tr_id                     
                      },
                      type: "POST",
                      url: "http://localhost/notebook.com/index.php/c_class/delete",
                      success: function(result) {
                        if (result=="success") {
                          tr.css("background-color","#FF3700");
                            tr.fadeOut(400, function(){
                                tr.remove();
                            });
                        } else {
                          alert("Boom");
                        }
                      }
                    });                                     
                }               
                return false;
            });

*/
/*
$('#users a').editable({
    type: 'text',
    name: 'username',
    url: '/post',
    title: 'Enter username'
});
*/
//ajax emulation
$.mockjax({
    url: '/post',
    responseTime: 200
}); 

$.fn.editableform.buttons = 
  '<button type="submit" class="btn btn-success editable-submit btn-mini">save</button>' +
 '<button type="button" class="btn editable-cancel btn-mini">cancel</button>'; 
/*
//ajax emulation
$.mockjax({
    url: 'http://localhost/notebook.com/index.php/ajax.php',
    responseTime: 200,
    response: function(settings) {
        if(settings.data.value) {
            this.responseText = '{"success": true}';
        } else {
            this.responseText = '{"success": false, "msg": "required"}';
        }
    }
}); 
*/
</script>
</body>
</html>

