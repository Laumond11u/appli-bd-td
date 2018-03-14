<?php
namespace td2;
class Character extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'character';
    protected $primaryKey = 'id';
    protected $timestamps = true;
}