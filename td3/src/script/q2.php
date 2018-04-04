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

// Question 2
$debut = microtime(true);
$res=m\Game::contenirNom('Mario');
$fin = microtime(true);

m\Game::afficherRes($res);

$duree=$fin-$debut;
echo $duree;
