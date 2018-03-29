<?php

namespace gamepedia\modele;

/**
 * Classe Liste qui permet de modéliser une liste dans la bdd
 */
class Platform extends \Illuminate\Database\Eloquent\Model{
  // Table Message
  protected $table = 'platform';
  // Clé primaire : id
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function company(){
    return $this->belongsTo('gamepedia\modele\Company','id');
  }

}
