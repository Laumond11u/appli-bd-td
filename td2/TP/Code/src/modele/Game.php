<?php

namespace gamepedia\modele;
/**
 * Classe Item qui correspond à la table Item de la base de données
 */
class Game extends \Illuminate\Database\Eloquent\Model{
  // Table item
  protected $table = 'game';
  // Clé primaire : id
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function firstCharacters(){
    return $this->hasMany("gamepedia\modele\character","id");
  }

  public function characters(){
    return $this->belongsToMany("gamepedia\modele\Character","game2character","game_id","character_id");
  }

  public function games_developers(){
    return $this->belongsToMany("gamepedia\modele\Company","game_developers","game_id","comp_id");
  }

  public function game_publishers(){
    return $this->belongsToMany("gamepedia\modele\Company","game_publishers","game_id","comp_id");
  }

  public function ratings(){
    return $this->belongsToMany("gamepedia\modele\Game_rating","game2rating","game_id","rating_id");
  }

  public function genres(){
      return $this->belongsToMany("gamepedia\modele\Genre","game2genre","game_id","genre_id");
  }
}
