<?php  session_start();
if(isset($_SESSION['user_login']))
{ $user_email = $_SESSION['user_login'];?>
	<html lang="en">
	<head>
	<title>Index page</title>
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
		
	</head>
	<body align="center">
		<div class="main">
			
			<h1>Profile</h1>
			  
			<form method="POST" action="">
			<?php
			  include("connect.php");
			  $result=mysqli_query($con,"select * from users where email='$user_email'");  
			   while( $row=mysqli_fetch_assoc($result))
			   {
			    ?>
				<table align="center">
				
				<tr>
					<td>Name:</td>
					<td>
						<?php echo ucwords($row['name']);?>
					</td>
				</tr>
				
				<tr>
					<td>Date of Birth:</td>
					<td>
						<?php 
						$dob = $row['dob'];
						$age = (date('Y') - date('Y',strtotime($dob)));
						echo $age
						?>
					</td>
				</tr>
				
				<tr>
					<td>Email:</td>
					<td>
						<?php echo ucwords($row['email']);?>
					</td>
				</tr>
				
				<tr>
					<td> Upload Image:</td>
					<td><a href="" alt="img"><img width="150" height="150" class="gallery_img" src="img/<?php echo $row['images'] ?>" alt="img" /></a></td>
				</tr>
				<?php
			   }
			   ?>
				<tr>
					<td></td>
					<td><a href="logout.php">Logout</a></td>
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
<?php 
}
else
{
	header("Location:login.php");
}

?>
