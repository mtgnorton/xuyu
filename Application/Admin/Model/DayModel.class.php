<?php
/**
 * Created by PhpStorm.
 * User: lmfx
 * Date: 2015/6/12
 * Time: 9:28
 */

namespace Admin\Model;
use Think\Model;
class DayModel extends Model
{

    

    public function getAllById($id){
        $data['id']=$id;
//        print_r($data);
        return $this->where($data)->select();




    }


    public function getAllByDate($date){




    }

    public function  add(){


    }

}
