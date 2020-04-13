<table class="table" data-command="{{@json_encode(["nbCommand" => $commands->count()])}}">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Numéro de commande</th>
        <th scope="col">origine vente</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Code Postal</th>
        <th scope="col">Statut</th>
        <th scope="col">Durée</th>
        <th scope="col">Date</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
  @foreach ($commands as $key => $command)
  @foreach ($command->articles as $article)
  <tr class="d-none row-product-{{$key}}" data-product="{{@json_encode([
    "fabric" => $article->fabric->image
    ])}}"></tr>
  @endforeach


    <tr class="row-command-{{$key}}" id="command-{{$command->id}}" data-info="{{@json_encode([
      "articles" =>$command->articles,
      "nbArticle" =>$command->articles->count(),
      "commandId" =>$command->id,
      "origin" =>$command->origin,
      "number" => $command->number,
      'fname' => $command->fname,
      'lname' => $command->lname,
      'adresse' => $command->adress,
      'postalCode' => $command->postalCode,
      'city' => $command->city,
      'status' => $command->status,
      'comment' => $command->comment,
      'date' => $command->created_at,
      'duration' => duration($command->created_at, "days"),
      ])
    }}">
    <span class="d-none row-product-{{$key}}" data-product="{{@json_encode([
      "products" => $article->product->image
      ])}}"></span>
 
    <th scope="row" class="">{{$command->number}}</th>
      @if ($command->origin == 'instagram')
        <td><img width="40" src="https://image.flaticon.com/icons/svg/2111/2111463.svg" alt="" srcset=""></td>
      @elseif($command->origin == 'etsy')
        <td><img width="40" src="https://image.flaticon.com/icons/svg/825/825513.svg" alt="" srcset=""></td>
      @else
        <td><img width="40" src="https://1.bp.blogspot.com/-46zpL0xuVws/W5lHHMv8HmI/AAAAAAAAARI/IZI4t8GfwhMRY01tZEZK9bTECW165RlKgCLcBGAs/s1600/vinted.png" alt="" srcset=""></td>
      @endif
      <td>{{$command->fname}}</td>
      <td>{{$command->lname}}</td>
      <td>{{$command->postalCode}}</td>
      <td>{{$command->status}}</td>
      <td>{{duration($command->created_at, 'days')}} jours</td>
      <td>{{$command->created_at}}</td>
    </tr>
    
  @endforeach
    </tbody>
  </table>
  {{ $commands->links() }}