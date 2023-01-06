<?php

use App\Http\Controllers\contact_controller;
use App\Http\Controllers\menu_controller;
use App\Http\Controllers\order_controller;
use App\Http\Controllers\Role_controller;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripePayment_Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// email  actions

use Illuminate\Foundation\Auth\EmailVerificationRequest;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



// public youser route 
Route::middleware('myroute')->group(function(){

    
Route::get('/home',HomeController::class)->name('home');
Route::get('aboutus',function(){  return view('user.about'); })->name('about');
Route::get('contact' ,function(){  return view('user.contact'); })->name('contact');
Route::post('contact_us',[contact_controller::class,'store'])->name('contact_us');

Route::controller(order_controller::class)->group(function(){

     //create_order
     Route::get('create_order/{id}','create')->name('create_order');

     //payment
     Route::post('order_payment/{id}','store')->name('order_payment');
});

});



Auth::routes(['verify'=>true]);
Route::redirect('','home');


// middleware --->

Route::middleware('user')->group(function(){


        // menus secions ----------->
        Route::controller(menu_controller::class)->group(function(){
            // view all menus
            Route::get('view_menus','index')->name('view_menus');

            //search _menu
            Route::post('search_menu','index')->name('menu_search');

            // create_menu 
            Route::get('create_menu','create')->name('create_menu');

            
            // store_menu 
            Route::post('store_menu','store')->name('store_menu');

            // edit_menu
            Route::get('edit_menu/{id}','edit')->name('edit_menu');

            // update_menu
            Route::post('update_menu/{id}','update')->name('update_menu');

            // delete menu
            Route::get('delete_menu/{id}','destroy')->name('delete_menu');
        });


        // orders section  ------>
        Route::controller(order_controller::class)->group(function(){
            // view orders 
            Route::get('view_orders','index')->name('view_orders');

           

            //search
            Route::post('search_order','index')->name('search_order');

            // edit order
            Route::get('edit_order/{id}','edit')->name('edit_order');

            //update order
            Route::post('updadte_order/{id}','update')->name('update_order');

            //delete order
            Route::get('delete_order/{id}','destroy')->name('delete_order');

        });

        // users section ----------->
        Route::controller(user_controller::class)->group(function(){

            //view all ausers
            Route::get('view_users','index')->name('view_users');
            
            //search user
            Route::post('search_user','index')->name('search_user');

            // edit user 
            Route::get('edit_user/{id}','edit')->name('edit_user');

            //update user 
            Route::post('update_user/{id}','update')->name('update_user');

            //delete usre
            Route::get('delete_user/{id}','destroy')->name('delete_user');

            // users_orders
            Route::get('user_order/{id}','user_orders')->name('user_orders');

            // user_roles
            Route::get('user_roles/{id}','user_roles')->name('user_roles');

            //create user role
            Route::post('create_user_role/{id}','create_user_role')->name('create_user_role');

            // delete user role
            Route::get('delete_user_role/{r}/{u}','delete_user_role')->name('delete_user_role');

        });

        // role section ----->$_COOKIE

        Route::controller(Role_controller::class)->group(function(){

            // view all Roles
            Route::get('roles','index')->name('view_roles');

            //delete rol
            Route::get('delete_role/{id}','destroy')->name('delete_role');

            // create role
            Route::post('create_role','store')->name('create_role');
        });

        // contact sections
        Route::controller(contact_controller::class)->group(function(){
            Route::get('view_contacts','index')->name('view_contacts');
            Route::get('delete_contact/{id}','destroy')->name('delete_contact');
        });

});


 // payment gate away

 Route::controller(StripePayment_Controller::class)->group(function(){
    Route::post('stripe', 'stripe')->name('payment');
    Route::post('mystripe', 'stripePost')->name('stripe.post');
});



// email verfication  

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');










//test 
Route::get('scope',function(){
   Log::info('okkkkkkkkkkkkkk');
   echo 'sssssssssss';
   
 
});

