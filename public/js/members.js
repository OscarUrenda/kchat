
function delete_users(){
	kchat_alert("Está seguro de <strong>borrar</strong> estos usuarios?",(function(){__post('/members/delete_users',{'ids':{'ids':getSelectedID()}});}));
}

function set_inactive_users(){
	kchat_alert("Está seguro de colocarlos como <strong>inactivo</strong>?",(function(){__post('/members/set_inactive_users',{'ids':getSelectedID()});}));
}

function set_active_users(){
	kchat_alert("Está seguro de colocarlos como <strong>activo</strong>?",(function(){__post('/members/set_active_users',{'ids':getSelectedID()});}));
}

function block_users(){
	kchat_alert("Está seguro de <strong>bloquear</strong> estos usuarios?",(function(){__post('/members/block_users',{'ids':getSelectedID()});}));
}

function unblock_users(){
	kchat_alert("Está seguro de <strong>desbloquear</strong> estos usuarios?",(function(){__post('/members/unblock_users',{'ids':getSelectedID()});}));
}

function NewConversation(){
	kchat_alert("Desea comenzar una nueva <strong>conversación</strong> con los miembros seleccionados?",(function(){
            Data = {};
            Data['ids'] = getSelectedID();
            Data['grpname'] = $('#grpname').val();
            __post('/members/newconversation',Data);
        }));
}

function revoke_admins(){
	kchat_alert("Seguro que quiere revocar los <strong>privilegios de administrador</strong>?",(function(){__post('/members/revokeadmin',{'ids':getSelectedID()});}));
}

function make_admins(){
	kchat_alert("Seguro que quiere otorgar <strong>privilegios de administrador</strong>?",(function(){__post('/members/makeadmin',{'ids':getSelectedID()});}));
}

function delete_user(){
	kchat_alert("Está seguro de <strong>borrar</strong> estos usuarios?",(function(){__post('/members/delete_users',[$('#m_user').val()]);}));
}

function set_inactive_user(){
	kchat_alert("Está seguro de colocarlos como <strong>inactivo</strong>?",(function(){__post('/members/set_inactive_users',[$('#m_user').val()]);}));
}

function set_active_user(){
	kchat_alert("Está seguro de colocarlos como <strong>activo</strong>?",(function(){__post('/members/set_active_users',[$('#m_user').val()]);}));
}

function block_user(){
	kchat_alert("Está seguro de <strong>bloquear</strong> estos usuarios?",(function(){__post('/members/block_users',[$('#m_user').val()]);}));
}

function unblock_user(){
	kchat_alert("Está seguro de <strong>desbloquear</strong> estos usuarios?",(function(){__post('/members/unblock_users',[$('#m_user').val()]);}));
}

function make_admin(){
	kchat_alert("Seguro que quiere otorgar <strong>privilegios de administrador</strong>?",(function(){__post('/members/makeadmin',[$('#m_user').val()]);}));
}

function revoke_admin(){
	kchat_alert("Seguro que quiere revocar los <strong>privilegios de administrador</strong>?",(function(){__post('/members/revokeadmin',[$('#m_user').val()]);}));
}

$(document).ready(function(){
    
    $(document).on('dblclick', '.member', function() {
        $('.m_photo').attr('src',json[$(this).attr('id')].photo);
        $('.m_about').text(json[$(this).attr('id')].about);
        $('.m_name').text(json[$(this).attr('id')].first_name + " " + json[$(this).attr('id')].last_name);
        $('.m_email').text(json[$(this).attr('id')].email);
        $('.m_department').text(json[$(this).attr('id')].department);
        $('.m_phone').text(json[$(this).attr('id')].phone);
        $('.m_status').text(json[$(this).attr('id')].status);
        $('.m_status').removeClass("bg-Active bg-Blocked bg-Inactive");
        $('.m_status').addClass("bg-"+json[$(this).attr('id')].status);
        $('#m_user').val($(this).attr('id'));
        $('.m_created_at').text(getRelativeTime(json[$(this).attr('id')].created_at));
        $('.m_updated_at').text(getRelativeTime(json[$(this).attr('id')].updated_at));
    });

    $(document).on('keyup', '#Member-rearch', function() {

        Data = {};
        
        Data['_token'] = $('meta[name="csrf_token"]').attr('content');
        
        Data['ms'] = $(this).val();
        
        $.ajax({
            type: "POST",
            url: '/ajax_members',
            data: Data,
            success: function(result){
                $("#member_table").html(result);
            },
            error: function(result){
                
            }
        });
    });
});