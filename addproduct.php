<?php
session_start();
include 'header.php';
include 'database.php';

if(isset($_POST['done'])){

 $product_category	 = $_POST['product_category	'];
 $product_name	 = $_POST['product_name	'];
 $product_description = $_POST['product_description'];
//  $password=password_hash($password, PASSWORD_ARGON2I);
 $product_prise = $_POST['product_prise'];
 $product_discount = $_POST['product_discount'];
 $product_image = $_FILES['product_image']['name'];
 $product_image = $_FILES['product_image']['name'];
 $tmp = $_FILES['product_image']['tmp_name'];

// move_uploaded_file($tmp, "image/".$image);
$expensions= array("jpeg","jpg","png");
      
if(in_array($con,$expensions)=== false){
 
}
if(empty($errors)==true) {
  move_uploaded_file($tmp, "images/".$product_image);
   }else{
   print_r($errors);
}

        $add_product = " INSERT INTO add_new_product (product_category, 
        product_name, product_description,  product_prise, product_discount , product_image  ) 
        VALUES ('$product_category' , '$product_name' ,'$product_description' ,'$product_prise', '$product_discount' , '$product_image')";
        $query = mysqli_query($con,$add_product);
    
        echo "success inserted product";
     // header('location:login.php');
      
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
 <form method="post"  action="#" enctype= multipart/form-data>
 <br><br><div class="card">
 <div class="card-header bg-dark">
 <h1 class="text-white text-center"> Add New Product  </h1>
 </div><br>
<label> Select Product Category: </label> 
<select name="product_category" id="cars"  class="form-control" form="carform">
<option>Select category</option>
<?php

include 'database.php'; 
$q = "select * from product_category ";
$query = mysqli_query($con,$q);
while($res = mysqli_fetch_array($query)){
    echo "<option> $res[product_category] </option>";
}
?>
</select>
 <label> Product Name: </label>
 <input type="text" name="product_name" class="form-control">
 <!-- <div class=" error text-danger ">
 <?php echo $emailerr;?>
</div> -->

 <label> Product Description: </label>
 <input type="text" name="product_description" id="id_password">

 <label> Product Prise: </label>
 <input type="text" name="product_prise" class="form-control">
 
<br>
 <label> Product Discount: </label>
 <input type="text" name="product_discount" class="form-control"> 

 <label> Product Image: </label>
 <input type="file" name="product_image" class="form-control"> <br>
 <button class="btn btn-success" type="submit" name="done"> submit</button>

 </div>
 </form>
 </div>
 <br><br>

 <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">product_category</th>
      <th scope="col">product_name</th>
      <th scope="col">product_description</th>
      <th scope="col">product_prise</th>
      <th scope="col">product_discount</th>
      <th scope="col">product_image</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
    </tr>
    
  </tbody>
</table>

</body>
</html>

