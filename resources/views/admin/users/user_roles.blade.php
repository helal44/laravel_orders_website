@extends('layouts.app')



@section('sidebar')
@include('layouts.admin')
@endsection


@section('content')
<div class="container">
   
           All User:: <a href="{{ route('view_users') }}" class=" btn btn-info"> {{$role->name}}</a>  Roles

           <form action="{{route('create_user_role',$role->id)}}" method="POST" class=" d-flex py-2">
            @csrf
            <select name="name" class=" form-control">
                @foreach ($roles as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
                    <input type="submit" class=" btn btn-primary" value="create_role">
           </form>
           @if (session('message'))
               <h5 class=" alert alert-danger">{{session('message')}}</h5>
           @endif

          <table class=" table table-responsive table-striped my-3 table-hover">
            <thead class=" table-info">
                <th>ID</th>
                <th>Role</th>
                <th>Action</th>
                
                
            </thead>
            <tbody>
             @if ($role->role->count()>0)
             @foreach ($role->role as $i)
              
             <tr>
               <td>{{$i->id}}</td>
               <td>{{$i->name}}</td>
               <td><a href="{{route('delete_user_role',[$i->id,$role->id])}}" class=" btn btn-danger">Delete</a></td>
             </tr> 
         
            @endforeach     
                 
             @endif
            </tbody>
          </table>
       
</div>
@endsection
