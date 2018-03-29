<?php
/* PREPARATION SEANCE N°2 */

// Requête n°3

// Mise en place de l'autoload
require_once 'vendor/autoload.php';

// Utilisation d'eloquent et des modèles
use Illuminate\Database\Capsule\Manager as DB;
use gamepedia\modele as m;

// On démarre la connexion avec la bd avec eloquent
$db = new DB();
$db->addConnection(parse_ini_file("./src/conf/conf.ini"));
$db->setAsGlobal();
$db->bootEloquent();

// On possède un modèle Annonce qui correspond aux annonces

// On récupère les annonces avec plus de trois photos
$annonce = m\Annonce::has('photos','>',3)->get();


foreach ($annonce as $value) {
    echo "id : ".$value["id"].", Titre : ".$value["titre"].", date : ".$value["date"].", texte : ".$value["texte"]."</br>";
}
