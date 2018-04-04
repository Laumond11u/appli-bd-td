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

$debut=microtime(true);

m\Game::select("name")->get();

$fin = microtime(true);
$diff1=$fin-$debut;
echo $diff1 . "\n";

$debut=microtime(true);

m\Game::select("name")->get();

$fin = microtime(true);
$diff2=$fin-$debut;
echo $diff2 . "\n";

$debut=microtime(true);

m\Game::select("name")->get();

$fin = microtime(true);
$diff=$fin-$debut;
echo $diff . "\n";

$debut=microtime(true);

m\Game::select("name")->get();

$fin = microtime(true);
$diff=$fin-$debut;
echo $diff . "\n";

$comp = $diff1-$diff2;
$comp = $diff1/100*$comp;
echo $comp;
