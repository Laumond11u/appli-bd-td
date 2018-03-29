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

//les jeux dont le nom débute Mario, publiés par une compagnie dont le nom contient "Inc",
//dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé
//"CERO"

$jeux = m\Game::where("name","like","Mario%")
              ->whereHas("game_publishers",function($a){
                $a->where("name","like","%Inc.%");
              })
              ->whereHas("ratings", function($a){
                $a->where("name","like","%3+%");
              })
              ->whereHas("ratings", function($a){
                $a->whereHas("rating_board",function($b){
                  $b->where("name","=","CERO");
                });
              })->get();

foreach ($jeux as $value) {
  echo $value["name"]."   =>   ".$value["deck"]."</br></br>";
}
