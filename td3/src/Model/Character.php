<?php

namespace gamepedia\Model;

class Character extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'character';
  protected $primaryKey = 'id';
  public $timestamps = false;

  /**
  * Q1
  * Affiche le nom et le deck des personnages
  */

  public static function affichageNameEtDeck(){
      $personnages=Game::find(12342)->personnages;

      foreach ($personnages as $p) {
        echo $p->name . "\n" ;
      }
  }


  /**
  * Q2
  * Affiche l'ensemble des personnages dont le nom de leur jeu commence par Mario
  */

  public static function affichageDesPersonnagesDontLeJeuCommenceParMario($nomJeu){


    $games = Game::select('*')->where('name','like',"$nomJeu%")->get();
    foreach($games as $g){
      $perso=$g->personnages;
      echo "\n". "\n" ;
      echo $g->name . "\n";
      foreach ($perso as $p) {
        echo $p->name;
        echo "\n";
      }
    }
  }
}
