<?php

namespace gamepedia\Model;

class Game extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'game';
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function personnages()
  {
    return $this->belongsToMany('\gamepedia\Model\Character',"game2character","game_id","character_id");
  }

  public function rating() {
    return $this->belongsToMany('\gamepedia\Model\Game_Rating','game2rating','game_id','rating_id');
  }

  public function developpeurs() {
    return $this->belongsToMany('\gamepedia\Model\Company','game_developers','game_id','comp_id');
  }

  public function publishers() {
    return $this->belongsToMany('\gamepedia\Model\Company','game_publishers','game_id','comp_id');
  }
  public function ratings() {
    return $this->belongsToMany('\gamepedia\Model\Game_Rating','game2rating','game_id','rating_id');
  }
  public function genres(){
	return $this->belongsToMany('\gamepedia\Model\Genre','game2genre','game_id','genre_id');
  }


/**
* Retourne l'ensemble des jeux qui contiennent la variable dans leur nom
*/
  public static function contenirNom($nom)
  {
    $res=Game::select('*')
    ->where('name','like',"%$nom%")
    ->get();
    return $res;
  }

/*
* Retourne tous les jeux de la base
*/
  public static function listerTousLesJeux(){
    return Game::select('*')->get();
  }

/**
* Affiche les détails des jeux contenus dans une liste
*/
  public static function afficherRes($liste) {
    foreach($liste as $l){
      echo $l->name;
      echo "\n";
    }
  }

  public static function afficherResAvecDeck($liste) {
    foreach($liste as $l){
      echo $l->name. ": \n" . $l->deck;
      echo "\n\n";
    }
  }
  /**
 * Retourne le nombre de resultats voulus à partir d'un tuple de la table donné
 */
 public static function jeuAPartirDe($nbTuples, $depart){
   $res=Game::select("*")->limit($nbTuples)->offset($depart)->get();
   return $res;
 }

 /**
 * Q3 , inversée dans company
 * Affiche les noms des jeux développés par la compagnie qui contient 'Sony'
 */
 public static function affichageDeSJeuxQuiSontDeveloppesParSony() {
    $res=Game::whereHas('developpeurs',function ($qur){
        $qur->where('name', 'like', "%sony%");
    })->toSql();
    echo $res;
 }

 /**
 * Q5
 * Les jeux dont le nom débute par Mario et ayant plus de 3 personnages
 */
 public static function affichageJeuxQuiCommencentParMarioEtQuiOntPlusDe3Personnages()
 {
    $jeux=Game::where('name','like','Mario%')->has('personnages','>',3)
    ->get();
    return $jeux;
 }

 /**
 * Q6
 * Les jeux dont le nom débute par Mario et ayant un rating initiale qui contien "3+"
 */
 public static function affichageJeuxQuiCommencentParMarioEtQuiOnRating3Plus()
 {
   $jeux=Game::where('name','like','Mario%')->whereHas('ratings',function($query){
		$query->where('name','like',"%3+");

   })->get();
   return $jeux;
 }

 /**
 * Q7
 * Les jeux dont le nom débute par Mario et publié par une compagnie qui contient "Inc"
 * Et de rating inital contennat "3+"
 */
 public static function affichageJeuxQuiCommencentParMarioEtQuiOnRating3PlusEtPublieParCompagnieAvecInc()
 {
	 $jeux=Game::where('name','like','Mario%')->whereHas('ratings',function($query){
		$query->where('name','like',"%3+");

   })
   ->whereHas('publishers',function($query){
		$query->where('name','like',"%Inc%");

   })
   ->get();
   return $jeux;
 }

 /**
 * Q8
 * Les jeux dont le nom débute par Mario et publié par une compagnie qui contient "Inc"
 * Et de rating inital contennat "3+" et ayant reçu un avis du rating board nommé CERO
 */
 public static function affichageJeuxQuiCommencentParMarioEtQuiOnRating3PlusEtPublieParCompagnieAvecIncEtUnRatingNommeCERO()
 {
	 $jeux=Game::where('name','like','Mario%')->whereHas('ratings',function($query){
		$query->where('name','like',"%3+");
   })
   ->whereHas('publishers',function($query){
		$query->where('name','like',"%Inc%");
   })
   ->whereHas('ratings',function($query){
		$query->where('name','like',"CERO%");
   })
   ->get();
   return $jeux;
 }

 /**
 * Récupère les informations d'un jeu avec son id
 */
 public static function getGameById($id){
   return Game::where('id','=',$id)->first();
 }

 /*
 * Retourne les 200 premiers jeux de la base
 */
   public static function listerLes200PremiersJeux($debut){
     return Game::select('*')->skip($debut)->take(200)->get();
   }

}
