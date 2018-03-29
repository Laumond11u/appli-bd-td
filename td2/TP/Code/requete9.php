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

// ajouter un nouveau genre de jeu, et l'associer aux jeux 12, 56, 12, 345


$genre = new m\Genre();
$genre->name = "test";
$genre->deck = "test";
$genre->description = "test";

$genre->save();

$genre->games()->attach([12,56,345]);
