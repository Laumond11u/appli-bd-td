<?php

namespace gamepedia\modele;
/**
 * Classe Item qui correspond à la table Item de la base de données
 */
class Rating_board extends \Illuminate\Database\Eloquent\Model{
  // Table item
  protected $table = 'rating_board';
  // Clé primaire : id
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function game_ratings(){
    return $this->hasMany("gamepedia\modele\Game_rating","rating_board_id");
  }
}
