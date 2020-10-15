

/*  edit discount form pop-up rendering starts */

$(document).on('click', '.editUser', function(){
    
    var user_id;
    var base_url;

    user_id = $(this).attr('id');
    base_url = $(this).attr('base_url');

    $('#'+user_id+'user_edit_link').hide();
    $('#'+user_id+'user_edit_waiting').show();

    $.ajax({
        url:base_url+'admin/users/fetchSingleUser',
        method:"POST",
        data:{
            id:user_id
        },
        dataType:"json",
        success:function(data){

            $('#editUserForm').trigger("reset");
            $('#editUserModal').modal('show');

            $('#'+user_id+'user_edit_link').show();
            $('#'+user_id+'user_edit_waiting').hide();

            $('#id_field').val(data.single_user_data.acc_id);
            $('#user_edit_name_field').val(data.single_user_data.user_full_name);
            $('#user_edit_email_field').val(data.single_user_data.email);
            $('#user_edit_phone_field').val(data.single_user_data.user_phone);
            $('#user_edit_branch_field').val(data.single_user_data.user_branch);
            $('#user_edit_address_field').val(data.single_user_data.user_address);
            $('#user_edit_status_field').val(data.single_user_data.status);
        }
    })
});

/*  edit discount form pop-up rendering ends */


/*  edit discount form submission starts */

$('#editUserForm').on('submit', function(event){

    $(this).find('input[type=submit]').prop('disabled', true);

    var base_url = $('#base_url_field').val();
    event.preventDefault();

    $.ajax({
        
        url:base_url+'admin/users/updateUser',
        method:"POST",
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData: false,
        dataType:"json",
        success:function(data) {

            if(data.status){

                location.reload();                                              
            }
            else{

                location.reload();
            }   
        }
    })
}); 

/*  edit discount form submission ends */