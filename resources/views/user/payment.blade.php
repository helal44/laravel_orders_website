@extends('layouts.app')

@section('user')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @foreach ($plans as $item )
             <h2>{{$item->name}}</h2>
             <h2>{{$item->slug}}</h2>
             <h2>{{$item->stripe_plan}}</h2>
             <h2>{{$item->price}}</h2>
             <h2>{{$item->descriptions}}</h2>
             <h5><a href="{{route('buy',$item->slug)}}" class=" btn btn-primary">Buy</a></h5>
         @endforeach
        </div>
    </div>
</div>
@endsection
