<?php
namespace app\model;

use think\Model;

// Counters 定义数据库model
class Counter extends Model
{
    protected $table = 'Counter';

    public $id;
    public $count;
    public $gmtCreated;
    public $gmtModified;
}