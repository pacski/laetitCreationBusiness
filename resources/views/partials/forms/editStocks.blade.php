<form id="form" style="display:none" class="needs-validation px-2 pb-2 col-md-6 align"  action="/stockDetailsEdit/{{$stockDetails->name}}"  method="" enctype="multipart/form-data" novalidate>
    @csrf

        <div class="form-row">
          <div class="col-md-12 mb-12">
            <label for="">Nom :</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Nom"  name="name" value="{{$stockDetails->name}}">
            <div class="valid-feedback">
                        Valide !
            </div>
            <div class="invalid-feedback">
                        Valeur manquante !
            </div>
            @if ($errors->has('name'))
            <p>{{$errors->first('name')}}</p>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 mb-12">
          <label for="">Stock supplémentaire :</label>
          <input type="number" class="form-control" id="validationCustom02" placeholder="Quantité" name="quantity" value="">
            <div class="valid-feedback">
                        Valide !
            </div>
            <div class="invalid-feedback">
                        Valeur manquante !
            </div>
          </div>
        </div>
        {{-- <div class="form-row">
          <div class="col-md-12 mb-12">
            <label for="">Quantité acheté :</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Prix d'achat" name="quantity_buyed" value="{{$stockDetails->quantity_buyed}}" >
            <div class="valid-feedback">
                        Valide !
                    </div>
                    <div class="invalid-feedback">
                        Valeur manquante !
                    </div>
          </div>
        </div> --}}
        <div class="form-row">
          <div class="col-md-12 mb-12 d-flex-row">
            <label for="">Prix :</label>
            <input type="number" class="form-control"  placeholder="Prix" name="price" value="{{$stockDetails->prix}}"  >
            <div class="valid-feedback">
                        Valide !
            </div>
            <div class="invalid-feedback">
                        Valeur manquante !
            </div>
          </div>
        </div>
        <div class="form-row">
          <label for="">Type :</label>
          <div class="col-md-12 mb-12">
            <select class="custom-select col-md-12" name="type" id="">
              <option value="tissus">Tissus</option>
              <option value="zip">Fermeture éclair</option>
              <option value="divers">Autre</option>
          </select>
          </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Photo du tissus</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
        </div>
        
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
            <label class="form-check-label" for="invalidCheck">
              Confirmer l'exactitude des informations
            </label>
            <div class="invalid-feedback">
              Vous devez confirmer l'exactitude des informations
            </div>
          </div>
        </div>
        
        <button class="btn btn-primary  mx-auto" style="width:100%" type="submit">Ajouter tissus</button>
      </form>
      <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    




     
      </script>