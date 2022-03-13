<!DOCTYPE html>
<html lang="en">
<head>
  <title>Medicine Store</title>
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
  @if ($messages)
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Generic Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Category ID</th>
        <th>Price</th> 
        <th>Category Name</th> 
      </tr>
    </thead>
    <tbody>
            <tr>
              <td>{{$messages->id}}</td>
                <td>{{ $messages->generic_name}}</td>
                <td>{{ $messages->form}}</td>
                <td>{{ $messages->restriction_formula}}</td>
                <td>{{ $messages->category_id}}</td>
                <td>{{ $messages->price}}</td>
                <td>{{ $messages->category->name}}</td>
            </tr>
    </tbody>
  </table>
  @else
  <h2>Tidak ada data</h2>
  @endif       
 
</div>

</body>
</html>
