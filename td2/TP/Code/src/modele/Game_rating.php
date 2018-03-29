<?php

namespace gamepedia\modele;
/**
 * Classe Item qui correspond à la table Item de la base de données
 */
class Game_rating extends \Illuminate\Database\Eloquent\Model{
  // Table item
  protected $table = 'game_rating';
  // Clé primaire : id
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function rating_board(){
    return $this->belongsTo("gamepedia\modele\Rating_board","rating_board_id");
  }

  public function games(){
    return $this->belongsToMany("gamepedia\modele\Game","game2rating","rating_id","game_id");
  }
}
