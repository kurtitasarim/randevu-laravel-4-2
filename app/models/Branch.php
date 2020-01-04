<?php
/**
 * Created by PhpStorm.
 * User: kurti
 * Date: 01.11.2015
 * Time: 02:13
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Branch extends Eloquent
{
    use SoftDeletingTrait;
    protected $table    = "branch";
    protected $dates    = ['deleted_at'];
}