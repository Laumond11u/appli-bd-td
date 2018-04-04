<?php

namespace gamepedia\Model;

class Company extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'company';
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function jeux() {
    return $this->belongsToMany('\gamepedia\Model\Game','game_developers','comp_id','game_id');
  }
  /**
  * Retourne la liste des compagnies installées dans un pays donné
  */
  public static function compagniePays($pays){
    $res= Company::select("*")->where('location_country', 'like', "%$pays%")->get();
    return $res;
  }

  public static function afficherResListe($l){
    foreach ($l as $elem) {
      echo $elem->name;
      echo "\n";
    }
  }

  public static function CompanyLikeSony() {
     return Company::where('name','like','%sony%')->get();
   }
}
