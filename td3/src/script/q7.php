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

// Question 4
$debut = microtime(true);
$comp=m\Company::compagniePays('Japan');
$fin = microtime(true);
$duree1=$fin-$debut;
foreach($comp as $c){
  echo $c->name . "\n";
}

$debut = microtime(true);
$comp=m\Company::compagniePays('Spain');
$fin = microtime(true);
$duree2=$fin-$debut;
foreach($comp as $c){
  echo $c->name . "\n";
}

$debut = microtime(true);
$comp=m\Company::compagniePays('Germany');
$fin = microtime(true);
$duree3=$fin-$debut;
foreach($comp as $c){
  echo $c->name . "\n";
}

echo 'Pour Japon :'. $duree1 . "\n";
echo 'Pour Espagne :'. $duree2 . "\n";
echo 'Pour Allemagne :'. $duree3 . "\n";
/* Résultats obtenus sans index :
Japon : 0.78003001213074
Espagne : 0.015600919723511
Allemagne : 001560115814209

*/
/* Résultats obtenus avec index sur location_country :
Japon : 0.21840190887451
Espagne : 0.0156009204467773
Allemagne : 0.031199932098389

*/
// on voit une nette amélioration de performance
