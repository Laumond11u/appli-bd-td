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

$res=m\Game::where('name','like',"%Mario%")->get();
$res->load('personnages');

foreach ($res->flatMap->personnages as $p) {
  echo $p->name."\n";
}
 echo "\n";
$res=m\Company::where('name','like',"Sony%")->get();
$res->load('jeux');

foreach ($res->flatMap->jeux as $j) {
  echo $j->name."\n";
}
