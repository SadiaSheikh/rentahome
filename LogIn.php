<?php

    session_start();
    $conn = mysqli_connect("localhost", "root",'',"house_rental");


    
    if(mysqli_connect_errno()){
      echo 'connction Failed';
    }

    if(isset($_POST['btnHome'])){
        header('Location: Home.php'); 
   
    }
  
     
   if(isset($_POST['btnLogIn'])) {
    
      $mobileNo =  $_POST['mobileNo'];
      $pass =  $_POST['password'];

      
      $query = " SELECT  *
              FROM user
               WHERE mobile_num =  '$mobileNo'  AND  password  =    '$pass'  ";
              

      $result = mysqli_query($conn, $query);

    
    if(mysqli_num_rows($result) == 1){

      $row = mysqli_fetch_assoc($result);

        $_SESSION['PID'] = $row["p_id"];

        
        $_SESSION['mobile_no'] = $row["mobile_num"];



        header('Location: Home.php'); 

          
        
       
     }
        
    else{

        echo '<h1 style="font-size: 300%" class="text-center text-primary mt-5 mb-5"  > 
         Enter a valid username and password 
           </h1>';

    }

  }

  if(isset($_POST['btnNew'])){
      header('Location: Reg.php'); 
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.css" rel="stylesheet" />
 
<style type="text/css">
body {
  
  background-image: url("image/house.jpg");
  background-size: 100% 100% ;

}
.wrapper {
  margin: 150px;
}
.form-signin {
  max-width: 380px;
  margin: 0 auto;
  background-color: #fff;
  padding: 15px 40px 50px;
  border: 1px solid #e5e5e5;
  border-radius: 10px;
}
.form-signin .form-signin-heading, .form-signin .checkbox {
  margin-bottom: 30px;
}
.form-signin input[type="text"], .form-signin input[type="password"] {
  margin-bottom: 20px;
}
.form-signin .form-control {
  padding: 10px;
}
</style>
</head>
<body>

  <div >
      <form class=" float-right " method="post">
      <button class="btn-sm btn-primary" name="btnHome" > Home </button>
    </form>
    </div>


  <div class="wrapper">

    <form class="form-signin bg-secondary" method="post">

    
      	<h2 class="form-signin-heading text-center" ><b>User</b><br> Login Form</h2>
      <input type="number" class="form-control" name="mobileNo" placeholder="Phone no." required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required="" />     
      <button class="btn btn-lg btn-primary btn-block" name="btnLogIn">Sign in</button>
    </form>

      <br>
      <br>
      <form method="post">
      <p class="text-center text-light"><b>Don't have an account ?</b></p>
      <p class="text-center"> <button class="btn btn-sm btn-primary " name="btnNew">Sign up</button></p>

    </form>

  </div>




</body>
</html>











