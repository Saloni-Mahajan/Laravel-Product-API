<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>productPDF</title>
  </head>
  <body class="container-fluid">
  <h2 style="text-align:center">Product Details</h2>
    <table class="table table-bordered">
    <thead class="table table-dark">
      <tr>
        <th><b>id</b></th>
        <th><b>title</b></th>
        <th><b>Desicription</b></th>  
        <th><b>price</b></th>
        <th><b>type</b></th>
        <th><b>is_active</b></th>
             
      </tr>
      </thead>
      <tbody>
      @foreach($pro as $prod)
      <tr>
        <td>{{$prod->id}}</td>
        <td>{{$prod->title}}</td>
        <td>{{$prod->description}}</td>
        <td>{{$prod->price}}</td>
        <td>{{$prod->type}}</td>
        <td>{{$prod->is_active}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </body>
</html>