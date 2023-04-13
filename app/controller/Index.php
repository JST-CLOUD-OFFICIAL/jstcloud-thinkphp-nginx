<?php
namespace app\controller;

use think\facade\Db;
use think\Request;

use app\model\Counter;

class Index
{
     /**
     * 获取Counter值的接口
     */
    public function helloWorld()
    {
        $counter = [
            'message' => 'Welcome to Jst AppEngine, Hello World!', 
            "code" => 200
        ];
        return json($counter);
    }

     /**
     * 获取Counter值的接口
     */
    public function get()
    {
        $id = 1; // Counter表中只有一条数据，所以固定为1
        $counter = Counter::get($id);
        if (!$counter) {
            // 如果查询不到记录，则创建一个新的记录
            Counter::create([
                'id' => $id,
                'count' => 0,
                'gmtCreated' => time(),
                'gmtModified' => time(),
            ]);
            $counter = ['id' => $id, 'count' => 0];
        }
        return json($counter);
    }

    /**
     * 减去Counter值-1的接口
     */
    public function decrease(Request $request)
    {
        $id = 1; // Counter表中只有一条数据，所以固定为1
        $counter = Counter::get($id);
        if (!$counter) {
            // 如果查询不到记录，则创建一个新的记录
            Counter::create([
                'id' => $id,
                'count' => -1,
                'gmtCreated' => time(),
                'gmtModified' => time(),
            ]);
        } else {
            // 如果查询到记录，则更新count和gmtModified字段
            $counter->count--;
            $counter->gmtModified = time();
            $counter->save();
        }
        return json(['success' => true]);
    }

    /**
     * 增加Counter值+1的接口
     */
    public function increase(Request $request)
    {
        $id = 1; // Counter表中只有一条数据，所以固定为1
        $counter = Counter::get($id);
        if (!$counter) {
            // 如果查询不到记录，则创建一个新的记录
            Counter::create([
                'id' => $id,
                'count' => 1,
                'gmtCreated' => time(),
                'gmtModified' => time(),
            ]);
        } else {
            // 如果查询到记录，则更新count和gmtModified字段
            $counter->count++;
            $counter->gmtModified = time();
            $counter->save();
        }
        return json(['success' => true]);
    }
}