<?php
session_start();
use App\View\RegisterView;


include('./template/navbar.php'); 
require_once('./app/view/RegisterView.php');
 $registerView = new RegisterView();
 $registerView->validateUserPost();
 $userExist = $registerView->checkIfUserExisted();
 //var_dump($userExist);
 
 if(!$userExist)
 {  
  $registerView->register();  
 }


?>

<h1>Registrierung</h1>
<div class="card flex m-5 p-5 bg-secondary">

<form action="profile.php"  method="post" target="_self">
<?=$registerView->component?>
<div class="form-group">
<label for="exampleInputVorname">Vorname</label>
<input  name="vorname" type="vorname" class="form-control" id="exampleInputVorname" aria-describedby="emailHelp" placeholder="Enter Vorname">
</div>
<div class="form-group">
<label for="exampleInputName">Name</label>
<input  name="name" type="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Name">
</div>
</form>
<form method="post" target="_self">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input  name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" minlength="4">
  </div>

  <br>
  <button type="submit" class="btn btn-primary">Registrieren</button>
</form>


</div>


<?php include('./template/footer.php'); ?>