<script type="text/javascript">
	
const load_overdue_books =()=>{
	var borrowers_id = document.getElementById('borrower_id_overdue').value;
	var book_title = document.getElementById('book_overdue').value; 
	var due_date = document.getElementById('due_date_overdue').value; 

	$.ajax({
      url: '../../process/admin/overdue.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_overdue',
                    borrowers_id:borrowers_id,
					book_title:book_title,
                    due_date:due_date
                },success:function(response){
                   document.getElementById('list_of_overdue_books').innerHTML = response;
                     
                }
   });
} 
	
</script>