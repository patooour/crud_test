<?php

namespace App\Traits;
Trait generalTrait
{

    public function returnData($key , $value , $msg){
        return response()->json([
            'status'=>true,
            'errNum'=>200,
            'msg'=>$msg,
            $key=>$value,

        ]);
    }

    public function returnError($errNum ,  $msg){
        return response()->json([
            'status'=>false,
            'errNum'=>$errNum,
            'msg'=>$msg,


        ]);
    }
    public function returnSuccess($msg){
        return response()->json([
            'status'=>True,
            'errNum'=>200,
            'msg'=>$msg,


        ]);
    }
}
