@extends('layout.conquer')

@section('content')
<form method="POST" action="{{route('medicine.store')}}">
  @csrf
  <div class="mb-3">
    <label for="inputGenericName" class="form-label">Generic Name Of Medicine</label>
    <input type="text" class="form-control" id="inputGenericName" name="genericName" requaired>
  </div><br>
  <div>
    <label for="inputFormula" class="form-label">Formula Of Medicine</label>
    <input type="text" class="form-control" id="inputFormula" name="formula" requaired>
  </div><br>
  <div>
    <label for="inputRestrictionFormula" class="form-label">Restriction Formula Of Medicine</label>
    <input type="text" class="form-control" id="inputRestrictionFormula" name="restrictionForm" requaired>
  </div><br>
  <div>
    <label for="inputPrice" class="form-label">Price Of Medicine</label>
    <input type="text" class="form-control" id="inputPrice" name="price" requaired>
  </div><br>
  <div class="mb-3">
    <label for="inputDescription" class="form-label">Description of Category</label>
    <textarea name="description" rows="10" cols="30" class="form-control"></textarea>
  </div><br><br>
  <label for="categoryID">Choose a Category ID:</label>
  <select id="categoryID" name="categoryID" rows="10" cols="10">
    @foreach ($dataCategory as $item)
    <option value="{{$item->id}}">{{ $item->name}}</option>
    @endforeach
  </select><br><br>

  <div>
    <label for="inputFaskes1">Faskes 1: </label>
    <input type="radio" id="faskesTrue1" name="faskes1" value="1">
    <label for="faskesTrue1">True</label>
    <input type="radio" id="faskesfalse1" name="faskes1" value="0">
    <label for="faskesfalse1">False</label><br>
  </div><br>
  
  <div>
    <label for="inputFaskes2">Faskes 2: </label>
    <input type="radio" id="faskesTrue2" name="faskes2" value="1">
    <label for="faskesTrue2">True</label>
    <input type="radio" id="faskesfalse2" name="faskes2" value="0">
    <label for="faskesfalse2">False</label><br>
  </div><br>

  <div>
    <label for="inputFaskes3">Faskes 3: </label>
    <input type="radio" id="faskesTrue3" name="faskes3" value="1">
    <label for="faskesTrue3">True</label>
    <input type="radio" id="faskesfalse3" name="faskes3" value="0">
    <label for="faskesFalse3">False</label><br>
  </div><br><br>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection