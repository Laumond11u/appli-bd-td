<?php

namespace gamepedia\Model;

class Platform extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'platform';
  protected $primaryKey = 'id';
  public $timestamps = false;

/*
* Retourne l'ensemble eds bases dont l'install est supérieure à min
*/
public static function baseInstalleeSuperieureA($min)
  {
    $res= Platform::where("install_base",">=",$min)->get();
    return $res;
  }


  public static function afficherRes($res){
    foreach ($res as $key) {
      echo $key->name;
      echo "\n";
    }
  }

}
