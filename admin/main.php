<?php 
ob_start();
session_start();
include('../includes/db_config.php');
if($_SESSION['username']=='')
{
header('Location:index.php');
}
if(isset($_POST['submit']))
{
$loc=$_POST['location'];
$query="insert into location(location) values('$loc')";
$res=mysql_query($query);
}

if(isset($_REQUEST['del_dist']))
{	
$result = mysql_query("DELETE FROM `registration` WHERE `user_id` = '".$_REQUEST['del_dist']."'") or die("Query failed : " . mysql_error());
($result) ? $var="<span style=\"text-decoration:blink; color:#3B8934\">News Has Deleted Succesfully</span>":$var="Error: Not Deleted Successfully";
$result1 = mysql_query("DELETE FROM `user` WHERE `id` = '".$_REQUEST['del_dist']."'");
}

if(isset($_REQUEST['action'])){
	$val=$_REQUEST['val'];
	$id=$_REQUEST['id'];
	$query1=mysql_query("update registration set status='$val' where user_id='$id'");
}
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Admin Main</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
   
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    
    
    <link href="css/pages/plans.css" rel="stylesheet"> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>



<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Administrator			
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
									
					
						
							<li>
							<a href="logout.php">Logout</a>
							</li>					
					
				</ul>
			
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar --> 



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<ul class="mainnav">
			
				
                
           <li class="active">					
					<a href="main.php?td=view">
						<i class="icon-code"></i>
						<span>Admin</span>
					</a>  									
				</li>
                
                
                
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-long-arrow-down"></i>
						<span>Masters</span>
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
                    	<li><a href="location.php?td=view">Location</a></li>
						<li><a href="service_type.php?td=view">Service Type</a></li>
                        <li><a href="color.php?td=view">Color</a></li>
						
                    </ul>    				
				</li>
				
				<li></li>
			
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
 
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3>List of Users</h3>
						<span style="float:right;">
						
					</div> <!-- /widget-header -->
		
						<div class="widget-content">
					<table class="table table-striped table-bordered">
					<tr><th>SL</th>
					<th>Name</th>
					<th>Email</th>
                    <th>Mobile</th>
                    <th>Location</th>
                    <th>Service</th>
                    <th style="text-align:center;">Verification Status</th>
                     <th>Action</th>
					</tr>
					<?php 
					$query="select * from registration order by date";
					$res=mysql_query($query);
					$j=0;
					while($row=mysql_fetch_assoc($res)){
					$j++;
					?>
					<tr><td><?php echo $j;?></td>
					<td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo $row['location'];?></td>
                    <td><?php echo $row['service'];?></td>
                    <?php if($row['status']=='n'){?>
                     <td style="text-align:center"><a href="main.php?action&val=y&id=<?php echo $row['user_id'];?>" style="cursor:pointer;"><img src="icon/1424535228_button_cancel.png"/></a></td>
                     <?php }else if($row['status']=='y'){?>
                     <td style="text-align:center"><a href="main.php?action&val=n&id=<?php echo $row['user_id'];?>" style="cursor:pointer;"><img src="icon/1424535288_package-installed-updated.png"/></a></td>
                     <?php }?>
					<td>
                                       
                                         <a href="main.php?del_dist=<?php echo $row['user_id']; ?>"  onclick="return confirm('Are You Really Want To Cancel This Entry ?')">
                                        <i class="icon-trash" style="font-size:20px;padding:10px 10px 10px;color:#F00"></i></a></td>
					</tr>
					<?php }?>
					</table>
						
					</div> <!-- /widget-content -->

 
						
				</div> <!-- /widget -->					
				
		    </div> <!-- /span12 -->     	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

  </body>

</html>
