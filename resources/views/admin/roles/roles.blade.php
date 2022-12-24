@extends('layouts.app')



@section('sidebar')
@include('layouts.admin')
@endsection


@section('content')
<div class="container">
   
           <h3>Roles</h3>

                <form action="{{route('create_role')}}" method="POST" class=" d-flex">
                    @csrf
                        <input type="text" name="name" class=" form-control" placeholder="Enter Role Name">
                        <input type="submit" value="Create_Role" class=" btn btn-primary">
                </form>

                @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <h5 class="alert alert-danger">{{$item}}</h5>
                 @endforeach
                @endif

           <table class=" table table-striped table-hover my-4">
                <thead class=" table-info ">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created_at</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                        <td><a href="{{route('delete_role',$item->id)}}" class=" btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
           </table>
          
      
    
</div>
@endsection
