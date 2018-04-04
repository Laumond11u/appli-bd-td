<?php

/**
 * Importation
 */
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use \gamepedia\Model as m;

/**
 * Base de données
 * Nommer son fichier de configuration de conenxion à la base de données : "dbconf.ini
 */
$db = new DB();
$db->addConnection(parse_ini_file('dbconf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

// Question 1

DB::connection()->enableQueryLog();

$jeux=m\Game::contenirNom('Mario');


$query=DB::getQueryLog();

foreach ($query as $q) {
  echo $q["query"] . "\n";
  foreach ($q["bindings"] as $b) {
    echo $b. "\n" ;
  }
  echo $q["time"]. "\n" ;
}
