<?php

namespace gamepedia\Model;

class Rating_Board extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'rating_board';
  protected $primaryKey = 'id';
  public $timestamps = false;

  /**
  * Q4
  * Affiche le rating des jeux qui contiennent le mot mario dans leur nom
  */
  public static function afficherRatingDesJeuxQuiContiennentLeMotMario(){
    $games=Game::contenirNom("Mario");
    foreach ($games as $g) {
      $rat=$g->ratings;
      echo "\n"."\n";
      echo $g->name . "\n";
      foreach ($rat as $r) {
		echo $r->name. "\n"; //nom de game_rating
        $rating_board= $r->rating_boards()->get();
        foreach ($rating_board as $rt) {
          echo $rt->name . " ".$rt->deck. "\n"; //nom de rating board + deck
        }

      }
    }
  }
}
