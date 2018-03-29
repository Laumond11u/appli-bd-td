<?php

namespace gamepedia\modele;

/**
 * Classe Liste qui permet de modéliser une liste dans la bdd
 */
class Character extends \Illuminate\Database\Eloquent\Model{
  // Table liste
  protected $table = 'character';
  // Clé primaire : id
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function firstGame(){
    return $this->belongsTo("gamepedia\modele\Game","id");
  }

  public function games(){
    return $this->belongsToMany("gamepedia\modele\Game","game2character","character_id","game_id");
  }
}
