@extends('layouts.app')



@section('sidebar')
@include('layouts.admin')
@endsection


@section('content')
<div class="container">

          <h4> Edit Order :</h4>
          <form  method="POST" enctype="multipart/form-data" action="{{route('update_order',$order->id)}}">
                  @csrf
                  <div class=" form-group my-2">
                    <label for="user_name">User Name</label>
                    <input type="text" class=" form-control" name="user_name" value="{{$order->user->name}}" readonly>

                  </div>
                  <div class=" form-group my-2">
                    <label for="menu_name">Menu Item</label>
                    <input type="text" class=" form-control" name="menu_name" value="{{$order->menu->name}}">

                  </div>
                  <div class=" form-group my-2">
                    <label for="amount">Amount</label>
                    <input type="text" class=" form-control" name="amount" value="{{$order->amount}}">

                  </div>
                  <div class=" form-group my-2">
                    <label for="total_price">Total_price</label>
                    <input type="number" class=" form-control" name="total_price" value="{{$order->menu->price * $order->amount}}" readonly>

                  </div>
                  <div class=" form-group my-2">
                    <label for="address">Address</label>
                    <input type="text" class=" form-control" name="address" value="{{$order->address}}">

                  </div>
                  <div class=" form-group my-2">
                    <label for="status">Status</label>
                    <select name="status" class=" form-control">
                        <option value="{{$order->status}}">{{$order->status}}</option>
                        <option value="done">done</option>
                        <option value="canceled">canceled</option>
                    </select>

                  </div>
                  <input type="submit" value="Edit_order" class=" btn btn-primary">
              
                  
          </form>


          @foreach ($errors->all() as $item)
          <h5 class=" alert alert-danger">{{$item}}</h5>
          @endforeach
       
</div>
@endsection
