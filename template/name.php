<?php 

if ((isset($_POST["name"])) && (isset($_POST["vorname"]))) {  
    
    $Vorname = $_POST['vorname']; 
    $Name = $_POST['name'];
    $_SESSION ['vorname'] = $Vorname;
    $_SESSION ['name'] = $Name;
}

    ?>