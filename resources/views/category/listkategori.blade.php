@extends('layouts.conquer')

@section('content')

<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
  Dashboard <small>statistics and more</small>
</h3>
  <div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="index.html">Home</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">Welcome</a>
     </li>
   
    </ul>
    <div class="page-toolbar">
      <a href="#modalCreate" data-toggle="modal" class="btn btn-info ">+ Category With Modal</a>
    </div>
    
  </div>

  {{--Start modal Create  --}}
      <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" >
            <form method="POST" action="{{route('kategori.store')}}">
              <div class="modal-header">
                <button type="button" class="close" 
                  data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Category</h4>
              </div>

              <div class="modal-body">
                  @csrf
                  <div class="mb-3">
                    <label for="inputCategoryName" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="inputCategoryName" name="nameCategory" requaired>
                  </div><br><br>
                  <div class="mb-3">
                    <label for="inputDescription" class="form-label">Description of Category</label>
                    <textarea name="description" rows="10" cols="30" class="form-control"></textarea>
                  </div>
              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  {{-- End Modal Create --}}




<div class="container">
  {{--Start Modal Edit A  --}}
  <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="modalContent">
        <div style="text-align: center">
          <img src="{{asset('conquer2/img/loading.gif')}}">
        </div>
        
      </div>
    </div>
  </div>
{{-- End Modal Edit A --}}
  @if (session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>        
  @endif
  {{-- <div class="note note-success" id="pesan" style="display:none"></div> --}}
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
          <tr id="tr_{{$li->id}}">
            <td>{{ $li->id}}</td>
            <td id="td_name_{{$li->id}}">{{ $li->name}}</td>
            <td id="td_description_{{$li->id}}">{{ $li->description}}</td>
            <td>{{ $li->created_at}}</td>
            <td>{{ $li->updated_at}}</td>
            {{-- <td>
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
            </td> --}}

            <td>
              <a href="{{ url('kategori/'.$li->id.'/edit' )}}" class="btn btn-info btn-xs">Edit</a>

              {{-- Week 11 --}}
              <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm({{$li->id}})">+ Edit A</a>
              <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm2({{$li->id}})">+ Edit B</a>
            </td>

            <td>
              <form method="POST" action="{{url('kategori/'.$li->id)}}">
              @csrf
              @method("DELETE")
            
              <input type="submit" value="Delete" class="btn btn-danger btn-xs" onclick="if(!confirm('are you sure to delete this record')) return false;">
              <a class="btn btn-danger btn-xs" onclick="if(confirm('apakah anda yakin??')) deleteDataRemoveTR({{$li->id}})">Delete 2</a>
            </form></td>
          </tr> 
        @endforeach
              
      </tbody>
    </table>
  
  @else
  <h2>Tidak ada data</h2>
  @endif       

</div>
@endsection

@section('javascript')
<script>
  function getEditForm(id)
  {
    $.ajax({
      type:'POST',
      url:'{{route("category.getEditForm")}}',
      data:{'_token':'<?php echo csrf_token() ?>',
        'id': id
      },
      success:function(data){
        $('#modalContent').html(data.msg)
      }
    });
  }

  function getEditForm2(id)
  {
    $.ajax({
      type:'POST',
      url:'{{route("category.getEditForm2")}}',
      data:{'_token' :'<?php echo csrf_token() ?>',
            'id':id 
          },
      success: function(data){
        $('#modalContent').html(data.msg)
      }
    });
  }

  function saveDataUpdateTD(id)
  {
    var eName = $('#eName').val();
    var eDescription = $('#eDescription').val();
    $.ajax({
      type:'POST',
      url:'{{route("category.saveData")}}',
      data:{'_token' :'<?php echo csrf_token() ?>',
            'id':id,
            'name': eName,
            'description' : eDescription
          },
      success: function(data){
        if (data.status == 'oke') {
          alert(data.msg);
          $('#td_name_'+id).html(eName);
          $('#td_description_'+id).html(eDescription);
        }
        
      }
    });
  }

  function deleteDataRemoveTR(id)
  {
    $.ajax({
      type:'POST',
      url:'{{route("category.deleteData")}}',
      data:{'_token' :'<?php echo csrf_token() ?>',
            'id':id
          },
      success: function(data){
        if (data.status == 'oke') {
          alert(data.msg);
          $('#tr_'+id).remove();
        }else{
          alert(data.msg);
        }
      }
    });
  }
</script>
@endsection