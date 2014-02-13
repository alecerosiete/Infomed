function newUserData() {
  $(".modal-notif").html(" ");
  var name;
  var username;
  var email;
  var password;
  var group_name;
  $("#actionTitle").html("Nuevo usuario");
  $.post("/admin_users/new_user_ajax_response",
    function(response){
      $(".modal-body").html(response);
      $("#saveNewUserData").click(function(){
        name = $("#name").val();
        username = $("#username").val();
        email = $("#email").val();
        password = $("#password").val();
        group_name = $("#group-name option:selected").val();
        //alert("Name: "+name+" "+"Username: "+username+" "+"Email: "+email+" "+"group-name: "+group_name);
        $.post("/admin_users/saveNewUserData",
        {
          name:name,
          username:username,
          email:email,
          password:password,
          group_name:group_name
        },
        function(response){
          var html;
          if(response.status == true){
            html = response.data;
            $("#actionTitle").html(html);
            $(".modal-notif").html(" ");
            setTimeout(function() {$('#actions').modal('hide');}, 1000);
            setTimeout(function() {$(location).attr('href',"/admin_users");}, 1000);
            
          }else{
            html = response.data;
            $(".modal-notif").html(html);    
          }
              
        },"json")                
      });
  })

}



function editUserData(id) {
  
  var html;
  $("#actionTitle").html("Editar");
  $(".modal-notif").html(" ");
  $.post("/admin_users/edit_user_ajax_response",
    {id:id},
    function(response){
      
      $(".modal-body").html(response);  
      $("#saveEditUserData").click(function(){        
        var name = $("#name").val();
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var group_name = $("#group-name option:selected").val();
        $.post("/admin_users/saveEditUserData",
        {
          id:id,
          name:name,
          username:username,
          email:email,
          password:password,
          group_name:group_name
        },
        function(response){  

          if(response.status){
            var nombre = response.name;
            var mail = response.email;
            $("#actionTitle").html("Editar <i class='fa fa-check-circle-o fa-lg'></i>");
            $(".modal-notif").html(" ");
            $("#name_"+id).html(nombre);
            $("#email_"+id).html(mail);            
            setTimeout(function() {$('#actions').modal('hide');}, 1000);
            
          }else{
            var html = response.data;
            $(".modal-notif").html(html);  
            
          }
              
        },"json")                
      });

    })
}

function deleteUserData(id) {
  var html;
  $(".modal-notif").html(" ");
  $("#actionTitle").html("Eliminar");
  $.post("/admin_users/delete_user_ajax_response",
    {id:id},
    function(response){
      $(".modal-body").html(response);
      $("#deleteUserData").click(function(){                       
        $.post("/admin_users/delete_user_data",
        {
          id:id,          
        },
        function(response){  
          var html;
          if(response.status == true){
            html = response.data;
            $("#actionTitle").html(html);
            $(".modal-notif").html(" ");
            setTimeout(function() {$('#actions').modal('hide');}, 1000);
            setTimeout(function() {$(location).attr('href',"/admin_users");}, 1000);
            
          }else{
            html = response.data;
            $(".modal-notif").html(html);    
          }
          
              
        },"json")                
      });
  })

}

function activeUserData(id) {
  var html;
  $(".modal-notif").html(" ");
  $("#actionTitle").html("Activar/Desactivar");
  $.post("/admin_users/active_user_ajax_response",
    {id:id},
    function(response){
      $(".modal-body").html(response);
      $("#activeUserData").click(function(){    
        var text = $("#btnActive_"+id).html();
        $.post("/admin_users/active_user_data",
        {
          id:id,    
          text:text
        },
        function(response){  
          var html;
          if(response.status == true){
            html = response.data;
            $("#actionTitle").html(html);
            $(".modal-notif").html(" ");
            setTimeout(function() {$('#actions').modal('hide');}, 1000);
            setTimeout(function() {$(location).attr('href',"/admin_users");}, 1000);
            
          }else{
            html = response.data;
            $(".modal-notif").html(html);    
          }
          
              
        },"json")                
      });
  })

}

$('#editMyAccount').click(function(){
  $(".modal-notif").html(" "); 
  var id = $("#id").val();
  var name = $("#name").val();
  var username = $("#username").val();
  var email = $("#email").val();
  var password = $("#password").val();

  $.post("/admin_edit_account/editMyAccount",
  {
    id:id,
    name:name,
    username:username,
    email:email,
    password:password,
  },
  function(response){ 
    if(response.status){
      $("#editMyAccount").html(response.data);
      $(".modal-notif").html(" ");  
      setTimeout(function() {$(location).attr('href',"/admin_edit_account");}, 1000);
    }else{
      var html = response.data;
      $("#sms_notification").html(html);  
    }
  },"json")

})


$('#getClient').click(function(){
  
  var name = $("#search").val();
  

  $.post("/page_clients/searchClient",
  {
    name:name
  },
  function(response){ 
    if(response.status){      
      $("#clientInfo").html(response.data);
    }else{
      var html = response.data;
      $("#sms_notification").html(html);  
    }
  },"json")

})






