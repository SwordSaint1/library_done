<script type="text/javascript">
$(document).ready(function(){
	load_rules();
});

const load_rules =()=>{

	$.ajax({
      url: '../../process/student/rules.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_rules',
                },success:function(response){
                   document.getElementById('list_of_rules').innerHTML = response;
                     
                }
   });
}

</script>