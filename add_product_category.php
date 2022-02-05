<?php
include('database.php');
include('header.php');
if (isset($_POST['save'])) {


    $product_category = ($_POST["product_category"]);
    if ($product_category != "") {
        $add_category = " INSERT INTO product_category (product_category) VALUES ('$product_category')";
        $query = mysqli_query($con, $add_category);
        echo '<script>alert("Category Added")</script>';
    } else {
        echo " insert product category failed";
        // header('location:login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<style>
    .hello {
        width: 50%;
        margin-top: 100px;
        margin-left: 300px;

    }
</style>

<body>
    <form method="post">
        <div class="form-group hello">
            <label for="exampleInputEmail1">Add Product category</label> <br>
            <input type="text" name="product_category" class="form-control">

            <br> <br>
            <button type="submit" name="save" class="btn btn-primary">Submit</button>

        </div>

    </form>
</body>

</html>
<?php
include('footer.php');
?>