@extends('layouts.app')


@section('sidebar')
@include('layouts.admin')
@endsection


@section('content')
<div class="container">
 
           <h3>contacts:</h3>

           <table class=" table table-responsive table-striped table-hover">
            <thead class=" table-info">
                <th>User</th>
                <th>Message</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($contacts as $item)
                <tr>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->message}}</td>
                    <td><a href="{{ route('delete_contact',$item->id) }}" class=" btn btn-danger">Delete</a></td>
                </tr>>
                    
                @endforeach
            </tbody>

           </table>
    
</div>
@endsection
