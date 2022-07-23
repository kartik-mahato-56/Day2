<?php
    include "dbconnect.php";

    if(isset($_REQUEST['submit'])){

        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];

        $query = "insert into users(name, email, phone) values('$name','$email', $phone)";
        $rs = mysqli_query($db,$query);
        if(! $rs){
            echo "<script>alert('Database insertion failed')</script>";
        }
        else{
            echo "<script>alert('successflly submitted details to the database')</script>";
        }
    }


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form action="index.php" method="post">
        <div class="container">
            <h2 class="text-center">User Registration</h2>
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="">Phone Number</label>
              <input type="text" class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary" name="submit">Register User</button>
        
            </div><br>
            Already Registered?  <a href="address.php">Insert Address</a>
        </div>
    </form>
  </body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>