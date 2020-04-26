@extends('layouts/application')

@section('content')
<h1>Accueil</h1>
<div id="app" class="d-flex- flex-nowrap">
    {{-- <example-component></example-component> --}}
    {{-- <stats-month></stats-month> --}}
    {{-- <text-form></text-form>
    <text-form  :data-users={{$users}}></text-form>
    <hr> --}}
        <div class="d-flex flex-nowrap">
                <stats-keys-figures></stats-keys-figures>
        </div>
        <div class="d-flex flex-nowrap">
                <stats-product></stats-product>
        </div>
        {{-- <div class="d-flex flex-nowrap">
                <stats-best-product></stats-best-product>
        </div> --}}
        {{-- <div class="d-flex flex-nowrap">
        </div> --}}

        {{-- <div class="d-flex flex-nowrap">
                <stats-year></stats-year>
                <stats-origin></stats-origin>
        </div>
  --}}

</div>
@endsection
