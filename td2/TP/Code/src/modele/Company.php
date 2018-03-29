<?php

namespace gamepedia\modele;

/**
 * Classe Liste qui permet de modéliser une liste dans la bdd
 */
class Company extends \Illuminate\Database\Eloquent\Model{
  // Table liste
  protected $table = 'company';
  // Clé primaire : id
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function platforms(){
    return $this->hasMany('gamepedia\modele\Platform','id');
  }

  public function game_published(){
    return $this->belongsToMany("gamepedia\modele\Company","game_publishers","comp_id","game_id");
  }

  public function games_developed(){
    return $this->belongsToMany("gamepedia\modele\Game","game_developers","comp_id","game_id");
  }

}
