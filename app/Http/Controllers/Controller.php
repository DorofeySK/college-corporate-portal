<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function authInfo() {
        $user_auth = Auth::user();
        return $user_auth->getInfo();
    }
}
