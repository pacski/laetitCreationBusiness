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
      {{-- <img class="origin-command" width="90" src="https://www.flaticon.com/premium-icon/icons/svg/2275/2275956.svg" alt=""> --}}
      <p class="date-command"></p>
      <i class="status">Statut</i>
    </div>
    <p class="exit"><button class="btn">X</></p>
  </div>
  <hr>
  <h3 class="text-center">Detail de la commande</h3>
  <div class="overflow-auto" id="table-articles">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">Tissu</th>
              <th scope="col">Produit</th>
              <th scope="col">Quantité</th>
              <th scope="col">Prix</th>
            </tr>
          </thead>
          <tbody class="tbody-articles">
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

