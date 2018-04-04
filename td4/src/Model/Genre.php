<?php

namespace gamepedia\Model;

class Genre extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'genre';
  protected $primaryKey = 'id';
  public $timestamps = false;
     
  public function jeux()
  {
    return $this->belongsToMany('\gamepedia\Model\Game',"game2genre","genre_id","game_id");
  }

  /**
  * Q9.1
  * Fait une association d'un jeu à un genre
  */
  public static function ajouterUneAssociation($idJeu,$idGenre){
    $jeu=Game::find($idJeu);
    $jeu->genres()->attach($idGenre);
	$jeu->save();
  }

  /**
  * Q9.2
  * Créer un nouveau genre
  */
  public static function creerUnNouveauGenre($name,$deck,$description){
    $genre= new Genre();
    $genre->name=$name;
    $genre->deck=$deck;
    $genre->description=$description;
    $genre->save();
	return $genre->id;
  }
}
