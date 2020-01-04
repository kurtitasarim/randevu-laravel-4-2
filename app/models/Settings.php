<?php
/**
 * Created by PhpStorm.
 * User: kurti
 * Date: 18.08.2015
 * Time: 11:09
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Settings extends Eloquent
{
    //use SoftDeletingTrait;
    protected $table    = "settings";
    //protected $dates    = ['deleted_at'];
}