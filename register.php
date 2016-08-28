<html>
<head>

<style type="text/css">
#feedback1,#feedback2,#feedback3,#feedback4,#feedback5,#feedback6,#feedback7,#feedback8,#feedback9
{	
font-size:12px;
	color:#FF0000;
	}
.register {line-height:0px;
	font-family: "MS Serif", "New York", serif;
	font-size: 14px;
	font-style: normal;
	text-align: left;
	vertical-align: top;
}
.register:hover,.register:focus
{
box-shadow: 0 0 5px rgba(0, 0, 255, 1);
    -webkit-box-shadow: 0 0 5px rgba(0, 0, 255, 1); 
    -moz-box-shadow: 0 0 5px rgba(0, 0, 255, 1);
    border:1px solid rgba(0,0,255, 0.8); }
#red {
	color: #F00;
}


.error {
	z-index:2;
	left:30%;
	font-size: 14px;
	font-style: normal;
	font-weight: bolder;
	color: #FF0;
	text-decoration: none;
	text-align: left;
	vertical-align: top;
	position: static;
	top: 2px;
} 
</style>

<script type="text/javascript">

function validate()
{
	var showflag=1;
	
	
	
	{
		var email=regf.email.value;
		var at=email.indexOf('@');
		var att=email.length-at;
		var dot=email.lastIndexOf('.');
		var dott=email.length-dot;
		if(email.length>0)
		{if(at<1)
		{   
		document.getElementById('feedback1').innerHTML="example@email.com";showflag=0;
		}
		else
		{
			if(att<=1)
			{
			document.getElementById('feedback1').innerHTML="example@email.com";showflag=0;
			}
			else
			{if((at+1)>=dot) 
			{document.getElementById('feedback1').innerHTML="example@email.com";showflag=0;}
			else				
			{	if(dott<=1)
			{document.getElementById('feedback1').innerHTML="example@email.com";showflag=0;}
			else
			{document.getElementById('feedback1').innerHTML="";}}
			}
		}}
		else
		{document.getElementById('feedback1').innerHTML="Cannot be empty";showflag=0;}
	 }
		
		
		
	{	
		var matt = /^[a-zA-Z|" "|"."]+$/;
		
				function trim(s)
				{
				var l=0; var r=s.length -1;
				while(l < s.length && s[l] == ' ')
				{	l++; }
				while(r > l && s[r] == ' ')
				{	r-=1;	}
				return s.substring(l, r+1);
				}
		regf.fullname.value=trim(regf.fullname.value);
		if(regf.fullname.value.length!=0)
		{
		if(regf.fullname.value.length>=5)
		{
		if(regf.fullname.value.match(matt))
		{document.getElementById('feedback2').innerHTML=""; }
		else
		{document.getElementById('feedback2').innerHTML="Invalid Name";showflag=0;}
		}
		else
		{document.getElementById('feedback2').innerHTML="Minimum 5 Letters";showflag=0;}
		}
		else
		{document.getElementById('feedback2').innerHTML="Cannot be empty";showflag=0;}
		
	}
	
		

		
		
			{
			if(regf.password.value.length<5)
			{if(regf.password.value.length==0)
			{document.getElementById('feedback3').innerHTML="Cannot be empty";showflag=0;}
				else
				{document.getElementById('feedback3').innerHTML="Minimum 5 Letters";showflag=0;}}
			
			else
			{document.getElementById('feedback3').innerHTML="";	}
			}
			
				  {
		var phmat=/^[0-9]+$/ ;
		
		
		
		
		if(regf.mobile.value.match(phmat))
		{
		if(regf.mobile.value.length==10)
	  	{	document.getElementById('feedback4').innerHTML="";	}
		else
		{document.getElementById('feedback4').innerHTML="10 digit no";showflag=0;}
		}
		else
		{document.getElementById('feedback4').innerHTML="Invalid number";showflag=0;}
	 	
		 }
		 
			
			{
				if(regf.pincode.value.length==0)
				{document.getElementById('feedback7').innerHTML="Cannot be empty";showflag=0;}
				else
				
				{
					if(regf.pincode.value.match(/^[0-9]|"+"+$/))
					{document.getElementById('feedback7').innerHTML="";}
					else
					{document.getElementById('feedback7').innerHTML="Invalid pincode";showflag=0;}
										
				}		
							
			}
			
			{
			if(regf.address1.value.length==0)
				{document.getElementById('feedback5').innerHTML="Cannot be empty";showflag=0;}
			else
					{document.getElementById('feedback5').innerHTML="";}
			}
		
			{
				if(regf.district.value=="")
				{document.getElementById('feedback8').innerHTML="Choose a district";showflag=0;}
			else
					{document.getElementById('feedback8').innerHTML="";}
			}
			
			
			{
			
			var matt = /^[a-z0-9|"_"]+$/;
		if(regf.username.value.length>=5)
		{
		if(regf.username.value.match(matt))
		{document.getElementById('feedback9').innerHTML="";}
		else
		{document.getElementById('feedback9').innerHTML="Invalid username";showflag=0;}
		}
		else
		{if(regf.username.value.length==0)
		{document.getElementById('feedback9').innerHTML="Cannot be empty";showflag=0;}
		else
		{document.getElementById('feedback9').innerHTML="Minimum 5 Letters";showflag=0;}}


		
				
			}
if(showflag==0)
{return false;}
}
</script>


</head>
<title>Registration</title>
<body>

    

    <span class="error">
    <?php 
	
$connect=mysql_connect("localhost","root","") or die(" couldnt connect");mysql_select_db("database") or die("cudnt connect xampp");

function cleanme($v)
{
$v = mysql_real_escape_string($v);
$v=strip_tags($v);
$v = trim($v);

return($v);
}	
	$itwasusername=0;$itwasemail=0;
	$email = $_POST ['email'];
	$fullname = $_POST ['fullname'];
	$username = $_POST ['username'];
	$password = $_POST ['password'];	
	$mobile	  = $_POST ['mobile'];
	$address1 = $_POST ['address1'];
	$address2 = $_POST ['address2'];
	$pincode  = $_POST['pincode'];
	$district = $_REQUEST['district'];
	$email=cleanme($email);$fullname=cleanme($fullname);$username=cleanme($username);$password=cleanme($password);
	$mobile=cleanme($mobile);$password=cleanme($password);
	$address1=cleanme($address1);$address2=cleanme($address2);
	$pincode=cleanme($pincode);$district=cleanme($district);
	

if ((!empty($email))&&(!empty($fullname))&&(!empty($username))&&(!empty($password))&&(!empty($mobile))&&(!empty($address1))&&(!empty($pincode))&&(!empty($district)))

{

if( ((strlen($email)<=50)&&(strlen($email)>=3)) && ((strlen($fullname)<=30)&&(strlen($fullname)>=5)) && ((strlen($username)<=20)&&(strlen($username)>=5)) && ((strlen($password)<=30)&&(strlen($password)>=5)) && (strlen($mobile)==10) && (strlen($address1)<=50) && (strlen($address2)<=50) && (strlen($pincode)<=6) && (strlen($district)<=20))
{

$flagerror=0;
if($pos=strpos($email,"@")){$eemail=strstr($email,"@"); if($posdot=strpos($eemail,".")){if($posdot>0){}else{$flagerror=1;}}else{$flagerror=1;}} else {$flagerror=1;}
if(preg_match('/^[a-zA-Z|" "|"."]+$/', $fullname)){} else {$flagerror=1;};	
if(preg_match('/^[0-9]+$/', $mobile)){} else {$flagerror=1;};		
if(preg_match('/^[0-9|"+"]+$/', $pincode)){} else {$flagerror=1;};	
if(preg_match('/^[a-z0-9|"_"]+$/', $username)){} else {$flagerror=1;};


	$query = mysql_query("SELECT * FROM members WHERE email='$email' OR username='$username'");
	if(mysql_fetch_assoc($query))
	{
	$q1 = mysql_query("SELECT * FROM members WHERE email='$email'");	
	if(mysql_fetch_assoc($q1))
	{$itwasemail=1;echo "<div class='error'>Email already registered</div>";}
	else
	{$itwasusername=1;echo "<div class='error'>Username already taken</div>";}
	}
	if($flagerror==0&&$itwasemail==0&&$itwasusername==0)
	{
		
		$one=array("A","B","C","D","E","F","G","H","I","J","K",
                          "L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","1",
                          "2","3","4","5","6","7","8","9","0","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$verifycode="";
		$subject = "Account verification";
	
	$headers = "From: foryou@gmail.com";
		for($i=0;$i<16;$i++)
		{$verifycode=$verifycode.$one[rand(0,61)];
			
			}
			
		$body="Follow the link for verification ".$verifycode;
		mysql_query("INSERT INTO members VALUES('','$email','$username','$password','$fullname','$mobile','$address1','$address2','$district','$pincode','','$verifycode')");	
	if (mail($email, $subject, $body, $headers)) {}
die("<h4> Registered Successfully... .... <a href='index.php'> login</a>");
}
	
	
}	
else
{
	if($flagerror==1)
	{echo "<div class='error'>error in inputs</div>";}


}
	
}






	




	?>
    </span>
<div  align="center" id="form" style="margin-left:10%; width:900px; height:800px; margin-top:10%; margin-bottom:5%; margin-right:5%;" >
<form action='register.php'  method='POST' name='regf' id="regf" onSubmit="return validate()" >
	<table>
    
    <tr><td width=180>
    Email <span id="red">*</span></td><td>
      :<input type='Text' name='email' class='register' value='<?php echo($email) ?>' maxlength=50 size=25/></td><td  width=100 height=40><span id="feedback1"></span></td></tr>
      
      <tr><td width=180>
    Username <span id="red">*</span></td><td>
      :<input type='Text' name='username' class='register' value='<?php echo($username) ?>' maxlength=20 size=25/></td><td  width=100 height=40><span id="feedback9"></span></td></tr>
      
      <tr><td>
    Fullname <span id="red">*</span>
     </td><td> :<input type='Text' name='fullname' id='fullname' class='register' value='<?php echo($fullname) ?>' maxlength=30 size=25/></td><td  width=100 height=40><span id="feedback2"></span></td></tr>
     
     <tr><td>
    Password <span id="red">*</span>
          </td><td>:<input type='password' class='register' id='pass' name='password' maxlength=30 size=25/></td><td  width=100 height=40><span id="feedback3"></span></td></tr>
          
         
      <tr><td>Mobile <span id="red">*</span></td><td>
      :<input  type='tel' name='mobile' id='mobile' class='register' value='<?php echo($mobile) ?>' maxlength=10 size=25 /></td><td  width=100 height=40><span id="feedback4"></span></td></tr>
      
      
 <tr><td>
     
      Address Line 1 <span id="red">*</span></td><td>
      :<input type='Text'  name='address1'  value='<?php echo($address1) ?>' class='register' size=25 maxlength=50 /></td><td  width=100 height=40><span id="feedback5"></span></td></tr>
      
      <tr><td>     
      Address Line 2 </td><td>
      :<input type='Text'  name='address2' class='register' size=25 value='<?php echo($address2) ?>' maxlength=50 /></td><td  width=100 height=40><span id="feedback6"></span></td></tr>
      
      <tr><td>
       Pin Code <span id="red">*</span></td><td>
      :<input type='Text'  name='pincode' class='register' value='<?php echo($pincode) ?>' size=25 maxlength=6 /></td><td  width=100 height=40><span id="feedback7"></span></td>
      </tr><tr><td>
      District <span id="red">*</span></td><td>
      :<select name="district" class="register">

<option value="" class="register">Select..<?php for ($i=0;$i<29;$i++) {echo "&nbsp;";}?></option>
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


</select></td><td  width=100 height=40><span id="feedback8"></span></td></tr><tr><td></td><td>
<input type='submit' id="red" value='register' /></td><td></td></tr></table>
      <br>
     
  
</form>  

	</div>

	


</body>
</html>
