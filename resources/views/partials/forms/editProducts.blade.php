<form id="form" style="display:none" class="needs-validation px-2 pb-2 col-md-6 align"  action="/produitEdit/{{$product->name}}"  method="" enctype="multipart/form-data" novalidate>
    @csrf

        <div class="form-row">
          <div class="col-md-12 mb-12">
            <input type="text" class="form-control" id="validationCustom01"  name="name" value="{{$product->name}}">
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
          <input type="text" class="form-control" id="validationCustom02" placeholder="description" name="description" value="{{$product->description}}">
          <div class="valid-feedback">
              Valide !
          </div>
          <div class="invalid-feedback">
              Valeur manquante !
          </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 mb-12">
            <input type="number" class="form-control" id="validationCustom02" placeholder="prix" name="price" value="{{$product->price}}" >
            <div class="valid-feedback">
                Valide !
            </div>
            <div class="invalid-feedback">
                Valeur manquante !
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 mb-12">
            <input type="number" class="form-control"  placeholder="coût de production" name="cost" value="{{$product->cost}}"  >
            <div class="valid-feedback">
                Valide !
            </div>
            <div class="invalid-feedback">
                Valeur manquante !
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 mb-12">
            <input type="number" class="form-control"  placeholder="Temps de production" name="production_time" value="{{$product->production_time}}" >
            <div class="valid-feedback">
                Valide !
            </div>
            <div class="invalid-feedback">
                Valeur manquante !
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 mb-12">
            <select class="custom-select col-md-12" name="type" id="">
              <option name="type" selected>Type</option>
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
        <div class="form-row d-flex justify-content-center" id="materiel1">
          <div class="form-group col-md-6">
              <select  class="custom-select" name="materiel_1" >
                  <option value="" selected>Materiel 1</option>
                  @foreach ($stock as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                  @endforeach
              </select>            
              <div class="valid-feedback">
                        Valide !
                    </div>
                    <div class="invalid-feedback">
                        Valeur manquante !</div>
            </div>
            <div class="form-group col-md-6">
                <select class="custom-select" name="quantity_1" >
                    <option value="" selected>Quantité</option>
                    <option  value="1">1</option>
                    <option  value="2">2</option>
                    <option  value="3">3</option>
                </select>             
                <div class="valid-feedback">
                        Valide !
                </div>
                <div class="invalid-feedback">
                          Valeur manquante !
                </div>
            </div>
        </div>      
        <div style="display:none" class="form-row d-flex-none justify-content-center" id="materiel2">
          <div class="form-group col-md-6">
              <select class="custom-select" name="materiel_2" >
                  <option value="" selected>Materiel 2</option>
                  @foreach ($stock as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                  @endforeach
              </select>            
              <div class="valid-feedback">
                        Valide !
              </div>
              <div class="invalid-feedback">
                        Valeur manquante !
              </div>
            </div>
            <div class="form-group col-md-6">
                <select class="custom-select" name="quantity_2" >
                    <option value="" selected>Quantité</option>
                    <option  value="1">1</option>
                    <option  value="2">2</option>
                    <option  value="3">3</option>
                </select>             
                <div class="valid-feedback">
                        Valide !
                </div>
                <div class="invalid-feedback">
                        Valeur manquante !
                </div>
            </div>
        </div>      
        <div style="display:none" class="form-row d-flex-none justify-content-center" id="materiel3">
          <div class="form-group col-md-6">
              <select class="custom-select" name="materiel_3" >
                  <option value="" selected>Materiel 3</option>
                  @foreach ($stock as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                  @endforeach
              </select>            
              <div class="valid-feedback">
                        Valide !
              </div>
              <div class="invalid-feedback">
                        Valeur manquante !
              </div>
            </div>
            <div class="form-group col-md-6">
                <select class="custom-select" name="quantity_3" >
                    <option value="" selected>Quantité</option>
                    <option  value="1">1</option>
                    <option  value="2">2</option>
                    <option  value="3">3</option>
                </select>             
                <div class="invalid-feedback">
                Please provide a valid time.
              </div>
            </div>
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
    


      // gestion des input materiel 

      var materiel1 = document.getElementById('materiel1')
      var materiel2 = document.getElementById('materiel2')
      var materiel3 = document.getElementById('materiel3')

      materiel1.addEventListener("change", function(e){

        if(e.target.value != ""){
            console.log(e.target.value)

            materiel2.removeAttribute('style')
            materiel2.className = "form-row d-flex justify-content-center"
        }else{
            console.log(e.target.value)

            materiel2.style.display = "none"
            materiel2.removeAttribute('class')


        }
      
      })

      materiel2.addEventListener("change", function(e){

        if(e.target.value != ""){

            materiel3.removeAttribute('style')
            materiel3.className = "form-row d-flex justify-content-center"
        }else{
            materiel3.removeAttribute('class')
            materiel3.style.display = "none"

        }
      })



     
      </script>