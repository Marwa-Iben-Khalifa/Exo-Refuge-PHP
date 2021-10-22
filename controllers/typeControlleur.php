<?php

$action = $_GET['action'];
switch ($action) {
    case 'list':
        $types = Type::findAll();
        include('vues/listeTypes.php');
    break;


    case 'add':
        $mode='Ajouter';
        include('vues/formType.php');
    break;

    case 'update':
        $mode = 'Modifier';
        $type=Type::findById($_GET['num']);
        include('vues/formType.php');
    break;

    case 'delete':
        $type = Type::findById($_GET['num']);
        $nb= Type::delete($type);
        
        if ($nb == 1) {
            $_SESSION['message'] = ['success' => 'Le type a bien été suprimer! ' ];
        } else {
            $_SESSION['message'] = ['warning' => 'Le type n"a bien été suprimer!' ];
        }
        header('location: index.php?uc=types&action=list');
        exit();
    break;


    case 'valideForm':
        $type=new Type();
        if(empty($_POST['num'])){
            $type->setLibelle($_POST['libelle']);
            $nb=Type::add($type);
            $message= "ajouté";
        }else{
            $type->setNum($_POST['num']);
            $type->setLibelle($_POST['libelle']);
            $nb = Type::update($type);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=['success'=>'Le type a bien été ' . $message];
        }else{
            $_SESSION['message'] = ['warning' => 'Le type n"a bien été ' . $message];

        }
        header('location: index.php?uc=types&action=list');
        exit();
    break;
}
