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
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Generic Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Description</th>
        <th>Category ID</th>
        <th>Price</th>
        <th>Faskes TK 1</th>
        <th>Faskes TK 2</th>
        <th>Faskes TK 3</th>
        <th>Create At</th>
        <th>Update At</th>
      </tr>
    </thead>
    <tbody>
            <tr>
              <td>{{$nama_obat_oneform->id}}</td>
                <td>{{ $nama_obat_oneform->generic_name}}</td>
                <td>{{ $nama_obat_oneform->form}}</td>
                <td>{{ $nama_obat_oneform->restriction_formula}}</td>
                <td>{{ $nama_obat_oneform->description}}</td>
                <td>{{ $nama_obat_oneform->category_id}}</td>
                <td>{{ $nama_obat_oneform->price}}</td>
                <td>{{ $nama_obat_oneform->faskes1}}</td>
                <td>{{ $nama_obat_oneform->faskes2}}</td>
                <td>{{ $nama_obat_oneform->faskes3}}</td>
                <td>{{ $nama_obat_oneform->created_at}}</td>
                <td>{{ $nama_obat_oneform->updated_at}}</td>
            </tr>
    </tbody>
  </table>
</div>

</body>
</html>
