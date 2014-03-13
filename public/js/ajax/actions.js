/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
   $("#addClientWorkPlace").click(function(){
        var html;
        $('#actions').modal('show');
        $(".modal-notif").html(" ");
        $("#actionTitle").html("Agregar Empresa");
        html = '<div class="form-group">';
        html+= '    <label for="workPlaceId " class="col-md-2 control-label label-top">Nombre</label>';
        html+= '        <div class="col-md-6 width-input">';
        html+= '            <input type="text" class="form-control " id="workPlaceId" placeholder="Nombre" >';
        html+= '        </div>';
        html+= '</div>';
        $(".modal-body").html(html);
        
        var btn_save = '<button type="button" class="btn btn-success" id="saveWorkPlace" data-dismiss="modal">Guardar</button>';
        $("#saveAction").prepend(btn_save);
   }); 
    
    
});
