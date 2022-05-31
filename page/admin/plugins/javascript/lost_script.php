<script type="text/javascript">
	
const load_lost_books =()=>{
	var borrowers_id = document.getElementById('borrower_id_lost').value;
	var book_title = document.getElementById('book_lost').value; 
	var due_date = document.getElementById('due_date_lost').value;

	$.ajax({
      url: '../../process/admin/lost_book.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_lost',
                    borrowers_id:borrowers_id,
					book_title:book_title,
					due_date:due_date
                },success:function(response){
                   document.getElementById('list_of_lost_books').innerHTML = response;
                }
   });
}	

const get_lost_details =(param)=>{
    var string = param.split('~!~');
    var id = string[0];
    var title = string[1];
    var description = string[2];
    var due_date = string[3];
    var borrowers_id = string[4];
    var points = string[5];
    var book_qrcode = string[6];
    var status = string[7];
    var borrowers_id = string[8];

document.getElementById('id_lost').value = id;
document.getElementById('book_title_lost').value = title;
document.getElementById('description_lost').value = description;
document.getElementById('due_date_lost').value = due_date;
document.getElementById('book_qr_lost').value = book_qrcode;
document.getElementById('status_points_lost').value = status;
document.getElementById('student_qr_lost').value = borrowers_id;
}

const replace_book =()=>{
    var id = document.getElementById('id_lost').value;
    var title = document.getElementById('book_title_lost').value;
    var description = document.getElementById('description_lost').value;
    var due_date = document.getElementById('due_date_lost').value;
    var book_qrcode = document.getElementById('book_qr_lost').value;
    var status = document.getElementById('status_points_lost').value;
    var borrowers_id = document.getElementById('student_qr_lost').value;
 
    $.ajax({
      url: '../../process/admin/lost_book.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'replace_book',
                    id:id,
                    title:title,
                    description:description,
                    due_date:due_date,
                    book_qrcode:book_qrcode,
                    status:status,
                    borrowers_id:borrowers_id
                },success:function(response){
                  if (response == 'success') {
                    swal('Success','Successfully Replaced!','success');
                    load_lost_books();
                  }
                  else{
                    swal('Error','Error!','error');       
                  }
                }
  });
}

</script>