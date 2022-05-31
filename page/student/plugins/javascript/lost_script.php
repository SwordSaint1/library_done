<script type="text/javascript">
$(document).ready(function(){
	load_lost();
});	
	
const load_lost =()=>{
	var student_id = document.getElementById('student_id_lost').value;
	$.ajax({
      url: '../../process/student/lost.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_lost',
                    student_id:student_id
                },success:function(response){
                   document.getElementById('list_of_lost').innerHTML = response;
                     
                }
   });
} 
</script>