
<?php
session_start();
include 'database.php';

if(isset($_POST['done'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

$q=" SELECT * FROM user_register WHERE email = '$email' and password= '$password'  ";


$query= mysqli_query($con, $q);

if( mysqli_num_rows($query)>0){

    $_SESSION['email'] = $email;  
    // echo "success";
header('location:index.php');   
}else{
    echo "enter valid email";
}

}
?>


<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">login user </h1>
 </div><br>



 <label> email: </label>
 <input type="text" name="email" class="form-control"placeholder="email"> <br>
 <label> password: </label>
 <input type="text" name="password" class="form-control"placeholder="password"> <br>

 
 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
 <button class="btn btn-success" type="submit" name="done"> <a href="user_register.php" class=" text-light ">First register </a> </button><br>


 </div>
 </form>
 </div>
</body>
</html>
