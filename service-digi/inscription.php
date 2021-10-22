<!DOCTYPE html>
<html>
<head>
<title>SD Service Digital</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<?php


$serveur="localhost";
$user="root";
$pw="";
$bdd="digital";

$conn= new mysqli($serveur,$user,$pw,$bdd);
?>


<body>
  <div class="container">
    <div class="row">
<form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="emailAdress" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input name="fullName" type="text" class="form-control">
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


<?php
if (isset($_POST['submit'])) {
    
    $emailAdress	 = mysqli_real_escape_string($conn, $_POST['emailAdress']);
    $fullName	 = mysqli_real_escape_string($conn, $_POST['fullName']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);
   
   
      
 
        $query= "INSERT INTO users(fullName,emailAdress,password) 
                VALUES('$fullName','$emailAdress','$password')";
        $result = mysqli_query($conn, $query);
    if ($result == true  ) {
      echo '<script>window.location.href = "log-in.php";
        </script>';
    }else{
        echo "essayez de saissez votre email correctement";
    }
  }

  ?>
</div>
</div>
</body>
</html>
