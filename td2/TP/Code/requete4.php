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

// le rating initial (indiquer le rating board) des jeux dont le nom contient Mario

$jeux = m\Game::where("name","like","%Mario%")->get();

foreach ($jeux as $value) {
  $game_rating = $value->ratings()->get();
  echo $value["name"]." : </br>";
  foreach ($game_rating as $val) {
    echo $val["name"]."   =>   ".$val->rating_board()->first()["deck"]."</br></br>";
  }
}
