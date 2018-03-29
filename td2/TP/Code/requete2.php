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

// les personnages des jeux dont le nom (du jeu) débute par 'Mario'

// Première version avec whereHas qui dure trop longtemps

/*
$personnages = m\Character::whereHas("games",function($a){
  $a->where("name",'like',"Mario%");
})->get();

// Affichage et parcours
foreach ($personnages as $value) {
  echo $value["name"]."   =>   ".$value["desk"]."</br></br>";
}
*/

// Deuxième version

$games = m\Game::where("name","like","Mario%")->get();

foreach ($games as $value) {
  $perso = $value->characters()->get();
  foreach ($perso as $val) {
    echo $val["name"]."   =>   ".$val["deck"]."</br></br>";
  }
}
