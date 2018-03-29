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

// les jeux développés par une compagnie dont le nom contient 'Sony'

// On a essayé cette version suivant l'API mais la requête met beaucoup trop
// de temps pour s'effectuer

/*
$jeux = m\Game::whereHas("games_developers", function($a){
  $a->where("name","like","%Sony%");
})->get();

// Parcours et affichage
foreach ($jeux as $value) {
  echo $value["name"]."  =>  ".$value["deck"]."</br>";
}
*/

// Deuxième version

$company = m\Company::where("name","like","%Sony%")->get();

// Parcours et affichage
foreach ($company as $value) {
  $jeux = $value->games_developed()->get();
  foreach ($jeux as $val) {
    echo $val["name"]."  :  ".$val["deck"]."</br></br>";
  }
}
