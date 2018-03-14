<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();



//Question 1
$game12342 = \td2\models\Character::where('id','like','12342');

 foreach ($game12342 as $character) {
     echo "$character->id : $character->name<br/>";
}
