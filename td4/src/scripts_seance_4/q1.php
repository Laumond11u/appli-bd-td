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

// Question 1
$u1=new m\Utilisateur();
$u1->nom="Nom1";
$u1->prenom='titouan';
$u1->email='u1@gmail.com';
$u1->adresse='9 rue de l iut';
$u1->numtel='0606060606';
$u1->datenaiss=date('2000-11-11');
$u1->save();

$u2=new m\Utilisateur();
$u2->nom="Nom3";
$u2->prenom='prenom3';
$u2->email='u3@gmail.com';
$u2->adresse='50 ru du rue';
$u2->numtel='0707070707';
$u2->datenaiss=date('21-12-2012');
$u2->save();


$u3=new m\Utilisateur();
$u3->nom="Nom3";
$u3->prenom='prenom3';
$u3->email='u3@gmail.com';
$u3->adresse='50 ru du rue';
$u3->numtel='0707070707';
$u3->datenaiss=date('2012-12-21');
$u3->save();






$c1= new m\Commentaire();
$c1->titre = "excellent";
$c1->contenu = "c'est vraiment le meilleur jeu du monde";
$c1->dateCreation= date('28-03-2018');

$c2= new m\Commentaire();
$c2->titre = "bon";
$c2->contenu = "ça va";
$c2->dateCreation= date('25-07-2017');

$c3= new m\Commentaire();
$c3->titre = "nullos";
$c3->contenu = "bof";
$c3->dateCreation= date('02-06-2016');

$c4= new m\Commentaire();
$c4->titre = "pas top top";
$c4->contenu = "choqué et déçu";
$c4->dateCreation= date('01-01-1999');

$c5= new m\Commentaire();
$c5->titre = "impressionnant";
$c5->contenu = "ça en met plein les yeux";
$c5->dateCreation= date('25-07-2017');

$c6= new m\Commentaire();
$c6->titre = "trop trop trop coolos";
$c6->contenu = "je recommande";
$c6->dateCreation= date('31-12-1999');
