<!DOCTYPE html>
<html lang="en">
<head>
  <title>Medicines Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>List Categories</h2>  
  <p>List of Categories That Didn't have Medicines:</p>  
  @if ($list_kategori_noobat)
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Category ID</th>
        <th>Category Name</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($list_kategori_noobat as $li)
        <tr>
          <td>{{ $li->id}}</td>
          <td>{{ $li->name}}</td>
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
