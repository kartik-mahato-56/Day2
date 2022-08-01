 <?php
  include "dbconnect.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Search User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <!-- <div class="container"> -->
        <form action="searchaddress.php" method="post">
        <div class="search">
        <h4 class="text-center">Search user</h4>
              <div class="form-group">
                <label for="user">Enter user id or name</label>
                <input type="text" class="form-control" name="user" id="user" aria-describedby="helpId" placeholder="">
                <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary" name="submit">Show Adress</button>
              </div>             
            </form>
            <br><br>
          <a href="address.php">Go Back</a>
        </div>  

      <!-- </div> -->

  </body>
</html>

<?php 

  if(isset($_REQUEST['submit'])){
    $user = $_REQUEST["user"];
    $user = intval($user);
    $sql = mysqli_query($db, "select * from user where uid=$user");

    $row = mysqli_num_rows($sql);
    if($row > 0){
      echo "<script>alert('User does not exist on the  database)</script>";
    }
    else{
      $sql2 = "select * from users inner join user_details on users.uid = user_details.uid where users.uid = $user";
      $rs = mysqli_query($db, $sql2);
?>

<div class="table-search">
    <center><table border="1">
    
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Address Type</th>

    </tr>

<?php 
      while($datas = mysqli_fetch_assoc($rs)){
          echo "<tr><td>$datas[uid]";
          echo "<td>$datas[name]";
          echo "<td>$datas[email]";
          echo "<td>$datas[phone]";
          echo "<td>$datas[address]";
          echo "<td>$datas[type]";
          
      }

      echo "</table>";
    }
  }


?>