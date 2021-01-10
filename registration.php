<?php
		    $condition=0;
			if(isset($_FILES['image']))
		{
			if(is_uploaded_file($_FILES['image']['tmp_name']))
			{
				$filename=$_FILES['image']['name'];
				$tmp=$_FILES['image']['tmp_name'];
				$file_size = $_FILES['image']['size'];
				$type=$_FILES['image']['type'];
				
					if($file_size > 2097152)
					{
						?><script> alert(" File size should not be more than 2 MB");</script><?php
					}
					else
					{
						if(move_uploaded_file($tmp,"img/".$filename))
						{
							$photo=$filename;
							$condition=1;
							?><script> alert(" Photo Uploaded Successfully");</script><?php
						}
					}
			}
			else
			{
				?><script> alert(" Please select a file to Upload Or Your file is more than 2 MB");
				window.location="registration.php";
				</script><?php
			}
			}
		  
		 
		 if(isset($_POST['register']))
			{   
				if($condition==1)
				{	
				  $uname=$_POST['uname'];
				  $dob=$_POST['dob'];
				  $email=$_POST['email'];
				  $password=md5($_POST['password']);
			      include("connect.php");
				  mysqli_query($con,"insert into users(name,dob,email,password,images) values('$uname','$dob','$email','$password','$photo')");
		           if(mysqli_affected_rows($con)==1)
			        {   ?><script> alert(" Data Uploaded Successfully");
								window.location="login.php";
							</script><?php
			        }
				   else
				  {
					?><script> alert(" Data  not Uploaded ");
							window.location="registration.php";
					</script><?php
				  }
				}
			}	
		  ?>
	
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
	<style>
			.main{
				background:#efefef;
				padding:20px;
			}
			h1{
				text-align:center;
				border-bottom:5px solid #1e6a9b;
				color:green;
			}
			input[type='text'],select,
			input[type='password']
			{
				height:35px;
				width:300px;
				border:1px solid #333;
				border-radius:5px;
			}
			textarea{
				height:60px;
				width:300px;
				border:1px solid #333;
				border-radius:5px;
			}
			table tr td{padding:10px;}
			input[type='submit']
			{
				background:green;
				color:#fff;
				padding:10px 25px;
				font-size:18px;
				border:none;
				border-radius:5px;
				box-shadow:2px 2px 5px #333;
			}
			input[type='submit']:hover
			{
				box-shadow:4px 4px 10px #333;
				cursor:pointer;
			}
			span{
				font-size:14px;
				color:Red;
			}
		</style>
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
</head>
<body align="center">
		<div class="main">
			
			<h1>Registration</h1>
			
           

					  <form method="POST" action="" enctype = "multipart/form-data">
				<table align="center">
				
				<tr>
					<td>Name:</td>
					<td>
						<input type="text" name="uname" id="uname" class="form-control" data-validation="required">
					</td>
				</tr>
				
				<tr>
					<td>Date of Birth:</td>
					<td>
						<input type="date" name="dob" id="dob" class="form-control" data-validation="required">
					</td>
				</tr>
				
				<tr>
					<td>Email:</td>
					<td>
						<input type="text" name="email" id="email" class="form-control" data-validation="required">
					</td>
				</tr>
				
				<tr>
					<td>Password:</td>
					<td>
						<input type="password" name="password" id="password" class="form-control" data-validation="required">
					</td>
				</tr>
				
				<tr>
					<td> Upload Image:</td>
					<td><input class="btn btn-success" type="file"  name="image" 
					value="Upload" data-validation="required"></td>
				</tr>
				
				<tr>
					<td><a href="login.php">Login me</a></td>
					<td><input class="btn btn-primary" type="submit"  name="register" 
					value="Submit"></td>
				</tr>
			</table>
			</form>
			 <script src="js/sb-admin-2.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
			<script>
$.validate({
    lang: 'en',
	modules : 'security'
  });
			</script>
			<!-- End info Area -->

</body>
</html>