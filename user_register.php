<?php
session_start();
include 'database.php';

if (isset($_POST['done'])) {

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $q1 = " SELECT * FROM user_register WHERE email = '$email'  ";
    $query1 = mysqli_query($con, $q1);
    if (mysqli_num_rows($query1) > 0) {
        echo "Already exist email";
    } else {
        if (empty($_POST["user_name"])) {
            $nameerr = "Name is required";
        } else {
            if ($user_name != "" && $email != "" && $password != "")
                $user_name = ($_POST["user_name"]);
            $q = " INSERT INTO user_register (user_name,email,mobile, password ) 
        VALUES ('$user_name' , '$email' ,'$password' , '$mobile')";
            $query = mysqli_query($con, $q);
            echo "success insert";
            header('location:login.php');
        }
    }
}


$nameerr = $emailerr = $passworderr = "";
$user_name = $email =  $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["user_name"])) {
        $user_name = "Name is required";
    } else {
        $user_name = ($_POST["user_name"]);
    }
    if (empty($_POST["email"])) {
        $emailerr = "email is required";
    } else {
        $email = ($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Invalid email format";
        }
    }
    if (empty($_POST["password"])) {
        $passworderr = "password is required";
    } else {
        $password = ($_POST["password"]);
    }

    // if (empty($_POST["image"])) {
    //   $imageerr = "image is required";
    // } else {
    //   $image = ($_POST["image"]);
    // }

    // if (empty($_POST["checkbox"])) {
    //   $checkboxerr = "checkbox is required";
    // } else {
    //   $checkbox = ($_POST["checkbox"]);
    // }
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
        <form method="post" enctype=multipart/form-data>
            <br><br>
            <div class="card">
                <div class="card-header bg-dark">
                    <h1 class="text-white text-center"> register user </h1>
                    <button class="btn btn-info form-control  btn-sm ml-left" type="submit" name="done"> <a href="login.php" class=" text-white  "> Have an Account Already GO to login </a> </button><br>

                </div><br>
                <label> Name: </label>
                <input type="text" name="user_name" class="form-control" placeholder="name" value="<?php echo $user_name; ?>">
                <div class=" error text-danger ">
                    <?php echo $user_name; ?>
                </div>


                <label> Email: </label>
                <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $email; ?>">
                <div class=" error text-danger ">
                    <?php echo $emailerr; ?>
                </div>
                <label> Mobile: </label>
                <input type="text" name="mobile" class="form-control" placeholder="" value="<?php echo $mobile; ?>">
                <div class=" error text-danger ">
                </div>

                <label> password: </label>
                <!-- <input type="text" name="password" class="form-control"placeholder="password" >  -->
                <input type="password" name="password" autocomplete="current-password" id="id_password">

                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>

                <div class=" error text-danger ">
                    <?php echo  $passworderr; ?>
                </div><br>
                <button class="btn btn-success" type="submit" name="done"> submit</button>

            </div>
        </form>
    </div>



</body>

</html>