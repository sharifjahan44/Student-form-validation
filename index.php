<?php 
	/**
	 * If anyone press student submit button then isset funtion will work
	 */
	if(isset($_REQUEST['add'])){
		//global variable
		global $count;
		$count=1;

		// Data set up in other variable
		$name = $_REQUEST['sname'];
		$email = $_REQUEST['email'];
		$cell = $_REQUEST['cell'];
		$age = $_REQUEST['age'];
		$pwd = $_REQUEST['pass'];
		$uname = $_REQUEST['username'];
		// Image file set up
		$file_name = $_FILES['photo']['name'];
		$file_tmp = $_FILES['photo']['tmp_name'];
		$file_type = $_FILES['photo']['type'];
		$file_size = $_FILES['photo']['size'];

		$file_unique_name = md5(time().rand()).$file_name;


		/**
		 * form validation
		 */
		if(empty($name) || empty($email) || empty($cell) || empty($age) || empty($uname) || empty($pwd) || empty($file_name)){
			$msg = "<p class='alert alert-danger'>All fields are required! <button class='close' data-dismiss='alert'>&times;</button> </p>";
		}else{
			// Name validation
			if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
				$msg_n = "<p class='text-danger'>Only letters and white space allowed!</p>";
				$count = 0;
			}
			// Email validation
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$msg_e = "<p class='text-danger'>Please enter valid email!</p>";
				$count = 0;
			}
			// Age validation
			if($age<20 || $age>30){
				$msg_a = "<p class='text-danger'>Age must be (20 - 30)!</p>";
				$count = 0;
			}
			// Password validation
			if (strlen($pwd) <= '8' || !preg_match("#[0-9]+#",$pwd) || !preg_match("#[A-Z]+#",$pwd)|| !preg_match("#[a-z]+#",$pwd)) {
				$msg_p = " <p class='text-danger'>Must contain at least one number, one uppercase, one lowercase letter and at least 8 or more characters</p> ";
				$count = 0;
			}

			// success message
			if($count == 1){
				$successMsg = "<p class='alert alert-success'>Data stable! <button class='close' data-dismiss='alert'>&times;</button> </p>";
				move_uploaded_file($file_tmp, "assets/img/".$file_unique_name);
			}
			
		}
	}
	?>


	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Form validation</title>
		<!-- Bootstrap css file -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

		<!-- Custom css file -->
		<link rel="stylesheet" href="style.css">
	</head>
	<body>


		<div class="wrap shadow-lg">
			<div class="card">
				<div class="card-body">
					<center><h2>STUDENT FORM</h2></center>
					<?php if(isset($msg)){echo $msg;} if(isset($successMsg)){echo $successMsg;}?>
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<input name="sname" class="form-control" type="text" placeholder="Student Name">
							<?php if(isset($msg_n)){echo $msg_n;} ?>
						</div>
						<div class="form-group">
							<input name="email" class="form-control" type="text" placeholder="Email Address">
							<?php if(isset($msg_e)){echo $msg_e;} ?>
						</div>
						<div class="form-group">
							<input name="cell" class="form-control" type="text" placeholder="Cell Number">
						</div>
						<div class="form-group">
							<input name="age" class="form-control" type="text" placeholder="Age">
							<?php if(isset($msg_a)){echo $msg_a;} ?>
						</div>
						<div class="form-group">
							<input name="username" class="form-control" type="text" placeholder="User Name">
						</div>
						<div class="form-group">
							<input name="pass" class="form-control" type="password" placeholder="Password">
							<?php if(isset($msg_p)){echo $msg_p;} ?>
						</div>
						<div class="form-group">
							<label for="">Image</label><br>
							<input name="photo" type="file">
						</div>
						<div class="form-group">
							<br>
							<input name="add" class="btn btn-primary" type="submit" value="ADD NEW STUDENT">
						</div>
					</form>
				</div>
			</div>
		</div>













		<!-- Custom js file -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<script src="assets/js/main.js"></script>
	</body>
	</html>
