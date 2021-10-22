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
session_start();

$req="select * from users where emailAdress='".$_SESSION['emailAdress']."'";
$resultat=mysqli_query($conn,$req);
if(mysqli_num_rows($resultat) == true){

  $data=mysqli_fetch_assoc($resultat);


}else{
  header('Location: log-in.php');
}
?>


<body>
  <div class="container">
    <div class="row">
      <p> Hello <?php echo $data['fullName'] ?></p>                                 
      <a class="text-left" href="log-out.php"> Log out </a>

</div>
</div>
</body>
</html>
