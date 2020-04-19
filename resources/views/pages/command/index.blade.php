@extends('layouts/application')

@section('content')
<h1 class="text-center">listes Commandes</h1>

<div class="addFormCommands">
  @include('partials.forms.addCommands')
</div>
<div class="comment-form d-none d-flex flex-column">
  <form class="d-none d-flex flex-column" action="">
      @csrf
      <input type="hidden" name="id" value="" class="comment-command-id">
      <textarea name="comment" id="" cols="30" rows="10" class="add-comment-command"></textarea>
      <br>
      <button class="btn add-comment">Valider</button>
  </form>
</div>
<br>
@include('pages.command.paginate')
<div class="details-command-container d-none">
  <div class="d-flex">
    <div id="details-client"  class="d-flex flex-column">
      <p>Numéro de commande : <strong class="number-command"></strong></p>
      <p>Nom : <strong class="fname"></strong></p>
      <p>Prénom : <strong class="lname"></strong></p>
      <p>Adresse : <strong class="adress"></strong><strong class="postalCode-city"></strong></p>
      <p>Date de la commande : <strong class="date-command"></strong> <strong class="duration"></strong></p>
      <p>Statut : <strong class="status"></strong></p>
      <p>Commentaire : <strong class="comment"></strong> <img class="btn-comment" width="25" height="25" src="https://image.flaticon.com/icons/svg/1380/1380338.svg" alt="" srcset=""></p>
    </div>
    <p class="exit"><button class="btn">X</></p>
  </div>
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
  <hr>
    <div class="d-flex flex-column justify-content-center">
      <form class="status-command-form d-flex-column text-center" method="POST">
        @csrf
        <input type="hidden" name="id" value="" class="status-command-id">
        <div>
          
        </div>
        <label for="">Statut :</label>
        <select class="btn update-status-command" name="status">
          <option value="1">En attente</option>
          <option value="2">Réalisée</option>
          <option value="3">Envoyée</option>
        </select>
        <br>
            <button class="btn justify-content-center btn-delete-command" type="submit">Annuler</button>           
      </form>
    </div>
  

</div>
<script src="/assets/js/command/indexCommand.js"></script>
@endsection

