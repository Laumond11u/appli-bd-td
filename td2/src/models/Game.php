<?php
namespace td2;
class Game extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'game';
    protected $primaryKey = 'id';
    public $timestamps = true;
}