<?php 
ob_start();
session_start();
if(isset($_SESSION['userid'])!=''){
$id=$_SESSION['userid'];

}else
{
header('Location:index.php');	
}
include('includes/db_config.php');
$msg='';
function fileDelete($filepath,$filename) 
 {
	$success = FALSE;
	if (file_exists($filepath.$filename)&&$filename!=""&&$filename!="n/a") {
		unlink ($filepath.$filename);
		//$success = TRUE;
	} 
	//return $success;	
	return;
}
if(isset($_POST['reg'])){
	
	 $x=rand();
	   $id=$_SESSION['userid'];		
	  
	   $allowed_filetypes = array('.jpg','.gif','.bmp','.png','.jpeg','.JPG','.jfif','.flv'); 
					$filename89=$_FILES['path']['name'];
					$filename2=$_FILES['path']['name'];
					$ext2 = substr($filename2, strpos($filename2,'.'), strlen($filename2)-1);
					$filetype2=explode(".", $filename2);
					if(!in_array($ext2,$allowed_filetypes))
					{
						 
						 return false;
					}
					$query="select * from registration where user_id='id'";
				
					$adds=mysql_query($query);
					
					while($rows=mysql_fetch_array($adds))
					{
					  $image=$rows['logo'];	
					  
					}
				/*	if($adds!="")
	{


fileDelete('images/logo/',$x.$filename89);

	}*/
	   $moveto='images/logo/logo1/'.$x.$_FILES["path"]['name'];
		   $qq=move_uploaded_file($_FILES["path"]['tmp_name'],$moveto);
		   $r=$x.$_FILES["path"]['name'];
				include("includes/resize.php");
		   $resizeObj = new resize('images/logo/logo1/'.$x.$filename89.'');
                       $resizeObj -> resizeImage(100, 76, 0);
		    $resizeObj -> saveImage('images/logo/'.$x.$filename89.'', 100);
			 
			fileDelete('images/logo/logo1/',$x.$filename89);
	
	
	$date=date('Y-m-d');
$name=$_POST['reg_name'];

$email=$_POST['reg_email'];
$mobile=$_POST['reg_mobile'];
$loc='';
if(isset($_POST['reg_loc'])){
$loc=$_POST['reg_loc'];
}
$address=$_POST['reg_address'];
$cat=$_POST['cat'];
$service=$_POST['service'];
$color=$_POST['color'];

$query="insert into registration(user_id,name,email,mobile,location,address,category,service,logo,date,color,status) values('$id','$name','$email','$mobile','$loc','$address','$cat','$service','$r','$date','$color','n')";

if(mysql_query($query))
{
/*header('Location:index.php');	*/
}else{
	
}
}

if(isset($_POST['update'])){
	$id=$_SESSION['userid'];		
	
	 $x=rand();
	
	  
	   $allowed_filetypes = array('.jpg','.gif','.bmp','.png','.jpeg','.JPG','.jfif','.flv'); 
					$filename89=$_FILES['path']['name'];
					$filename2=$_FILES['path']['name'];
					$ext2 = substr($filename2, strpos($filename2,'.'), strlen($filename2)-1);
					$filetype2=explode(".", $filename2);
					if(!in_array($ext2,$allowed_filetypes))
					{
						 
						 return false;
					}
					$query="select * from registration where user_id='$id'";
				
					$row=mysql_query($query);
					 $rr=mysql_fetch_assoc($row);
					
					  fileDelete('images/logo/',$rr['logo']);
				
				/*	if($adds!="")
	{


fileDelete('images/logo/',$x.$filename89);

	}*/
	   $moveto='images/logo/logo1/'.$x.$_FILES["path"]['name'];
		   $qq=move_uploaded_file($_FILES["path"]['tmp_name'],$moveto);
		   $r=$x.$_FILES["path"]['name'];
				include("includes/resize.php");
		   $resizeObj = new resize('images/logo/logo1/'.$x.$filename89.'');
                       $resizeObj -> resizeImage(100, 76, 0);
		    $resizeObj -> saveImage('images/logo/'.$x.$filename89.'', 100);
			 
			fileDelete('images/logo/logo1/',$x.$filename89);
	
	
	$date=date('Y-m-d');
$name=$_POST['reg_name'];

$email=$_POST['reg_email'];
$mobile=$_POST['reg_mobile'];
$loc='';

$loc=$_POST['loc'];

$address=$_POST['reg_address'];
$cat=$_POST['cat'];
$service=$_POST['service'];
$color=$_POST['color'];
$query="update registration set name='$name', email='$email', mobile='$mobile', location='$loc',address='$address',category='$cat',service='$service',logo='$r',date='$date', color='$color', status='n' where user_id='$id'";

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
        <li class="active"><a href="index.php"><i class="icon-home	"></i><span>Home</span> </a> </li>
       
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
    <div class="container" style="box-shadow:2px 2px 2px 2px#666;height:880px;">
	 <div class="row" style="margin-left:0px;">
                  <div id="regform">
                 <?php
				 $query1="select * from registration where user_id='$id'";
				 $res=mysql_query($query1);
				 $row=mysql_fetch_assoc($res);
				 $num=mysql_num_rows($res);
				 if($num==0){
				 ?>
                 
                  <div  class="span6" style="color:#7E3817;font-size:24px;font-family:Arial Black, Gadget, sans-serif;margin-top:30px;margin-left:16%;"> Registration Form</div><br/>
          <div class="container" style="box-shadow:2px 2px 2px 2px #666;width:600px;margin-top:60px;padding:20px;">
          
          <form method="post" name="regform" enctype="multipart/form-data">
          
           <div class="span2"> <label>Name</label></div><div class="span3"><input type="text" name="reg_name" id="reg_name" onBlur="nameValidate()" required/><br/><span style="color:#F00;position:;" id="nameErr"></span></div>
             
             <div class="span2"> <label>Email</label></div><div class="span3"><input type="text" name="reg_email" id="reg_email" onBlur="emailValidate()" required/><br/><span style="color:#F00;position:;" id="emailErr"></span></div>
             <div class="span2"> <label>Mobile</label></div><div class="span3"><input type="text" name="reg_mobile" onBlur="mobileValidate()" id="reg_mobile" required/><br/><span style="color:#F00;position:;" id="mobileErr"></span></div>
            
             <div class="span2"> <label>Location</label></div><div class="span3">
             <?php $query2=mysql_query("select * from location");?>
             <select name="reg_loc" id="reg_loc" required>
             <option value="">--Location-- </option>
             <?php while($row1=mysql_fetch_assoc($query2)){?>
             <option value="<?php echo $row1['location'];?>"><?php echo $row1['location'];?></option>
             <?php }?>
             </select>
             </div>
              <div class="span2"> <label>Address</label></div><div class="span3"><textarea type="text" name="reg_address" id="reg_address" required></textarea></div>
              <?php $query3=mysql_query("select * from service_type");?>
                <div class="span2"><label>Service category</label> </div><div class="span3">
                <select name="cat" id="cat" />
                <option value="">--Service Category--</option>
                <?php while($row2=mysql_fetch_assoc($query3)){?>
                <option value="<?php echo $row2['service_type'];?>"><?php echo $row2['service_type'];?></option>
                
                <?php }?>
                </select>
                </div>
             <div class="span2"> <label>Service</label></div><div class="span3"><input type="text" name="service" id="service" required/></div>
             <div class="span2"> <label>Upload Logo</label></div><div class="span3"><input type="file" name="path" id="path" /></div>
              <div class="span3"> <label>Choose color for your card background</label></div><div class="span3" style="margin-left:0px;">
              <?php $query6=mysql_query("select * from color");?>
              <table style="margin-top:20px;" border="2">
              <tr>
              <?php while($row5=mysql_fetch_assoc($query6)){?>
              <td id="colors" onClick="store('<?php echo $row5['color'];?>')" width="20" height="20" style="background-color:<?php echo $row5['color'];?>;cursor:pointer;"></td>
              <?php }?>
            <!--  <td onClick="store('#CCC')" width="20" height="20" style="background-color:#CCC;cursor:pointer;"></td>
              <td onClick="store('#CCF')" width="20" height="20" style="background-color:#CCF;cursor:pointer;"></td>
              <td onClick="store('#F9F')" width="20" height="20" style="background-color:#F9F;cursor:pointer;"></td>
              <td onClick="store('#66F')" width="20" height="20" style="background-color:#66F;cursor:pointer;"></td>
              <td onClick="store('#36F')" width="20" height="20" style="background-color:#36F;cursor:pointer;"></td>
              <td onClick="store('#69C')" width="20" height="20" style="background-color:#69C;cursor:pointer;"></td>
              <td onClick="store('#6FC')" width="20" height="20" style="background-color:#6FC;cursor:pointer;"></td>-->
              </tr>
              </table><br/>
              <table border="2">
              <tr> <td id="confirm" width="40" height="40" ></td></tr>
              </table>
              </div>
              <input type="hidden" name="color" id="color" value=""/>
              <div style="padding-left:385px;"><input type="submit" name="reg" id="reg" value="Submit" class="btn btn-primary"/></div>
              
           </form>
           </div>
           
         </div>
         <script type="text/javascript">
		 function store(a){
			 document.getElementById('color').value=a;
			 document.getElementById('confirm').style.backgroundColor=a;
		 }
		 </script>
          <?php
				 }else{
					
		  ?>
          <div  class="span6" style="color:#7E3817;font-size:24px;font-family:Arial Black, Gadget, sans-serif;margin-top:30px;margin-left:16%;"> Registration Form</div><br/>
          <div class="container" style="box-shadow:2px 2px 2px 2px #666;width:600px;margin-top:60px;padding:20px;">
          <div class="span2"> <label>Card Priview</label></div><div class="span3"><?php if($num==0){ ?>
          
           <div class="span4" style="width:330px;height:160px;background-color:#FFF;margin-bottom:10px;border:2px solid #999;">
             
              </div></div>
          <?php }else{?>
          <div class="span4" style="width:330px;height:160px;background-color:<?php echo $row['color'];?>;margin-bottom:10px;">
             <div style="color:#71200A;margin-top:25px;margin-left:40px;font-size:20px;font-weight:bolder;text-transform:capitalize;font-family:'Courier New', Courier, monospace"><?php echo $row['name'];?></div>
             <div style="float:left;margin-left:220px;position:absolute;margin-top:-40px;"><img src="images/logo/<?php echo $row['logo'];?>"/></div>
              <div style="color:#71200A;margin-left:40px;margin-top:5px;font-weight:bolder;text-transform:capitalize;"><?php echo $row['service'];?></div>
             <div style="color:#71200A;margin-left:40px;margin-top:25px;font-size:12px"><?php echo $row['mobile'];?></div>
              <div style="color:#71200A;margin-left:40px;margin-top:0px;font-size:12px;"><?php echo $row['email'];?></div>
              <div style="color:#71200A;margin-left:40px;margin-top:2px;font-size:12px;"><?php echo $row['address'];?></div>
              </div>
          </div><?php }?>
        
          <form method="post" name="regform_update" enctype="multipart/form-data">
         
           <div class="span2"> <label>Name</label></div><div class="span3"><input type="text" name="reg_name" id="reg_name" value="<?php echo $row['name'];?>" onBlur="nameValidate()" required/><br/><span style="color:#F00;position:;" id="nameErr"></span></div>
             <div class="span2"> <label>Email</label></div><div class="span3"><input type="text" name="reg_email" id="reg_email" value="<?php echo $row['email'];?>" onBlur="emailValidate()" required/><br/><span style="color:#F00;" id="emailErr"></span></div>
             
             <div class="span2"> <label>Mobile</label></div><div class="span3"><input type="text" name="reg_mobile" id="reg_mobile" value="<?php echo $row['mobile'];?>" onBlur="mobileValidate()" id="reg_mobile" required/><br/><span style="color:#F00;" id="mobileErr"></span></div>
            
             <div class="span2"> <label>Location</label></div><div class="span3">
              <?php $query4=mysql_query("select * from location");?>
             <select name="loc" id="loc" required>
            <?php while($row3=mysql_fetch_assoc($query4)){?>
            <option value="<?php echo $row3['location'];?>" <?php if($row3['location']==$row['location']){echo "selected";}?>><?php echo $row3['location'];?></option>
            <?php }?>
             </select>
             </div>
              <div class="span2"> <label>Address</label></div><div class="span3"><textarea type="text" name="reg_address" id="reg_address1" required><?php echo $row['address'];?></textarea></div>
               <div class="span2"><label>Service category</label> </div><div class="span3">
               <?php $query5=mysql_query("select * from service_type");?>
                <select name="cat" id="cat1" />
                <?php while($row4=mysql_fetch_assoc($query5)){?>
                <option value="<?php echo $row4['service_type'];?>"  <?php if($row4['service_type']==$row['category']){echo "selected";}?>><?php echo $row4['service_type'];?></option>
                <?php }?>
                </select>
                </div>
             <div class="span2"> <label>Service</label></div><div class="span3"><input type="text" name="service" id="service1" value="<?php echo $row['service'];?>" required/></div>
             <div class="span2"> <label>Upload Logo</label></div><div class="span3"><input type="file" name="path" id="path1" /></div>
             
             <div class="span3"> <label>Choose color for your card background</label></div><div class="span3" style="margin-left:0px;">
              <?php $query7=mysql_query("select * from color");?>
              <table style="margin-top:20px;" border="2">
              <tr>
              <?php while($row7=mysql_fetch_assoc($query7)){?>
              <td id="colors" onClick="store('<?php echo $row7['color'];?>')" width="20" height="20" style="background-color:<?php echo $row7['color'];?>;cursor:pointer;"></td>
              
              <?php }?>
              <!--<td onClick="store('#CCC')" width="20" height="20" style="background-color:#CCC;cursor:pointer;"></td>
              <td onClick="store('#CCF')" width="20" height="20" style="background-color:#CCF;cursor:pointer;"></td>
              <td onClick="store('#F9F')" width="20" height="20" style="background-color:#F9F;cursor:pointer;"></td>
              <td onClick="store('#66F')" width="20" height="20" style="background-color:#66F;cursor:pointer;"></td>
              <td onClick="store('#36F')" width="20" height="20" style="background-color:#36F;cursor:pointer;"></td>
              <td onClick="store('#69C')" width="20" height="20" style="background-color:#69C;cursor:pointer;"></td>
              <td onClick="store('#6FC')" width="20" height="20" style="background-color:#6FC;cursor:pointer;"></td>-->
              </tr>
              </table><br/>
              <table border="2">
              <tr> <td id="confirm" width="40" height="40" ></td></tr>
              </table>
              </div>
              <input type="hidden" name="color" id="color" value=""/>
             
              <div style="padding-left:385px;"><input type="submit" name="update" id="update" value="Update" class="btn btn-primary"/></div>
           </form>
           </div>
         </div>
         <script type="text/javascript">
		 function store(a){
			 document.getElementById('color').value=a;
			 document.getElementById('confirm').style.backgroundColor=a;
		 }
		 </script>
          <?php }?>
       </div>
	</div>
  </div>
</div>  
<script type="text/javascript">
function nameValidate(){
var name=document.getElementById('reg_name').value;
var nn=/^[a-zA-Z]+$/;

	if(!nn.test(name))
		{	
		document.getElementById('nameErr').innerHTML="Enter a valid name";
		
			return false;
		}else{document.getElementById('nameErr').innerHTML="";}
			
		

}
function emailValidate(){
var email=document.getElementById('reg_email').value;
var nm= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	
				if(!nm.test(email))
		{	
		document.getElementById('emailErr').innerHTML="Enter a valid email id";
			return false;
		}else{document.getElementById('emailErr').innerHTML="";}
		

}

function mobileValidate(){
var phones=document.getElementById('reg_mobile').value;

var ph=/^([0-9]{10})$/;
	
				if(!ph.test(phones))
		{	 document.getElementById('mobileErr').innerHTML="Please enter valid phone number";
			
			return false;
		}else{document.getElementById('mobileErr').innerHTML="";}
		

}


</script>
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