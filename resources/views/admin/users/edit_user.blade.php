@extends('layouts.app')



@section('sidebar')
@include('layouts.admin')
@endsection


@section('content')
<div class="container">
   
          <h4> Edit User :</h4>
          <form action="{{route('update_user',$user->id)}}"  enctype="multipart/form-data" method="POST">
                  @csrf
                  
                <div class=" form-group py-2">
                    <label for="menu">User Name</label>
                  <input type="text" name="name" class=" form-control" value="{{$user->name}}">
                </div>
            
              <div class=" form-group py-2">
                <label for="menu">User Email</label>
                <input type="text" name="email" class=" form-control" value="{{$user->email}}">
              </div>

              <div class=" form-group py-2">
                <label for="menu">User Password</label>
                <input type="text" name="password" class=" form-control" value="{{$user->password}}">
              </div>

                <input type="submit"  value="Update_Menu" class=" btn btn-primary  my-2">
          </form>
          @foreach ($errors->all() as $item)
          <h5 class=" alert alert-danger">{{$item}}</h5>
          @endforeach
       
</div>
@endsection
