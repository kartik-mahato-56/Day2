<?php 
  include "dbconnect.php";
  
  if(isset($_REQUEST["submitAddress"])){
      $uid = $_REQUEST["username"];
      $address = $_REQUEST["address"];
      $addressType = $_REQUEST["addressType"];


    $query = "insert into user_details(uid, address,type) values($uid, '$address', '$addressType')";
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
            <?php 

              $rs = mysqli_query($db, "select uid from users");
              
              while($ids = mysqli_fetch_assoc($rs)){

              $rs2 = mysqli_query($db,"select name from users where uid = $ids[uid]");
              $data = mysqli_fetch_assoc($rs2);
              echo "<option value='$ids[uid]'>$data[name]</option>";
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
        </div>
        <br>
        Go Back to <a href="index.php">Registration Page</a>
      </div>
    </form>
  </body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>