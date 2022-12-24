@extends('layouts.app')



@section('sidebar')
@include('layouts.admin')
@endsection

@section('content')
<div class="container">

           <h3>Orders</h3>

           <form action="{{route('search_order')}}" class="d-flex  py-3" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="text" name="name" class=" form-control" placeholder=" Enter User Name">
            <input type="submit" name="search" value="Search" class=" btn btn-primary">
          </form>
            @if ($errors->any())
           @foreach ($errors->all() as $item)
              <h5 class="alert alert-danger">{{$item}}</h5>
            @endforeach
          @endif

           <table class=" table table-responsive table-hover">
            <thead class=" table-info">
                <th>User</th>
                <th>Menu_item</th>
                <th>Amount</th>
                <th>Total_price</th>
                <th>Address</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>{{$item->user->name}}</td>
                       <td><a href="{{route('edit_order',$item->id)}}" class=" nav nav-link">{{$item->menu->name}}</a></td>
                       <td>{{$item->amount}}</td>
                       <td>{{$item->amount * $item->menu->price}} E.P</td>
                       <td>{{Str::limit($item->address,5)}}</td>
                       <td>{{$item->status}}</td>
                       <td>{{$item->created_at->diffForHumans()}}</td>
                       <td>{{$item->updated_at->diffForHumans()}}</td>
                       <td><a href="{{route('delete_order',$item->id)}}" class=" btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>

           </table>
       
</div>
@endsection
