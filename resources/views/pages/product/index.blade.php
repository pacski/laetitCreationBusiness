@extends('layouts/application')

@section('content')
<h1 class="text-center">Liste produits</h1>
@include('partials.forms.addProducts')
<hr>
<div class="table-responsive text-nowrap d-flex justify-content-center flex-wrap">

        @foreach ($products as $product)
        <div  class="card Regular shadow" style=" margin: 10px;  width: 20%; height: 100%; background-size: cover;background-image:url(images/Product/{{ $product->image}})" style="width: 18rem;">
            <div class="card-body">
              <br>
              <p class="card-text text-center font-weight-bold text-black" ><a class="text-decoration-none text-dark" href="">{{$product->name}}</a></p>
              <p class="card-text text-center font-weight-bold text-black" >{{$product->nbmade}} produite</p>
              <p class="card-text text-center font-weight-bold text-black" >{{$product->cost}} cm</p>
              <p class="card-text text-center font-weight-bold text-black" >{{$product->price}}€</p>
              <p class="card-text text-center font-weight-bold text-black" >{{$product->productionTime}} min</p>
            </div>
        </div> 
        @endforeach
</div>


@endsection
