<?php

	session_start();

	if(isset($_POST['btnHome'])){

		header('Location: Home.php'); 

	}



	$conn = mysqli_connect("localhost", "root",'',"house_rental");

	$query = " SELECT  max(p_id) as 'max'
	FROM house ";


$result = mysqli_query($conn, $query); 
$row = mysqli_fetch_assoc($result);

$pass_id =  $row['max'];
$pass_id++;


   

	if(isset($_POST['btnSubmit'])){

		$place = $_POST['place'];
		$address = $_POST['address'];
		$bedroom = $_POST['bedroom'];
		$bathroom = $_POST['bathroom'];
		$rent = $_POST['rent'];
		$size = $_POST['size'];
		$mobile_num = $_SESSION['mobile_no'];

		$query2 = "INSERT INTO house (p_id, place, address, bedroom, bathroom, rent, size, mobile_num )
					VALUES ('$pass_id', '$place', '$address','$bedroom', '$bathroom', '$rent', '$size', '$mobile_num')";


		$result2 = mysqli_query($conn, $query2); 


		header('Location: Home.php'); 

	}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="css/bootstrap.css" rel="stylesheet" />

	<script src="js/custom.js"></script> 

</head>
<body>



	<div class="container-fluid bg-dark">
 		
 		 <div class=" row">
	 		<div class=" col-1"></div>
	 		<div class="col-9">
	 			 <h1  class="text-center text-light"  ><b>Enter the necessary information</b></h1>
	 		</div>
	 		<div class=" col-1 mt-3">
	 			<form method="post">
	 				 <button class="btn-sm" name="btnHome">Home</button>
	 			</form>
	 		</div>
	 		

	 	</div>


 	</div >
 	

	

 	<div class="mt-4 ml-5">
 		<form method="post" name="houseInfoForm" id="houseInfoForm" onsubmit="return validateForm()" >
 			<div class="row">
 				<div class="col-2"></div>
 				<div class="col-3"><h3><b>Place</b></h3></div>
 				<div class="col-5"> 
                 <select id="place" name="place">
                    <option value="banani">Banani</option>
                    <option value="bashundhara">Bashundhara</option>
                    <option value="dhanmondi">Dhanmondi</option>
                    <option value="gulshan">Gulshan</option>
            </select>
 				</div>
 			</div>



 			<div class="row">
 				<div class="col-2"></div>
 				<div class="col-3"><h3><b>Address</b></h3></div>
 				<div class="col-5"> 
 					<input type="text"  name="address"  placeholder="H-1, R-1, B#A"  autofocus="" />
 				</div>
 			</div>
 			
 			
 			<div class="row">
 				<div class="col-2"></div>
 				<div class="col-3"><h3><b>Bedroom</b></h3></div>
 				<div class="col-5"> 
 					<input type="number"  name="bedroom" placeholder="No. of bedrooms" required="" autofocus="" />
 				</div>
 			</div>



 			<div class="row">
 				<div class="col-2"></div>
 				<div class="col-3"><h3><b>Bathrooms</b></h3></div>
 				<div class="col-5"> 
 					<input type="number"  name="bathroom" placeholder="No. of bathrooms" required="" autofocus="" />
 				</div>
 			</div>

             
 			<div class="row">
 				<div class="col-2"></div>
 				<div class="col-3"><h3><b>Rent</b></h3></div>
 				<div class="col-5"> 
 					<input type="number"  name="rent" placeholder="Rent amount in bdt" required="" autofocus="" />
 				</div>
 			</div>



 			<div class="row">
 				<div class="col-2"></div>
 				<div class="col-3"><h3><b>Apartment size</b></h3></div>
 				<div class="col-5"> 
 					<input type="number"  name="size" placeholder="Size in sqft" required="" autofocus="" />
 				</div>
 			</div>



 			<div class=" row">
 				<div class="col-2"></div>
 				<div class="col-5">
 					<button class="btn btn-lg btn-primary btn-block" name="btnSubmit" >Submit</button>
 				</div>
 				<div class="col-5"></div>
 			</div>


 		</form>

 	</div>

	 

</body>
</html>