<script type="text/javascript">

const load_returned_books =()=>{
	var borrowers_id = document.getElementById('borrower_id_returned').value;
	var book_title = document.getElementById('book_returned').value; 
	var date_returned = document.getElementById('date_returned').value; 

	$.ajax({
      url: '../../process/admin/returned.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_returned',
                    borrowers_id:borrowers_id,
					book_title:book_title,
                    date_returned:date_returned
                },success:function(response){
                   document.getElementById('list_of_returned_books').innerHTML = response;
                     
                }
   });
} 
</script>