@extends('layouts.app')

@section('user')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @foreach ($menu as $item)
              <div class=" row bg-white my-4">
                <div class=" col-md-4">
                  <img src="storage/images/{{$item->image->url ?? 'e'}}" alt="img" width="100%">
                </div>
                <div class=" col-md-8">
                        <h2><a href="{{ route('create_order',$item->id) }}" class=" nav nav-link">{{$item->name}}</a></h2>
                        <h5>{{$item->description}}</h5>
                        <h1>{{$item->price}} E.P</h1>

                </div>

              </div>
          @endforeach
          {{$menu->links()}}
        </div>
    </div>
</div>
@endsection
