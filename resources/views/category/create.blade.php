@extends('layouts.conquer')

@section('content')
<form method="POST" action="{{route('kategori.store')}}" enctype="multipart/form-data" role="form">
  @csrf
  <div class="form-group">
    <label for="">LOGO</label>
    <input type="file" class="form-control" id="logo" name="logo">
  </div>
  <div class="mb-3">
    <label for="inputCategoryName" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="inputCategoryName" name="nameCategory" requaired>
  </div><br><br>
  <div class="mb-3">
    <label for="inputDescription" class="form-label">Description of Category</label>
    <textarea name="description" rows="10" cols="30" class="form-control"></textarea>
  </div><br><br>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{url('category/listallcategory')}}" class="btn btn-default">Cancel</a>
</form>

@endsection