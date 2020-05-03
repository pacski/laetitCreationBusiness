@extends('layouts/application')

@section('content')
<h1 class="text-center">Fabric</h1>

<div class="addFormTissus">
    @include('partials.forms.addFabrics')
</div>
<hr>
<div id="app">
  <fabric-card></fabric-card>
</div>
{{-- <hr>
<div class="d-flex justify-content-center flex-nowrap">
  @foreach ($fabrics as $item)
        <div class="card Regular shadow" style=" margin: 10px;  width: 250px; height: 250px; background-size: cover;background-image:url(images/Fabric/{{$item->image}})" style="width: 18rem;">
          <div class="card-body">
            <br>
          <p class="card-text text-center font-weight-bold text-black" ><a class="text-decoration-none text-dark" href="" >{{$item->name}}</a></p> 
          <p class="card-text text-center font-weight-bold text-black" >Stock :{{$item->quantity}} cm</p>
          </div>
        </div>     
  @endforeach
</div> --}}

@endsection