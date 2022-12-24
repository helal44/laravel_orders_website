@extends('layouts.app')



@section('sidebar')
@include('layouts.admin')
@endsection


@section('content')
<div class="container">

          <h4> Create Menu :</h4>
          <form action="{{route('store_menu')}}"  enctype="multipart/form-data" method="POST">
                  @csrf
                <div class=" form-group py-2">
                    <label for="menu">Enter Menu Name</label>
                  <input type="text" name="name" class=" form-control">
                </div>
            
                <div class=" form-group py-2">
                  <label for="menu">Enter Menu Description</label>
                <textarea name="description" i cols="30" rows="10" class=" form-control"></textarea>
              </div>

              <div class=" form-group py-2">
                <label for="menu">Enter Menu price</label>
                <input type="number" name="price" class=" form-control">
              </div>

              <div class=" form-group py-2">
                <label for="menu">Enter Menu Image</label>
                <input type="file" name="image" class=" form-control">
              </div>
                <input type="submit"  value="Create_Menu" class=" btn btn-primary  my-2">
          </form>
          @foreach ($errors->all() as $item)
          <h5 class=" alert alert-danger">{{$item}}</h5>
          @endforeach
      
</div>
@endsection
