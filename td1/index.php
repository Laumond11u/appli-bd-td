<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();



//Question 1
$gamesContainsMario = \td1\models\Game::where('name', 'like', '%mario%')->get();


// foreach ($gamesContainsMario as $game) {
//     echo "$game->id : $game->name<br/>";
// }

//Question 2
$compagnyJapon = \td1\models\Company::where(['location_country' => 'Japan'])->get();

// foreach ($compagnyJapon as $compagny) {
//     echo "$compagny->id : $compagny->name<br/>";
// }


//Question 3
$platform10M = \td1\models\Platform::where('install_base', '>=', 10000000)->paginate(10)->get();
// foreach ($platform10M as $platform) {
//     echo "$platform->id : $platform->name<br/>";
// }


//Question 4
$games = \td1\models\Game::skip(21173)->take(442)->get();
// foreach ($games as $game) {
//     echo "$game->id : $game->name<br/>";
// }



//Question 5
