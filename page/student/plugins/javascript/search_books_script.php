<script type="text/javascript">
	
const search_books =()=>{
	var title = document.getElementById('search_book_title').value;
	var category = document.getElementById('search_book_category').value;

	$.ajax({
      url: '../../process/student/search_book.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_search_book',
                    title:title,
                    category:category
                },success:function(response){
                   document.getElementById('list_of_search_books').innerHTML = response;
                     
                }
   });
}	
</script>