@extends('layouts.app')

@section('user')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <h3>Contact Us:</h3>

           <form action="{{ route('contact_us') }}" method="POST" class=" bg-white p-5 m-2">
          @csrf
               <label for=""> Enter Your Mrssage :</label>
                <textarea name="name"  rows="10" cols="20" class=" form-control" placeholder=" message ......"></textarea>

                <input type="submit" class=" btn btn-primary m-4 px-4">
            
           </form>
        </div>
    </div>
</div>
@endsection
