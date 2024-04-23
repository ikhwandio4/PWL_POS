<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\m_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class RegisterController extends Controller
{
    public function __invoke(Request $request){

        //set validation
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required'
        ]);
        //if validation fails
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        //create user
        $user =m_user::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);

        //return response Json user is created
        if($user){
            return response()->json([
                'success' => true,
                'user' => $user,
            ],201);
        }
        //return json proses inset 
        return response()->json([
            'success' => false,
        ],409);
    }
}
