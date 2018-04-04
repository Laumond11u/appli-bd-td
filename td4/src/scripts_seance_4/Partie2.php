<?php
/**
 * Created by PhpStorm.
 * User: Zitouni
 * Date: 28/03/2018
 * Time: 15:00
 */

require 'vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as DB;
use \gamepedia\Model\Utilisateur;
use \gamepedia\Model\Commentaire;
$db = new DB();
$db->addConnection(parse_ini_file('dbconf.ini'));
$db->setAsGlobal();
$db->bootEloquent();
$faker  =  Faker \ Factory :: create ( ' fr_FR ' );

for ($i=0; $i < 25000; $i++) {
    Utilisateur::ajouter_user($faker->firstName ,$faker->lastName,$faker->email,$faker->streetAddress." ".$faker->city." ".$faker->postcode." ".$faker->state, $faker->phoneNumber,$faker->dateTimeThisCentury->format('Y-m-d'));
}


  for($j=0; $j<250000; $j++){
    Commentaire::ajouter_Commentaire($faker->text(10),$faker->text(127),$faker->date());
  }


  echo "Utilisateur random : \n";
  $u=Utilisateur::inRandomOrder()->first();
  echo $u->nom. " " . $u->prenom;

  $commentaires = $u->commentaires()->orderBy(dateCreation);
  foreach ($commentaires as $com) {
    echo $com->titre."\n" . $com->dateCreation;
   }
