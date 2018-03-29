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

// afficher (name , deck) les personnages du jeu 12342
$personnages = m\Game::find("12342")->characters()->get();

// Parcours et affichage
foreach($personnages as $value){
  echo $value["name"]."  =>  ".$value["deck"]."</br>";
}
