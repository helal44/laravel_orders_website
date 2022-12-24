<?php

namespace App\Http\Controllers;

use App\Http\Requests\Name_Request;
use App\Http\Requests\user_request;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class user_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        //
        if(isset($r)){
               
         $users=User::where('name','like','%'.$r->name.'%')->with(['role','order'])->get();
         return view('admin.users.users',compact('users'));
        }else{

            $users=User::with(['role','order'])->get();
            return view('admin.users.users',compact('users'));
        }

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Name_Request $r)
    {
       
         
        
        
        
        
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::where('id','=',$id)->with(['role','order'])->first();
        return view('admin.users.edit_user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(user_request $r, $id)
    {
        //
        User::find($id)->update(['name'=>$r->name,'email'=>$r->email,'password'=>$r->password]);

        return to_route('view_users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return to_route('view_users');
    }



    // user _ orders
    public function user_orders($id){
        $orders=Order::where('user_id','=',$id)->with(['user','menu'])->get();
        return view('admin.orders.orders',compact('orders'));

    }

    // user roles

    public function user_roles($id){
        $role=User::where('id','=',$id)->with('role')->first();

        $roles=Role::all();
        return view('admin.users.user_roles',compact('role','roles'));
    }

    // create user role
    public function create_user_role(Name_Request $r,$id){

       $user=User::find($id);
       $role=Role::find($r->name);

       $role_id=$user->role()->where('role_id','=',$role->id);
       if($role_id->count()>0){

        return redirect()->back()->with('message','Role Already Exist');

      
       }else{

        $user->role()->attach($role);
      
        return redirect('user_roles/'.$id);

       }
       
    }


    
    // delet user_roles
    
    public function delete_user_role($r,$u){
            $user=User::find($u);
            $role=Role::find($r);
            $user->role()->detach($role);

            return redirect('user_roles/'.$u);
    }


    
}
