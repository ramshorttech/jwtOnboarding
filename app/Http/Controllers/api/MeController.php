<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class MeController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth){
        $this->auth = $auth;
    }

    public function index(Request $request){
        return response()->json([
            'success' => true,
            'data' => $request->user(),
        ], 200);
    }

    public function logout(){
        $this->auth->invalidate();
        return response()->json([
            'success' => true
        ], 200);
    }
}
