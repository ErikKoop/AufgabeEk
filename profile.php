<?php 

session_start();
require_once('./app/controller/UserController.php');
use App\Controller\UserController;

if(!isset($_SESSION['user'])) {
    header('location:login.php');
    die;
}
include('./template/navbar.php');
require_once('./template/name.php');
if((!isset($_SESSION['vorname'])) && (!isset($_SESSION['name']))) {
  die("Bitte erst einloggen"); //Mit die beenden wir den weiteren Scriptablauf   
}

//In $name den Wert der Session speichern





?>
<div class="d-flex m-5 justify-content-center">
<h1>Willkommen <?= $_SESSION['vorname'] . " " . $_SESSION['name'] . "! " . $_SESSION['user']?> </h1>


</div>



<div class="card flex m-5 p-5 bg-secondary">
<h3>Profil bearbeiten</h3>

<?php
    if (isset($_POST["editProfile"])) {
        $userctr = new UserController();
        if (isset($_POST["password"])) {
            $userctr->updatePasswordByEmail($_SESSION['user'], $userctr->hashPassword($_POST["password"]));
            echo "Ihr Passwort wurde geändert.";
        }
    }
?>


<form action="profile.php" method="post" target="_self" class="mb-2">
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input  name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter new password" minlength="4">
  </div>

  <br>
  <button name="editProfile" type="submit" class="btn btn-primary">Speichern</button>
</form>
<form  method="post" action="index.php">  
  <button name="deleteProfile" type="submit" class="btn btn-primary">Profil löschen</button>
</form>

</div>

<?php include('./template/footer.php'); ?>
