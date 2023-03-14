<?php

namespace App\Repository;
use Illuminate\Support\Str;
use App\Interface\AuthInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthRepository implements AuthInterface 
{
    public function register($data)
    {        
        $user = User::create($data);

        auth()->login($user);
    }
    public function forgetpassword($request,$token){
       

        DB::table('password_resets')->insert([
            'email' =>  $request->email,
            'token' => $token,
            'created_at' => Carbon::now()

        ]);
    }
    public function updatepassword($request){
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
    }
    
    
}