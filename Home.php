<?php

	 session_start();

	 $conn = mysqli_connect("localhost", "root",'',"house_rental");

	 if(mysqli_connect_errno()){
    echo 'connction Failed';
  }



	

	if(isset($_POST['btnLogIn'])){


		header('Location: LogIn.php'); 

	}


	if(isset($_POST['btnLogOut'])){

		session_unset();
		header('Location: Home.php'); 
		
	}

	if(isset($_POST['btnHouseList'])){


		header('Location: HouseInfoForm.php'); 

	}


	if(isset($_POST['btnSearch'])){

		unset($_SESSION['search_rent']);
		unset($_SESSION['search_size']);

		$search_place = $_POST['place'];

		echo $search_place;

		
			$_SESSION['search_place'] = $search_place ;

			header('Location: Home.php'); 


}



if(isset($_POST['btnRent'])){

	unset($_SESSION['search_place']);
	unset($_SESSION['search_size']);

	$search_rent = $_POST['rent'];

	echo $search_rent;

	
		$_SESSION['search_rent'] = $search_rent ;

		header('Location: Home.php'); 


}


if(isset($_POST['btnSize'])){

	unset($_SESSION['search_place']);
	unset($_SESSION['search_rent']);

	$search_size = $_POST['size'];

	echo $search_rent;

	
		$_SESSION['search_size'] = $search_size ;

		header('Location: Home.php'); 


}




?>


<!DOCTYPE html>
<html  >
<head>
	<title>Home</title>
	<link href="css/bootstrap.css" rel="stylesheet" />

	<link rel="stylesheet" href="css/custom.css">

	
</head>
<body >


 	<div class="container-fluid bg-dark">
 		
 		 <div class=" row">
	 		<div class=" col-1"></div>
	 		<div class="col-3">
	 			 <h1  class="text-center text-light"  ><b>Rent a home</b></h1>
	 		</div>
			 <div class=" col-2 mt-4">
	 			<form method="post">
				 <select id="place" name="place">
				 <option value="all">All</option>
                    <option value="banani">Banani</option>
                    <option value="bashundhara">Bashundhara</option>
                    <option value="dhanmondi">Dhanmondi</option>
                    <option value="gulshan">Gulshan</option>
					
            	</select>

				<button class="btn btn-sm btn-primary" name="btnSearch">Place</button>

	 			</form>
	 		</div>

			 <div class=" col-2 mt-4">
	 			<form method="post">
				 <select id="rent" name="rent">
				 <option value="r0">All</option>
                    <option value="r1">0-4999</option>
                    <option value="r2">5000-9999</option>
                    <option value="r3">10000-14999</option>
                    <option value="r4">15000-19999</option>
					<option value="r5">20000-24999</option>
					<option value="r6">25000+</option>
					
            	</select>

				<button class="btn btn-sm btn-primary" name="btnRent">Rent</button>

	 			</form>
	 		</div>


			 <div class=" col-2 mt-4">
	 			<form method="post">
				 <select id="size" name="size">
				 <option value="s0">All</option>
                    <option value="s1">0-499</option>
                    <option value="s2">500-999</option>
                    <option value="s3">1000-1499</option>
                    <option value="s4">1500-1999</option>
					<option value="s5"> 2000-2499</option>
					<option value="s6">2500+</option>
					
            	</select>

				<button class="btn btn-sm btn-primary" name="btnSize">Size</button>

	 			</form>
	 		</div>


        <div class=" col-1 mt-4">
          
            <form method="post">
              <?php 
              
          if( !isset($_SESSION['PID'])){

              echo ' <button class="btn-sm" name="btnLogIn">Sign in</button>  ' ;
			  
            }


			else {

				echo ' <button class="btn-sm mr 2" name="btnHouseList">List a home</button>  ' ;
				echo ' <button class="btn-sm" name="btnLogOut">Sign out</button>  ' ;

				
			}
                    ?>

            
            </form> 

          
        </div>

	 	</div>


 	</div >
 	

 	<div class="mt-4 ml-5">

			<div class = "row">


			<?php

	 					
	 					$query = " SELECT  *
	           			FROM house
	            		 ";

						



			if(isset($_SESSION['search_place']))	{

				if($_SESSION['search_place'] != "all"){

					$s_place = $_SESSION['search_place'];


					$query = " SELECT  *
	           			FROM house
						WHERE place = '$s_place'  
	            		 ";

					
				

			}		

				

			}





			if(isset($_SESSION['search_rent']))	{

				if($_SESSION['search_rent'] != "r0"){

					$s_rent = $_SESSION['search_rent'];

					if ($s_rent ==  "r1" ){
						
						$query = " SELECT  *
	           			FROM house
						WHERE rent <= 4999  
	            		 ";

					}

					else if ($s_rent ==  "r2" ){
						$query = " SELECT  *
	           			FROM house
						WHERE rent >= 5000 and rent <= 9999
	            		 ";
					}

					else if ($s_rent ==  "r3" ){
						$query = " SELECT  *
	           			FROM house
						WHERE rent >= 10000 and rent <= 14999
	            		 ";
					}

					else if ($s_rent ==  "r4" ){
						$query = " SELECT  *
	           			FROM house
						WHERE rent >= 15000 and rent <= 19999
	            		 ";
					}

					else if ($s_rent ==  "r5" ){
						$query = " SELECT  *
	           			FROM house
						WHERE rent >= 20000 and rent <= 24999
	            		 ";
					}

					else if ($s_rent ==  "r6" ){
						$query = " SELECT  *
	           			FROM house
						WHERE rent >= 25000 
	            		 ";
					}


					
					
				

			}		

				

			}



			if(isset($_SESSION['search_size']))	{

				if($_SESSION['search_size'] != "s0"){

					$s_size = $_SESSION['search_size'];

					if ($s_size ==  "s1" ){
						
						$query = " SELECT  *
	           			FROM house
						WHERE size <= 499  
	            		 ";

					}

					else if ($s_size ==  "s2" ){
						$query = " SELECT  *
	           			FROM house
						WHERE size >= 500 and size <= 999
	            		 ";
					}

					else if ($s_size ==  "s3" ){
						$query = " SELECT  *
	           			FROM house
						WHERE size >= 1000 and size <= 1499
	            		 ";
					}

					else if ($s_size ==  "s4" ){
						$query = " SELECT  *
	           			FROM house
						WHERE size >= 1500 and size <= 1999
	            		 ";
					}

					else if ($s_size ==  "s5" ){
						$query = " SELECT  *
	           			FROM house
						WHERE size >= 2000 and size <= 2499
	            		 ";
					}

					else if ($s_size ==  "s6" ){
						$query = " SELECT  *
	           			FROM house
						WHERE size >= 2500 
	            		 ";
					}


					
					
				

			}		

				

			}






			$result  = mysqli_query($conn, $query);


			
			


			while($row = mysqli_fetch_array($result)) {
				echo '
				

				
				<div class = "col-sm-12 col-md-6 col-lg-4 mt-4">             
			   
   
				
   
				<div class="custom_card" style="width: 18rem;">
			   <img  src="image/house.jpg" width="200" height="200"  alt="Card image cap">
			   <div c>
				   <h5 >Address</h5>
				   <p > '.$row['address'].'</p>
			   </div>
			   <ul >
			   		<li ><b>Place</b> '.$row['place'].' </li>
				   <li><b>Bedroom</b> '.$row['bedroom'].' </li>
				   <li ><b>Bathroom</b> '.$row['bathroom'].'  </li>
				   <li ><b>Rent</b>'.$row['rent'].' tk  </li>
				   <li ><b>Size</b> '.$row['size'].' sq ft </li>
				   <li ><b>mobile number</b> '.$row['mobile_num'].' </li>
			   </ul>
			   
			   </div>
					   
				</div>
   
					




				
				';



			}


			
			?>









			</div>


		</div>

		
 		
 	</div>

	 
	 
 	 
</div>


		 			 	
</body>
</html>