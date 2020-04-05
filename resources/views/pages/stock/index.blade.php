@extends('layouts/application')

@section('content')
<h1 class="text-center">Stock</h1>
<div class="addFormTissus">
    @include('partials/forms/addStock')
</div>
<hr>
@foreach ($stocks as $item)
  <h1 class="text-center">{{$item[0]->type}}</h1>
  <div class="d-flex justify-content-center flex-wrap">
    @for ($i = 0; $i < $item->count(); $i++)
      <div class="card Regular shadow" style=" margin: 10px;  width: 200px; height: 200px; background-size: cover;background-image:url(images/Stock/{{$item[$i]->image}})" style="width: 18rem;">
        <div class="card-body">
          <br>
        <p class="card-text text-center font-weight-bold text-black" ><a class="text-decoration-none text-dark" href="" >{{$item[$i]->name}}</a></p> 
        <p class="card-text text-center font-weight-bold text-black" >{{$item[$i]->quantity}} {{$item[$i]->quantity_type}}</p>
        </div>
      </div>     
    @endfor
  </div>
  <hr>
@endforeach
@endsection