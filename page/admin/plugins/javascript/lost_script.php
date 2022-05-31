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

document.getElementById('id_lost').value = id;
document.getElementById('book_title_lost').value = title;
document.getElementById('description_lost').value = description;
document.getElementById('due_date_lost').value = due_date;
document.getElementById('points_lost').value = points;
document.getElementById('book_qr_lost').value = book_qrcode;
}
</script>