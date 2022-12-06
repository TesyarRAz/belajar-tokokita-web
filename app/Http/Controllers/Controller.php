<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function response($code, $status, $data)
    {
        return response()->json(compact('code', 'status', 'data'));
    }
}
