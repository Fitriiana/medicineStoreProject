@extends('layouts.conquer')

@section('content')
<form method="POST" action="{{url('medicine/'.$data->id)}}">
  @csrf
  @method("PUT")
  <div class="mb-3">
    <label for="inputGenericName" class="form-label">Generic Name Of Medicine</label>
    <input type="text" class="form-control" id="inputGenericName" name="genericName" value="{{$data->generic_name}}" >
  </div><br>
  <div>
    <label for="inputFormula" class="form-label">Formula Of Medicine</label>
    <input type="text" class="form-control" id="inputFormula" name="formula" value="{{$data->form}}">
  </div><br>
  <div>
    <label for="inputRestrictionFormula" class="form-label">Restriction Formula Of Medicine</label>
    <input type="text" class="form-control" id="inputRestrictionFormula" name="restrictionForm" value="{{$data->restriction_formula}}">
  </div><br>
  <div>
    <label for="inputPrice" class="form-label">Price Of Medicine</label>
    <input type="text" class="form-control" id="inputPrice" name="price" value="{{$data->price}}">
  </div><br>
  <div class="mb-3">
    <label for="inputDescription" class="form-label">Description of Category</label>
    <textarea name="description" rows="10" cols="30" class="form-control">{{$data->description}}</textarea>
  </div><br><br>
  <label for="categoryID">Choose a Category ID:</label>
  <select id="categoryID" name="categoryID" rows="10" cols="10">
    <option value="{{$data->category_id}}" selected>{{$data->category_id}}</option>
    @foreach ($dataCategory as $item)
    <option value="{{$item->id}}">{{ $item->name}}</option>
    @endforeach
  </select><br><br>

  <div>
    <label for="inputFaskes1">Faskes 1: </label>
    @if ($data->faskes1 === 1)
      <input type="radio" id="faskesTrue1" name="faskes1" value="1" checked>
      <label for="faskesTrue1">True</label>
      <input type="radio" id="faskesfalse1" name="faskes1" value="0">
      <label for="faskesfalse1">False</label><br>
    @else
       <input type="radio" id="faskesTrue1" name="faskes1" value="1">
      <label for="faskesTrue1">True</label>
      <input type="radio" id="faskesfalse1" name="faskes1" value="0" checked>
      <label for="faskesfalse1">False</label><br>
    @endif
  </div><br>
  
  <div>
    <label for="inputFaskes2">Faskes 2: </label>
  @if ($data->faskes2 === 1)
    <input type="radio"id="faskesTrue2" name="faskes2" value="1" checked>
    <label for="faskesTrue2">True</label>
    <input type="radio" id="faskesfalse2" name="faskes2" value="0">
    <label for="faskesfalse2">False</label><br>
  @else
     <input type="radio" id="faskesTrue2" name="faskes2" value="1">
    <label for="faskesTrue2">True</label>
    <input type="radio"id="faskesfalse2" name="faskes2" value="0" checked>
    <label for="faskesfalse2">False</label><br>
  @endif
  </div><br>

  <div>
    <label for="inputFaskes3">Faskes 3: </label>
    @if ($data->faskes3 === 1)
      <input type="radio" id="faskesTrue3" name="faskes3" value="1" checked>
      <label for="faskesTrue3">True</label>
      <input type="radio" id="faskesfalse3" name="faskes3" value="0">
      <label for="faskesFalse3">False</label><br>
    @else
      <input type="radio" id="faskesTrue3" name="faskes3" value="1">
      <label for="faskesTrue3">True</label>
      <input type="radio" id="faskesfalse3" name="faskes3" value="0" checked>
      <label for="faskesFalse3">False</label><br>
    @endif
  </div><br><br>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection