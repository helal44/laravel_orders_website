@extends('layouts.app')


@section('sidebar')
@include('layouts.admin')
@endsection


@section('content')
<div class="container">

          <h4> All Menus :</h4>
        
          <form action="{{route('menu_search')}}" class="d-flex" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="text" name="name" class=" form-control" placeholder=" Enter Menu Name">
            <input type="submit" name="search" value="Search" class=" btn btn-primary mx-1">
          </form>
          @if ($errors->any())
          @foreach ($errors->all() as $item)
              <h5 class="alert alert-danger">{{$item}}</h5>
           @endforeach
          @endif

          <table class=" table table-responsive table-striped table-hover my-3">
            <thead class=" table-info">
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created_at</th>
                <th>Updadted_at</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($menus as $item)
                   <tr>
                 <td><img src="storage/images/{{$item->image->url ?? 'e'}}" alt="img" width="50"></td>
                    {{-- link to menu --}}
                    <td><a href="{{route('edit_menu',$item->id)}}" class="nav nav-link">{{$item->name}}</a></td> 
                    <td>{{Str::limit($item->description,7)}}</td>
                    <td>{{$item->price}} E.P</td>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>{{$item->updated_at->diffForHumans()}}</td>
                    <td> <a href="{{route('delete_menu',$item->id)}}" class=" btn btn-danger">Delete</a></td>
                   </tr>
                @endforeach
            </tbody>
          </table>
      
</div>
@endsection
