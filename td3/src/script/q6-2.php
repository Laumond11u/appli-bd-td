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

m\Game::index('name');

$debut=microtime(true);

m\Game::select('*')->where('name','like',"%Mario%")->get();

$fin = microtime(true);
$diff=$fin-$debut;
echo $diff . "\n";

$debut=microtime(true);

m\Game::select('*')->where('name','like',"%Luigi%")->get();

$fin = microtime(true);
$diff=$fin-$debut;
echo $diff . "\n";

$debut=microtime(true);

m\Game::select('*')->where('name','like',"%Bowser%")->get();

$fin = microtime(true);
$diff=$fin-$debut;
echo $diff . "\n";

/*
* index créé sur phpmyadmin
* il fait gagner en mpyenne 50% de temps
*/
