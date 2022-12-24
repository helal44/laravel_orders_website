<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
                // /**
                //  * Create a new controller instance.
                //  *
                //  * @return void
                //  */
                public function __construct()
                {
                    $this->middleware(['auth','verified']);
                }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        if(Gate::allows('myuser')){
           
          $menu=Menu::paginate(5);
          return view('user.index',compact('menu'));
          
        }else{
            return redirect('login');
        }
    }
}
