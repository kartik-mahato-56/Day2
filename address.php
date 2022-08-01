<?php 
  include "dbconnect.php";
  
  if(isset($_REQUEST["submitAddress"])){
      $uid = $_REQUEST["username"];
      $address = $_REQUEST["address"];
      $addressType = $_REQUEST["addressType"];


    $query = "INSERT INTO user_details(uid, address,type) VALUES($uid, '$address', '$addressType')";
    $resultSet = mysqli_query($db, $query);
    if(!$resultSet){
      echo "<script>alert('Something Wrong, Try again!')</script>";
    }
    else{
      echo "<script>alert('Successfully Submitted users address')</script>";
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Add Address</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form action="address.php" method="post">
      <div class="container">
        <h2 class="text-center">
          Add User Address
        </h2>
        <div class="form-group">
          <label for="">Select User</label>
          <select class="form-control" name="username" id="">
            <option value="">------</option>
            <!-- here we are accessing the id and name from the database for drop down  -->
            <?php 

              $rs = mysqli_query($db, "SELECT uid,name FROM users");
              
              while($ids = mysqli_fetch_assoc($rs)){

              
              
              echo "<option value='$ids[uid]'>$ids[uid]--$ids[name]</option>";
              }
            ?>    
          </select>
        </div>
        <div class="form-group">
          <label for="">Adress:</label>
          <textarea class="form-control" name="address" id="" rows="3"></textarea>

        </div>
        <div class="form-group">
          <label for="">Address Type</label>
          <select class="form-control" name="addressType" id="">
            <option value="">----</option>
            <option value="Permanent">Permanent</option>
            <option value="Temporary">Temporary</option>
          </select>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="submitAddress">Submit Address</button>
          <a class="btn btn-primary" href="searchaddress.php" role="button">Search Address</a>

        </div>
        <br>
              Go back to <a href="index.php">Registration Page</a>
      </div>
    </form>
  </body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>