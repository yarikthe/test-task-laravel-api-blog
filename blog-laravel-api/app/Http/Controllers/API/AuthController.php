<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class AuthController extends BaseController
{
    public function register(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        //field for json response
        $token = $user->createToken('MyAuthApp')->plainTextToken;
        Redis::set('MyAuthApp', $token);
        $success['token'] =  $token;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User created successfully.');
    }

    public function login(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password])
        ){ 
           
            $authUser = Auth::user(); 
            //field for json response
            $token = $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['token'] =  $token;
            Redis::set('MyAuthApp', $token);
            $success['name'] =  $authUser->name;
            // $success['redis_token'] = Redis::get('MyAuthApp');
   
            return $this->sendResponse($success, 'User signed in');
        } 
        else{ 
            return $this->sendError('Enter correctly data.', ['error'=>'Unauthorised']);
        } 
    }

    public function logout(Request $request) {
        
        auth()->user()->tokens()->delete();
        return $this->sendResponse([], 'Logged out');
  
    }

    public function profile(Request $request)
    {
        return $request->user();
    }
}
