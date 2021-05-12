<?php

// Pour faire en sorte de respecter strictement les types indiqués
// Par exemple un int ne sera pas transformé en string
declare(strict_types=1);



const SETTINGS_MANUAL = 1;
const SETTINGS_RANDOM = 2;

require 'functions.php';

date_default_timezone_set('Europe/Paris');

// On génère un nom pour le robot si des données ont été envoyées depuis le formulaire (et se trouvent donc dans l'url)
if (! empty($_GET)) {

    // Si l'index "robot_settings" ne se trouve pas dans le tableau $_GET
    // => Si l'on n'a pas choisi d'option
    if (! isset($_GET['robot_settings'])) {
        // J'en choisis une par défaut
        $settings = SETTINGS_MANUAL;
    } else {
        // Si une option a été choisie
        // (int) devant permet de transformer la chaîne de caractères en nombre
        $settings = (int) $_GET['robot_settings'];
    }
    
    switch ($settings) {
        case SETTINGS_MANUAL:
            // Si le nom n'a pas été renseigné (=> le champ de saisie est vide)
            // On met une valeur par défaut: on génère un nom aléatoire
            if (empty($_GET['robotname'])) {
                $robotName = makeRobotName(2, 4);
            } else {
                $robotName = $_GET['robotname'];
            }
            break;
        case SETTINGS_RANDOM:
            if (! (ctype_digit($_GET['total_letters']) && $_GET['total_letters'] > 0)) {
                $totalLetters = 2;
            } else {
                $totalLetters = (int) $_GET['total_letters'];
            }
            
            if (! (ctype_digit($_GET['total_numbers']) && $_GET['total_numbers'] > 0)) {
                $totalNumbers = 4;
            } else {
                $totalNumbers = (int) $_GET['total_numbers'];
            }
            
            // Nom généré aléatoirement
            $robotName = makeRobotName($totalLetters, $totalNumbers);
            break;
    }
    
    // Nom à l'envers
    $reverseRobotName = strrev($robotName);
}
 


// Date et heure
$date = date('d m Y');
$time = date('H:i:s');

// Nombre aléatoire compris entre 1 et 10
$randomNumber = mt_rand(1, 10);

// 1 chance sur 3 de devenir diabolique
$random = mt_rand(1, 3);

// Inclure le fichier contenant l'affichage (html + un peu de php)
require 'robot.phtml';