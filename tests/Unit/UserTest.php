<?php

namespace Tests\Unit;
use Illuminate\Support\Facades\Gate;
use App\Models\Menu;
use Illuminate\Support\Facades\Request;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
  

    //login
    public function test_login(){
        $respons=$this->get('login');
        $respons->assertStatus(200);
    }
    

    //home
    public function test_home(){
        $respons=$this->get('home');

        if(Gate::allows('myuser')){
           
            $respons->assertViewIs('user.index','menu');
            
          }else{
            $respons->assertRedirect('login');
          } 
    }


    // view users 
    public function test_view_users(){
        $respons=$this->get('edit_user/{id}');
        
            $respons->assertViewIs('admin.users.edit_user','user');
        
    }

}
