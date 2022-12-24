@extends('layouts.app')

@section('user')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
         <form action="{{ route('order_payment',$menu->id) }}" class=" form-group p-4" method="POST">
            @csrf
            <div class=" row bg-white p-5 m-2">
               <div class=" col-md-4">
           
               <img src="{{ asset('storage/images/'.$menu->image->url) }}"  width="100%">
              
                
               </div>
               
                <div class=" col-md-8">

                    <h1>{{$menu->name}}</h1>
                    <h2>{{$menu->price}}</h2>
                    <h5>{{$menu->description}}</h5>
                    <div class="form-group py-3" >
                        <label for=""> Address</label>
                        <input type="text" name="address" class=" form-control">
                    </div>

                    <div class=" form-group py-3">
                        <label for=""> choose the amount :</label>
                        <input type="number" name="amount" class=" form-control">

                    </div>

                    <input type="submit" class=" btn btn-primary" value="Next">
                </div>
                
            </div>
         </form>
         
        </div>
    </div>
</div>
@endsection
