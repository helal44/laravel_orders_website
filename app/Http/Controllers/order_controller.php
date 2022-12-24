<?php

namespace App\Http\Controllers;

use App\Http\Requests\Name_Request;
use App\Http\Requests\order_request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class order_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        if(isset($r)){
            $orders=Order::with(['menu','user'])->whereHas('user',function($q)use($r){
                $q->where('name','like','%'. $r->name.'%');
        })->get();
        return view('admin.orders.orders',compact('orders'));
        }
        else{
        $orders=Order::with('user','menu')->get();
        return view('admin.orders.orders',compact('orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
            if(Gate::allows('myuser')){
                
             $menu=Menu::where('id',$id)->with('image')->first();
             return view('user.order',compact('menu'));
            }
            else{
                return redirect('home');
            }
    }

    

    public function payment(Request $r,$id){
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r,$id)
    {
        //

       if(Gate::allows('myuser')){

        $order=new Order;
        $order->user_id=auth()->user()->id;
        $order->menu_id=$id;
        $order->amount=$r->amount;
        $order->address=$r->address;
        $order->status='processing';
        $order->save();
        return view('user.payment',compact('order'));
       }
       else{
        return redirect('home');
       }
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
        $order=Order::where('id','=',$id)->with(['menu','user'])->first();
        return view('admin.orders.edit',compact('order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(order_request $r, $id)
    {
        $order=Order::find($id);

        $order->menu()->update(['name'=>$r->menu_name]);
        $order->user()->update(['name'=>$r->user_name]);

        $order->update(['amount'=>$r->amount,'address'=>$r->address,'status'=>$r->status]);

        return redirect('view_orders');
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
        Order::find($id)->delete();
        return to_route('view_orders');
    }
}
