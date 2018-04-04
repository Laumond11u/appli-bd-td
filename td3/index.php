<?php

/**
 * Importation
 */
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use \gamepedia\Model as m;
use \gamepedia\scripts_seance_5 as s5;

/**
 * Base de données
 * Nommer son fichier de configuration de conenxion à la base de données : "dbconf.ini
 */
$db = new DB();
$db->addConnection(parse_ini_file('dbconf.ini'));
$db->setAsGlobal();
$db->bootEloquent();


// Question 2
//$res2=m\Company::compagniePays('Japan');
//m\Company::afficherResListe($res2);



// routes

$app= new \Slim\Slim;

$app->response->headers->set('Content-Type', 'application/json');

$app->notFound(function(){
  echo json_encode(array("msg"=>"url non trouvee"));
});
$app->get('/',function(){
  echo "youhou";
});

$app->get('/api/games/:id', function ( $id) use($app){

  echo s5\q1::get_donnees_jeu($id);
    //s5\q1::get_donnees_jeu_Correction($id,$app);
});

$app->get('/api/games/', function () use ($app) {
  $page = $app->request()->get('page');
  $page=filter_var($page,FILTER_SANITIZE_STRING);
  echo s5\q1::get_liste_jeu($page);
})->name('allgames');

$app->get('/api/games/:id/comments', function ($id) use ($app) {
  if(!filter_var($id,FILTER_VALIDATE_INT)) echo json_encode(array(""=>"ID incorrect"));
  else echo s5\q1::get_commentaires_jeu($id);
})->name('commentaires');

$app->run();
