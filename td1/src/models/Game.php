<?php
namespace td1\models;
class Game extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'game';
    protected $primaryKey = 'id';
    public $timestamps = true;
}