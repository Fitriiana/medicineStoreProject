@extends('layouts.conquer')

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
      <a href="#modalCreate" data-toggle="modal" class="btn btn-info ">+ Medicines With Modal</a>
    </div>
    
</div>

  {{--Start modal Create  --}}
  <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content" >
      <form method="POST" action="{{route('medicine.store')}}">
        <div class="modal-header">
          <button type="button" class="close" 
            data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Add New Medicine</h4>
        </div>
        <div class="modal-body">
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
            @foreach ($dataKategori as $item)
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
            
        <tr id="tr_{{$li->id}}">
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

                <td>
                  <a href="{{ url('medicine/'.$li->id.'/edit' )}}" class="btn btn-xs btn-info">Edit</a>
                </td>
                <td>
                  <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm({{$li->id}})">+ Edit A</a>
                </td>
                <td>
                  <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm2({{$li->id}})">+ Edit B</a>
                </td>
                <td>
                  <form method="POST" action="{{url('medicine/'.$li->id)}}">
                    @csrf
                    @method("DELETE")
                  
                    <input type="submit" value="Delete" class="btn btn-danger btn-xs" onclick="if(!confirm('are you sure to delete this record')) return false;">
                    <a class="btn btn-danger btn-xs" onclick="if(confirm('apakah anda yakin??')) deleteDataRemoveTR({{$li->id}})">Delete 2</a>
                  </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection


@section('javascript')
<script>
  function getEditForm(id)
  {
    $.ajax({
      type:'POST',
      url:'{{route("medicine.getEditForm")}}',
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
      url:'{{route("medicine.getEditForm2")}}',
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
      url:'{{route("medicine.saveData")}}',
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
      url:'{{route("medicine.deleteData")}}',
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
