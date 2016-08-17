<?php
ob_start();
session_start();
include('../includes/db_config.php');
$msg='';
if(isset($_POST['submit'])) 
{
  $un=$_POST['username'];
  $ps=$_POST['password'];
 $query="select * from Admin";
 $rslt=mysql_query($query);
 while($row=mysql_fetch_assoc($rslt)){
 if($un != '' && $ps != '')
  {
    if($un=='admin' && $ps=='password'){
	$_SESSION['username']=$un;
	header('location:main.php');
	}else{
	 $msg="Password and Username mismatch";
	}
   }
}}

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - Bootstrap Admin Template</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
   
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>			</a>
			
			<a class="brand" href="index.html">
				Bootstrap Admin Template			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						<a href="signup.html" class="">
							Don't have an account?						</a>					</li>
					
					<li class="">						
						<a href="index.html" class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage						</a>					</li>
				</ul>
			</div><!--/.nav-collapse -->	
		</div> 
		<!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		<form  method="post">
		
			<h1>Member Login</h1>		
		<h3>	<?php echo $msg;?></h3>	
			<div class="login-fields">
				
				<p>Please provide your details</p>
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
								
				<input type="submit" class="button btn btn-success btn-large" name="submit" value="Submit"/>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<div class="login-extra">
	<a href="">Reset Password</a>
</div> <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>
