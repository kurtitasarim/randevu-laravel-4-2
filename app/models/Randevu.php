<?php
/**
 * Created by PhpStorm.
 * User: kurti
 * Date: 04.11.2015
 * Time: 03:04
 */

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Randevu extends Eloquent
{
    use SoftDeletingTrait;
    protected $table    = "randevu";
    protected $dates    = ['deleted_at'];

    public function Branch()
    {
        return $this->hasMany('Branch', 'id','branch');
    }
    public function Staff()
    {
        return $this->hasMany('User', 'id','staff');
    }
}