@extends('layouts.app')



@section('sidebar')
@include('layouts.admin')
@endsection


@section('content')
<div class="container">
   
          <h4> All Users :</h4>
        
          <form action="{{route('search_user')}}" class="d-flex" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="text" name="name" class=" form-control" placeholder=" Enter Menu Name">
            <input type="submit" name="search" value="Search" class=" btn btn-primary">
          </form>
          @if ($errors->any())
          @foreach ($errors->all() as $item)
              <h5 class="alert alert-danger">{{$item}}</h5>
           @endforeach
          @endif

          <table class=" table table-responsive table-striped  my-3">
            <thead class=" table-info ">
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified at</th>
                <th>Password</th>
                <th>Role</th>
                <th>Orders</th>
                <th>Created_at</th>
                <th>Updadted_at</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($users as $item)
                   <tr>
                    {{-- link to menu --}}
                    <td><a href="{{route('edit_user',$item->id)}}" class="nav nav-link">{{$item->name}}</a></td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->email_verified_at ?$item->email_verified_at->diffForHumans():''}}</td>
                    <td>{{Str::limit($item->password,10)}}</td>

                 
                    <td> <a href="{{route('user_roles',$item->id)}}" class=" nav nav-link">Role</a></td>
                  
                   @if ($item->order->count() > 0)
                   <td><a href="{{route('user_orders',$item->id)}}" class=" nav nav-link">Orders</a></td>    
                 @else
                 <td></td>
                     
                  @endif
                  
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>{{$item->updated_at->diffForHumans()}}</td>
                    <td> <a href="{{route('delete_user',$item->id)}}" class=" btn btn-danger">Delete</a></td>
                   </tr>
                @endforeach
            </tbody>
          </table>
       
</div>
@endsection
