<?php 
ob_start();
session_start();
include('includes/db_config.php');
$msg='';
if(isset($_POST['create'])){

$uname=$_POST['uname'];
$email=$_POST['email'];
$quest=$_POST['sec_quest'];
$ans=strtolower($_POST['sec_quest_ans']);
$pass=$_POST['passw'];
$repass=$_POST['re_pass'];
if($pass!=$repass){
echo "<script>alert('Password Mismatch');</script>";

}
else{
$query="insert into user(`name`,`email`,`quest`,`answer`,`password`)values('$uname','$email','$quest','$ans','$repass')";
mysql_query($query);
}
}

if(isset($_POST['submit'])){
$email=$_POST['email'];
$pass=$_POST['pass'];
$query1="select * from user where email='$email' and password='$pass'";
$res=mysql_query($query1);
$num=mysql_num_rows($res);
if($num>0){
$row=mysql_fetch_assoc($res);
$_SESSION['usernames']=$row['name'];
$_SESSION['userid']=$row['id'];
}else{$msg="Login Details Incorrect !!";}

}
$msg2='';
if(isset($_POST['forgot'])){
	$q=$_POST['quest'];
	$qa=$_POST['quest_ans'];
	$np=$_POST['new_pass'];
	$rp=$_POST['re_new_pass'];
	
	$query2="select * from user where quest='$q' and answer='$qa'";
	if(mysql_query($query2))
	{
	 	
	}else{
	$msg2="Question and Answer Mismatch !!!";	
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
<body style="background-color:#FDFEF9;background-image:url(images/Bambi-Silhouette-Disney-Wallpaper-background-1920x1080-1366x768.jpg)">
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
        <li class="active"><a href="index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
        
        <li><a href="list.php"><i class="icon-list-alt"></i><span>List of service providers</span> </a> </li>
        <li><a href="about.php"><i class="icon-leaf"></i><span>About Us</span> </a> </li>
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
    <div class="container" style="box-shadow:2px 2px 2px 2px#666;">
	 <div class="row" style="margin-left:0px;border-bottom:2px solid #7D6D5E;">
	   <div class="span8" style="margin-left:0px;width:710px;">
         <div id="sliderFrame">
           <div id="slider">
            <img src="images/img/1.jpg" />
           <img src="images/img/2.jpg" />
            <img src="images/img/3.jpg" />
          <img src="images/img/4.jpg" />            </div>
        <!--Custom navigation buttons on both sides-->
        
        <!--nav bar-->
     <!--   <div style="text-align:center;padding:20px;z-index:20;">
            <a onclick="imageSlider.previous()" class="group2-Prev"></a>
            <a id='auto' onclick="switchAutoAdvance()"></a>
            <a onclick="imageSlider.next()" class="group2-Next"></a>
        </div>-->
        </div>
      </div>
      <div style="margin-top:10px;color:#7C7469;">Please login first and register</div>
    <div class="span2" style="margin-left:0px;width:180px;">
       <input type="hidden" name="username" id="username" value="<?php if(isset($_SESSION['usernames'])!=''){echo $_SESSION['usernames'];}else{}?>"/>
            <form name="login" method="post">
            
            <div style="margin-left:10px;margin-top:15px;color:#F00;"><?php echo $msg;?></div>
    		<div style="margin-left:10px;"><input type="text" name="email" id="email" placeholder="Email Id"  style="background-color:#CDC9C6;" required/></div>
            <div style="margin-left:10px;margin-top:10px;"><input type="password" name="pass" id="pass" placeholder="Password" style="background-color:#CDC9C6;" required/></div>
          
            <div style="margin-left:10px;margin-top:10px;float:left;"><input type="submit" onClick="validate()" name="submit" id="submit" value="Login" class="btn btn-primary"/></div>
            
            <a href="create.php" ><div id="link" style="font-size:12px;color:#900;margin-top:10px;margin-left:10px;">&nbsp;Create?</div></a>
             <a href="forgot.php"><div id="link" style="font-size:12px;color:#900;float:left;"> &nbsp;Forgot Password?</div></a>
          
            </form> 
      <div style="width:180px;margin-top:37px">
      <a href="reg.php"><div class="effects" ><h4><?php if(isset($_SESSION['userid'])!=''){?>Service Provider Registration<?php }else{?>Login to register<?php }?></h4></div></a>
       <a href="list.php" ><div class="effects"><h4>List of Service Providers</h4></div></a>
      </div>
    </div>
	 </div>
       <div id="main">
      
       </div>
       <div id="createPassword" style="display:none">
	  
        <div class="container" style="box-shadow:2px 2px 2px 2px #666;width:600px;margin-top:10px;margin-bottom:10px;padding:20px;">
          <form method="post" name="create">
             <div class="span2"> <label>User Name</label></div><div class="span3"><input type="text" name="uname" id="uname" required/></div>
             <div class="span2"> <label>Email Id</label></div><div class="span3"><input type="text" name="email" id="email" required/></div>
             <div class="span2"> <label>Security question</label></div><div class="span3"><select name="sec_quest" id="sec_quest" required>
             <option value="">--Select--</option>
			 <option value="1">Favourite Hero</option>
			 <option value="2">Favourite Food</option>
			 <option value="3">Favourite Movie</option>
			 <option value="4">Favourite Song</option>
             </select>
             </div>
             <div class="span2"> <label>Answer</label></div><div class="span3"><input type="text" name="sec_quest_ans" id="sec_quest_ans" required/></div>
             <div class="span2"> <label>Password</label></div><div class="span3"><input type="password" name="passw" id="passw" required/></div>
             <div class="span2"> <label>Retype Password</label></div><div class="span3"><input type="password" name="re_pass" id="re_pass" required/></div>
              <div style="padding-left:385px;"><input type="submit" name="create" id="create" value="Submit" class="btn btn-primary" onClick="validate();"/></div>
           </form>
           </div>
         </div>
        
         
           <div id="contactus" style="display:none">
            <?php $status="active";?>
              <div class="container" style="box-shadow:2px 2px 2px 2px #666;width:600px;margin-top:50px;padding:20px;">
                <div class="span2"> <label>Name</label></div><div class="span3"><input type="text" name="reg_name" id="reg_name" required/></div>
              </div>
          </div>
       </div>
	</div>
  </div>
</div>  

<script type="text/javascript">
function validate(){
var a=document.getElementById('email').value;
var nn= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
 	if(!nn.test(a))
		{	
		alert('Enter valid Email Id');
			
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