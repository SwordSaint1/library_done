<script type="text/javascript">
$(document).ready(function(){
	load_returned_books();
});	


const load_returned_books =()=>{
	var student_id = document.getElementById('student_id_returned').value;
	$.ajax({
      url: '../../process/student/returned.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_returned_books',
                    student_id:student_id
                },success:function(response){
                   document.getElementById('returned_books').innerHTML = response;
                     
                }
   });
}
</script>