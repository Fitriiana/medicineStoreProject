<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>List Medicines</h2>
  <p>Table List Medicines:</p>     
  @if ($listmedicines)
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Generic Name</th>
        <th>Restriction Formula</th>
        <th>Price</th> 
      </tr>
    </thead>
    <tbody>
        @foreach ($listmedicines as $li)
          <tr>
            <td>{{ $li->generic_name}}</td>
            <td>{{ $li->restriction_formula}}</td>
            <td>{{ $li->price}}</td>
          </tr>
        @endforeach
           
    </tbody>
  </table>
  @else
  <h2>Tidak ada data</h2>
  @endif       
 
</div>

</body>
</html>
