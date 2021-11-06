<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    #key value  pair
    public function users(){
        $users = DB::table('users')->get();
        return response()->json([
            'data' => $users,
            'message' => $users ? 'users Retrieved' : 'No user found'
        ]);
    }
    public function getUserById($id){
        $user = DB::table('users')
        ->where('id','=',$id)
        ->first();
        return response()->json([
            'data'=>$user,
            'message' => $user ?'User info received' : 'No data'
        ]);
}
public function storeUser(Request $req)
{
    $obj = new User(); 
    $obj->name = $req->name;
    $obj->email = $req->email;
    $obj->password = $req->password;
    $obj->role = $req->role;
    if(obj->save())
    {

        return response()->json()([
            'data'=>$obj,
            'message' => 'successfully Inserted'

        ]);
    }
}
}
