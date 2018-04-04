<?php

namespace gamepedia\Model;

class Utilisateur extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'utilisateur';
  protected $primaryKey = 'id';
  public $timestamps = false;

  static function ajouter_user($nom,$prenom,$email,$adresse,$numtel,$datenaiss){
      $user=new Utilisateur();
      $user->nom=$nom;
      $user->prenom=$prenom;
      $user->email=$email;
      $user->adresse=$adresse;
      $user->numtel=$numtel;
      $user->datenaiss=$datenaiss;
      $user->save();
  }


  public function comentaires() {
    return $this->hasMany('\gamepedia\Model\Commentaire','id_utilisateur');
  }
}
