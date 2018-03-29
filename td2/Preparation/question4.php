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

//On crée un objet photo
$photo = new m\Photo();
$photo->id_photo = "99999";
$photo->file = "file";
$photo->date = "13/03/2018";
$photo->taille_octet = "1000";
$photo->id_annonce = "22";

// Puis on insère dans l'annonce 22
$annonce = m\Annonce::find(22);
$annonce->photos()->save($photo);