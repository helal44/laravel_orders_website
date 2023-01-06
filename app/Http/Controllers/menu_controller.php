<?php

namespace App\Http\Controllers;

use App\Http\Requests\Menu_Request;
use App\Http\Requests\Name_Request;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class menu_controller extends Controller
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
       //
        $name=$r->name;
        $menus=Menu::where('name','like','%'.$name.'%')->get();
        return view('admin.menus.menus',compact('menus'));
        }
        else{
        $menus=Menu::all()->sortByDesc('id');
        return view('admin.menus.menus',compact('menus'));
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
        return view('admin.menus.create_menu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Menu_Request $r)
    {
        //
       
       $image =$r->name.'.'.$r->file('image')->getClientOriginalExtension();
       
    //    Storage::putFile('public/images' , $r->file('image'),$image);
      $r->file('image')->storeAs('public/images',$image);

       Menu::create(['name'=>$r->name,'description'=>$r->description,'price'=>$r->price])->image()->create(['url'=>$image]);
     
        return to_route('view_menus');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Name_Request $request)
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
        $menu=Menu::find($id);
        return view('admin.menus.edit_menu',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $r, $id)
    {
       $menu= Menu::find($id);


        
        $image=$menu->image->url;
        if(File::exists('storage/images/'.$image)){
            File::delete('storage/images/'.$image);
        }

   
       
           
       $menu->update(['name'=>$r->name ,'description'=>$r->description ,'price'=>$r->price]);

        $r->file('image')->storeAs('public/images',$r->name);

        $menu->image->update(['url'=>$r->name]);
        return to_route('view_menus');
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
        $menu=Menu::find($id);
      if($menu->image){
                $image=$menu->image->url;
                if(File::exists('storage/images/'.$image)){
                    File::delete('storage/images/'.$image);
                }
      }
       
        $menu->image()->delete();
        $menu->delete();
        return to_route('view_menus');
    }


  

   
}
