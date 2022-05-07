@extends('layout.conquer')

@section('content')

<div class="container">

  @if (session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>        
  @endif

  @if (session('error'))
  <div class="alert alert-success">
    {{session('error')}}
  </div>    
  @endif
    <h2>List Categories</h2>    
    @if ($kategori)
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Category Name</th>
          <th>Description</th>
          <th>Create At</th>
          <th>Update At</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kategori as $li)
          <tr>
            <td>{{ $li->id}}</td>
            <td>{{ $li->name}}</td>
            <td>{{ $li->description}}</td>
            <td>{{ $li->created_at}}</td>
            <td>{{ $li->updated_at}}</td>
            <td>
              <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-wide">
                   <div class="modal-content" id="showproducts">
                    <div class="modal-header">
                      <h4 class="modal-title">Detail Medicines</h4>
                    </div>
                    <div class="modal-body">
                      <img src="{{asset ('conquer2/img/ajax-modal-loading.gif')}}" alt="" class="loading">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                   </div>
                </div>
              </div>
            </td>
            <td><a href="{{ url('kategori/'.$li->id.'/edit' )}}" class="btn btn-xs btn-info">Edit</a>
              <form method="POST" action="{{url('kategori/'.$li->id)}}">
                @csrf
                @method("DELETE")
              
                <input type="submit" value="Delete" class="btn btn-danger btn-xs" onclick="if(!confirm('are you sure to delete this record')) return false;">
              </form>
            
            </td>
          </tr> 
        @endforeach
              
      </tbody>
    </table>

  @else
  <h2>Tidak ada data</h2>
  @endif       
 
</div>

@endsection