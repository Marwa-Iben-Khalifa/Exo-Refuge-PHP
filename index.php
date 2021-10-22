<?php ob_start();
session_start(); 

include "vues/header.php";
include "vues/messagesFlash.php";
include "modeles/Type.php";
include "modeles/Animale.php";

include "modeles/monPdo.php";


$uc= empty($_GET['uc']) ? "acceuil" : $_GET['uc'];

switch($uc){
    case 'acceuil':
        include 'controllers/animalController.php';
        break;
    case 'types':
        include('controllers/typeControlleur.php');
        break;
    case 'animaux':
        include 'controllers/animalController.php';
        break;
}

 include "vues/footer.php";


?>