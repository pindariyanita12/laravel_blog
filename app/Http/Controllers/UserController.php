<?php
use App\User;
use App\Address;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = $this->validateUser();
        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }
        $user = User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        return response()->json(['message'=>'User Created','data'=>$user],200);
    }

    public function login(Request $request){
        $validator = $this->validateEmail();
        if ($validator->fails()){
            return response()->json($validator->messages(),400);
        }

        $user = User::where('email',$request->email)->firstOrFail();
        if(Hash::check($request->password,$user->password)){
            return response()->json(['message'=>'Login Success','data'=>$user],200);
        }
            return response()->json(['message'=>'Login Failed','data'=>null],400);
    }

    public function show(User $user)
    {
        return response()->json(['message'=>'','data'=>$user],200);
    }

    public function show_address(User $user)
    {
        return response()->json(['message'=>'','data'=>$user->address],200);
    }

    public function validateUser(){
        return Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function validateEmail(){
        return Validator::make(request()->all(), [
            'email' => 'required|string|email|max:255',
        ]);
    }
}
