@extends('layout.conquer')

@section('content')
<form method="POST" action="{{route('kategori.store')}}">
  @csrf
  <div class="mb-3">
    <label for="inputCategoryName" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="inputCategoryName" name="nameCategory" value="{{}}" requaired>
  </div><br><br>
  <div class="mb-3">
    <label for="inputDescription" class="form-label">Description of Category</label>
    <textarea name="description" rows="10" cols="30" class="form-control"></textarea>
  </div><br><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection