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
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="login" class="btn btn-primary">login</button>
<span>  vous n'avez pas une compte essayez d'<a href="inscription.php">inscrire</a></span>
</form>


<?php
             if(isset($_POST['login'])){
              $password = mysqli_real_escape_string($conn, $_POST['password']); 

                 $req="select * from users where emailAdress='".$_POST['emailAdress']."' "; 
                if($resultat=mysqli_query($conn,$req)) {
                  if(mysqli_num_rows($resultat) == true){
 
                  while($ligne = mysqli_fetch_assoc($resultat)){ 
                   if(password_verify($password, $ligne['password'])){

                       session_start();
                       $_SESSION['emailAdress']=$_POST['emailAdress'];
                       header('Location: index.php');
                      
                    }else{echo"verifier votre mots de pass";}}
                }else{ echo"verifier votre email address";}
            }
        }
         
             ?>
</div>
</div>
</body>
</html>
