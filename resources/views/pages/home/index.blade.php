@extends('layouts/application')

@section('content')
<h1>Accueil</h1>
<div id="app">
    <example-component></example-component>
    <stats-month></stats-month>
    <text-form  ></text-form>
    {{-- <text-form  :data-users={{$users}}></text-form> --}}
</div>
@endsection
