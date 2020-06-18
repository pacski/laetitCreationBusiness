@extends('layouts/application')

@section('content')

<div id="app" class="d-flex- flex-nowrap">
    <div class="d-flex flex-nowrap">
        <stats-keys-figures></stats-keys-figures>
    </div>
    <div class="d-flex flex-nowrap" >
        <stats-product></stats-product>
        <stats-year></stats-year>
    </div>
    <div class="d-flex flex-nowrap">
        <stats-origin></stats-origin>
        <stats-best-product></stats-best-product>
    </div>
</div>
@endsection