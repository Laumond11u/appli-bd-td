<?php

namespace gamepedia\Model;

class Game_Rating extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'game_rating';
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function rating_boards() {
    return $this->belongsTo('\gamepedia\Model\Rating_Board','rating_board_id');
  }
}
