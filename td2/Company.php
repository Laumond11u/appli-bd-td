<?php
namespace td1\models;
class Company extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'company';
    protected $primaryKey = 'id';
    public $timestamps = true;
}