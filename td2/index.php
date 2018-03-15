<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();



//Question 1
$game12342 = td2\models\Game::where('id','=',12342)->first(); 
echo $game12342;
// foreach ($game12342 as $p) {
  //echo "$p->id : $p->name<br/>";
//}



//Question 2
//$gamesMario = td2\models\Game::where('name', 'like', '%mario%')->persos;

//foreach ($gamesMario as $game) {
  //   echo "$game->id : $game->name<br/>";
 //}