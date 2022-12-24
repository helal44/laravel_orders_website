<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class user_controller extends Controller
{
    
        // register  
    public function register(Request $r){

        $user=User::create([
            'name'=>$r->name,
            'email'=>$r->email,
            'password'=>Hash::make($r->password)
        ]);

        return ([
            'user'=>$user,
            'token'=>$user->createToken('api tokrn of'.$user->name)->plainTextToken
        ]);
    }


    // login 
    public function login(Request $r){
        if(!Auth::attempt($r->only(['email','password']))){
            return ('not exist');
        }

        $user=User::where('email',$r->email)->first();

        return([
            'user'=>$user,
            'token'=>$user->createToken('apitoken'.$user->name),
        ]);

    }


    //  logout 
     public function logout(){

        Auth::user()->currentAccessToken()->delete();
        return('you are loged out');
     }


    //menu
     public function menus(){
        $menu=Menu::all();
        return response()->json($menu);
     }
}
