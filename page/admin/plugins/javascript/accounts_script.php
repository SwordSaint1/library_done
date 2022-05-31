<script type="text/javascript">

const load_users =()=>{
	var full_name = document.getElementById('full_name_user_search').value;

	$.ajax({
      url: '../../process/admin/accounts.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_user',
                    full_name:full_name
                },success:function(response){
                   document.getElementById('list_of_users').innerHTML = response;
                }
   });
}
	
const register_user =()=>{
	var full_name_accounts = document.getElementById('full_name_accounts').value;
	var username_accounts = document.getElementById('username_accounts').value;
	var password_accounts = document.getElementById('password_accounts').value;
	var role_accounts = document.getElementById('role_accounts').value;
	if (full_name_accounts == '') {
		swal('Information','Please Input Full Name','info');
	}else if(username_accounts == ''){
		swal('Information','Please Input Username','info');
	}else if(password_accounts == ''){
		swal('Information','Please Input Password','info');
	}else if(role_accounts == ''){
		swal('Information','Please Select User Type','info');
	}else{

	$.ajax({
		url: '../../process/admin/accounts.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'register_user',
                    full_name_accounts:full_name_accounts,
					username_accounts:username_accounts,
                    password_accounts:password_accounts,
                    role_accounts:role_accounts
                },success:function(response){

                   if (response == 'Already Exist') {
                   	swal('Information','Username Already Exist!','info');
                   }
                   else if (response == 'success') {
                   	swal('Success','Successfully Registered!','success');
                    load_users();
                   }else{
                   	swal('Error','Error!','error');      
                   }
                }
	});
}
}

const get_user_details =(param)=>{
	var string = param.split('~!~');
    var id = string[0];
    var full_name = string[1];
    var username = string[2];
    var password = string[3];
    var role = string[4];

document.getElementById('id_accounts_update').value = id;
document.getElementById('full_name_accounts_update').value = full_name;
document.getElementById('username_accounts_update').value = username;
document.getElementById('password_accounts_update').value = password;
document.getElementById('role_accounts_update').value = role;
}

const update_user =()=>{
	var id = document.getElementById('id_accounts_update').value;
	var full_name = document.getElementById('full_name_accounts_update').value;
	var username = document.getElementById('username_accounts_update').value;
	var password = document.getElementById('password_accounts_update').value;
	var role = document.getElementById('role_accounts_update').value;

	$.ajax({
		url: '../../process/admin/accounts.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'update_users',
                    id:id,
                    full_name:full_name,
					username:username,
                    password:password,
                    role:role
                },success:function(response){
                   if (response == 'success') {
                   	swal('Success','Successfully Updated!','success');
                    load_users();
                   }else{
                   	swal('Error','Error','error');
                   }
                }
	});
}

const delete_user =()=>{
    var id = document.getElementById('id_accounts_update').value;
    var full_name = document.getElementById('full_name_accounts_update').value;
    var username = document.getElementById('username_accounts_update').value;
    var password = document.getElementById('password_accounts_update').value;
    var role = document.getElementById('role_accounts_update').value;

    $.ajax({
        url: '../../process/admin/accounts.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'delete_users',
                    id:id,
                    full_name:full_name,
                    username:username,
                    password:password,
                    role:role
                },success:function(response){
                   if (response == 'success') {
                    swal('Information','Successfully Deleted!','info');
                    load_users();
                   }else{
                    swal('Error','Error','error');
                   }
                }
    });
}
</script>