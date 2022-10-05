<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $title = trim($_POST['title']) ;
    $title = htmlentities($title) ;

    $description = trim($_POST['description']) ;
    $description = htmlentities($description) ;

    $recipe[] = $title;
    $recipe[] = $description;

    
    // todo 
    // error si champ trop long ou trop court
    if (strlen($_POST['title']) <=2) {  
        $errors[] ="Le titre est trop petit" ; 
    }

    /* les données nettoyées de $_POST */
    if (empty($errors)) {
        saveRecipe($recipe);
        header('Location: /');
    }
    else {
        foreach ($errors as $key => $value) {
            echo $value;
        }
    }
}

require __DIR__ . '/src/views/form.php';
