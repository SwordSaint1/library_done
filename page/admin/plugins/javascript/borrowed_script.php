<script type="text/javascript">
	
const load_borrow_books =()=>{
	var borrowers_id = document.getElementById('borrower_id').value;
	var book_title = document.getElementById('book').value; 
	var due_date = document.getElementById('due_date').value; 

	$.ajax({
      url: '../../process/admin/borrowed.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_borrowed',
                    borrowers_id:borrowers_id,
					book_title:book_title,
                    due_date:due_date
                },success:function(response){
                   document.getElementById('list_of_borrowed_books').innerHTML = response;
                     
                }
   });
} 

const get_details =(param)=>{
	var string = param.split('~!~');
    var id = string[0];
    var title = string[1];
    var description = string[2];
    var due_date = string[3];
    var borrowers_id = string[4];
    var points = string[5];
    var book_qrcode = string[6];

document.getElementById('id_return').value = id;
document.getElementById('book_title_return').value = title;
document.getElementById('description_return').value = description;
document.getElementById('due_date_return').value = due_date;
document.getElementById('points_return').value = points;
document.getElementById('book_qr_return').value = book_qrcode;
}

const recieved_book =()=>{
	var id = document.getElementById('id_return').value;
	var title = document.getElementById('book_title_return').value;
	var description = document.getElementById('description_return').value;
	var due_date = document.getElementById('due_date_return').value;
	var borrowers_id = document.getElementById('student_qr_return').value;
	var acknowledge_by = document.getElementById('acknowledge_return').value;
	var recieved_date = document.getElementById('date_return').value;
  var status_points = document.getElementById('status_points').value;
  var points = document.getElementById('points_return').value; 
  var book_qrcode = document.getElementById('book_qr_return').value;
  if (borrowers_id == ''){
    swal('Information','Please Scan Student QR-Code','info');
  }else if(status_points == ''){
    swal('Information','Please Select Status','info');
  }else{
	$.ajax({
      url: '../../process/admin/borrowed.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'recieve_book',
                    id:id,
          					title:title,
          					description:description,
          					due_date:due_date,
          					borrowers_id:borrowers_id,
          					acknowledge_by:acknowledge_by,
          					recieved_date:recieved_date,
                    status_points:status_points,
                    points:points,
                    book_qrcode:book_qrcode
                },success:function(response){
                  if (response == 'Student QR-Code Unmatched') {
                    swal('Information','Student QR-Code Unmatched!','info');
                  }
                  else if (response == 'success') {
                  	swal('Success','Successfully Recieved!','success');
                  	load_borrow_books();
                  }
                  else{
                  	swal('Error','Error!','error');       
                  }
                }
  });
}
}
</script>