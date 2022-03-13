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
  <h2>List Catgegory</h2>
  <p>Table List Catgegory with one product medicine:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Create At</th>
        <th>Update At</th>
      </tr>
    </thead>
    <tbody>
            <tr>
              <td>{{$kategoriobat->id}}</td>
                <td>{{ $kategoriobat->name}}</td>
                <td>{{ $kategoriobat->description}}</td>
                <td>{{ $kategoriobat->created_at}}</td>
                <td>{{ $kategoriobat->updated_at}}</td>
            </tr>
    </tbody>
  </table>
</div>

</body>
</html>
