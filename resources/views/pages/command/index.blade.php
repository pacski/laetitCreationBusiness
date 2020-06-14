@extends('layouts/application')

@section('content')
<h1 id="command-page" class="text-center">listes Commandes</h1>

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
<div id="app">
  <list-command></list-command>
</div>
</div>
<script src="/js/front/command/addCommand.js"></script>
@endsection

