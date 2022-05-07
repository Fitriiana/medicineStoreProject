@extends('layout.conquer')

@section('content')
	{{--tambahan week 7  --}}
  <div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">DISCLAIMER</h4>
          </div>
          <div class="modal-body">
            Pictures shown are for illustration purpose only.Actual product may vary due to product enhancement.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
  </div>
  <a class="btn btn-default" data-toggle="modal" href="#disclaimer">Disclaimer</a>
{{-- end week 7 --}}

<div class="container">
  @if (session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>        
  @endif
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
        @foreach ($obat as $li)
            <tr>
              <td>{{$li->id}}</td>
                <td>{{ $li->generic_name}}</td>
                <td>{{ $li->form}}</td>
                <td>{{ $li->restriction_formula}}</td>
                <td>{{ $li->description}}</td>
                <td>{{ $li->category_id}}</td>
                <td>{{ $li->price}}</td>
                <td>{{ $li->faskes_TK1}}</td>
                <td>{{ $li->faskes_TK2}}</td>
                <td>{{ $li->faskes_TK3}}</td>
                <td>{{ $li->created_at}}</td>
                <td>{{ $li->updated_at}}</td>
                <td><a href="{{ url('medicine/'.$li->id.'/edit' )}}" class="btn btn-xs btn-info">Edit</a>
                  <form method="POST" action="{{url('medicine/'.$li->id)}}">
                    @csrf
                    @method("DELETE")
                  
                    <input type="submit" value="Delete" class="btn btn-danger btn-xs" onclick="if(!confirm('are you sure to delete this record')) return false;">
                  </form>
                
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection
