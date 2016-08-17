<?php 
ob_start();
session_start();
if(isset($_SESSION['userid'])!=''){
$id=$_SESSION['userid'];

}
include('includes/db_config.php');
$msg='';
if(isset($_POST['reg'])){
	$ids=$id;
	$date=date('Y-m-d');
$name=$_POST['reg_name'];
$blood=$_POST['blood'];
$email=$_POST['reg_email'];
$mobile=$_POST['reg_mobile'];
$state=$_POST['reg_state'];
$city=$_POST['reg_city'];
$address=$_POST['reg_address'];
$edu=$_POST['reg_edu'];
$ocu=$_POST['reg_ocu'];
$dob=$_POST['reg_dob'];
$gender=$_POST['reg_gender'];
$query="insert into registration(user_id,date,name,blood,email,mobile,state,city,address,education,occupation,dob,gender) values('$ids','$date','$name','$blood','$email','$mobile','$state','$city','$address','$edu','$ocu','$dob','$gender')";
if(mysql_query($query))
{
header('Location:index.php');	
}else{
	
}
}

if(isset($_POST['update'])){
	$ids=$id;
	$date=date('Y-m-d');
$name=$_POST['reg_name'];
$blood=$_POST['blood'];
$email=$_POST['reg_email'];
$mobile=$_POST['reg_mobile'];
$state=$_POST['reg_state'];
$city=$_POST['reg_city'];
$address=$_POST['reg_address'];
$edu=$_POST['reg_edu'];
$ocu=$_POST['reg_ocu'];
$dob=$_POST['reg_dob'];
$gender=$_POST['reg_gender'];
$query="update registration set date='$date', name='$name', blood='$blood', email='$email', mobile='$mobile', state='$state', city='$city', address='$address', education='$edu', occupation='$ocu', dob='$dob', gender='$gender' where user_id='$ids'";

if(mysql_query($query)){
$msg="Update Sucessfully";	
}else{
	$msg="Updation Failed";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Bootstrap Admin Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">-->
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
 <link href="themes/4/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/4/js-image-slider.js" type="text/javascript"></script>
    <link href="css/generic.css" rel="stylesheet" type="text/css" />
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
   <style>
   .effects{
	   width:240px;background-color:#7B6E5E;display:block;height:40px;color:#FFF;text-align:center;padding-top:16px;border-bottom:1px solid #AC9175;
   }
   .effects:hover{
	   color:#000 !important;
	   box-shadow:2px 2px 2px 2px #666 ;
	   cursor:pointer ;
	   background-color:#B3A9A0;
   }
   #link:hover{
	text-decoration:underline;
	cursor:pointer;
	color:#F00;   
   }
   label{
	margin-left:30px;
	margin-top:20px;
	font-size:14px;
	font-family:"Arial Black", Gadget, sans-serif;
	color:#7E3817;   
   }
   #createPassword input,select{
	  margin-left:50px;
	margin-top:20px; 
   }
  
   #forgotpassword input,select{
	  margin-left:50px;
	margin-top:20px; 
   }
    #regform input,select,textarea{
	  margin-left:50px;
	margin-top:10px; 
   }
  
   </style>
</head>
<body style="background-color:#FDFEF9;">
<div class="container">
<div class="navbar navbar-fixed-top" >
  <div class="navbar-inner" >
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php"><span style="margin-left:20px;">Eye Donation</span></a><span style="float:right;margin-right:30px;margin-top:10px;font-size:16px;color:#FFF"><?php if(isset($_SESSION['usernames'])!=''){echo "<i class='icon-user'></i> Welcome ".$_SESSION['usernames'];?>&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></span><?php }else{}?>
      <div class="nav-collapse">
        
       
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>

<!-- /navbar -->
<div class="subnavbar" style="margin-bottom:0.2em;">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
        
         <li><a href="list.php"><i class="icon-list-alt"></i><span>List of service providers</span> </a> </li>
        <li class="active"><a href="about.php"><i class="icon-leaf"></i><span>About Us</span> </a> </li>
        <li><a href="contactus.php"><i class="icon-envelope"></i><span>Contact Us</span> </a> </li>
       <li></li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
</div>
<div class="main" style="border-bottom:none;">
  <div class="main-inner">
    <div class="container" style="box-shadow:2px 2px 2px 2px#666;height:700px;">
	 <div class="row" style="margin-left:0px;">
                 
              <div  class="span9" style="color:#7E3817;font-size:24px;font-family:Arial Black, Gadget, sans-serif;margin-top:30px;margin-left:2%;text-align:center;">About Us</div><br/>    
          <div class="container" style="box-shadow:2px 2px 2px 2px #666;width:800px;margin-top:60px;padding:20px;">
            
           <div style="color:#7E3817;font-size:18px;font-family:Arial Black, Gadget, sans-serif;margin-top:30px;margin-left:0%;">Quality Policy</div>
           <div style="color:#7E3817;font-size:15px;font-family:Arial Black, Gadget, ;margin-top:10px;margin-left:0%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We pledge to meet the patients' requirements by offering expert ophthalmic care with compassion through a committed professional team.<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We commit to achieve quality services through the Quality Management System while complying with all applicable regulatory requirements.
</div>

 <div style="color:#7E3817;font-size:18px;font-family:Arial Black, Gadget, sans-serif;margin-top:30px;margin-left:0%;">Objectives</div>
           <div style="color:#7E3817;font-size:15px;font-family:Arial Black, Gadget, ;margin-top:10px;margin-left:0%;"><ul>
           <li>Create awareness about eye donation</li>
           <li>Augment quality and quantity of corneas collected</li>
			<li>Evolve and implement uniform medical and operational standards and practices which are on par with international standards</li>
			<li>Act as a resource center for all eye banks in the country</li>
<ul><li>Eye Bank Association of India is a not for profit society. The policies of the organization are framed by an Executive committee, which comprises of Ophthalmologists and Eye Bankers. The Executive committee is elected by the members of the association and the term of the committee is three years.</li>


<li>Any person or organization can become a member of Eye Bank Association of India and help strengthen the eye donation movement. List of services available for institutional members.</li></ul><br/>
 It is a national organization acting as a resource center for all eye banks and organizations involved in the eye donation movement. The main objectives of our organization  are to increase collection of eyes, introduce uniform standards in eye banks all over the country and to educate public about eye donation and prevention of corneal blindness. Over the past few years EBAI has been receiving support from all quarters.

</div>
           
           </div>
         </div>
         
       
	</div>
  </div>
</div>  
<script type="text/javascript">
function check(){
var un=document.getElementById('username').value;
	if(un!=''){
showForm('regform');
}

}

function showForm(a)
{
  if(a=='createPassword'){
	document.getElementById('createPassword').style.display="block";  
	document.getElementById('main').style.display="none"; 
	document.getElementById('forgotpassword').style.display="none";  
	document.getElementById('main').style.display="none";   
	document.getElementById('regform').style.display="none";
  }
  else if(a=="forgotpassword"){
	document.getElementById('forgotpassword').style.display="block";  
	document.getElementById('main').style.display="none";   
	document.getElementById('createPassword').style.display="none";  
	document.getElementById('regform').style.display="none";  
  }
  else if(a=="regform"){
	  document.getElementById('regform').style.display="block";  
	document.getElementById('main').style.display="none";   
	document.getElementById('createPassword').style.display="none";  
	document.getElementById('forgotpassword').style.display="none";  
  }
}
</script>
<!--<script>
var validator = new FormValidator('create', [{
    name: 'uname',
    display: 'required',
    rules: 'required'
}, {
    name: 'alphanumeric',
    rules: 'alpha_numeric'
}, {
    name: 'email',
    rules: 'valid_email',
    depends: function() {
        return Math.random() > .5;
    }
}, {
    name: 'passw',
    rules: 'required'
}, {
    name: 're_pass',
    display: 'password confirmation',
    rules: 'required|matches[passw]'
}
});
</script>-->
 <script type="text/javascript">
        //The following script is for the group 2 navigation buttons.
        function switchAutoAdvance() {
            imageSlider.switchAuto();
            switchPlayPauseClass();
        }
        function switchPlayPauseClass() {
            var auto = document.getElementById('auto');
            var isAutoPlay = imageSlider.getAuto();
            auto.className = isAutoPlay ? "group2-Pause" : "group2-Play";
            auto.title = isAutoPlay ? "Pause" : "Play";
        }
        switchPlayPauseClass();
    </script>	
	<script type="text/javascript" src="js/validate.js"></script>
</body>
</html>