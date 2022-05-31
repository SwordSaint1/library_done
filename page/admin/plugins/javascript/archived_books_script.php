<script type="text/javascript">

const load_archived_books =()=>{
	var title = document.getElementById('book_title_archived').value;

	$.ajax({
      url: '../../process/admin/archived.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_archived',
                    title:title
                },success:function(response){
                   document.getElementById('list_of_books_archived').innerHTML = response;
                }
   });
}

const get_archived_book_details =(param)=>{
	var string = param.split('~!~');
    var id = string[0];
    var title = string[1];
    var description = string[2];
    var author = string[3];
    var date_publish = string[4];
    var category = string[5];
    var book_type = string[6];
    var book_qty = string[7];
    var acquisition_no = string[8];
    var location = string[9];
    var shelf = string[10];

document.getElementById('id_update_archived').value = id;
document.getElementById('book_title_update_archived').value = title;
document.getElementById('description_update_archived').value = description;
document.getElementById('author_update_archived').value = author;
document.getElementById('date_publish_update_archived').value = date_publish;
document.getElementById('category_update_archived').value = category;
document.getElementById('book_type_update_archived').value = book_type;
document.getElementById('book_qty_update_archived').value = book_qty;
document.getElementById('acquisituin_no_update_archived').value = acquisition_no;
document.getElementById('location_update_archived').value = location;
document.getElementById('shelf_updates_archived').value = shelf;
}

const back_to_masterlist =()=>{
	var id = document.getElementById('id_update_archived').value;
	var title = document.getElementById('book_title_update_archived').value;
	var description = document.getElementById('description_update_archived').value;
	var author = document.getElementById('author_update_archived').value;
	var date_publish = document.getElementById('date_publish_update_archived').value;
	var category = document.getElementById('category_update_archived').value;
	var book_type = document.getElementById('book_type_update_archived').value;
    var book_qty = document.getElementById('book_qty_update_archived').value;
    var acquisition_no = document.getElementById('acquisituin_no_update_archived').value;
    var location = document.getElementById('location_update_archived').value;
    var shelf = document.getElementById('shelf_updates_archived').value;

   

	$.ajax({
      url: '../../process/admin/archived.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'return_to_masterlist',
                    id:id,
					title:title,
					description:description,
					author:author,
					date_publish:date_publish,
					category:category,
					book_type:book_type,
                    book_qty:book_qty,
                    acquisition_no:acquisition_no,
                    location:location,
                    shelf:shelf             
                },success:function(response){
                   
                   if (response == 'success') {
                   	swal('Success','Successfully Back to Masterlist','success');
                   	load_archived_books();
                   }else{
                   	swal('Error','Error','error');
                   	  
                }
                   }
   });
}

</script>