<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @stack('name')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/general.css" rel="stylesheet">
    <link href="/css/nav.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link href="/css/accueil.css" rel="stylesheet">
    <link href="/css/productCarrousel.css" rel="stylesheet">
    <link href="/css/listeDesCommandes.css" rel="stylesheet">
    <link href="/css/command/command.css" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.min.js"></script>
<script src="https://unpkg.com/vue-chartjs@2.5.7-rc3/dist/vue-chartjs.full.min.js"></script>
</head>
<body>
    @include('layouts/nav')
    @yield('content')
    {{-- @include('layouts/partials/footer') --}}
    <script src="/js/app.js"></script>
    <script src="{{ asset(mix('js/front.js')) }}"></script>
    <script src="{{ asset(mix('js/admin.js')) }}"></script>
</body>
</html>