<?php


/**
 * selon l'action mentionner dans le URL à effectuer on fait appel à la fonction de  classe Animale qui lui correspond
 */
$action = empty($_GET['action']) ? "" : $_GET['action'];
switch ($action) {
    case '':
        $types = Type::findAll();
        $animaux = Animale::findAll();
        include('vues/acceuil.php');
        break;
    case 'list':
        $types = Type::findAll();
        $animaux = Animale::findAll();
        include('vues/listeAnimaux.php');
        break;


    case 'add':
        $mode = 'Ajouter';
        $types = Type::findAll();
        include('vues/formAnimale.php');
        break;

    case 'update':
        $mode = 'Modifier';
        $types = Type::findAll();
        $animale = Animale::findById($_GET['num']);
        include('vues/formAnimale.php');
        break;

    case 'delete':
        $animale = Animale::findById($_GET['num']);
        $nb = Animale::delete($animale);

        if ($nb == 1) {
            $_SESSION['message'] = ['success' => 'L"animal a bien été suprimer! '];
        } else {
            $_SESSION['message'] = ['warning' => 'L"animal n"a bien été suprimer!'];
        }
        header('location: index.php?uc=animaux&action=list');
        exit();
        break;


    case 'valideForm':
        $animale = new Animale();
        $typeAnimale=Type::findById($_POST['int_type']);
        if (empty($_POST['num'])) {
            $animale->setNom($_POST['nom']);
            $animale->setSituation($_POST['situation']);
            $animale->setInt_type($typeAnimale);
            $nb = Animale::add($animale);
            $message = "ajouté";
        } else {
            $animale->setNum($_POST['num']);
            $animale->setNom($_POST['nom']);
            $animale->setSituation($_POST['situation']);
            $animale->setInt_type($typeAnimale);
            $nb = Animale::update($animale);
            $message = "modifié";
        }
        if ($nb == 1) {
            $_SESSION['message'] = ['success' => 'Les informations ont bien été ' . $message];
        } else {
            $_SESSION['message'] = ['warning' => 'Les informations n"ont pas bien été ' . $message];
        }
        header('location: index.php?uc=animaux&action=list');
        exit();
        break;
}
