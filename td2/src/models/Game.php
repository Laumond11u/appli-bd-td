<?php
namespace td2\models;
class Game extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'game';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function persos(){
        return $this->belongsToMany('td2\models\Character','game2character','game_id','character_id');
    }
}