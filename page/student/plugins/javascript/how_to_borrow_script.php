<script type="text/javascript">
$(document).ready(function(){
	load_how_to_borrow();
});

const load_how_to_borrow =()=>{

	$.ajax({
      url: '../../process/student/how_to_borrow.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_how_to_borrow',
                },success:function(response){
                   document.getElementById('how_to_borrow_step').innerHTML = response;
                     
                }
   });
}

</script>