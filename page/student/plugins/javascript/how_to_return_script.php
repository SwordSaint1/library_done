<script type="text/javascript">
$(document).ready(function(){
	load_how_to_return();
});

const load_how_to_return =()=>{

	$.ajax({
      url: '../../process/student/how_to_return.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_how_to_return',
                },success:function(response){
                   document.getElementById('how_to_return_step').innerHTML = response;
                     
                }
   });
}

</script>