<?php if(!isset($_COOKIE['mid']))
{die("please login <a href='index.php'>go</a>");}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><style type="text/css">
#div1
{	z-index:1;
	margin-top:10%;
	margin-left:18%;

	height:70%;
	width:65%;
	border:#000;
	border:thick;
	border:groove;
	
}


</style>

<script type="text/javascript" src="js.js">
</script>
<script type="text/javascript">


function changed()
{	document.forms[0].ticket.options.length=1;
	if((document.forms[0].showno.value!="")&&(document.forms[0].district.value!=""))
	{show(document.forms[0].showno.value);}
}

	
$(document).ready(function() {
	 
	
	
$('#district').change(function(){
	document.forms[0].theater.options.length=1;
 	document.forms[1].ticket.options.length=1;
$.post('ajax.php',{district: document.getElementById('district').value},function(result){
	var theatere=result;
		var ind=theatere.indexOf("@");
		var limit=theatere.slice(0,ind);
		var th=theatere.split('@');
		for (i=1;i<=limit;++i)
     {
	 var itm=new Option();
		 itm.text=th[i];
		 itm.value=th[i];
		 document.forms[0].theater.options[i]=itm;
	 }
	 
	
	});
});



 $('#theater').change(function(){
	$.post('getdate.php',{district: document.getElementById('district').value,theater: document.getElementById('theater').value},function(result){ var dtid=result.split('@');
		var till=dtid[0];
		var costs=dtid[2].split(','); 
		 
	
		var now = new Date();
var month = now.getMonth();
var day = now.getDate();
var year = now.getFullYear();

/*document.getElementById('a').innerHTML=till+';'+now;
		var datum = new Date(Date.UTC(datesplit[2],datesplit[1]-1,datesplit[0],23,59,59));
		var till=Math.round(datum.getTime()/1000);*/
		 var dtt=new Date(Date.UTC(year,month,day,5,30,00));
		var noww=Math.round(dtt.getTime()/1000);var j=0;var alldate=new Array();var i;var alldates=new Array();

		if(noww<till)
		{
		
		for(i=noww+86400;i<=till;i=i+86400)
		{alldate[j]=i;j=j+1;}
		for(var k=0;k<=j;k++)
		{
			var temp=new Date(alldate[k]*1000);
			alldates[k]=temp.getDate()+"-"+(temp.getMonth()+1)+"-"+temp.getFullYear();			
		}
			var ids=['a','b','c','d','e','f','g','h'];
			var iddates=new Array();
			for(var k=0;k<j;++k)
			{document.getElementById(ids[k]).innerHTML=alldates[k];iddates[k]=alldates[k];
			document.getElementById(ids[k]).value=alldate[k];
			}
		document.getElementById('id').value=dtid[1];
		}
 	var ctr=0;
	while(costs[ctr])
     {
	 	var itm=new Option();
		 itm.text=costs[ctr];
		 itm.value=costs[ctr];
		document.forms[1].ticket.options[ctr+1]=itm;
	 	++ctr;
	}  
		 
		});
		});
		
		
	
	
		 
		$('.a').mouseover(function(){
			 
document.getElementById("dos").value=$(this).val();
   $.post('shows.php',{idss:document.getElementById("id").value,date:$(this).val()},function(result){
		  var rem=result.split('@');
		  var sh0=['ds10','ds20','ds30','ds40','ds50'];
		  var sh1=['ds11','ds21','ds31','ds41','ds51'];
		  var sh2=['ds12','ds22','ds32','ds42','ds52'];
		  var shn=['one','two','three','four','five'];
		  var shh=['SHOW 1','SHOW 2','SHOW 3','SHOW 4','SHOW 5'];
		  for(i=0;i<5;i++)
		  {		var mname=rem[i].split('/');
		  if(mname[1]!='Nil')
			  {document.getElementById(sh0[i]).innerHTML=shh[i];
			  document.getElementById(sh1[i]).innerHTML=mname[0];
			  document.getElementById(sh2[i]).innerHTML=mname[1];
			  }
			  else
			  {
				document.getElementById(shn[i]).hidden="hidden";
				}
			  }
		  		  
		  });
 
	 }); 
	 
	 
	 
	 $('.shows').mousedown(function(){
		  
	 	document.forms[0].district.disabled="disabled";document.forms[0].theater.disabled="disabled";
 
/*
$.post('ajaxmovie.php',{show: $(this).attr("value"),id: document.getElementById('id').value,dos:document.getElementById("dos").value},function(result){
	var gotit=result;
			   var full=gotit.split('@');
			   var cost=full[3].split(',');
			   var dif=full[1];
			   if((dif)>=0)
			   var op1=dif+" seats are available ";
			   else
			   var op1=" All seats filled";
			 
			 if(full[0]!='Nil')
			 {document.getElementById('change').innerHTML="<h3>Movie: "+full[0]+"<br>"+op1+"</h4>";
			 var i=0;
			 while(cost[i]!=";")
     {
	 var itm=new Option();
		 itm.text=cost[i];
		 itm.value=cost[i];
		 document.forms[1].ticket.options[i+1]=itm;
	 ++i;}
			 }
		    		  
				  else
				  
				  {document.getElementById('change').innerHTML="No show "}
	});
		 */
	}); 
		
		});
	
     function calc(no)
	 {	var perticket=document.forms[1].ticket.value;
	 	var tot=no*perticket;
		 if((no!=0)&&(perticket!=0)){document.getElementById('price').innerHTML="<h3><font color='red'> Rs."+tot+"</h3></font>";}
		 else {document.getElementById('price').innerHTML="";}
		 }
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>buy ticket</title>
</head>
<body>
 
<?php 

$gmt=mktime(date("H")+5,date("i")+30, date("s"), date("m") , date("d"), date("Y"));

$date=date("d",$gmt);
$month=date("m",$gmt);
$year=date("Y",$gmt);
$date=date("d-m-Y",$gmt);

echo <<<tag
<div align="center">
<table border="1"  vspace="12px">

<tr>
<td width="50%">
<form name="getdetails" >
Select district:
<select  name="district"  id="district"  onchange="return gettheater(this.value)" >

<option value="">Select..&nbsp;</option>
<option value="trivandrum">Trivandrum</option>
<option value="kollam">Kollam</option>
<option value="pathanamthitta">Pathanamthitta</option>
<option value="alapuzha">Alapuzha</option>
<option value="kottayam">Kottayam</option>
<option value="idukki">Idukki</option>
<option value="ernakulam">Ernakulam</option>
<option value="thrissur">Thrissur</option>
<option value="palakkad">Palakkad</option>
<option value="malappuram">Malappuram</option>
<option value="kozhikode">Kozhikode</option>
<option value="wayanad">Wayanad</option>
<option value="kannur">Kannur</option>
<option value="kasaragod">Kasaragod</option>


</select><br /><br />





Select theater:
<select name="theater" id="theater">
<option value="">Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option></select>
<br /><br />
</form>
</td><td><span id="a" class="a"></span><span id="b" class="a"></span><span id="c" class="a"></span><span id="d" class="a"></span><br><span id="e" class="a"></span><span id="f" class="a"></span><span id="g" class="a"></span><span id="h" class="a"></span></td>
</tr></table> 

<table><tr><td>

<div id="one" class="shows" value="one"><span id="ds10"></span><br><span id="ds11"></span><br><span id="ds12"></span></div></td><td>
<div id="two" class="shows" value="two"><span id="ds20"></span><br><span id="ds21"></span><br><span id="ds22"></span</div></td><td>
<div id="three" class="shows" value="three"><span id="ds30"></span><br><span id="ds31"></span><br><span id="ds32"></span</div></td><td>
<div id="four" class="shows" value="four"><span id="ds40"></span><br><span id="ds41"></span><br><span id="ds42"></span</div></td><td>
<div id="five" class="shows" value="five"><span id="ds50"></span><br><span id="ds51"></span><br><span id="ds52"></span</div>

</td></tr></table> 


<table border="1"><tr><td>
<form action="bill.php" method="post">
Select ticket&nbsp;&nbsp;:
<select name="ticket" onchange="return calc(document.forms[1].number.value)">
<option value="0">Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>

</select><br /><br />No. of tickets:
<select name="number" onchange="return calc(this.value)">
<option value="0">Select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>

<input type="hidden" name="id" id="id"/>
<input type="hidden" name="dos" id="dos"/>
<input type="submit" name="submit" />
</form>

</td>
<td><a href='logout.php'>logout</a></td></tr>
<br>
</div>
tag;
?>
</body>
</html>