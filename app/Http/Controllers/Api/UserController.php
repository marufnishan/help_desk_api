<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getUserName(Request $request)
    {
        $getUserName=User::where('role','=',$request->role)->select('name')->get();
        if(!empty($getUserName))
        {
            return response()->json($getUserName);
        }
        else
        {
            return response()->json(["status"=>false]);
        }


    }
}
