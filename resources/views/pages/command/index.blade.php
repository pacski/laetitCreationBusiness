@extends('layouts/application')

@section('content')
<h1 class="text-center">listes Commandes</h1>

<div class="addFormCommands">
  @include('partials.forms.addCommands')
</div>
<br>
@include('pages.command.paginate')
<div class="details-command-container d-none">
  <div class="d-flex">
    <div  class="d-flex flex-column">
        <h3 class="number-command"></h3>
        <p class="fname-lname"></p>
        <p class="adress"></p>
        <p class="postalCode-city">Code postal Ville</p>
    </div>
    <div>
      <img class="origin-command" width="90" src="https://www.flaticon.com/premium-icon/icons/svg/2275/2275956.svg" alt="">
      <p class="date-command">date de la commande</p>
      <p class="status">Statut</p>
    </div>
    <p class="exit"><button class="btn">X</></p>
  </div>
  <hr>
  <h3>Details Commande</h3>
  <div class="overflow-auto" style="height: 200px">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">Tissu</th>
              <th scope="col">Produit</th>
              <th scope="col">Quantité</th>
              <th scope="col">Prix</th>
            </tr>
          </thead>
          <tbody>

          @for ($i = 0; $i < 10; $i++)
          <tr class="article-{{$i}} d-none">
            <th scope="row"><img class="img-{{$i}}" width="30" src="" alt=""></th>
            <td class="product-{{$i}}"></td>
            <td class="quantity-{{$i}}"></td>
            <td class="price-{{$i}}"></td>
          </tr>   
          @endfor
          </tbody>
          <tfoot>
            <tr>
              <td>Articles : </td>
              <td class="totalArticle"></td>
              <td>Total : </td>
              <td class="totalPrice"></td>
            </tr>
          </tfoot>
        </table>
  </div>
 
</div>

<script src="/assets/js/command/indexCommand.js"></script>

@endsection

