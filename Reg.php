<?php


	if(isset($_POST['btnHome'])){

		header('Location: Home.php'); 

	}



	$conn = mysqli_connect("localhost", "root",'',"house_rental");

	$query = " SELECT  max(p_id) as 'max'
            FROM user ";


    $result = mysqli_query($conn, $query); 
    $row = mysqli_fetch_assoc($result);

   	$pass_id =  $row['max'];
    $pass_id++;
   

	if(isset($_POST['btnSubmit'])){
		$name = $_POST['username'];
		$MobileNO = $_POST['mobile'];
		$password = $_POST['password'];


		$query2 = "INSERT INTO user (p_id, name, mobile_num, password )
					VALUES ('$pass_id', '$name', '$MobileNO ','$password')";


		$result2 = mysqli_query($conn, $query2); 

		header('Location: LogIn.php'); 

	}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="css/bootstrap.css" rel="stylesheet" />
</head>
<body>



	<div class="container-fluid bg-dark">
 		
 		 <div class=" row">
	 		<div class=" col-1"></div>
	 		<div class="col-9">
	 			 <h1  class="text-center text-light"  ><b>Enter the required information</b></h1>
	 		</div>
	 		<div class=" col-1 mt-3">
	 			<form method="post">
	 				 <button class="btn-sm" name="btnHome">Home</button>
	 			</form>
	 		</div>
	 		

	 	</div>


 	</div >
 	

	

 	<div class="mt-4 ml-5">
 		<form method="post">
 			<div class="row">
 				<div class="col-2"></div>
 				<div class="col-3"><h3><b>Full name</b></h3></div>
 				<div class="col-5"> 
 					<input type="text"  name="username" placeholder="First and last name" required="" autofocus="" />
 				</div>
 			</div>



 			<div class="row">
 				<div class="col-2"></div>
 				<div class="col-3"><h3><b>Mobile Number</b></h3></div>
 				<div class="col-5"> 
 					<input type="number"  name="mobile" placeholder="01*********" required="" autofocus="" />
 				</div>
 			</div>
 			


 			<div class="row">
 				<div class="col-2"></div>
 				<div class="col-3"><h3><b>Password</b></h3></div>
 				<div class="col-5"> 
 					<input type="password"  name="password" placeholder="Enter a secure password" required="" autofocus="" />
 				</div>
 			</div>



 			<div class=" row">
 				<div class="col-2"></div>
 				<div class="col-5">
 					<button class="btn btn-lg btn-primary btn-block" name="btnSubmit">Submit</button>
 				</div>
 				<div class="col-5"></div>
 			</div>


 		</form>

 	</div>



</body>
</html>