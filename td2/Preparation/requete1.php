<?php
/* PREPARATION SEANCE N°2 */

// Requête n°1

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

// On récupère une annonce
$annonce = m\Annonce::find(22);

// Puis on récupère les photos liées à cette annonce
$photos = $annonce->photos()->get();


foreach ($photos as $value) {
    echo "id : ".$value["id"].", fichier : ".$value["file"].", taille : ".$value["taille_octet"]." octet(s)</br>";
}
