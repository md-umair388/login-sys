<?php session_start();?>
<html>
	<head>
		<title>Login Here</title>
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
	</head>
	
	<body align="center">
		<div class="main">
			
			<h1>Login Here</h1>
			  
			  <?php 
			if(isset($_POST['login']))
			{
				$email=$_POST['email'];
				$pwd=md5($_POST['pass']);
				//Connect to DB
				include("connect.php");
				
				$result=mysqli_query($con,
				"select * from users where email='$email'");
				if(mysqli_num_rows($result)==1)
				{
					$row=mysqli_fetch_assoc($result);
						if($row['password']==$pwd)
						{
							
								//redirect to Home Page
								$_SESSION['user_login']=$row['email'];
								header("Location:index.php");
							
						}
						else
						{
							echo "<p class='text-center alert alert-danger'>Password not matched 
							for the User</p>";
						}
				}
				else
				{
					echo "<p class='text-center alert alert-danger'>Sorry! Email Does not
					Exists</p>";
				}
				
			}
			?>
			
			<form method="POST" action="">
				<table align="center">
				
				<tr>
					<td>Email*</td>
					<td>
						<input type="text" name="email" id="email" data-validation="required">
						<br><span id="uname_error"></span>
					</td>
				</tr>
				<tr>
					<td>Password*</td>
					<td>
						<input type="password" name="pass" id="pass" data-validation="required">
						<br><span id="pass_error"></span>
					</td>
				</tr>
				<tr>
					<td><a href="registration.php" >SignUp ? For new Users</a></td>
					<td><input type="submit"  name="login" value="Login"></td>
				</tr>
			</table>
			</form>
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
			<script>
$.validate({
    lang: 'en',
	modules : 'security'
  });
			</script>
	</body>
</html>