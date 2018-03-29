<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 14/03/2018
 * Time: 16:20
 */

/* SEANCE N°2 */

// Requête n°5

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

//les jeux dont le nom débute par Mario et ayant plus de 3 personnages


$game = m\Game::where('name', 'like', 'Mario%')->has('characters','>',3)->get();


foreach ($game as $value) {
    echo "Nom : ".$value["name"]."</br>";
}
