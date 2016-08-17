<?php 
ob_start();
session_start();

include('includes/db_config.php');
$msg='';
if(isset($_SESSION['userid'])){
$id=$_SESSION['userid'];
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
  #invi:hover{
	box-shadow:2px 2px 2px 2px #999;  
	  
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
        
         <li class="active"><a href="list.php"><i class="icon-list-alt"></i><span>List of service providers</span> </a> </li>
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
    <div class="container" style="box-shadow:2px 2px 2px 2px#666;height:900px;">
	 <div class="row" style="margin-left:0px;">
                  <div id="regform">
                   <div  class="span6" style="color:#7E3817;font-size:24px;font-family:Arial Black, Gadget, sans-serif;margin-top:30px;margin-left:6%;"> List Of Donors</div><br/>
          <div class="container" style="box-shadow:2px 2px 2px 2px #666;width:800px;margin-top:70px;padding:20px;">
          <form method="post" name="list">
             <div class="row">
             <div class="span3"><input type="text" id="location" name="location" placeholder="Location . . ."/></div>
          <div class="span3"><input type="text" id="service" name="service" placeholder="Service . . ."/></div>
          
              <div class="span1" style="float:left"><input type="submit" name="search" id="search" value="Search" class="btn btn-primary"/></div></div>
           </form>
            </div>
          <div class="container" style="box-shadow:2px 2px 2px 2px #666;width:800px;margin-top:10px;padding:20px;height:600px;overflow:scroll;">
            <div class="row" style="padding-left:50px;">
            <?php 
			$bv='';
			if(isset($_POST['search'])){
				
				if($_POST['location']!=''){
					$loc=$_POST['location'];
					$bv .=" and location like '%$loc%'";
				}
				if($_POST['service']!=''){
					$ser=$_POST['service'];
					$bv .=" and service like '%$ser%';";
				}
			}
			$query="select * from registration where status='y'".$bv;
			
			$res=mysql_query($query);
			while($row=mysql_fetch_assoc($res)){
			?>
              <div class="span4" id="invi" style="width:330px;height:160px;background-color:<?php echo $row['color'];?>;margin-bottom:10px;">
             <div style="color:#71200A;margin-top:25px;margin-left:40px;font-size:20px;font-weight:bolder;text-transform:capitalize;font-family:'Courier New', Courier, monospace"><?php echo $row['name'];?></div>
             <div style="float:left;margin-left:220px;position:absolute;margin-top:-40px;"><img src="images/logo/<?php echo $row['logo'];?>"/></div>
              <div style="color:#71200A;margin-left:40px;margin-top:5px;font-weight:bolder;text-transform:capitalize;"><?php echo $row['service'];?></div>
             <div style="color:#71200A;margin-left:40px;margin-top:25px;font-size:12px"><?php echo $row['mobile'];?></div>
              <div style="color:#71200A;margin-left:40px;margin-top:0px;font-size:12px;"><?php echo $row['email'];?></div>
              <div style="color:#71200A;margin-left:40px;margin-top:2px;font-size:12px;"><?php echo $row['address'];?></div>
              </div>
              
              <?php }?>
            </div>
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