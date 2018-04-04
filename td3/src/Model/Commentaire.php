<?php
namespace gamepedia\Model;
use \gamepedia\Model\Utilisateur;
use \gamepedia\Model\Game;
class Commentaire extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'commentaire';
  protected $primaryKey = 'id';
  public $timestamps = true;


  static function ajouter_Commentaire($titre,$contenu,$dateCreation){
      $c1= new Commentaire();
      $c1->titre = $titre;
      $c1->contenu =$contenu ;
      $c1->dateCreation=$dateCreation;

      $maxJeu = rand(1,Game::max("id"));

      $maxUtilisateur = rand(1,Utilisateur::max("id"));
      $c1->id_utilisateur=$maxUtilisateur;
      $c1->id_game=$maxJeu;
      $c1->save();
  }

  /**
  * Retourne les commentaires d'un jeu
  */
  public static function commentairesJeu($idJeu)
  {
    return Commentaire::where('id_game','=',$idJeu)->get();
  }
}
