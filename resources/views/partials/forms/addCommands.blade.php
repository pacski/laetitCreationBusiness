<form class="needs-validation px-2 pb-2" action="{{route('pages.command.create')}}" method="post" novalidate>
    @csrf

        <div   class="form-row">
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Nom" name="lname" required>
            <div class="valid-feedback">
              Valide !
            </div>
            <div class="invalid-feedback">
              Valeur manquante !
            </div>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Prénom" name="fname" required>
            <div class="valid-feedback">
              Valide !
            </div>
            <div class="invalid-feedback">
              Valeur manquante !
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4">
            <input type="text" class="form-control"  placeholder="Adresse" name="adresse" required>
            <div class="valid-feedback">
              Valide !
            </div>
            <div class="invalid-feedback">
              Valeur manquante !
            </div>
          </div>
          <div class="col-md-4">
            <input type="number" class="form-control"  placeholder="Code postal" name="postalCode" required>
            <div class="valid-feedback">
              Valide !
            </div>
            <div class="invalid-feedback">
              Valeur manquante !
            </div>
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Ville" name="city" required>
            <div class="valid-feedback">
              Valide !
            </div>
            <div class="invalid-feedback">
              Valeur manquante !
            </div>
          </div>
        </div>

        <div class="form-row">
        <div class="col-md-12 -12">
          <select class="custom-select col-md-12" name="origin" >
            <option name="origin" selected>Origine de la vente</option>
            <option value="Etsy">Etsy</option>
            <option value="Vinted">Vinted</option>
            <option value="Instagram">Instagram</option>
          </select>
        </div>
        </div>

    <br>
    <br>
   
        <div id="produit-1" class="form-row ">
            <div class="form-group col-md-4">
                <select class="custom-select product-1"  name="product-1">
                    <option value="product-none-1" selected>Produit 1</option>
                    @foreach ($products as $product)
                      <option value="{{$product->name}}">{{$product->name}} ({{$product->cost}} cm)</option>
                    @endforeach
                </select>            
                <div class="valid-feedback">
                  Valide !
                </div>
                <div class="invalid-feedback">
                  Valeur manquante !
                </div>
              </div>
              <div class="form-group col-md-4">
                  <select class="custom-select" name="quantity-1" >
                      <option name="quantity-1" selected>Quantité</option>
                      @for ($i = 1; $i < 100; $i++)
                      <option  value="{{$i}}">{{$i}}</option>
                      @endfor
                  </select>             
                  <div class="valid-feedback">
                    Valide !
                  </div>
                  <div class="invalid-feedback">
                    Valeur manquante !
                  </div>
              </div>
              <div class="form-group col-md-4">
                  <select class="custom-select" name="tissu-1"  >
                      <option selected>Tissu</option>
                      @if (isset($fabrics))
                      @foreach ($fabrics as $fabric)
                        <option value="{{$fabric->name}}">{{$fabric->name}} ({{$fabric->quantity}} cm)</option>
                      @endforeach    
                      @endif
                      
                  </select>             
                  <div class="valid-feedback">
                    Valide !
                  </div>
                  <div class="invalid-feedback">
                    Valeur manquante !
                  </div>
              </div>
        </div>
        @for ($i = 2; $i < $products->count() + 1; $i++)
          <div id="produit-{{$i}}"  class="form-row d-none">
            <div class="form-group col-md-4">
                <select class="custom-select product-{{$i}}" name="product-{{$i}}" >
                    <option name="product-{{$i}}" value="product-none-{{$i}}" selected>Produit {{$i}}</option>
                    @foreach ($products as $product)
                      <option value="{{$product->name}}">{{$product->name}} ({{$product->cost}} cm)</option>
                    @endforeach
                </select>            
                <div class="valid-feedback">
                  Valide !
                </div>
                <div class="invalid-feedback">
                  Valeur manquante !
                </div>
              </div>
              <div class="form-group col-md-4">
                  <select  class="custom-select" name="quantity-{{$i}}" >
                      <option value="" selected>Quantité</option>
                      @for ($j = 1; $j < 100; $j++)
                        <option  value="{{$j}}">{{$j}}</option>
                      @endfor
                  </select>             
                  <div class="valid-feedback">
                    Valide !
                  </div>
                  <div class="invalid-feedback">
                    Valeur manquante !
                  </div>
              </div>
              <div class="form-group col-md-4">
                  <select class="custom-select" name="tissu-{{$i}}" >
                      <option selected>Tissu</option>
                      @foreach ($fabrics as $fabric)
                        <option value="{{$fabric->name}}">{{$fabric->name}} ({{$fabric
                        ->quantity}} cm)</option>
                      @endforeach
                  </select>             
                  <div class="valid-feedback">
                    Valide !
                  </div>
                  <div class="invalid-feedback">
                    Valeur manquante !
                  </div>
              </div>
          </div>
        @endfor

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Confirmer la validité des informations
            </label>
            <div class="invalid-feedback">
              Vous devez d'abord Confirmer
            </div>
          </div>
        </div>
        
        <button class="btn btn-primary mx-auto" style="width:100%" type="submit">Ajouter commande</button>
      </form>
     
      <script src="/assets/js/command/addCommand.js"></script>