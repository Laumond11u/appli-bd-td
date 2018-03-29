<?php

namespace gamepedia\modele;
/**
 * Classe Item qui correspond à la table Item de la base de données
 */
class Genre extends \Illuminate\Database\Eloquent\Model{
    // Table item
    protected $table = 'genre';
    // Clé primaire : id
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function firstGame(){
        return $this->hasMany("gamepedia\modele\Game","id");
    }

    public function games(){
        return $this->belongsToMany("gamepedia\modele\Game","game2genre","genre_id","game_id");
    }
}
