<script type="text/javascript">
$(document).ready(function(){
	load_penalty();
});	
	
const load_penalty =()=>{
	var student_id = document.getElementById('student_id_list').value;
	$.ajax({
      url: '../../process/student/penalties.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_penalties',
                    student_id:student_id
                },success:function(response){
                   document.getElementById('list_of_penalties').innerHTML = response;
                     
                }
   });
} 
</script>