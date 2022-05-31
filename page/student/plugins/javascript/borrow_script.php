<script type="text/javascript">
$(document).ready(function(){
	load_borrow_books();
});	


const load_borrow_books =()=>{
	var student_id = document.getElementById('student_id_list').value;
	$.ajax({
      url: '../../process/student/borrow.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_borrowed',
                    student_id:student_id
                },success:function(response){
                   document.getElementById('list_of_borrow_books').innerHTML = response;
                     
                }
   });
} 

const borrow_book =()=>{
	var student_id = document.getElementById('student_id').value;
	var student_qr = document.getElementById('student_qr').value;
	var book_qr = document.getElementById('book_qr').value;
	var return_date = document.getElementById('return_date').value;
	var verfication_borrower = document.getElementById('student_name').value;
  
  if(student_qr == '') {
    swal('Infomation','Please Scan your Student QR-Code','info');
  }
  else if(book_qr == ''){
    swal('Infomation','Please Scan the Book','info');
  }
  else if(return_date == ''){
    swal('Infomation','Please Set Returned Date','info');
  }
  else if(verfication_borrower == ''){
    swal('Infomation','Please Input Full Name of Borrower','info');
  }
  else{
	$.ajax({
	  url: '../../process/student/borrow.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'borrow_books',
                    student_id:student_id,
                    student_qr:student_qr,
          			book_qr:book_qr,
          			return_date:return_date,
                    verfication_borrower:verfication_borrower
                },success:function(response){
                 if(response == 'Book Not Exist'){
                          swal('Infomation','Book Not Exist!','info');
                    }else if(response == 'Not yet returned'){
                        swal('Information','Not yet returned Or Out of Stock!','info');    
                    }else if('success'){
                        swal('Success','Successfully Borrowed!','success');
                        load_borrow_books(); 
                    }else{
                		swal('Error','Error','error');     
                   }
                }
	});
}
}
</script>