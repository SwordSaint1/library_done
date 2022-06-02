<script type="text/javascript">
$(document).ready(function(){
load_borrower_penalty();
load_borrower();
});

const load_borrowers =()=>{
	load_borrower_penalty();
load_borrower();
}

const load_borrower =()=>{
	var full_name = document.getElementById('full_name_manage').value;
 
	$.ajax({
      url: '../../process/admin/manage.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_borrower_user',
                    full_name:full_name
                },success:function(response){
                   document.getElementById('list_of_borrowers').innerHTML = response;
                }
   });
}

const load_borrower_penalty =()=>{
	var full_name = document.getElementById('full_name_manage').value;
 
	$.ajax({
      url: '../../process/admin/manage.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_borrower_user_penalty',
                    full_name:full_name
                },success:function(response){
                   document.getElementById('list_of_borrowers_penalty').innerHTML = response;
                }
   });
}

const register_borrower =()=>{
	var borrowers_id = document.getElementById('borrow_id_user').value;
	var full_name = document.getElementById('full_name_user').value;
	var gender = document.getElementById('gender_user').value;
	var contact_no = document.getElementById('contact_no_user').value;
	var course = document.getElementById('course_user').value;

	if (borrowers_id == '') {
		swal('Information','Please Input Borrower ID', 'info');
	}
	else if(full_name == ''){
		swal('Information','Please Input Full Name', 'info');
	}else if(gender == ''){
		swal('Information','Please Select Gender', 'info');
	}else if(contact_no == ''){
		swal('Information','Please Input Contact No', 'info');
	}else if(course == ''){
		swal('Information','Please Input Course / Year', 'info');
	}
	else{

	$.ajax({
      url: '../../process/admin/manage.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'register_borrowers',
                    borrowers_id:borrowers_id,
										full_name:full_name,
										gender:gender,
										contact_no:contact_no,
										course:course
                },success:function(response){
                  
                  if (response == 'Borrower ID Already Used') {
                  	swal('Information', 'Borrower ID Already Used!','info');
                  }else if(response == 'success'){
                  	swal('Success', 'Successfully Registered', 'success');
                  	load_borrower();
                  }else{
                  	swal('Error','Error','error');
                  }                 	  
                }
   });

}	
}	

const get_borrower_details =(param)=>{
	var string = param.split('~!~');
    var id = string[0];
    var borrowers_id = string[1];
    var full_name = string[2];
    var gender = string[3];
    var contact_no = string[4];
    var course_year = string[5];
    var points = string[6];
    console.log(param);

document.getElementById('id_borrow_user_update').value = id;
document.getElementById('borrow_id_user_update').value = borrowers_id;
document.getElementById('full_name_user_update').value = full_name;
document.getElementById('gender_user_update').value = gender;
document.getElementById('contact_no_user_update').value = contact_no;
document.getElementById('course_user_update').value = course_year; 
document.getElementById('points_user_update').value = points; 
}

const update_borrower =()=>{
	var id = document.getElementById('id_borrow_user_update').value;
	var borrowers_id = document.getElementById('borrow_id_user_update').value;
	var full_name = document.getElementById('full_name_user_update').value;
	var gender = document.getElementById('gender_user_update').value;
	var contact_no = document.getElementById('contact_no_user_update').value;
	var course_year = document.getElementById('course_user_update').value;

	$.ajax({
      url: '../../process/admin/manage.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'update_borrower_details',
                    id:id,
                    borrowers_id:borrowers_id,
										full_name:full_name,
										gender:gender,
										contact_no:contact_no,
										course_year:course_year
                },success:function(response){
                  
                  if (response == 'success') {
                  	swal('Success','Successfully Updated','success');
                  	load_borrower();
                  }else{
                  	swal('Error','Error','error');
                  }
                  	
                     
                }
   });
}

const delete_borrower =()=>{
	var id = document.getElementById('id_borrow_user_update').value;
	var borrowers_id = document.getElementById('borrow_id_user_update').value;
	var full_name = document.getElementById('full_name_user_update').value;
	var gender = document.getElementById('gender_user_update').value;
	var contact_no = document.getElementById('contact_no_user_update').value;
	var course_year = document.getElementById('course_user_update').value;

	$.ajax({
      url: '../../process/admin/manage.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'delete_borrower_details',
                    id:id,
                    borrowers_id:borrowers_id,
										full_name:full_name,
										gender:gender,
										contact_no:contact_no,
										course_year:course_year
                },success:function(response){
                  
                  if (response == 'success') {
                  	swal('Information','Successfully Deleted!','info');
                  	load_borrower();
                  }else{
                  	swal('Error','Error','error');
                  }
                  	
                     
                }
   });
}
</script>