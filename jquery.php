<script type="text/javascript">
$(document).ready(function(){


$('#regf').keyup(function(){
var matt = /^[a-z0-9A-Z|" "|"."]+$/;

	if(regf.fullname.value.match(matt))
	{document.getElementById('feedback2').innerHTML="<strong><font color='green'>Valid.</font></span>";}
	else
	{document.getElementById('feedback2').innerHTML="Invalid input.";}
});


});
</script>