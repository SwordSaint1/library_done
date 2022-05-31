<script type="text/javascript">

const load_books =()=>{
	var book_title = document.getElementById('book_title').value; 

	$.ajax({
      url: '../../process/admin/masterlist.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_book_list',
                    book_title:book_title
                },success:function(response){
                   document.getElementById('list_of_books').innerHTML = response;
                     
                }
   });
} 
	
const register_book =()=>{
    var acquisition = document.getElementById('acquisition_no_add').value;
	var title = document.getElementById('book_title_add').value;
	var description = document.getElementById('description_add').value;
	var author = document.getElementById('author_add').value;
	var date_publish = document.getElementById('date_publish_add').value;
	var category = document.getElementById('category_add').value;
	var book_type = document.getElementById('book_type_add').value;
    var book_qty = document.getElementById('qty_book_add').value;
    var location = document.getElementById('location_add').value;
    var shelf = document.getElementById('shelf_adds').value;
   
    
    if(acquisition == ''){
        swal('Information','Please Input Acquisition No!','info');
    }if(title == ''){
        swal('Information','Please Input Book Title!','info');
    }else if(description == ''){
        swal('Information','Please Input Book Description!','info');
    }else if(author == ''){
        swal('Information','Please Input Book Author!','info');
    }else if(date_publish == ''){
        swal('Information','Please Input Book Date Publish!','info');
    }else if(category == ''){
        swal('Information','Please Input Book Category!','info');
    }else if(book_type == ''){
        swal('Information','Please Input Book Type!','info');
    }else if(book_qty == ''){
        swal('Information','Please Input Book Quantity!','info');
    }else if (book_qty == 0) {
        swal('Information','Invalid Quantity!', 'info');
    }else if (location == '') {
        swal('Information','Please Input Location!', 'info');
    }else if (shelf == '') {
        swal('Information','Please Input Shelf!', 'info');
    }
    else{

	$.ajax({
      url: '../../process/admin/masterlist.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'register_book',
                    title:title,
					description:description,
					author:author,
					date_publish:date_publish,
					category:category,
                    book_type:book_type,
                    book_qty:book_qty,
                    location:location,
                    shelf:shelf,
                    acquisition:acquisition
                },success:function(response){
                   if (response == 'Book Already Exist') {
                    swal('Information','Book Already Exist!','info');
                  }
                  else if (response == 'success') {
                  	swal('Success','Successfully Registered!','success');
                    load_books();
                  }
                  else{
                  	swal('Error','Error!','error');       
                  }
                   	  
                }
   });
}	
}

const get_update_book_details =(param)=>{
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

document.getElementById('id_update').value = id;
document.getElementById('book_title_update').value = title;
document.getElementById('description_update').value = description;
document.getElementById('author_update').value = author;
document.getElementById('date_publish_update').value = date_publish;
document.getElementById('category_update').value = category;
document.getElementById('book_type_update').value = book_type;
document.getElementById('book_qty_update').value = book_qty;
document.getElementById('acquisituin_no_update').value = acquisition_no;
document.getElementById('location_update').value = location;
document.getElementById('shelf_updates').value = shelf;
}

const update_book =()=>{
	var id = document.getElementById('id_update').value;
	var title = document.getElementById('book_title_update').value;
	var description = document.getElementById('description_update').value;
	var author = document.getElementById('author_update').value;
	var date_publish = document.getElementById('date_publish_update').value;
	var category = document.getElementById('category_update').value;
	var book_type = document.getElementById('book_type_update').value;
    var book_qty = document.getElementById('book_qty_update').value;
    var acquisition_no = document.getElementById('acquisituin_no_update').value;
    var location = document.getElementById('location_update').value;
    var shelf = document.getElementById('shelf_updates').value;

    if (book_qty == 0) {
        swal('Information','Invalid Quantity!', 'info');
    }else{

	$.ajax({
      url: '../../process/admin/masterlist.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'update_book_details',
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
                   	swal('Success','Successfully Updated','success');
                   	load_books();
                   }else{
                   	swal('Error','Error','error');
                   	  
                }
                   }
   });
}
}

const delete_book =()=>{
    var id = document.getElementById('id_update').value;
    var title = document.getElementById('book_title_update').value;
    var description = document.getElementById('description_update').value;
    var author = document.getElementById('author_update').value;
    var date_publish = document.getElementById('date_publish_update').value;
    var category = document.getElementById('category_update').value;
    var book_type = document.getElementById('book_type_update').value;
    var book_qty = document.getElementById('book_qty_update').value;

    $.ajax({
      url: '../../process/admin/masterlist.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'delete_book_details',
                    id:id,
                    title:title,
                    description:description,
                    author:author,
                    date_publish:date_publish,
                    category:category,
                    book_type:book_type,
                    book_qty:book_qty               
                },success:function(response){
                   
                   if (response == 'success') {
                    swal('Information','Successfully Deleted!','info');
                    load_books();
                   }else{
                    swal('Error','Error','error');
                      
                }
                   }
   });
}

</script>