<form class="d-flex flex-column" action="/liste_des_commandesEdit/{{$numCommand->number}}" method="get">
        <input class="form-control" type="text" name="name" value="{{$numCommand->name}}" id="">
        <input class="form-control" type="text" name="adresse" id="" value="{{$numCommand->adresse}}">
        <select class="custom-select " name="origin" >
            <option value="{{$numCommand->origin}}">{{$numCommand->origin}}</option>
            @if ($numCommand->origin == "Etsy" )
            <option value="Vinted">Vinted</option>
            <option value="Instagram">Instagram</option>
            @elseif($numCommand->origin == "Vinted" )
            <option value="Etsy">Etsy</option>
            <option value="Instagram">Instagram</option>
            @elseif($numCommand->origin == "Instagram" )
            <option value="Etsy">Etsy</option>
            <option value="Vinted">Vinted</option>
            @endif           
        </select>
        <div id="produit1" class="form-row">
                <div class="form-group col-md-4">
                    <select class="custom-select"  name="product_1" onchange="myFunction()">
                        <option name="product_1" value="" >Produit 1</option>
                        @foreach ($products as $product)
                          <option value="{{$product->name}}" selected>{{$product->name}} ({{$product->cost}} cm)</option>
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
                      <select class="custom-select" name="quantity_1" >
                          <option name="quantity_1" >Quantité</option>
                          <option  value="1" selected>1</option>
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
                  <div class="form-group col-md-4">
                      <select class="custom-select" name="tissu_1"  >
                          <option >Tissu</option>
                          @foreach ($tissuses as $tissue)
                            <option value="{{$tissue->image}}" selected>{{$tissue->name}} ({{$tissue->quantity}} cm)</option>
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
        <div style="display:none" id="produit2"  class="form-row ">
                <div class="form-group col-md-4">
                    <select class="custom-select" name="product_2" >
                        <option name="product_2" value="">Produit 2</option>
                        @foreach ($products as $product)
                          <option value="{{$product->name}}" >{{$product->name}} ({{$product->cost}} cm</option>
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
                      <select  class="custom-select" name="quantity_2" >
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
                  <div class="form-group col-md-4">
                      <select class="custom-select" name="tissu_2" >
                          <option selected>Tissu</option>
                          @foreach ($tissuses as $tissue)
                            <option value="{{$tissue->image}}">{{$tissue->name}} ({{$tissue->quantity}} cm)</option>
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
        <div style="display:none" id="produit3" class="form-row">
                <div class="form-group col-md-4">
                    <select class="custom-select" name="product_3" >
                        <option value="" selected>Produit 3</option>
                        @foreach ($products as $product)
                          <option value="{{$product->name}}">{{$product->name}} ({{$product->cost}} cm</option>
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
                      <select class="custom-select" name="quantity_3" >
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
                  <div class="form-group col-md-4">
                      <select class="custom-select" name="tissu_3" >
                          <option value="" selected>Tissu</option>
                          @foreach ($tissuses as $tissue)
                            <option  value="{{$tissue->image}}">{{$tissue->name}} ({{$tissue->quantity}} cm)</option>
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
        <button class="btn btn-primary mx-auto" style="width:100%" type="submit">Modifier commande</button>


</form>

<script>

   // gestion des input produit 

   var produit1 = document.getElementById('produit1')
          var produit2 = document.getElementById('produit2')
          var produit3 = document.getElementById('produit3')

        produit1.addEventListener("change", function(e){

            if(e.target.value != "" ){
              console.log(e.target.value)
              produit2.removeAttribute('style')
              produit2.className = "form-row"
            }
            else{
              console.log(e.target.value)
              produit2.style.display = "none"

            }
            

        })

        produit2.addEventListener("change", function(e){

            if(e.target.value != "" ){

              produit3.removeAttribute('style')
              produit3.className = "form-row"
            }
            else{
              produit3.style.display = "none"

            }
        })



</script>